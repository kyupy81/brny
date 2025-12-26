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
    protected function applyFilters($query, $filters, $dateColumn = 'created_at')
    {
        if (!empty($filters['from'])) {
            $query->whereDate($dateColumn, '>=', $filters['from']);
        }

        if (!empty($filters['to'])) {
            $query->whereDate($dateColumn, '<=', $filters['to']);
        }

        if (!empty($filters['commune'])) {
            $query->whereHas('owner', function ($q) use ($filters) {
                $q->where('commune', $filters['commune']);
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
        
        if (!empty($filters['agent_id'])) {
            $query->where('created_by', $filters['agent_id']);
        }

        return $query;
    }

    protected function applyTheftFilters($query, $filters)
    {
        if (!empty($filters['from'])) {
            $query->whereDate('reported_at', '>=', $filters['from']);
        }

        if (!empty($filters['to'])) {
            $query->whereDate('reported_at', '<=', $filters['to']);
        }

        if (!empty($filters['commune'])) {
            $query->whereHas('vehicle.registrations.owner', function ($q) use ($filters) {
                $q->where('commune', $filters['commune']);
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
        
        if (!empty($filters['agent_id'])) {
             $query->whereHas('vehicle.registrations', function ($q) use ($filters) {
                $q->where('created_by', $filters['agent_id']);
            });
        }

        return $query;
    }

    public function getKPIs($filters)
    {
        // 1. Total Registrations
        $registrationsQuery = Registration::query();
        $this->applyFilters($registrationsQuery, $filters);
        $totalRegistrations = $registrationsQuery->count();

        // 2. Total Thefts
        $theftsQuery = TheftReport::query();
        $this->applyTheftFilters($theftsQuery, $filters);
        $totalThefts = $theftsQuery->count();

        // 3. Recovery Rate
        $resolvedThefts = (clone $theftsQuery)->where('status', 'RESOLVED')->count();
        $recoveryRate = $totalThefts > 0 ? round(($resolvedThefts / $totalThefts) * 100, 1) : 0;

        // 4. Active Agents
        $activeAgents = Registration::query();
        $this->applyFilters($activeAgents, $filters);
        $activeAgentsCount = $activeAgents->distinct('created_by')->count('created_by');

        return [
            'total_registrations' => $totalRegistrations,
            'total_thefts' => $totalThefts,
            'recovery_rate' => $recoveryRate,
            'active_agents' => $activeAgentsCount
        ];
    }

    public function getCharts($filters)
    {
        // 1. Registrations over time
        $registrationsQuery = Registration::query();
        $this->applyFilters($registrationsQuery, $filters);
        
        $registrationsByDate = $registrationsQuery
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // 2. Thefts over time
        $theftsQuery = TheftReport::query();
        $this->applyTheftFilters($theftsQuery, $filters);
        
        $theftsByDate = $theftsQuery
            ->select(DB::raw('DATE(reported_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // 3. Top Brands
        $brandsQuery = Registration::query();
        $this->applyFilters($brandsQuery, $filters);
        $topBrands = $brandsQuery
            ->join('vehicles', 'registrations.vehicle_id', '=', 'vehicles.id')
            ->join('vehicle_brands', 'vehicles.brand_id', '=', 'vehicle_brands.id')
            ->select('vehicle_brands.name', DB::raw('count(*) as count'))
            ->groupBy('vehicle_brands.name')
            ->orderByDesc('count')
            ->limit(5)
            ->get();

        return [
            'registrations_trend' => [
                'labels' => $registrationsByDate->pluck('date'),
                'data' => $registrationsByDate->pluck('count')
            ],
            'thefts_trend' => [
                'labels' => $theftsByDate->pluck('date'),
                'data' => $theftsByDate->pluck('count')
            ],
            'top_brands' => [
                'labels' => $topBrands->pluck('name'),
                'data' => $topBrands->pluck('count')
            ]
        ];
    }

    public function getRecentRegistrations($filters, $limit = 10)
    {
        $query = Registration::with(['vehicle.brand', 'vehicle.model', 'owner', 'creator']);
        $this->applyFilters($query, $filters);
        return $query->latest()->limit($limit)->get();
    }

    public function getRecentThefts($filters, $limit = 10)
    {
        $query = TheftReport::with(['vehicle.brand', 'vehicle.model']);
        $this->applyTheftFilters($query, $filters);

        return $query->latest('reported_at')->limit($limit)->get();
    }

    public function getDuplicates()
    {
        // Find vehicles with same VIN or Plate Number (excluding the original)
        // This is a simplified check. Real duplicate detection might be more complex.
        return Vehicle::select('plate_number', DB::raw('count(*) as count'))
            ->groupBy('plate_number')
            ->having('count', '>', 1)
            ->get();
    }

    public function getAgentPerformance($filters)
    {
        $query = Registration::query();
        $this->applyFilters($query, $filters);
        
        return $query->select('created_by', DB::raw('count(*) as total_registrations'))
            ->with('creator')
            ->groupBy('created_by')
            ->orderByDesc('total_registrations')
            ->limit(10)
            ->get();
    }
}
