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

// Route::get('test',function(){
//   return App\Models\Category::with('childs')
//   ->where('parent_id',14)
//   ->get();
// });

Route::get('/', 'Frontend\PagesController@index')->name('index');

Route::get('/contact', 'Frontend\PagesController@contact')->name('contact');

// Route::get('/contactform', 'Frontend\EmailController@getContact')->name('contactform');
// Route::get('/contactform', 'Frontend\EmailController@getContact');
// Route::post('/contactmail', 'Frontend\EmailController@postContact')->name('contactmail');

/*
Pages Routes
*/
Route::get('/display', 'Frontend\PagesController@display')->name('display');
Route::get('/bundle', 'Frontend\PagesController@bundle')->name('bundle');
Route::get('/allcategory', 'Frontend\PagesController@allcategory')->name('allcategory');
Route::get('/offerlist', 'Frontend\PagesController@offerlist')->name('offerlist');
Route::get('/carousel', 'Frontend\PagesController@carousel')->name('carousel');
Route::get('/grocery', 'Frontend\PagesController@grocery')->name('grocery');

/*
Product Routes
All the Route for our frontent
*/
Route::group(['prefix' => '/products'], function(){

Route::get('/', 'Frontend\ProductsController@index')->name('products');
Route::get('/{slug}', 'Frontend\ProductsController@show')->name('products.show');
Route::get('/new/search', 'Frontend\PagesController@search')->name('search');

//Category Routes
Route::get('/categories', 'Frontend\CategoriesController@index')->name('categories.index');
Route::get('/category/{id}', 'Frontend\CategoriesController@show')->name('categories.show');
Route::get('/showcategory/{id}', 'Frontend\CategoriesController@showcategory')->name('categories.showcategory');
});

//User routes
Route::group(['prefix' => 'user'], function(){
Route::get('/token/{token}', 'Frontend\VerificationController@verify')->name('user.verification');
Route::get('/dashboard', 'Frontend\UsersController@dashboard')->name('user.dashboard');
Route::get('/profile', 'Frontend\UsersController@profile')->name('user.profile');
Route::post('/profile/update', 'Frontend\UsersController@profileUpdate')->name('user.profile.update');
});

//Carts routes
Route::group(['prefix' => 'carts'], function(){
Route::get('/', 'Frontend\CartsController@index')->name('carts');
Route::post('/store', 'Frontend\CartsController@store')->name('carts.store');
Route::post('/update/{id}', 'Frontend\CartsController@update')->name('carts.update');
Route::post('/delete/{id}', 'Frontend\CartsController@destroy')->name('carts.delete');
});

//Checkout routes
Route::group(['prefix' => 'checkout'], function(){
Route::get('/', 'Frontend\CheckoutsController@index')->name('checkouts');
Route::post('/store', 'Frontend\CheckoutsController@store')->name('checkouts.store');
});

