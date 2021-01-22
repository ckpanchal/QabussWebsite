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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Front End
Route::get('/switch-lang', 'Front\FrontController@switchLang')->name('switch-lang');

Route::get('/', 'Front\FrontController@index');
Route::get('/index', 'Front\FrontController@index')->name('index');
Route::post('/searching', 'Front\FrontController@searching')->name('searching');
Route::get('/single/{id}', 'Front\FrontController@single')->name('single');
Route::get('/listing', 'Front\FrontController@listing')->name('listing');
Route::post('/listing', 'Front\FrontController@listing')->name('listing');
Route::get('/listing/{id}', 'Front\FrontController@listings')->name('listings');

Route::get('/event', 'Front\FrontController@event')->name('event');
Route::get('/eventdetails/{id}', 'Front\FrontController@eventdetails')->name('eventdetails');

Route::get('/offer', 'Front\FrontController@offer')->name('offer');
Route::get('/offerdetails/{id}', 'Front\FrontController@offerdetails')->name('offerdetails');
Route::get('/offerview/{id}', 'Front\FrontController@offerview');

// Front End

// Route::get('dashboard/index', 'Admin\MainController@index')->name('dashboard.index');
// Route::get('dashboard/', 'Admin\MainController@index')->name('dashboard.index');

    Route::group(['prefix' => 'dashboard', 'namespace' => 'Admin','middleware'=>'auth'], function () {
    
        Route::get('/', 'MainController@index')->name('dashboard.index');    
        Route::get('/index', 'MainController@index')->name('dashboard.index');    
        
        Route::middleware(['create_role', 'edit_role', 'delete_role', 'permission_role'])->group(function () {
            Route::get('/all', 'RoleController@index')->name('role.index');
        });

        Route::prefix('roles')->group(function () {
            Route::get('/all', 'RoleController@index')->middleware('permission:create_role')->name('role.index');
            Route::get('/all', 'RoleController@index')->middleware('permission:edit_role')->name('role.index');
            Route::get('/all', 'RoleController@index')->middleware('permission:delete_role')->name('role.index');
            Route::get('/all', 'RoleController@index')->middleware('permission:permission_role')->name('role.index');
            Route::get('/create', 'RoleController@create')->middleware('permission:create_role')->name('role.create');
            Route::post('/create', 'RoleController@store')->middleware('permission:create_role')->name('role.store');
            Route::get('/edit/{id}', 'RoleController@edit')->middleware('permission:edit_role')->name('role.edit');
            Route::post('/update/{id}', 'RoleController@update')->middleware('permission:edit_role')->name('role.update');
            Route::delete('/delete/{id}', 'RoleController@destroy')->middleware('permission:delete_role')->name('role.destroy');
            Route::get('/role/{id}', 'RoleController@rolepermission')->middleware('permission:permission_role')->name('role.rolepermission');
            Route::post('/role/{id}', 'RoleController@rolepermissionupdate')->middleware('permission:permission_role')->name('permission.update');
        });
        
        Route::prefix('users')->group(function () {
            Route::get('/all', 'UserController@index')->middleware('permission:create_user')->name('user.index');
            Route::get('/all', 'UserController@index')->middleware('permission:edit_user')->name('user.index');
            Route::get('/all', 'UserController@index')->middleware('permission:delete_user')->name('user.index');
            Route::get('/all', 'UserController@index')->middleware('permission:view_user')->name('user.index');
            Route::get('/create', 'UserController@create')->middleware('permission:create_user')->name('user.create');
            Route::post('/create', 'UserController@store')->middleware('permission:create_user')->name('user.store');
            Route::get('/{id}', 'UserController@show')->middleware('permission:view_user')->name('user.show');
            Route::get('/edit/{id}', 'UserController@edit')->middleware('permission:edit_user')->name('user.edit');
            Route::patch('/update/{id}', 'UserController@update')->middleware('permission:edit_user')->name('user.update');
            Route::delete('/delete/{id}', 'UserController@destroy')->middleware('permission:delete_user')->name('user.destroy');

            Route::get('/businessview/{id}', 'UserController@businessview')->middleware('permission:view_user')->name('user.businessview');
            Route::get('/businesssingle/{id}', 'UserController@businesssingle')->middleware('permission:view_user')->name('user.businesssingle');

            Route::get('/eventview/{id}', 'UserController@eventview')->middleware('permission:view_user')->name('user.eventview');
            Route::get('/eventsingle/{id}', 'UserController@eventsingle')->middleware('permission:view_user')->name('user.eventsingle');

            Route::get('/offerview/{id}', 'UserController@offerview')->middleware('permission:view_user')->name('user.offerview');
            Route::get('/offersingle/{id}', 'UserController@offersingle')->middleware('permission:view_user')->name('user.offersingle');

            Route::get('/favouriteview/{id}', 'UserController@favouriteview')->middleware('permission:view_user')->name('user.favouriteview');

            Route::get('/recommendview/{id}', 'UserController@recommendview')->middleware('permission:view_user')->name('user.recommendview');

           
        });

        Route::prefix('business')->group(function () {
            Route::group(['middleware' => ['permission:edit_business|create_business|view_business|delete_business']], function () {
                Route::get('/all', 'BusinessController@index')->name('business.index');
            });
            // Route::get('/all', 'BusinessController@index')->middleware('permission:create_business')->name('business.index');
            // Route::get('/all', 'BusinessController@index')->middleware('permission:edit_business')->name('business.index');
            // Route::get('/all', 'BusinessController@index')->middleware('permission:delete_business')->name('business.index');
            // Route::get('/all', 'BusinessController@index')->middleware('permission:view_business')->name('business.index');
            Route::get('/create', 'BusinessController@create')->middleware('permission:create_business')->name('business.create');
            Route::post('/create', 'BusinessController@store')->middleware('permission:create_business')->name('business.store');
            Route::get('/{id}', 'BusinessController@show')->middleware('permission:view_business')->name('business.show');
            Route::get('/edit/{id}', 'BusinessController@edit')->middleware('permission:edit_business')->name('business.edit');
            Route::patch('/update/{id}', 'BusinessController@update')->middleware('permission:edit_business')->name('business.update');
            Route::delete('/delete/{id}', 'BusinessController@destroy')->middleware('permission:delete_business')->name('business.destroy');
        });

        Route::prefix('offer')->group(function () {
            // Route::get('/all', 'OfferController@index')->middleware(permission['edit_offer', 'create_offer', 'view_offer', 'delete_offer'])->name('offer.index');
            Route::group(['middleware' => ['permission:edit_offer|create_offer|view_offer|delete_offer']], function () {
                Route::get('/all', 'OfferController@index')->name('offer.index');
            });
            // Route::middleware(['edit_offer'])->group(function () {
            //     Route::get('/all', 'OfferController@index')->name('offer.index');
            // });
            // Route::get('/all', 'OfferController@index')->middleware('permission:create_offer')->name('offer.index');
            // Route::get('/all', 'OfferController@index')->middleware('permission:edit_offer')->name('offer.index');
            // Route::get('/all', 'OfferController@index')->middleware('permission:view_offer')->name('offer.index');
            // Route::get('/all', 'OfferController@index')->middleware('permission:delete_offer')->name('offer.index');
            Route::get('/create', 'OfferController@create')->middleware('permission:create_offer')->name('offer.create');
            Route::post('/create', 'OfferController@store')->middleware('permission:create_offer')->name('offer.store');
            Route::get('/{id}', 'OfferController@show')->middleware('permission:view_offer')->name('offer.show');
            Route::get('/edit/{id}', 'OfferController@edit')->middleware('permission:edit_offer')->name('offer.edit');
            Route::patch('/update/{id}', 'OfferController@update')->middleware('permission:edit_offer')->name('offer.update');
            Route::delete('/delete/{id}', 'OfferController@destroy')->middleware('permission:delete_offer')->name('offer.destroy');
        });

        Route::prefix('event')->group(function () {
            Route::get('/all', 'EventController@index')->middleware('permission:create_event')->name('event.index');
            Route::get('/all', 'EventController@index')->middleware('permission:edit_event')->name('event.index');
            Route::get('/all', 'EventController@index')->middleware('permission:view_event')->name('event.index');
            Route::get('/all', 'EventController@index')->middleware('permission:delete_event')->name('event.index');
            Route::get('/create', 'EventController@create')->middleware('permission:create_event')->name('event.create');
            Route::post('/create', 'EventController@store')->middleware('permission:create_event')->name('event.store');
            Route::get('/{id}', 'EventController@show')->middleware('permission:view_event')->name('event.show');
            Route::get('/edit/{id}', 'EventController@edit')->middleware('permission:edit_event')->name('event.edit');
            Route::patch('/update/{id}', 'EventController@update')->middleware('permission:edit_event')->name('event.update');
            Route::delete('/delete/{id}', 'EventController@destroy')->middleware('permission:delete_event')->name('event.destroy');
        });

        Route::prefix('news')->group(function () {
            Route::get('/all', 'NewsController@index')->middleware('permission:create_news')->name('news.index');
            Route::get('/all', 'NewsController@index')->middleware('permission:edit_news')->name('news.index');
            Route::get('/all', 'NewsController@index')->middleware('permission:view_news')->name('news.index');
            Route::get('/all', 'NewsController@index')->middleware('permission:delete_news')->name('news.index');
            Route::get('/create', 'NewsController@create')->middleware('permission:create_news')->name('news.create');
            Route::post('/create', 'NewsController@store')->middleware('permission:create_news')->name('news.store');
            Route::get('/{id}', 'NewsController@show')->middleware('permission:view_news')->name('news.show');
            Route::get('/edit/{id}', 'NewsController@edit')->middleware('permission:edit_news')->name('news.edit');
            Route::patch('/update/{id}', 'NewsController@update')->middleware('permission:edit_news')->name('news.update');
            Route::delete('/delete/{id}', 'NewsController@destroy')->middleware('permission:delete_news')->name('news.destroy');
        });

        Route::prefix('newscategory')->group(function () {
            Route::get('/all', 'NewscategoryController@index')->middleware('permission:create_news_category')->name('newscategory.index');
            Route::get('/all', 'NewscategoryController@index')->middleware('permission:edit_news_category')->name('newscategory.index');
            Route::get('/all', 'NewscategoryController@index')->middleware('permission:delete_news_category')->name('newscategory.index');
            Route::get('/create', 'NewscategoryController@create')->middleware('permission:create_news_category')->name('newscategory.create');
            Route::post('/create', 'NewscategoryController@store')->middleware('permission:create_news_category')->name('newscategory.store');
            Route::get('/edit/{id}', 'NewscategoryController@edit')->middleware('permission:edit_news_category')->name('newscategory.edit');
            Route::patch('/update/{id}', 'NewscategoryController@update')->middleware('permission:edit_news_category')->name('newscategory.update');
            Route::delete('/delete/{id}', 'NewscategoryController@destroy')->middleware('permission:delete_news_category')->name('newscategory.destroy');
        });

        Route::prefix('author')->group(function () {
            Route::get('/all', 'NewsAuthorController@index')->middleware('permission:create_news_author')->name('author.index');
            Route::get('/all', 'NewsAuthorController@index')->middleware('permission:edit_news_author')->name('author.index');
            Route::get('/all', 'NewsAuthorController@index')->middleware('permission:delete_news_author')->name('author.index');
            Route::get('/create', 'NewsAuthorController@create')->middleware('permission:create_news_author')->name('author.create');
            Route::post('/create', 'NewsAuthorController@store')->middleware('permission:create_news_author')->name('author.store');
            Route::get('/edit/{id}', 'NewsAuthorController@edit')->middleware('permission:edit_news_author')->name('author.edit');
            Route::patch('/update/{id}', 'NewsAuthorController@update')->middleware('permission:edit_news_author')->name('author.update');
            Route::delete('/delete/{id}', 'NewsAuthorController@destroy')->middleware('permission:delete_news_author')->name('author.destroy');
        });

        Route::prefix('category')->group(function () {
            Route::get('/all', 'CategoryController@index')->middleware('permission:view_category')->name('category.index');
            Route::get('/all', 'CategoryController@index')->middleware('permission:create_category')->name('category.index');
            Route::get('/all', 'CategoryController@index')->middleware('permission:edit_category')->name('category.index');
            Route::get('/all', 'CategoryController@index')->middleware('permission:delete_category')->name('category.index');
            Route::get('/create', 'CategoryController@create')->middleware('permission:create_category')->name('category.create');
            Route::post('/create', 'CategoryController@store')->middleware('permission:create_category')->name('category.store');
            Route::get('/{id}', 'CategoryController@show')->middleware('permission:view_category')->name('category.show');
            Route::get('/edit/{id}', 'CategoryController@edit')->middleware('permission:edit_category')->name('category.edit');
            Route::patch('/update/{id}', 'CategoryController@update')->middleware('permission:edit_category')->name('category.update');
            Route::delete('/delete/{id}', 'CategoryController@destroy')->middleware('permission:delete_category')->name('category.destroy');
        });

        Route::prefix('categorytag')->group(function () {
            Route::get('/all', 'CategorytagController@index')->middleware('permission:create_category_tag')->name('categorytag.index');
            Route::get('/all', 'CategorytagController@index')->middleware('permission:edit_category_tag')->name('categorytag.index');
            Route::get('/all', 'CategorytagController@index')->middleware('permission:delete_category_tag')->name('categorytag.index');
            Route::get('/create', 'CategorytagController@create')->middleware('permission:create_category_tag')->name('categorytag.create');
            Route::post('/create', 'CategorytagController@store')->middleware('permission:create_category_tag')->name('categorytag.store');
            Route::get('/{id}', 'CategorytagController@show')->middleware('permission:create_category')->name('categorytag.show');
            Route::get('/edit/{id}', 'CategorytagController@edit')->middleware('permission:edit_category_tag')->name('categorytag.edit');
            Route::patch('/update/{id}', 'CategorytagController@update')->middleware('permission:edit_category_tag')->name('categorytag.update');
            Route::delete('/delete/{id}', 'CategorytagController@destroy')->middleware('permission:delete_category_tag')->name('categorytag.destroy');
        });

        Route::prefix('profile')->group(function () {
            Route::get('/', 'ProfileController@index')->name('profile.index');
            Route::get('/{id}', 'ProfileController@show')->name('profile.show');
            Route::patch('/update/{id}', 'ProfileController@update')->name('profile.update');
            Route::delete('/delete/{id}', 'ProfileController@destroy')->name('profile.destroy');


            Route::get('/businessview/{id}', 'ProfileController@businessview')->name('profile.businessview');
            Route::get('/businesssingle/{id}', 'ProfileController@businesssingle')->name('profile.businesssingle');
            Route::get('/businessedit/{id}', 'ProfileController@businessedit')->name('profile.businessedit');
            Route::patch('/businessupdate/{id}', 'ProfileController@businessupdate')->name('profile.businessupdate');
            Route::delete('/businessdelete/{id}', 'ProfileController@businessdelete')->name('profile.businessdelete');
            
            Route::get('/eventview/{id}', 'ProfileController@eventview')->name('profile.eventview');
            Route::get('/eventsingle/{id}', 'ProfileController@eventsingle')->name('profile.eventsingle');
            Route::get('/eventedit/{id}', 'ProfileController@eventedit')->name('profile.eventedit');
            Route::patch('/eventupdate/{id}', 'ProfileController@eventupdate')->name('profile.eventupdate');
            Route::delete('/eventdelete/{id}', 'ProfileController@eventdelete')->name('profile.eventdelete');
            
            Route::get('/offerview/{id}', 'ProfileController@offerview')->name('profile.offerview');
            Route::get('/offersingle/{id}', 'ProfileController@offersingle')->name('profile.offersingle');
            Route::get('/offeredit/{id}', 'ProfileController@offeredit')->name('profile.offeredit');
            Route::patch('/offerupdate/{id}', 'ProfileController@offerupdate')->name('profile.offerupdate');
            Route::delete('/offerdelete/{id}', 'ProfileController@offerdelete')->name('profile.offerdelete');

            Route::get('/favouriteview/{id}', 'ProfileController@favouriteview')->name('profile.favouriteview');

            Route::get('/recommendview/{id}', 'ProfileController@recommendview')->name('profile.recommendview');

         

        });

        Route::prefix('qatar')->group(function () {
            Route::get('/all', 'QatarController@index')->middleware('permission:view_qatar')->name('qatar.index');
            Route::get('/all', 'QatarController@index')->middleware('permission:create_qatar')->name('qatar.index');
            Route::get('/all', 'QatarController@index')->middleware('permission:edit_qatar')->name('qatar.index');
            Route::get('/all', 'QatarController@index')->middleware('permission:delete_qatar')->name('qatar.index');
            Route::get('/create', 'QatarController@create')->middleware('permission:create_qatar')->name('qatar.create');
            Route::post('/create', 'QatarController@store')->middleware('permission:create_qatar')->name('qatar.store');
            Route::get('/{id}', 'QatarController@show')->middleware('permission:view_qatar')->name('qatar.show');
            Route::get('/edit/{id}', 'QatarController@edit')->middleware('permission:edit_qatar')->name('qatar.edit');
            Route::patch('/update/{id}', 'QatarController@update')->middleware('permission:edit_qatar')->name('qatar.update');
            Route::delete('/delete/{id}', 'QatarController@destroy')->middleware('permission:delete_qatar')->name('qatar.destroy');
        });

        Route::prefix('page')->group(function () {
            Route::get('/all', 'PageController@index')->middleware('permission:view_page')->name('page.index');
            Route::get('/all', 'PageController@index')->middleware('permission:edit_page')->name('page.index');
            // Route::get('/create', 'PageController@create')->middleware('permission:create_category')->name('page.create');
            // Route::post('/create', 'PageController@store')->middleware('permission:create_category')->name('page.store');
            Route::get('/{id}', 'PageController@show')->middleware('permission:view_page')->name('page.show');
            Route::get('/edit/{id}', 'PageController@edit')->middleware('permission:edit_page')->name('page.edit');
            Route::patch('/update/{id}', 'PageController@update')->middleware('permission:edit_page')->name('page.update');
            // Route::delete('/delete/{id}', 'PageController@destroy')->middleware('permission:create_category')->name('page.destroy');
        });

        Route::prefix('location')->group(function () {
            Route::get('/all', 'LocationController@index')->middleware('permission:create_location')->name('location.index');
            Route::get('/all', 'LocationController@index')->middleware('permission:edit_location')->name('location.index');
            Route::get('/all', 'LocationController@index')->middleware('permission:create_category')->name('location.index');
            Route::get('/create', 'LocationController@create')->middleware('permission:create_location')->name('location.create');
            Route::post('/create', 'LocationController@store')->middleware('permission:create_location')->name('location.store');
            // Route::get('/{id}', 'LocationController@show')->middleware('permission:create_category')->name('location.show');
            Route::get('/edit/{id}', 'LocationController@edit')->middleware('permission:edit_location')->name('location.edit');
            Route::patch('/update/{id}', 'LocationController@update')->middleware('permission:edit_location')->name('location.update');
            Route::delete('/delete/{id}', 'LocationController@destroy')->middleware('permission:delete_location')->name('location.destroy');
        });

        Route::prefix('slider')->group(function () {
            Route::get('/all', 'SliderController@index')->middleware('permission:create_slider')->name('slider.index');
            Route::get('/all', 'SliderController@index')->middleware('permission:edit_slider')->name('slider.index');
            Route::get('/all', 'SliderController@index')->middleware('permission:delete_slider')->name('slider.index');
            Route::get('/create', 'SliderController@create')->middleware('permission:create_slider')->name('slider.create');
            Route::post('/create', 'SliderController@store')->middleware('permission:create_slider')->name('slider.store');
            // Route::get('/{id}', 'SliderController@show')->middleware('permission:create_category')->name('slider.show');
            Route::get('/edit/{id}', 'SliderController@edit')->middleware('permission:edit_slider')->name('slider.edit');
            Route::patch('/update/{id}', 'SliderController@update')->middleware('permission:edit_slider')->name('slider.update');
            Route::delete('/delete/{id}', 'SliderController@destroy')->middleware('permission:delete_slider')->name('slider.destroy');
        });
    
    });

    // Route::resource('/role', 'Admin\RoleController');
