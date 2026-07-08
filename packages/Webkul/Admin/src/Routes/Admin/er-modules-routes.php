<?php

use Illuminate\Support\Facades\Route;
use Webkul\Admin\Http\Controllers\ActivityLog\ActivityLogController;
use Webkul\Admin\Http\Controllers\Customer\CustomerController;
use Webkul\Admin\Http\Controllers\FollowUp\FollowUpController;
use Webkul\Admin\Http\Controllers\SalesReport\SalesReportController;

/* ── Customers ── */
Route::controller(CustomerController::class)->prefix('customers')->group(function () {
    Route::get('',          'index'  )->name('admin.customers.index');
    Route::get('create',    'create' )->name('admin.customers.create');
    Route::post('create',   'store'  )->name('admin.customers.store');
    Route::get('edit/{id}', 'edit'   )->name('admin.customers.edit');
    Route::put('edit/{id}', 'update' )->name('admin.customers.update');
    Route::delete('{id}',   'destroy')->name('admin.customers.delete');
});

/* ── Follow-Ups ── */
Route::controller(FollowUpController::class)->prefix('follow-ups')->group(function () {
    Route::get('',          'index'  )->name('admin.follow-ups.index');
    Route::get('create',    'create' )->name('admin.follow-ups.create');
    Route::post('create',   'store'  )->name('admin.follow-ups.store');
    Route::get('edit/{id}', 'edit'   )->name('admin.follow-ups.edit');
    Route::put('edit/{id}', 'update' )->name('admin.follow-ups.update');
    Route::delete('{id}',   'destroy')->name('admin.follow-ups.delete');
});

/* ── Sales Reports ── */
Route::controller(SalesReportController::class)->prefix('sales-reports')->group(function () {
    Route::get('',           'index'   )->name('admin.sales-reports.index');
    Route::get('create',     'create'  )->name('admin.sales-reports.create');
    Route::post('create',    'store'   )->name('admin.sales-reports.store');
    Route::post('generate',  'generate')->name('admin.sales-reports.generate');
    Route::delete('{id}',    'destroy' )->name('admin.sales-reports.delete');
});

/* ── Activity Log ── */
Route::controller(ActivityLogController::class)->prefix('activity-log')->group(function () {
    Route::get('',        'index'   )->name('admin.activity-log.index');
    Route::delete('{id}', 'destroy' )->name('admin.activity-log.delete');
    Route::post('clear',  'clearAll')->name('admin.activity-log.clear');
});
