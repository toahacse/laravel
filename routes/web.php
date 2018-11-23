<?php

Route::get('/',[
    'uses' =>'NewShopController@index',
    'as' =>'/'
]);

Route::get('/category-product/{id}',[
    'uses' =>'NewShopController@categoryProduct',
    'as' =>'category-product'
]);

Route::get('/product-details/{id}',[
    'uses' =>'NewShopController@productDetails',
    'as' =>'product-details'
]);
Route::post('/addToCart',[
    'uses' =>'NewShopController@addCart',
    'as' =>'add-to-cart'
]);

Route::get('/show/cart',[
    'uses' =>'NewShopController@show_cart',
    'as' =>'show-cart'
]);
Route::get('/cart/delete/{id}',[
    'uses' =>'NewShopController@deleteCart',
    'as' =>'delete-cart-itme'
]);
Route::post('/cart/update',[
    'uses' =>'NewShopController@updateCart',
    'as' =>'update-cart'
]);
Route::get('/checkout',[
    'uses' =>'NewShopController@checkout',
    'as' =>'checkout'
]);
Route::post('/customer/registration',[
    'uses' =>'NewShopController@customerSingUp',
    'as' =>'customer-sing-up'
]);
Route::post('/customer/login',[
    'uses' =>'NewShopController@customerLogin',
    'as' =>'customer-login'
]);
Route::post('/checkout/customer/login',[
    'uses' =>'NewShopController@customerLogout',
    'as' =>'customer-logout'
]);
Route::get('/checkout/new-customer/login',[
    'uses' =>'NewShopController@newCustomerLogin',
    'as' =>'new-customer-login'
]);
Route::get('/checkout/shipping',[
    'uses' =>'NewShopController@shippingForm',
    'as' =>'checkout-shipping'
]);
Route::post('/shipping/save',[
    'uses' =>'NewShopController@saveShippingInfo',
    'as' =>'new-shipping'
]);
Route::get('/checkout/payment',[
    'uses' =>'NewShopController@paymentForm',
    'as' =>'checkout-payment'
]);
Route::post('/checkout/order',[
    'uses' =>'NewShopController@newOrder',
    'as' =>'new-order'
]);
Route::get('/complete/order',[
    'uses' =>'NewShopController@completeOrder',
    'as' =>'complete-order'
]);

Auth::routes();
//Home page

Route::get('/home', [
    'uses' => 'adminController@index',
    'as' =>'home'
    ]);

//Category Route

Route::get('/add-category', [
    'uses' => 'adminController@addCategory',
    'as' =>'add_category'
    ]);

Route::get('/Manage-category', [
    'uses' => 'adminController@manageCategory',
    'as' =>'manage_category'
]);

Route::post('/add-category/save', [
    'uses' => 'adminController@addCategorySave',
    'as' =>'new-category'
]);

Route::get('/Manage-category/unpublished/{id}', [
    'uses' => 'adminController@unpublishedCategory',
    'as' =>'unpublished-category'
]);


Route::get('/Manage-category/published/{id}', [
    'uses' => 'adminController@publishedCategory',
    'as' =>'published-category'
]);


Route::get('/Manage-category/edit/{id}', [
    'uses' => 'adminController@editCategory',
    'as' =>'edit-category'
]);

Route::post('/Manage-category/update', [
    'uses' => 'adminController@updateCategory',
    'as' =>'update-category'
]);

Route::get('/Manage-category/delete/{id}', [
    'uses' => 'adminController@deleteCategory',
    'as' =>'delete-category'
]);

//Brand Route

Route::get('/add-Brand', [
    'uses' => 'adminController@addBrand',
    'as' =>'add_Brand'
]);

Route::get('/manage-Brand', [
    'uses' => 'adminController@manageBrand',
    'as' =>'manage_Brand'
]);

Route::post('/add-Brand/save', [
    'uses' => 'adminController@addBrandSave',
    'as' =>'new-brand'
]);

Route::get('/manage-Brand/unpublished/{id}', [
    'uses' => 'adminController@unpublishedBrand',
    'as' =>'unpublished-brand'
]);

Route::get('/manage-Brand/published/{id}', [
    'uses' => 'adminController@publishedBrand',
    'as' =>'published-brand'
]);

Route::get('/manage-Brand/edit/{id}', [
    'uses' => 'adminController@editBrand',
    'as' =>'edit-brand'
]);

Route::post('/manage-Brand/update', [
    'uses' => 'adminController@updateBrand',
    'as' =>'update-brand'
]);

Route::get('/manage-Brand/delete/{id}', [
    'uses' => 'adminController@deleteBrand',
    'as' =>'delete-brand'
]);

//Product Route

Route::get('/add-Product', [
    'uses' => 'adminController@addProduct',
    'as' =>'add_Product'
]);

Route::get('/manage-Product', [
    'uses' => 'adminController@manageProduct',
    'as' =>'manage_Product'
]);

Route::post('/add-product/save', [
    'uses' => 'adminController@addProductSave',
    'as' =>'new-product'
]);

Route::get('/manage-Product/unpublished/{id}', [
    'uses' => 'adminController@unpublishedproduct',
    'as' =>'unpublished-product'
]);

Route::get('/manage-Product/published/{id}', [
    'uses' => 'adminController@publishedProduct',
    'as' =>'published-product'
]);

Route::get('/manage-Product/edit/{id}', [
    'uses' => 'adminController@editProduct',
    'as' =>'edit-product'
]);

Route::post('/manage-Product/update', [
    'uses' => 'adminController@updateProduct',
    'as' =>'update-product'
]);

Route::get('/manage-Product/delete/{id}', [
    'uses' => 'adminController@deleteProduct',
    'as' =>'delete-product'
]);
Route::get('order/manage-order', [
    'uses' => 'adminController@manageOrder',
    'as' =>'manage_order'
]);
Route::get('order/view-order-detail/{id}', [
    'uses' => 'adminController@viewOrderDetails',
    'as' =>'view-order-detail'
]);
Route::get('order/view-order-invoice/{id}', [
    'uses' => 'adminController@viewOrderInvoice',
    'as' =>'view-order-invoice'
]);
