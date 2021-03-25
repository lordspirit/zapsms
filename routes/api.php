<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Product Locations
    Route::apiResource('product-locations', 'ProductLocationApiController');

    // Product Brands
    Route::apiResource('product-brands', 'ProductBrandApiController');

    // Product Suppliers
    Route::apiResource('product-suppliers', 'ProductSupplierApiController');

    // Quantity Units
    Route::apiResource('quantity-units', 'QuantityUnitsApiController');

    // Product Categories
    Route::apiResource('product-categories', 'ProductCategoryApiController');

    // Product Tags
    Route::apiResource('product-tags', 'ProductTagApiController');

    // Products
    Route::post('products/media', 'ProductApiController@storeMedia')->name('products.storeMedia');
    Route::apiResource('products', 'ProductApiController');

    // Task Statuses
    Route::apiResource('task-statuses', 'TaskStatusApiController');

    // Task Tags
    Route::apiResource('task-tags', 'TaskTagApiController');

    // Tasks
    Route::post('tasks/media', 'TaskApiController@storeMedia')->name('tasks.storeMedia');
    Route::apiResource('tasks', 'TaskApiController');

    // Sub Categories
    Route::apiResource('sub-categories', 'SubCategoriesApiController');

    // Locations
    Route::apiResource('locations', 'LocationApiController');

    // Sublocations
    Route::apiResource('sublocations', 'SublocationApiController');

    // Suppliers
    Route::apiResource('suppliers', 'SuppliersApiController');

    // Brands
    Route::apiResource('brands', 'BrandApiController');

    // Units
    Route::apiResource('units', 'UnitsApiController');
});
