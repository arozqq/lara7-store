<?php

use Illuminate\Support\Facades\{Route, Auth};

Auth::routes(['verify' => true]);
Route::get('auth/{provider}', 'Auth\OAuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\OAuthController@handleProviderCallback');

// Role Super Admin & Admin
Route::middleware(['auth', 'verified', 'checkRole:super-admin,admin'])->group(function () {
    Route::prefix('/')->group(function () {
        Route::get('/dashboard', 'AdminController@dashboard');
        Route::get('/user', 'AdminController@user')->name('admin.app.user');
        Route::post('/user/store', 'AdminController@storeUser')->name('admin.app.store_user');
        Route::get('/user/{id}/edit', 'AdminController@editUser');
        Route::delete('/user/{id}/delete', 'AdminController@destroy');
        Route::delete('/selected-users', 'AdminController@deleteSelected')->name('admin.deleteSelected');
        Route::get('/categories', 'CategoriesController@index')->name('admin.app.category');
        Route::post('/categories/store', 'CategoriesController@storeCategory')->name('admin.app.store_category');
        Route::get('/categories/{id}/edit', 'CategoriesController@edit');
        Route::delete('/categories/{id}/delete', 'CategoriesController@destroy');
        Route::delete('/selected-categories', 'CategoriesController@deleteSelected');
    });

    Route::resource('product', 'ProductController');
    Route::resource('brand', 'BrandController');
    Route::post('brand/update', 'BrandController@update')->name('brand.update');
    Route::post('product/update', 'ProductController@update')->name('product.update');
    Route::delete('/selected-products', 'ProductController@deleteSelected');
    Route::delete('/selected-brands', 'BrandController@deleteSelected');
});


// Role Super Admin,Admin, User
Route::middleware(['auth', 'verified', 'checkRole:super-admin,admin,user'])->group(function () {
    Route::prefix('/account')->group(function () {
        Route::get('/profile', 'UserController@profile')->name('profile');
        Route::patch('/profile/{profile:id}/update', 'UserController@updateProfile');
        Route::get('/profile/changepassword', 'UserController@changePassword')->name('password.change');
        Route::patch('/profile/changepassword', 'UserController@updatePassword')->name('password.change');
    });
});


// Global
Route::get('brand/{brand:slug}', 'BrandController@show')->name('brand.show');
Route::get('categories/{category:slug}', 'CategoriesController@show')->name('categories.show');
Route::get('product/{product:slug}', 'ProductController@show')->name('product.show');
Route::get('/', 'HomeController@index');
