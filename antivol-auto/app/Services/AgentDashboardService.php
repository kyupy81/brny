<?php

namespace App\Services;

use App\Models\Registration;
use App\Models\TheftReport;
use App\Models\Vehicle;
use App\Models\Owner;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AgentDashboardService
{
    protected function applyFilters($query, $filters, $userId)
    {
        $query->where('created_by', $userId);

        if (!empty($filters['from'])) {
            $query->whereDate('created_at', '>=', $filters['from']);
        }

        if (!empty($filters['to'])) {
            $query->whereDate('created_at', '<=', $filters['to']);
        }

        // Location Filters
        if (!empty($filters['city_id'])) {
            $query->whereHas('owner', function ($q) use ($filters) {
                $q->where('city_id', $filters['city_id']);
            });
        }

        if (!empty($filters['commune_id'])) {
            $query->whereHas('owner', function ($q) use ($filters) {
                $q->where('commune_id', $filters['commune_id']);
            });
        }

        if (!empty($filters['quarter_id'])) {
            $query->whereHas('owner', function ($q) use ($filters) {
                $q->where('quarter_id', $filters['quarter_id']);
            });
        }

        if (!empty($filters['brand_id'])) {
            $query->whereHas('vehicle', function ($q) use ($filters) {
                $q->where('brand_id', $filters['brand_id']);
            });
        }

        if (!empty($filters['model_id'])) {
            $query->whereHas('vehicle', function ($q) use ($filters) {
                $q->where('model_id', $filters['model_id']);
            });
        }

        if (!empty($filters['year'])) {
            $query->whereHas('vehicle', function ($q) use ($filters) {
                $q->where('manufacture_year', $filters['year']);
            });
        }

        if (!empty($filters['status']) && $filters['status'] !== 'ALL') {
            $query->where('status', $filters['status']);
        }

        if (!empty($filters['q'])) {
            $term = $filters['q'];
            $query->where(function($q) use ($term) {
                $q->where('registration_number', 'like', "%{$term}%")
                  ->orWhereHas('vehicle', function($q) use ($term) {
                      $q->where('plate_number', 'like', "%{$term}%")
                         ->orWhere('mirror_engraving_code', 'like', "%{$term}%");
                  })
                  ->orWhereHas('owner', function($q) use ($term) {
                      $q->where('phone', 'like', "%{$term}%")
                        ->orWhere('first_name', 'like', "%{$term}%")
                        ->orWhere('last_name', 'like', "%{$term}%");
                  });
            });
        }

        return $query;
    }

    public function getKPIs($userId, $filters = [])
    {
        $query = Registration::query();
        $this->applyFilters($query, $filters, $userId);

        $totalRegistrations = $query->count();
        $uniqueOwners = $query->distinct('owner_id')->count('owner_id');

        // Status counts
        $statusQuery = Registration::query();
        $filtersWithoutStatus = $filters;
        unset($filtersWithoutStatus['status']);
        $this->applyFilters($statusQuery, $filtersWithoutStatus, $userId);
        
        $activeCount = (clone $statusQuery)->where('status', 'ACTIVE')->count();
        $pendingCount = (clone $statusQuery)->where('status', 'PENDING')->count();
        $stolenCount = (clone $statusQuery)->where('status', 'STOLEN')->count();

        $theftRate = $totalRegistrations > 0 ? round(($stolenCount / $totalRegistrations) * 100, 2) : 0;

        // Top Commune (using relation)
        $topCommune = Registration::where('created_by', $userId)
            ->join('owners', 'registrations.owner_id', '=', 'owners.id')
            ->leftJoin('communes', 'owners.commune_id', '=', 'communes.id')
            ->select(DB::raw('COALESCE(communes.name, owners.commune) as commune_name'), DB::raw('count(*) as total'))
            ->groupBy('commune_name')
            ->orderByDesc('total')
            ->first();

        // Top Brand
        $topBrand = Registration::where('created_by', $userId)
            ->join('vehicles', 'registrations.vehicle_id', '=', 'vehicles.id')
            ->join('vehicle_brands', 'vehicles.brand_id', '=', 'vehicle_brands.id')
            ->select('vehicle_brands.name', DB::raw('count(*) as total'))
            ->groupBy('vehicle_brands.name')
            ->orderByDesc('total')
            ->first();

        // Top Model
        $topModel = Registration::where('created_by', $userId)
            ->join('vehicles', 'registrations.vehicle_id', '=', 'vehicles.id')
            ->join('vehicle_models', 'vehicles.model_id', '=', 'vehicle_models.id')
            ->select('vehicle_models.name', DB::raw('count(*) as total'))
            ->groupBy('vehicle_models.name')
            ->orderByDesc('total')
            ->first();

        return [
            'total_registrations' => $totalRegistrations,
            'unique_owners' => $uniqueOwners,
            'active_registrations' => $activeCount,
            'pending_validations' => $pendingCount,
            'stolen_vehicles' => $stolenCount,
            'theft_rate' => $theftRate,
            'top_commune' => $topCommune ? $topCommune->commune_name : 'N/A',
            'top_brand' => $topBrand ? $topBrand->name : 'N/A',
            'top_model' => $topModel ? $topModel->name : 'N/A',
        ];
    }

    public function getCharts($userId, $filters = [])
    {
        // Registrations by Month
        $query = Registration::query();
        $this->applyFilters($query, $filters, $userId);
        $registrationsTrend = $query->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as date'), DB::raw('count(*) as total'))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Status Distribution
        $statusQuery = Registration::query();
        $filtersWithoutStatus = $filters;
        unset($filtersWithoutStatus['status']);
        $this->applyFilters($statusQuery, $filtersWithoutStatus, $userId);
        $statusDistribution = $statusQuery->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();

        return [
            'registrations_trend' => $registrationsTrend,
            'status_distribution' => $statusDistribution,
        ];
    }

    public function getLatestRegistrations($userId, $filters = [], $perPage = 20)
    {
        $query = Registration::with(['owner.city', 'owner.communeRel', 'vehicle.brand', 'vehicle.model']);
        $this->applyFilters($query, $filters, $userId);
        return $query->latest()->paginate($perPage);
    }

    public function getIncompleteRegistrations($userId)
    {
        return Registration::where('created_by', $userId)
            ->where('status', 'PENDING')
            ->with(['owner', 'vehicle.brand', 'vehicle.model'])
            ->latest()
            ->limit(10)
            ->get();
    }

    public function fieldSearch($userId, $term)
    {
        if (empty($term)) return collect([]);

        return Registration::where('created_by', $userId)
            ->where(function($q) use ($term) {
                $q->where('registration_number', 'like', "%{$term}%")
                  ->orWhereHas('vehicle', function($q) use ($term) {
                      $q->where('plate_number', 'like', "%{$term}%")
                         ->orWhere('mirror_engraving_code', 'like', "%{$term}%");
                  })
                  ->orWhereHas('owner', function($q) use ($term) {
                      $q->where('phone', 'like', "%{$term}%");
                  });
            })
            ->with(['owner', 'vehicle.brand', 'vehicle.model'])
            ->limit(10)
            ->get();
    }
}
