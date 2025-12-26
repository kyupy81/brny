@extends('layouts.app')

@section('content')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Mon Tableau de Bord') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
            <div class="p-6 text-gray-900">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-gray-800">Mes Signalements de Vol</h3>
                    <a href="{{ route('thefts.create') }}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 font-bold text-sm uppercase tracking-wider">
                        Signaler un Vol
                    </a>
                </div>

                @if($myReports->isEmpty())
                    <div class="text-center py-8 bg-gray-50 rounded border border-dashed border-gray-300">
                        <p class="text-gray-500">Vous n'avez aucun signalement en cours.</p>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Véhicule</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($myReports as $report)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $report->created_at->format('d/m/Y H:i') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-bold text-gray-900">{{ $report->vehicle->plate_number }}</div>
                                            <div class="text-xs text-gray-500">{{ $report->vehicle->brand }} {{ $report->vehicle->model }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                {{ $report->status == 'PENDING' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                                {{ $report->status == 'CONFIRMED' ? 'bg-red-100 text-red-800' : '' }}
                                                {{ $report->status == 'RECOVERED' ? 'bg-green-100 text-green-800' : '' }}
                                                {{ $report->status == 'REJECTED' ? 'bg-gray-100 text-gray-800' : '' }}">
                                                {{ $report->status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ Str::limit($report->description, 50) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection