<?php

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
Route::get('/send-coupon/{coupon_name}/{coupon_code}/{coupon_function}/{coupon_number}',[
    'as' => 'MailController.send_coupon',
    'uses' =>'MailController@send_coupon'
]);
Route::get('/send-gmail',[
    'as' => 'MailController.send_gmail',
    'uses' =>'MailController@send_gmail'
]);
Route::get('/forget-password',[
    'as' => 'MailController.forget_password',
    'uses' =>'MailController@forget_password'
]);
Route::post('/send-forget-password',[
    'as' => 'MailController.send_forget_password',
    'uses' =>'MailController@send_forget_password'
]);
Route::get('/update-new-pass',[
    'as' => 'MailController.update_new_pass',
    'uses' =>'MailController@update_new_pass'
]);
Route::post('/update-new-password',[
    'as' => 'MailController.update_new_password',
    'uses' =>'MailController@update_new_password'
]);

Route::get('/', 'HomeController@index')->name('index');
Route::get('/login-customer',[
    'as' => 'HomeController.login',
    'uses' =>'HomeController@login'
]);
Route::get('/sign-up-customer',[
    'as' => 'HomeController.sign_up',
    'uses' =>'HomeController@sign_up'
]);
Route::get('/sign-up-customer',[
    'as' => 'HomeController.sign_up',
    'uses' =>'HomeController@sign_up'
]);
Route::post('/add-customers',[
    'as' => 'HomeController.addCustomer',
    'uses' =>'HomeController@addCustomer'
]);
Route::get('/filter-price',[
    'as' => 'HomeController.filter_price',
    'uses' =>'HomeController@filter_price'
]);
Route::get('/update-password',[
    'as' => 'HomeController.updatePassword',
    'uses' =>'HomeController@updatePassword'
]);
Route::post('/update-password',[
    'as' => 'HomeController.postupdatePassword',
    'uses' =>'HomeController@postupdatePassword'
]);
Route::post('/search',[
    'as' => 'HomeController.search',
    'uses' =>'HomeController@search'
]);
Route::post('/autocomplete',[
    'as' => 'HomeController.autocomplete',
    'uses' =>'HomeController@autocomplete'
]);
Route::post('/login-customer',[
    'as' => 'HomeController.postlogin',
    'uses' =>'HomeController@postlogin'
]);
Route::get('/new-product',[
    'as' => 'HomeController.newProduct',
    'uses' =>'HomeController@newproduct'
]);
Route::get('/old-product',[
    'as' => 'HomeController.oldProduct',
    'uses' =>'HomeController@oldproduct'
]);
Route::get('/price-increase',[
    'as' => 'HomeController.priceIncrease',
    'uses' =>'HomeController@priceincrease'
]);
Route::get('/reduced-price',[
    'as' => 'HomeController.reducedPrice',
    'uses' =>'HomeController@reducedprice'
]);

Route::get('/category/{slug}',[
        'as' => 'categoryFrontend.index',
        'uses' =>'CategoryProductController@showCategoryHome'
    ]);
Route::get('/category-filter-price/{slug}',[
    'as' => 'categoryFrontend.filter_price',
    'uses' =>'CategoryProductController@filter_price'
]);
Route::get('/new-product/{slug}',[
    'as' => 'categoryFrontend.newProduct',
    'uses' =>'CategoryProductController@newproduct'
]);
Route::get('/old-product/{slug}',[
    'as' => 'categoryFrontend.oldProduct',
    'uses' =>'CategoryProductController@oldproduct'
]);
Route::get('/price-increase/{slug}',[
    'as' => 'categoryFrontend.priceIncrease',
    'uses' =>'CategoryProductController@priceincrease'
]);
Route::get('/reduced-price/{slug}',[
    'as' => 'categoryFrontend.reducedPrice',
    'uses' =>'CategoryProductController@reducedprice'
]);
//chi tiết đơn hàng
Route::get('/detailsProduct/{id}',[
    'as' => 'detailsProduct.index',
    'uses' =>'DetailsProductController@index'
]);
Route::post('/load-comment',[
    'as' => 'detailsProduct.load_comment',
    'uses' =>'DetailsProductController@load_comment'
]);
Route::post('/send-comment',[
    'as' => 'detailsProduct.send_comment',
    'uses' =>'DetailsProductController@send_comment'
]);

