<?php
Route::get("/","Frontend\FrontendController@index")->name("Home");
Route::get("/mail","Frontend\FrontendController@mail");
Route::get("/product-detail/{product:slug}","Frontend\FrontendController@proDetail")->name("home.productDetail");
Route::get('don-hang','Frontend\ShopingCartController@index')->name("shoppingcart.index");
Route::get('/product-cate/{cate:slug}','Frontend\FrontendController@proCate')->name("home.productCate");
Route::get('/product-brand/{brands:id}','Frontend\FrontendController@proBrand')->name("home.productBrand");
Route::get('/shop','Frontend\FrontendController@shopAll')->name("home.shopAll");
Route::post('/search_cate_pro','Frontend\FrontendController@searchCatePro')->name("home.search.cate.pro");
Route::get('/aboutus','Frontend\FrontendController@aboutUs')->name("home.about.us");
Route::get("/return-vnpay","Frontend\FrontendController@returnPay");
Route::group(['prefix'=>'blog'],function (){
    Route::get('/','Frontend\FrontendController@blogIndex')->name("home.blog.index");
    Route::get('/detail/{id}','Frontend\FrontendController@blogDetail')->name("home.blog.detail");
    Route::get('/search/{type_new}','Frontend\FrontendController@searchType')->name("home.blog.search.type");
    Route::post('/search-name','Frontend\FrontendController@searchName')->name("home.blog.search.name");
});
Route::group(['prefix'=>'store'],function (){
    Route::get('/','Frontend\FrontendController@storeIndex')->name("home.store.index");
    Route::post('/','Frontend\FrontendController@searchStore')->name("home.store.searchName");
});
Route::group(['prefix'=>'reviews'],function (){
//   Route::get("add/{product:slug}","Frontend\CartController@add");
    Route::post('add/{product:id}/{customer}','Frontend\ReviewController@add');
    Route::get('delete/{id}','Frontend\ReviewController@delete');
});
Route::group(['prefix'=>'cart'],function (){
//   Route::get("add/{product:slug}","Frontend\CartController@add");
    Route::get('add/{id}','Frontend\ShopingCartController@add');
    Route::get('delete/{id}','Frontend\ShopingCartController@delete');
    Route::get('update/{id}','Frontend\ShopingCartController@updateQty');
});
Route::group(['prefix'=>'checkout'],function (){
    Route::get('/','Frontend\FrontendController@formCheckOut')->name("get.checkout");
    Route::get('/pay','Frontend\FrontendController@formCheckOutPay')->name("get.checkout.pay");
    Route::post('/pay','Frontend\FrontendController@postCheckOutPay')->name("post.checkout.pay");
    Route::post('/','Frontend\FrontendController@postCheckOut')->name("post.checkout");
});
Route::group(['prefix'=>'customer'],function (){
    Route::get('/login','Frontend\CustomerController@index')->name("customer.login");
    Route::post('/login','Frontend\CustomerController@postLogin')->name("customer.post.login");
    Route::get('/register','Frontend\CustomerController@getRegister')->name("customer.get.register");
    Route::post('/register','Frontend\CustomerController@postRegister')->name("customer.post.register");
    Route::get('/logout','Frontend\CustomerController@logoutCustomer')->name("customer.logout");

    Route::get('/purchase-order/{customer}','Frontend\CustomerController@purchaseOrder')->name("customer.purchaseOrder");
    Route::get('/profile/{customer}','Frontend\CustomerController@getProfile')->name("customer.profile");
    Route::post('/profile/{customer}','Frontend\CustomerController@postProfile')->name("customer.post.profile");

    Route::get('/forgot-password','Frontend\CustomerController@getForgotPass')->name("customer.forgot-pass");
    Route::post('/forgot-password','Frontend\CustomerController@postForgotPass')->name("customer.post.forgot-pass");
    Route::get('/resset-password','Frontend\CustomerController@getRessetPass')->name("customer.link-resetpas");
    Route::post('/resset-password','Frontend\CustomerController@saveRessetPass')->name("customer.save.resetpas");

    Route::get('/add_favorite/{product:id}','Frontend\FavoriteController@add')->name("customer.add.favorite");
    Route::get('/favorite/{customer:id}','Frontend\FavoriteController@favoriteCust')->name("customer.favorite.index");
    Route::get('/delete/{id}','Frontend\FavoriteController@deleteFavorite')->name("customer.delete.favorite");
    Route::get('/huydon/{id}','Frontend\CustomerController@huyDon')->name("customer.huydon");
});
Route::group(["prefix"=>"ajaxfrontend"],function (){
    Route::get("area/{Area:id}","Frontend\CustomerController@getArea")->name("frontend.ajax.getarea");
    Route::get("/orderall/{customer:id}","Frontend\CustomerController@orderAll");
    Route::get("/awaiting/{customer:id}","Frontend\CustomerController@awaiting");
    Route::get("/confirmed/{customer:id}","Frontend\CustomerController@confirmed");
    Route::get("/beingtransported/{customer:id}","Frontend\CustomerController@beingTransported");
    Route::get("/complete/{customer:id}","Frontend\CustomerController@complete");
    Route::get("/cancel/{customer:id}","Frontend\CustomerController@cancel");
    Route::get("/search_pro/{type}","Frontend\FrontendController@searchPro");
});




