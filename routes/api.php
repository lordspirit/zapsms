<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Product Categories
    Route::apiResource('product-categories', 'ProductCategoryApiController');

    // Product Tags
    Route::apiResource('product-tags', 'ProductTagApiController');

    // Products
    Route::apiResource('products', 'ProductApiController');

    // Product Locations
    Route::apiResource('product-locations', 'ProductLocationApiController');

    // Product Brands
    Route::apiResource('product-brands', 'ProductBrandApiController');

    // Product Suppliers
    Route::apiResource('product-suppliers', 'ProductSupplierApiController');

    // Quantity Units
    Route::apiResource('quantity-units', 'QuantityUnitsApiController');
});