Route::post('/reply-comment',[
    'as' => 'detailsProduct.reply_comment',
    'uses' =>'DetailsProductController@reply_comment'
]);
//add_to_cart
Route::get('/cart/{id}',[
    'as' => 'cart.addToCart',
    'uses' =>'CartController@addToCart'
]);
Route::get('/show-cart',[
    'as' => 'cart.showCart',
    'uses' =>'CartController@showCart'
]);
Route::get('/update-cart',[
    'as' => 'cart.updateCart',
    'uses' =>'CartController@updateCart'
]);
Route::get('/delete-cart',[
    'as' => 'cart.deleteCart',
    'uses' =>'CartController@deleteCart'
]);
Route::get('/delete-headercart',[
    'as' => 'cart.deleteHeaderCart',
    'uses' =>'CartController@deleteHeaderCart'
]);

//checkout
Route::get('/login-checkout',[
    'as' => 'Checkout.logincheckout',
    'uses' =>'CheckoutController@logincheckout'
]);
Route::post('/login-checkout',[
    'as' => 'Checkout.postlogincheckout',
    'uses' =>'CheckoutController@postlogincheckout'
]);
Route::get('/logout-checkout',[
    'as' => 'Checkout.postlogoutcheckout',
    'uses' =>'CheckoutController@postlogoutcheckout'
]);
Route::get('/sign-up',[
    'as' => 'Checkout.signup',
    'uses' =>'CheckoutController@signup'
]);
Route::post('/add-customer',[
    'as' => 'Checkout.addCustomer',
    'uses' =>'CheckoutController@addCustomer'
]);
Route::get('/checkout',[
    'as' => 'Checkout.checkout',
    'uses' =>'CheckoutController@checkout'
]);
Route::post('/save-checkout-customer',[
    'as' => 'Checkout.savecheckoutcustomer',
    'uses' =>'CheckoutController@savecheckoutcustomer'
]);
Route::get('/payment',[
    'as' => 'payment.payment',
    'uses' =>'CheckoutController@payment'
]);

Route::post('/oder',[
    'as' => 'Checkout.oder',
    'uses' =>'CheckoutController@oder'
]);
Route::post('/oder-paypal',[
    'as' => 'Checkout.oder_paypal',
    'uses' =>'CheckoutController@oder_paypal'
]);
//giảm giá
Route::post('/checkcoupon',[
    'as' => 'coupon.checkcoupon',
    'uses' =>'couponController@checkcoupon'
]);
Route::get('/unset-coupon',[
    'as' => 'coupon.unsetcoupon',
    'uses' =>'couponController@unsetcoupon'
]);

//admin

// delivery
Route::post('/select-delivery',[
    'as' => 'delivery.selectdelivery',
    'uses' =>'deliveryController@selectdelivery',
]);
Route::post('/insert-delivery',[
    'as' => 'delivery.insert_delivery',
    'uses' =>'deliveryController@insert_delivery',
    'middleware' => 'can:phi_ship_add'
]);
Route::post('/list-delivery',[
    'as' => 'delivery.list_delivery',
    'uses' =>'deliveryController@list_delivery',
]);
Route::post('/update-delivery',[
    'as' => 'delivery.update_delivery',
    'uses' =>'deliveryController@update_delivery',
    'middleware' => 'can:phi_ship_edit'
]);
//chi tiết đơn hàng
Route::get('/detail-oder',[
    'as' => 'oders.detail_oder',
    'uses' =>'adminOderController@detail_oder',
]);
Route::get('/detail-oder-view/{id}',[
    'as' => 'oders.detail_oder_view',
    'uses' =>'adminOderController@detail_oder_view',
]);
Route::get('/detail-oder-delete/{id}',[
    'as' => 'oders.detail_oder_delete',
    'uses' =>'adminOderController@detail_oder_delete',
]);
//xac nhan don hang
Route::post('/update-quantity-oder',[
    'as' => 'oders.update_quantity_oder',
    'uses' =>'adminOderController@update_quantity_oder',
]);
Route::get('/admin','AdminController@loginAdmin');
Route::post('/admin','AdminController@postLoginAdmin');
Route::get('/logout','AdminController@logout');
Route::get('/adminIndex','AdminController@admin');


