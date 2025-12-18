<?php

namespace App\Services;

use App\Models\Registration;
use App\Models\TheftReport;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Owner;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminDashboardService
{
    protected function applyFilters(\, \, \ = 'created_at')
    {
        if (!empty(\['from'])) {
            \->whereDate(\, '>=', \['from']);
        } else {
            // Default to 30 days if not specified, unless 'ALL' is implied by empty
            // But usually dashboard has a default range. Let's assume controller sets defaults if needed.
            // Or we can set default here.
            // \->whereDate(\, '>=', Carbon::now()->subDays(30));
        }

        if (!empty(\['to'])) {
            \->whereDate(\, '<=', \['to']);
        }

        if (!empty(\['commune'])) {
            \->whereHas('owner', function (\) use (\) {
                \->where('commune', \['commune']);
            });
        }

        if (!empty(\['brand_id'])) {
            \->whereHas('vehicle', function (\) use (\) {
                \->where('brand_id', \['brand_id']);
            });
        }

        if (!empty(\['model_id'])) {
            \->whereHas('vehicle', function (\) use (\) {
                \->where('model_id', \['model_id']);
            });
        }

        if (!empty(\['year'])) {
            \->whereHas('vehicle', function (\) use (\) {
                \->where('manufacture_year', \['year']);
            });
        }

        if (!empty(\['status']) && \['status'] !== 'ALL') {
            \->where('status', \['status']);
        }

        if (!empty(\['agent_id'])) {
            \->where('created_by', \['agent_id']);
        }

        return \;
    }

    public function getKPIs(\)
    {
        // Base queries
        \ = Registration::query();
        \->applyFilters(\, \, 'created_at');

        \ = TheftReport::query();
        // Apply filters to theft reports. Note: TheftReport doesn't have direct owner/vehicle/agent relations usually,
        // but it belongs to Registration. So we filter via registration.
        \->whereHas('registration', function (\) use (\) {
            \->applyFilters(\, \, 'created_at'); // Filter by registration creation or theft report date?
            // Usually filters apply to the main entity. If filtering by date, for thefts it should be reported_at.
            // But other filters (commune, brand) apply to the related registration.
        });
        
        // Date filter for theft reports specifically
        if (!empty(\['from'])) {
            \->whereDate('reported_at', '>=', \['from']);
        }
        if (!empty(\['to'])) {
            \->whereDate('reported_at', '<=', \['to']);
        }

        \ = \->count();
        \ = \->distinct('owner_id')->count('owner_id');
        
        // For status counts, we can't reuse \ if it has status filter applied.
        // So we create a new query with all filters EXCEPT status.
        \ = Registration::query();
        \ = \;
        unset(\['status']);
        \->applyFilters(\, \, 'created_at');
        
        \ = (clone \)->where('status', 'ACTIVE')->count();
        \ = (clone \)->where('status', 'PENDING')->count();
        \ = (clone \)->where('status', 'STOLEN')->count();

        // Theft rate
        \ = \ > 0 ? round((\ / \) * 100, 2) : 0;

        // Top Commune
        \ = Registration::query()
            ->join('owners', 'registrations.owner_id', '=', 'owners.id')
            ->select('owners.commune', DB::raw('count(*) as total'))
            ->groupBy('owners.commune')
            ->orderByDesc('total')
            ->first();

        // Top Brand
        \ = Registration::query()
            ->join('vehicles', 'registrations.vehicle_id', '=', 'vehicles.id')
            ->join('vehicle_brands', 'vehicles.brand_id', '=', 'vehicle_brands.id')
            ->select('vehicle_brands.name', DB::raw('count(*) as total'))
            ->groupBy('vehicle_brands.name')
            ->orderByDesc('total')
            ->first();

        return [
            'total_registrations' => \,
            'unique_owners' => \,
            'active_count' => \,
            'pending_count' => \,
            'stolen_count' => \,
            'theft_rate' => \,
            'top_commune' => \ ? \->commune : 'N/A',
            'top_brand' => \ ? \->name : 'N/A',
        ];
    }

    public function getCharts(\)
    {
        // 1. Registrations per day
        \ = Registration::query();
        \->applyFilters(\, \, 'created_at');
        \ = \->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // 2. Thefts per day
        \ = TheftReport::query();
        if (!empty(\['from'])) \->whereDate('reported_at', '>=', \['from']);
        if (!empty(\['to'])) \->whereDate('reported_at', '<=', \['to']);
        // Apply other filters via registration relation
        \->whereHas('registration', function(\) use (\) {
             \ = \;
             unset(\['from'], \['to']);
             \->applyFilters(\, \);
        });
        
        \ = \->select(DB::raw('DATE(reported_at) as date'), DB::raw('count(*) as total'))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // 3. Top Communes
        \ = Registration::query()
            ->join('owners', 'registrations.owner_id', '=', 'owners.id')
            ->select('owners.commune', DB::raw('count(*) as total'))
            ->groupBy('owners.commune')
            ->orderByDesc('total')
            ->limit(10)
            ->get();

        // 4. Top Brands
        \ = Registration::query()
            ->join('vehicles', 'registrations.vehicle_id', '=', 'vehicles.id')
            ->join('vehicle_brands', 'vehicles.brand_id', '=', 'vehicle_brands.id')
            ->select('vehicle_brands.name', DB::raw('count(*) as total'))
            ->groupBy('vehicle_brands.name')
            ->orderByDesc('total')
            ->limit(10)
            ->get();

        // 5. Status Distribution
        \ = Registration::query();
        \ = \;
        unset(\['status']);
        \->applyFilters(\, \, 'created_at');
        \ = \->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();

        return [
            'registrations_trend' => \,
            'thefts_trend' => \,
            'top_communes' => \,
            'top_brands' => \,
            'status_distribution' => \,
        ];
    }

    public function getRecentRegistrations(\, \ = 50)
    {
        \ = Registration::with(['owner', 'vehicle.brand', 'vehicle.model', 'creator']);
        \->applyFilters(\, \, 'created_at');
        return \->latest()->paginate(\);
    }

    public function getRecentThefts(\, \ = 50)
    {
        \ = TheftReport::with(['registration.vehicle', 'registration.owner']);
        
        if (!empty(\['from'])) \->whereDate('reported_at', '>=', \['from']);
        if (!empty(\['to'])) \->whereDate('reported_at', '<=', \['to']);
        
        \->whereHas('registration', function(\) use (\) {
             \ = \;
             unset(\['from'], \['to']);
             \->applyFilters(\, \);
        });

        return \->latest('reported_at')->paginate(\);
    }

    public function getDuplicates()
    {
        // Logic to find duplicates
        // 1. Duplicate Plates (Active)
        \ = DB::table('vehicles')
            ->join('registrations', 'vehicles.id', '=', 'registrations.vehicle_id')
            ->where('registrations.status', 'ACTIVE')
            ->select('vehicles.plate_number', DB::raw('count(*) as count'))
            ->groupBy('vehicles.plate_number')
            ->having('count', '>', 1)
            ->get();

        // 2. Duplicate Mirror Codes
        \ = DB::table('vehicles')
            ->whereNotNull('mirror_engraving_code')
            ->select('mirror_engraving_code', DB::raw('count(*) as count'))
            ->groupBy('mirror_engraving_code')
            ->having('count', '>', 1)
            ->get();

        return [
            'plates' => \,
            'mirrors' => \,
        ];
    }

    public function getAgentPerformance(\)
    {
        \ = User::where('role', 'agent')
            ->withCount(['registrations' => function(\) use (\) {
                if (!empty(\['from'])) \->whereDate('created_at', '>=', \['from']);
                if (!empty(\['to'])) \->whereDate('created_at', '<=', \['to']);
            }])
            ->withCount(['registrations as stolen_count' => function(\) use (\) {
                \->where('status', 'STOLEN');
                if (!empty(\['from'])) \->whereDate('created_at', '>=', \['from']);
                if (!empty(\['to'])) \->whereDate('created_at', '<=', \['to']);
            }]);
            
        return \->get()->map(function(\) {
            \->theft_rate = \->registrations_count > 0 
                ? round((\->stolen_count / \->registrations_count) * 100, 1) 
                : 0;
            return \;
        });
    }
}

