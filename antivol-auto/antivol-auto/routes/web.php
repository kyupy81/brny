<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\AdminAgentsCrud;
use App\Livewire\AgentVehicleWizard;
use App\Livewire\AgentVerifySearch;
use App\Livewire\ClientVehiclesList;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes Livewire
    Route::get('/admin/agents', AdminAgentsCrud::class)->name('admin.agents');
    Route::get('/agent/wizard', AgentVehicleWizard::class)->name('agent.wizard');
    Route::get('/agent/verify', AgentVerifySearch::class)->name('agent.verify');
    Route::get('/client/vehicles', ClientVehiclesList::class)->name('client.vehicles');
});

require __DIR__.'/auth.php';