Route::prefix('admin')->group(function () {
    Route::get('/comment',[
        'as' => 'detailsProduct.comment',
        'uses' =>'DetailsProductController@comment',
        'middleware' => 'can:comment_list'

    ]);
    Route::prefix('slider')->group(function () {

        Route::get('/',[
            'as' => 'slider.index',
            'uses' =>'SliderController@index',
            'middleware' => 'can:slider_list'

        ]);

        Route::get('/create',[
            'as' => 'slider.create',
            'uses' =>'SliderController@create',
            'middleware' => 'can:slider_add'

        ]);
        Route::post('/store',[
            'as' => 'slider.store',
            'uses' =>'SliderController@store'
        ]);
        Route::get('/edit/{id}',[
            'as' => 'slider.edit',
            'uses' =>'SliderController@edit',
            'middleware' => 'can:slider_edit'

        ]);

        Route::post('/update/{id}',[
            'as' => 'slider.update',
            'uses' =>'SliderController@update'
        ]);

        Route::get('/delete/{id}',[
            'as' => 'slider.delete',
            'uses' =>'SliderController@delete',
            'middleware' => 'can:slider_delete'

        ]);



    });


    Route::prefix('oders')->group(function () {
        Route::get('/manage-oder',[
            'as' => 'oders.index',
            'uses' =>'adminOderController@index',
            'middleware' => 'can:oder_list'
        ]);
        Route::get('/view-oder/{id}',[
            'as' => 'oders.view',
            'uses' =>'adminOderController@view',
        ]);
        Route::get('/print-oder/{checkcode}',[
            'as' => 'oders.printOder',
            'uses' =>'adminOderController@printoder',
        ]);




        Route::post('/update/{id}',[
            'as' => 'categories.update',
            'uses' =>'CategoryController@update'
        ]);

        Route::get('/delete/{id}',[
            'as' => 'categories.delete',
            'uses' =>'CategoryController@delete',
        ]);
//


    });
    //coupon
    Route::prefix('coupon')->group(function () {
        Route::get('/',[
            'as' => 'coupon.index',
            'uses' =>'couponController@index',
            'middleware' => 'can:coupon_list'

        ]);
        Route::get('/create',[
            'as' => 'coupon.create',
            'uses' =>'couponController@create',
            'middleware' => 'can:coupon_add'

        ]);
        Route::post('/store',[
            'as' => 'coupon.store',
            'uses' =>'couponController@store'

        ]);


        Route::get('/delete/{id}',[
            'as' => 'coupon.delete',
            'uses' =>'couponController@delete',
            'middleware' => 'can:coupon_delete'

        ]);



    });
    //coupon
    Route::prefix('delivery')->group(function () {
        Route::get('/',[
            'as' => 'delivery.index',
            'uses' =>'deliveryController@index',
            'middleware' => 'can:phi_ship_list'

        ]);

    });

    Route::prefix('Category')->group(function () {
        Route::get('/',[
            'as' => 'categories.index',
            'uses' =>'CategoryController@index',
            'middleware' => 'can:category_list'
        ]);
        Route::get('/create',[
            'as' => 'categories.create',
            'uses' =>'CategoryController@create',
            'middleware' => 'can:category_add'

        ]);
        Route::post('/store',[
            'as' => 'categories.store',
            'uses' =>'CategoryController@store',


        ]);

        Route::get('/edit/{id}',[
            'as' => 'categories.edit',
            'uses' =>'CategoryController@edit',
            'middleware' => 'can:category_edit'

        ]);

        Route::post('/update/{id}',[
            'as' => 'categories.update',
            'uses' =>'CategoryController@update',

        ]);

        Route::get('/delete/{id}',[
            'as' => 'categories.delete',
            'uses' =>'CategoryController@delete',
            'middleware' => 'can:category_delete'

        ]);
//


    });
//    Category
    Route::prefix('product')->group(function () {
        Route::get('/',[
            'as' => 'products.index',
            'uses' =>'productController@index',
            'middleware' => 'can:product_list'


        ]);

        Route::get('/create',[
            'as' => 'products.create',
            'uses' =>'productController@create',
            'middleware' => 'can:product_add'

        ]);

        Route::post('/store',[
            'as' => 'products.store',
            'uses' =>'ProductController@store'
        ]);

        Route::get('/edit/{id}',[
            'as' => 'products.edit',
            'uses' =>'ProductController@edit',
            'middleware' => 'can:product_edit'

        ]);

        Route::post('/update/{id}',[
            'as' => 'products.update',
            'uses' =>'ProductController@update'
        ]);

        Route::get('/delete/{id}',[
            'as' => 'products.delete',
            'uses' =>'ProductController@delete',
            'middleware' => 'can:product_delete'

        ]);




    });

//product
//user
    Route::prefix('users')->group(function () {
        Route::get('/',[
            'as' => 'users.index',
            'uses' =>'UsersController@index',
            'middleware' => 'can:user_list'

        ]);
        Route::get('/create',[
            'as' => 'users.create',
            'uses' =>'UsersController@create',
            'middleware' => 'can:user_add'

        ]);
        Route::post('/store',[
            'as' => 'users.store',
            'uses' =>'UsersController@store'
        ]);
        Route::get('/edit/{id}',[
            'as' => 'users.edit',
            'uses' =>'UsersController@edit',
            'middleware' => 'can:user_edit'

        ]);
        Route::post('/update/{id}',[
            'as' => 'users.update',
            'uses' =>'UsersController@update'
        ]);
        Route::get('/delete/{id}',[
            'as' => 'users.delete',
            'uses' =>'UsersController@delete',
            'middleware' => 'can:user_delete'

        ]);


    });
//roles

    Route::prefix('roles')->group(function () {
        Route::get('/',[
            'as' => 'roles.index',
            'uses' =>'RolesController@index',
            'middleware' => 'can:role_list'

        ]);
        Route::get('/create',[
            'as' => 'roles.create',
            'uses' =>'RolesController@create',
            'middleware' => 'can:role_add'

        ]);
        Route::post('/store',[
            'as' => 'roles.store',
            'uses' =>'RolesController@store'
        ]);
        Route::get('/edit/{id}',[
            'as' => 'roles.edit',
            'uses' =>'RolesController@edit',
            'middleware' => 'can:role_edit'

        ]);
        Route::post('/update/{id}',[
            'as' => 'roles.update',
            'uses' =>'RolesController@update'
        ]);
        Route::get('/delete/{id}',[
            'as' => 'roles.delete',
            'uses' =>'RolesController@delete',
            'middleware' => 'can:role_delete'

        ]);

    });
// permission
    Route::prefix('permissions')->group(function () {
        Route::get('/create',[
            'as' => 'permissions.create',
            'uses' =>'PermissionsController@create',
            'middleware' => 'can:permission_list'


        ]);
        Route::post('/store',[
            'as' => 'permissions.store',
            'uses' =>'PermissionsController@store',
            'middleware' => 'can:permission_add'
        ]);

    });


});
