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

include_once("frontend.php");
Route::get("admin/login","Admin\UserController@getLoginAdmin")->name("1lg.login");
Route::post("admin/login","Admin\UserController@postLoginAdmin")->name("1lg.post.login");
Route::get("admin/logout","Admin\UserController@logoutAdmin")->name("1lg.logout");
Route::get("admin/register","Admin\UserController@getRegisterAdmin")->name("1lg.register");
Route::post("admin/save-register","Admin\UserController@postRegisterAdmin")->name("1lg.post.register");
Route::get("admin/forgot-password","Admin\UserController@getFromRessetPas")->name("1lg.form-reset-pas");
Route::post("admin/forgot-password","Admin\UserController@postFromRessetPas")->name("1lg.post.form-reset-pas");
Route::get("admin/password/reset","Admin\UserController@resetPassword")->name('link-resetpas');
Route::post("admin/password/reset","Admin\UserController@saveResetPassword")->name("1lg.save-password");
Route::get("admin/error","Admin\AdminController@error")->name("admin.error");
Route::group(["prefix"=>"admin","middleware"=>"auth"],function (){
    Route::get('/','Admin\AdminController@index')->name("admin.home");
    Route::get('/a2','Admin\AdminController@indexa2')->name("admin.homea2");
    Route::get('/dashboard','Admin\AdminController@dashboard')->name("admin.dashboard");
    Route::group(["prefix"=>"categories"],function (){
        Route::get("/","Admin\CategorieController@index")->name("admin.categories.index");
        Route::post("/","Admin\CategorieController@store")->name("admin.categories.save");
        Route::get("/edit/{id}","Admin\CategorieController@edit")->name("admin.categories.edit");
        Route::put("/edit/{id}","Admin\CategorieController@update")->name("admin.categories.update");
        Route::get("/delete/{id}","Admin\CategorieController@destroy")->name("admin.categories.delete");
    });
    Route::group(["prefix"=>"brand"],function (){
       Route::get("/","Admin\BrandController@index")->name("admin.brand.index");
       Route::post("/","Admin\BrandController@save")->name("admin.brand.save");
       Route::get("/edit/{id}","Admin\BrandController@edit")->name("admin.brand.edit");
       Route::put("/edit/{id}","Admin\BrandController@update")->name("admin.brand.update");
       Route::get("/delete/{id}","Admin\BrandController@delete")->name("admin.brand.delete");
    });
    Route::group(["prefix"=>"area"],function (){
       Route::get("/","Admin\AreaController@index")->name("admin.area.index");
       Route::post("/","Admin\AreaController@save")->name("admin.area.save");
       Route::get("/edit/{area:slug}","Admin\AreaController@edit")->name("admin.area.edit");
       Route::put("/edit/{area:slug}","Admin\AreaController@update")->name("admin.area.update");
       Route::get("/delete/{area:slug}","Admin\AreaController@delete")->name("admin.area.delete");
       Route::post('/search','Admin\AreaController@search')->name("admin.area.search");
    });
    Route::group(["prefix"=>"city"],function (){
        Route::get("/","Admin\CityController@index")->name("admin.city.index");
        Route::post("/","Admin\CityController@save")->name("admin.city.save");
        Route::get("/edit/{city:slug}","Admin\CityController@edit")->name("admin.city.edit");
        Route::put("/edit/{city:slug}","Admin\CityController@update")->name("admin.city.update");
        Route::get("/delete/{city:slug}","Admin\CityController@delete")->name("admin.city.delete");
        Route::post("/search","Admin\CityController@search")->name("admin.city.search");
    });
    Route::group(["prefix"=>"arrtibutes"],function (){
        Route::get("/","Admin\ArrtbController@index")->name("admin.arrtb.index");
        Route::post("/","Admin\ArrtbController@save")->name("admin.arrtb.save");
        Route::get("/edit/{id}","Admin\ArrtbController@edit")->name("admin.arrtb.edit");
        Route::put("/edit/{id}","Admin\ArrtbController@update")->name("admin.arrtb.update");
        Route::get("/delete/{id}","Admin\ArrtbController@delete")->name("admin.arrtb.delete");
    });
    Route::group(["prefix"=>"arrtibute_values"],function (){
        Route::get("/","Admin\ArrtbVlController@index")->name("admin.arrtb-vl.index");
        Route::post("/","Admin\ArrtbVlController@save")->name("admin.arrtb-vl.save");
        Route::get("/edit/{id}","Admin\ArrtbVlController@edit")->name("admin.arrtb-vl.edit");
        Route::put("/edit/{id}","Admin\ArrtbVlController@update")->name("admin.arrtb-vl.update");
        Route::get("/delete/{id}","Admin\ArrtbVlController@delete")->name("admin.arrtb-vl.delete");
        Route::post("/search","Admin\ArrtbVlController@search")->name("admin.arrtb-vl.search");
    });
    Route::group(["prefix"=>"stores"],function (){
        Route::get("/","Admin\StoreController@index")->name("admin.store.index");
        Route::get("/add","Admin\StoreController@add")->name("admin.store.add");
        Route::post("/add","Admin\StoreController@save")->name("admin.store.save");
        Route::get("/edit/{store:slug}","Admin\StoreController@edit")->name("admin.store.edit");
        Route::put("/edit/{store:slug}","Admin\StoreController@update")->name("admin.store.update");
        Route::get("/delete/{store:slug}","Admin\StoreController@delete")->name("admin.store.delete");
        Route::post("/search","Admin\StoreController@search")->name("admin.store.search");
    });
    Route::group(["prefix"=>"products"],function (){
        Route::get("/","Admin\ProductController@index")->name("admin.product.index");
        Route::get("/add","Admin\ProductController@add")->name("admin.product.add");
        Route::post("/add","Admin\ProductController@save")->name("admin.product.save");
        Route::get("/check/{product:slug}","Admin\ProductController@show")->name("admin.product.show");
        Route::get("/edit/{product:slug}","Admin\ProductController@edit")->name("admin.product.edit");
        Route::post("/edit/{product:slug}","Admin\ProductController@update")->name("admin.product.update");
        Route::get("/delete/{product:slug}","Admin\ProductController@delete")->name("admin.product.delete");
        Route::get("/delete-img/{id}","Admin\ProductController@delete_img")->name("admin.product-img.delete");
        Route::post("/search","Admin\ProductController@search")->name("admin.product.search");
    });
    Route::group(["prefix"=>"ajax"],function (){
        Route::get("area/{Area:id}","Admin\StoreController@getArea")->name("admin.ajax.getarea");
        Route::get("order_detail/{order_detail}","Admin\OrdersController@getDetail")->name("admin.ajax.order_detail");
        Route::get("new_detail/{id}",'Admin\NewController@show')->name("admin.ajax.new_detail");
    });
    Route::group(["prefix"=>"account"],function (){
        Route::get("/","Admin\AccountController@index")->name("admin.account.admin");
        Route::get("/info/{id}","Admin\AccountController@infoAccountAdmin")->name("admin.infoAccount");
        Route::put("/info/{id}","Admin\AccountController@updateInfoAccountAdmin")->name("admin.update.infoAccount");
        Route::get("/delete/{id}","Admin\AccountController@deleteAdmin")->name("admin.account.delete.admin");
        Route::get("/grant-right/{id}","Admin\AccountController@grantRightAdmin")->name("admin.account.GrantRight.admin");
        Route::post("/grant-right/{id}","Admin\AccountController@postGrantRightAdmin")->name("admin.account.postGrantRight.admin");
        Route::get("/change-password/{id}","Admin\AccountController@changePasswordAdmin")->name("admin.changePassword");
        Route::post("/change-password/{id}","Admin\AccountController@postChangePasswordAdmin")->name("admin.postChangePassword");
        Route::post("/search","Admin\AccountController@searchUser")->name("admin.account.searchuser");
    });
    Route::group(["prefix"=>"orders"],function (){
       Route::get("/","Admin\OrdersController@order")->name("admin.orders");
        Route::get("/order_detail/{order_detail}","Admin\OrdersController@getDetail")->name("admin.order_detail");
        Route::post("/order_detail/{id}","Admin\OrdersController@updateStatus")->name("admin.update.status");
        Route::get("/delete_order/{id}","Admin\OrdersController@delete")->name("admin.order.delete");
        Route::get("/bill/{id}","Admin\OrdersController@bill")->name("admin.order.bill");
        Route::post("/search","Admin\OrdersController@searchStatus")->name("admin.order.search");
        Route::post("/search_city","Admin\OrdersController@searchCity")->name("admin.order.search.city");
    });
    Route::group(["prefix"=>"slides"],function (){
       Route::get("/","Admin\SlideController@index")->name("admin.slide");
       Route::get("/add","Admin\SlideController@add")->name("admin.slide.add");
       Route::post("/add","Admin\SlideController@store")->name("admin.slide.store");
       Route::get("/delete/{id}","Admin\SlideController@delete")->name("admin.slide.delete");
       Route::post("/search","Admin\SlideController@searchSlides")->name("admin.slide.search");
    });
    Route::group(['prefix'=>"accustomer"],function (){
       Route::get("/","Admin\AccountController@indexCustomer")->name("admin.accustomer");
       Route::get("/delete/{id}","Admin\AccountController@deleteCustomer")->name("admin.accustomer.delete");
       Route::post("/search","Admin\AccountController@searchCus")->name("admin.accustomer.search");
    });
    Route::group(['prefix'=>'roles'],function (){
        Route::get("/","Admin\RoleController@index")->name("admin.roles.index");
        Route::post("/","Admin\RoleController@create")->name("admin.roles.post.index");
        Route::get("/edit/{id}","Admin\RoleController@edit")->name("admin.roles.edit");
        Route::post("/edit/{id}","Admin\RoleController@update")->name("admin.roles.update");
        Route::get("/delete/{id}","Admin\RoleController@delete")->name("admin.roles.delete");
    });
    Route::group(['prefix'=>'news'],function (){
        Route::get('/','Admin\NewController@index')->name("admin.new.index");
        Route::get('/add','Admin\NewController@create')->name("admin.new.create");
        Route::post('/add','Admin\NewController@store')->name("admin.new.store");
        Route::get('/edit/{id}','Admin\NewController@edit')->name("admin.new.edit");
        Route::put('/edit/{id}','Admin\NewController@update')->name("admin.new.update");
        Route::get('/delete/{id}','Admin\NewController@delete')->name("admin.new.delete");
        Route::get('/show/{id}','Admin\NewController@show')->name("admin.new.show");
        Route::post('/search','Admin\NewController@searchNew')->name("admin.new.search");
    });
    Route::group(['prefix'=>'endows'],function (){
       Route::get('/','Admin\EndowController@index')->name("admin.endow.index");
       Route::post('/','Admin\EndowController@save')->name("admin.endow.save");
       Route::get('/edit/{id}','Admin\EndowController@edit')->name("admin.endow.edit");
       Route::post('/edit/{id}','Admin\EndowController@update')->name("admin.endow.postedit");
       Route::get('/delete/{id}','Admin\EndowController@delete')->name("admin.endow.delete");
    });
});
