<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\TemplateController;

// Home route
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Logout route
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Language switch route
Route::get('lang/{locale}', [LanguageController::class, 'switchLang'])->name('lang.switch');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Leads Routes
Route::middleware('auth')->group(function () {
    Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
    Route::post('/leads/store', [LeadController::class, 'store'])->name('leads.store');
    Route::get('/leads/{id}', [LeadController::class, 'show'])->name('leads.show');
    Route::get('/leads/{id}/edit', [LeadController::class, 'edit'])->name('leads.edit');
    Route::put('/leads/{id}', [LeadController::class, 'update'])->name('leads.update');
    Route::delete('/leads/{id}', [LeadController::class, 'destroy'])->name('leads.destroy');
    Route::get('/unqualify', [LeadController::class, 'unqualifiedLeads'])->name('leads.unqualified.index');
    Route::put('/unqualify/{id}', [LeadController::class, 'unqualified'])->name('leads.unqualified');
    Route::put('/leads/{id}/unqualify', [LeadController::class, 'unqualified'])->name('leads.unqualified');
    Route::put('/leads/{id}/update-agent', [LeadController::class, 'updateAgent'])->name('leads.updateAgent');
    Route::put('/leads/{id}/make-client', [LeadController::class, 'makeClient'])->name('leads.makeClient');
});

// Clients routes
Route::middleware('auth')->group(function () {
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/clients/store', [ClientController::class, 'store'])->name('clients.store');
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/clients/{id}', [ClientController::class, 'show'])->name('clients.show');
    Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');
});

// Offer  Routes
Route::middleware('auth')->group(function () {
    Route::get('/offers', [OfferController::class, 'index'])->name('offers.index');
    Route::get('/offers/create/{client_id}', [OfferController::class, 'create'])->name('offers.create');
    Route::post('/offers/store', [OfferController::class, 'store'])->name('offers.store');
    Route::get('/offers/editor', [OfferController::class, 'showEditor'])->name('offers.edit');
    Route::post('/offers/template/save', [OfferController::class, 'saveTemplate'])->name('offers.template.save');
    Route::post('/offers/template/preview', [OfferController::class, 'previewTemplate'])->name('offers.template.preview');
    Route::get('/offers/{id}', [OfferController::class, 'show'])->name('offers.show');
    Route::get('/offers/{id}/download', [OfferController::class, 'download'])->name('offers.download');
    Route::post('/offers/preview', [OfferController::class, 'preview'])->name('offers.preview');
    Route::post('/offers/send/{id}', [OfferController::class, 'send'])->name('offers.send');
});



// Contract Routes
Route::middleware('auth')->group(function () {
    Route::get('/contracts/create/{client_id}', [ContractController::class, 'create'])->name('contracts.create');
    Route::post('/contracts/store', [ContractController::class, 'store'])->name('contracts.store');
});

// Template Routes
Route::middleware('auth')->group(function () {
    Route::get('/templates', [TemplateController::class, 'index'])->name('templates.index');
    Route::get('/templates/create', [TemplateController::class, 'create'])->name('templates.create');
    Route::post('/templates', [TemplateController::class, 'store'])->name('templates.store');
    Route::get('/templates/{id}/edit', [TemplateController::class, 'edit'])->name('templates.edit');
    Route::put('/templates/{id}', [TemplateController::class, 'update'])->name('templates.update');
    Route::get('/templates/{id}', [TemplateController::class, 'show'])->name('templates.show');
    Route::delete('/templates/{id}', [TemplateController::class, 'destroy'])->name('templates.destroy');
    Route::get('/templates/{id}/download', [TemplateController::class, 'download'])->name('templates.download');
    Route::get('/templates/{id}/content', [TemplateController::class, 'getContent'])->name('templates.content');
    
});

// Role-based routes
Route::middleware(['auth', 'role:Administrator'])->group(function () {
    Route::get('/admin-panel', function () {
        return view('admin.panel');
    })->name('admin.panel');
});

Route::middleware(['auth', 'role:Manager'])->group(function () {
    Route::get('/manager-panel', function () {
        return view('manager.panel');
    })->name('manager.panel');
});

Route::middleware(['auth', 'role:Manager Productie'])->group(function () {
    Route::get('/production-panel', function () {
        return view('production.panel');
    })->name('production.panel');
});

Route::middleware(['auth', 'role:Reprezentant Vanzari'])->group(function () {
    Route::get('/sales-panel', function () {
        return view('sales.panel');
    })->name('sales.panel');
});

Route::middleware(['auth', 'role:Manager Financiar'])->group(function () {
    Route::get('/finance-panel', function () {
        return view('finance.panel');
    })->name('finance.panel');
});

require __DIR__.'/auth.php';