// Admin Routes
Route::group(['prefix' => 'admin'], function(){
  Route::get('/', 'Backend\PagesController@index')->name('admin.index');



  // Admin Login Routes
  Route::get('/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login/submit', 'Auth\Admin\LoginController@login')->name('admin.login.submit');
  Route::post('/logout/submit', 'Auth\Admin\LoginController@logout')->name('admin.logout');

  //Password Email Send
  Route::get('/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/resetPost', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

  //Password Reset
  Route::get('/password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
  Route::post('/password/reset', 'Auth\Admin\ResetPasswordController@reset')->name('admin.password.reset.post');

//Product routes
Route::group(['prefix' => '/products'], function(){

  Route::get('/', 'Backend\ProductsController@index')->name('admin.products');
  Route::get('/create', 'Backend\ProductsController@create')->name('admin.product.create');
  Route::get('/edit/{id}', 'Backend\ProductsController@edit')->name('admin.product.edit');

  Route::post('/store', 'Backend\ProductsController@store')->name('admin.product.store');

  Route::post('/product/edit/{id}', 'Backend\ProductsController@update')->name('admin.product.update');
  Route::post('/product/delete/{id}', 'Backend\ProductsController@delete')->name('admin.product.delete');
});

//Orders routes
Route::group(['prefix' => '/orders'], function(){

  Route::get('/', 'Backend\ordersController@index')->name('admin.orders');
  Route::get('/view/{id}', 'Backend\OrdersController@show')->name('admin.order.show');
  Route::post('/delete/{id}', 'Backend\OrdersController@delete')->name('admin.order.delete');

  Route::post('/completed/{id}', 'Backend\OrdersController@completed')->name('admin.order.completed');
  Route::post('/paid/{id}', 'Backend\OrdersController@paid')->name('admin.order.paid');
  Route::post('/charge-update/{id}', 'Backend\OrdersController@chargeUpdate')->name('admin.order.charge');

  Route::get('/invoice/{id}', 'Backend\OrdersController@generateInvoice')->name('admin.order.invoice');
});

//Category routes
Route::group(['prefix' => '/categories'], function(){

  Route::get('/', 'Backend\categoriesController@index')->name('admin.categories');
  Route::get('/create', 'Backend\categoriesController@create')->name('admin.category.create');
  Route::get('/edit/{id}', 'Backend\categoriesController@edit')->name('admin.category.edit');

  Route::post('/store', 'Backend\categoriesController@store')->name('admin.category.store');

  Route::post('/category/edit/{id}', 'Backend\categoriesController@update')->name('admin.category.update');
  Route::post('/category/delete/{id}', 'Backend\categoriesController@delete')->name('admin.category.delete');
});

//Brand routes
Route::group(['prefix' => '/brands'], function(){

  Route::get('/', 'Backend\brandsController@index')->name('admin.brands');
  Route::get('/create', 'Backend\brandsController@create')->name('admin.brand.create');
  Route::get('/edit/{id}', 'Backend\brandsController@edit')->name('admin.brand.edit');

  Route::post('/store', 'Backend\brandsController@store')->name('admin.brand.store');

  Route::post('/brand/edit/{id}', 'Backend\brandsController@update')->name('admin.brand.update');
  Route::post('/brand/delete/{id}', 'Backend\brandsController@delete')->name('admin.brand.delete');
  });

//Division routes
Route::group(['prefix' => '/divisions'], function(){

  Route::get('/', 'Backend\divisionsController@index')->name('admin.divisions');
  Route::get('/create', 'Backend\divisionsController@create')->name('admin.division.create');
  Route::get('/edit/{id}', 'Backend\divisionsController@edit')->name('admin.division.edit');

  Route::post('/store', 'Backend\divisionsController@store')->name('admin.division.store');

  Route::post('/division/edit/{id}', 'Backend\divisionsController@update')->name('admin.division.update');
  Route::post('/division/delete/{id}', 'Backend\divisionsController@delete')->name('admin.division.delete');
  });

//Distric routes
Route::group(['prefix' => '/districts'], function(){

  Route::get('/', 'Backend\districtsController@index')->name('admin.districts');
  Route::get('/create', 'Backend\districtsController@create')->name('admin.district.create');
  Route::get('/edit/{id}', 'Backend\districtsController@edit')->name('admin.district.edit');

  Route::post('/store', 'Backend\districtsController@store')->name('admin.district.store');

  Route::post('/district/edit/{id}', 'Backend\districtsController@update')->name('admin.district.update');
  Route::post('/district/delete/{id}', 'Backend\districtsController@delete')->name('admin.district.delete');
  });

//Slider routes
Route::group(['prefix' => '/sliders'], function(){
  Route::get('/', 'Backend\SlidersController@index')->name('admin.sliders');
  Route::post('/store', 'Backend\SlidersController@store')->name('admin.slider.store');
  Route::post('/slider/edit/{id}', 'Backend\SlidersController@update')->name('admin.slider.update');
  Route::post('/slider/delete/{id}', 'Backend\SlidersController@delete')->name('admin.slider.delete');
  });

//Slider routes
Route::group(['prefix' => '/banners'], function(){
  Route::get('/', 'Backend\BannersController@index')->name('admin.banners');
  Route::post('/store', 'Backend\BannersController@store')->name('admin.banner.store');
  Route::post('/banner/edit/{id}', 'Backend\BannersController@update')->name('admin.banner.update');
  Route::post('/banner/delete/{id}', 'Backend\BannersController@delete')->name('admin.banner.delete');
  });

//Addbanner1 routes
Route::group(['prefix' => '/addbanner1s'], function(){
  Route::get('/', 'Backend\Addbanner1sController@index')->name('admin.addbanner1s');
  Route::post('/store', 'Backend\Addbanner1sController@store')->name('admin.addbanner1.store');
  Route::post('/addbanner1/edit/{id}', 'Backend\Addbanner1sController@update')->name('admin.addbanner1.update');
  Route::post('/addbanner1/delete/{id}', 'Backend\Addbanner1sController@delete')->name('admin.addbanner1.delete');
  });

//Offer routes
Route::group(['prefix' => '/offers'], function(){
  Route::get('/', 'Backend\OffersController@index')->name('admin.offers');
  Route::post('/store', 'Backend\OffersController@store')->name('admin.offer.store');
  Route::post('/offer/edit/{id}', 'Backend\OffersController@update')->name('admin.offer.update');
  Route::post('/offer/delete/{id}', 'Backend\OffersController@delete')->name('admin.offer.delete');
  });

//Bundle routes
Route::group(['prefix' => '/bundles'], function(){

  Route::get('/', 'Backend\BundlesController@index')->name('admin.bundles');
  Route::post('/store', 'Backend\BundlesController@store')->name('admin.bundle.store');
  Route::post('/bundle/edit/{id}', 'Backend\BundlesController@update')->name('admin.bundle.update');
  Route::post('/bundle/delete/{id}', 'Backend\BundlesController@delete')->name('admin.bundle.delete');
  });
  //Carousels routes
  Route::group(['prefix' => '/carousels'], function(){

    Route::get('/', 'Backend\CarouselsController@index')->name('admin.carousels');
    Route::post('/store', 'Backend\CarouselsController@store')->name('admin.carousel.store');
    Route::post('/carousel/edit/{id}', 'Backend\CarouselsController@update')->name('admin.carousel.update');
    Route::post('/carousel/delete/{id}', 'Backend\CarouselsController@delete')->name('admin.carousel.delete');
    });

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//API Routes
Route::get('get-districts/{id}', function($id){
  return json_encode(App\Models\District::where('division_id', $id)->get());
});
