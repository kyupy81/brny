<?php

namespace App\Services;

use App\Models\Registration;
use App\Models\TheftReport;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardService
{
    protected function getBaseQuery($filters, $userId = null)
    {
        $query = Registration::query()
            ->join('vehicles', 'registrations.vehicle_id', '=', 'vehicles.id')
            ->join('owners', 'registrations.owner_id', '=', 'owners.id')
            ->join('vehicle_brands', 'vehicles.brand_id', '=', 'vehicle_brands.id')
            ->join('vehicle_models', 'vehicles.model_id', '=', 'vehicle_models.id');

        if ($userId) {
            $query->where('registrations.created_by', $userId);
        }

        if (!empty($filters['from'])) {
            $query->whereDate('registrations.created_at', '>=', $filters['from']);
        } else {
            // Default to last 30 days if not specified
            $query->whereDate('registrations.created_at', '>=', now()->subDays(30));
        }

        if (!empty($filters['to'])) {
            $query->whereDate('registrations.created_at', '<=', $filters['to']);
        }

        if (!empty($filters['commune'])) {
            $query->where('owners.commune', $filters['commune']);
        }

        if (!empty($filters['brand_id'])) {
            $query->where('vehicles.brand_id', $filters['brand_id']);
        }

        if (!empty($filters['model_id'])) {
            $query->where('vehicles.model_id', $filters['model_id']);
        }

        if (!empty($filters['manufacture_year'])) {
            $query->where('vehicles.manufacture_year', $filters['manufacture_year']);
        }

        if (!empty($filters['status']) && $filters['status'] !== 'ALL') {
            $query->where('registrations.status', $filters['status']);
        }

        if (!empty($filters['agent_id']) && !$userId) {
            $query->where('registrations.created_by', $filters['agent_id']);
        }

        return $query;
    }

    public function getKpis($filters, $userId = null)
    {
        $query = $this->getBaseQuery($filters, $userId);
        
        $totalRegistrations = $query->count();
        
        // Clone query for stolen count to avoid side effects if we were to modify it further
        $stolenQuery = clone $query;
        $totalStolen = $stolenQuery->where('registrations.status', 'STOLEN')->count();

        $ownersQuery = clone $query;
        $totalOwners = $ownersQuery->distinct('registrations.owner_id')->count('registrations.owner_id');

        // Top Commune
        $communeQuery = clone $query;
        $topCommune = $communeQuery->select('owners.commune', DB::raw('count(*) as total'))
            ->groupBy('owners.commune')
            ->orderByDesc('total')
            ->first();

        // Top Brand
        $brandQuery = clone $query;
        $topBrand = $brandQuery->select('vehicle_brands.name', DB::raw('count(*) as total'))
            ->groupBy('vehicle_brands.name')
            ->orderByDesc('total')
            ->first();

        // Top Model
        $modelQuery = clone $query;
        $topModel = $modelQuery->select('vehicle_models.name', DB::raw('count(*) as total'))
            ->groupBy('vehicle_models.name')
            ->orderByDesc('total')
            ->first();

        return [
            'total_registrations' => $totalRegistrations,
            'total_stolen' => $totalStolen,
            'stolen_rate' => $totalRegistrations > 0 ? round(($totalStolen / $totalRegistrations) * 100, 1) : 0,
            'total_owners' => $totalOwners,
            'top_commune' => $topCommune ? $topCommune->commune : 'N/A',
            'top_commune_count' => $topCommune ? $topCommune->total : 0,
            'top_brand' => $topBrand ? $topBrand->name : 'N/A',
            'top_brand_count' => $topBrand ? $topBrand->total : 0,
            'top_model' => $topModel ? $topModel->name : 'N/A',
            'top_model_count' => $topModel ? $topModel->total : 0,
        ];
    }

    public function getStatsByCommune($filters, $userId = null)
    {
        $query = $this->getBaseQuery($filters, $userId);
        
        return $query->select(
                'owners.commune', 
                DB::raw('count(*) as total'),
                DB::raw('sum(case when registrations.status = "STOLEN" then 1 else 0 end) as stolen_count')
            )
            ->groupBy('owners.commune')
            ->orderByDesc('total')
            ->limit(10)
            ->get()
            ->map(function($item) {
                $item->stolen_rate = $item->total > 0 ? round(($item->stolen_count / $item->total) * 100, 1) : 0;
                return $item;
            });
    }

    public function getStatsByBrand($filters, $userId = null)
    {
        $query = $this->getBaseQuery($filters, $userId);
        
        return $query->select(
                'vehicle_brands.name', 
                DB::raw('count(*) as total'),
                DB::raw('sum(case when registrations.status = "STOLEN" then 1 else 0 end) as stolen_count')
            )
            ->groupBy('vehicle_brands.name')
            ->orderByDesc('total')
            ->limit(10)
            ->get()
            ->map(function($item) {
                $item->stolen_rate = $item->total > 0 ? round(($item->stolen_count / $item->total) * 100, 1) : 0;
                return $item;
            });
    }

    public function getStatsByModel($filters, $userId = null)
    {
        $query = $this->getBaseQuery($filters, $userId);
        
        return $query->select(
                'vehicle_models.name', 
                DB::raw('count(*) as total'),
                DB::raw('sum(case when registrations.status = "STOLEN" then 1 else 0 end) as stolen_count')
            )
            ->groupBy('vehicle_models.name')
            ->orderByDesc('total')
            ->limit(10)
            ->get()
            ->map(function($item) {
                $item->stolen_rate = $item->total > 0 ? round(($item->stolen_count / $item->total) * 100, 1) : 0;
                return $item;
            });
    }

    public function getTimeSeries($filters, $userId = null)
    {
        $query = $this->getBaseQuery($filters, $userId);
        
        // SQLite syntax for date grouping
        $dateFormat = "%Y-%m-%d";
        
        return $query->select(
                DB::raw("strftime('$dateFormat', registrations.created_at) as date"),
                DB::raw('count(*) as total')
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get();
    }

    public function getAgentPerformance($filters)
    {
        // Admin only, so no userId restriction passed here usually
        $query = $this->getBaseQuery($filters);
        
        return $query->join('users', 'registrations.created_by', '=', 'users.id')
            ->select(
                'users.name',
                DB::raw('count(*) as total'),
                DB::raw('sum(case when registrations.status = "STOLEN" then 1 else 0 end) as stolen_count')
            )
            ->groupBy('users.name')
            ->orderByDesc('total')
            ->get()
            ->map(function($item) {
                $item->stolen_rate = $item->total > 0 ? round(($item->stolen_count / $item->total) * 100, 1) : 0;
                return $item;
            });
    }
}