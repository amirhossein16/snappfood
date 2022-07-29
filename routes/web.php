<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', \App\Http\Livewire\IndexPage::class)->name('/');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::group(['middleware' => ['role:superadmin']], function () {
        Route::get('Admin', \App\Http\Livewire\Admin\AdminDashboard::class)->name('Admin');

        Route::get('restaurantCategory', \App\Http\Livewire\Admin\Categories::class)->name('restaurantCategory');

        Route::get('foodCategory', \App\Http\Livewire\Admin\FoodCategory::class)->name('foodCategory');

        Route::get('roles', \App\Http\Livewire\Admin\RoleController::class)->name('roles');

        Route::get('DiscountPanel', \App\Http\Livewire\Admin\DiscountPanel::class)->name('DiscountPanel');

        Route::get('FoodParty', \App\Http\Livewire\Admin\FoodPartyPanel::class)->name('FoodParty');

        Route::get('FrontBanner', \App\Http\Livewire\Admin\Banner::class)->name('FrontBanner');

        Route::get('AllUsers', \App\Http\Livewire\Admin\AllUsers::class)->name('AllUsers');

        Route::get('CommentManagment', \App\Http\Livewire\Admin\CommentManagment::class)->name('CommentManagment');
        Route::get('AllComments', \App\Http\Livewire\Admin\AllComment::class)->name('AllComments');
        Route::get('DeletedComment', \App\Http\Livewire\Admin\DeleteComments::class)->name('DeletedComment');
    });

    Route::group(['middleware' => ['role:seller']], function () {
        Route::get('/dashboard', \App\Http\Livewire\Seller\Dashboard::class)->name('dashboard')->middleware(\App\Http\Middleware\profile_completed::class);

        Route::get('RestaurantPanel', \App\Http\Livewire\Seller\RestaurantPanel::class)->name('RestaurantPanel');
        Route::get('FoodPanel', \App\Http\Livewire\Seller\FoodPanel::class)->name('FoodPanel')->middleware(\App\Http\Middleware\profile_completed::class);
        Route::get('OrdersPanel', \App\Http\Livewire\Seller\OredersPanelController::class)->name('OrdersPanel')->middleware(\App\Http\Middleware\profile_completed::class);
        Route::get('CommentsPanel', \App\Http\Livewire\Seller\CommentsPanelController::class)->name('CommentsPanel')->middleware(\App\Http\Middleware\profile_completed::class);
        Route::get('ArchiveOrder', \App\Http\Livewire\Seller\ArchiveOrder::class)->name('ArchiveOrder')->middleware(\App\Http\Middleware\profile_completed::class);
    });
});
