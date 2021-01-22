<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/qab_recommend', 'Api\BusinessController@getApprecommend');
Route::get('/qab_select_category', 'Api\CategoryController@SelectCategory');
Route::post('/qab_home_area', 'Api\MainController@getAppHome');

Route::post('/qab_home_search', 'Api\MainController@getSearchDetails');


// Category
Route::get('/qab_categories', 'Api\CategoryController@getAppCategory');
Route::get('/qab_maincategories', 'Api\CategoryController@getAppMainCategory');
Route::get('/qab_categories/{keyword}', 'Api\CategoryController@searchByKeyword');
Route::get('/qab_categories_business/{id}/lat/{lat}/lng/{lng}', 'Api\CategoryController@getbusinessdistance');
Route::get('/qab_categories_business/{id}/asc', 'Api\CategoryController@CategoryBusinessListAsc');
Route::get('/qab_categories_business/{id}/area/{area}', 'Api\CategoryController@CategoryBusinessListArea');
Route::post('/qab_categories_business_post/{id}', 'Api\CategoryController@CategoryBusinessListAreaPost');
Route::get('/qab_categories_business/{id}/search/{business}', 'Api\CategoryController@CategoryBusinessListSearch');
Route::get('/location', 'Api\LocationController@location');
Route::get('/facility', 'Api\LocationController@facility');
// Category


Route::post('/tester/{id}', 'Api\CategoryController@listCategory');

// Business
Route::post('/qab_business/{registerId}', 'Api\BusinessController@getBusiness');
// Business


// Offers

Route::get('/qab_offers_category', 'Api\OffersController@getCategoryOffers');
Route::get('/qab_offers', 'Api\MainController@getOffers');
Route::post('/qab_offer_sort', 'Api\MainController@getTagOffers');
// Offers

// Events
Route::get('/qab_event', 'Api\MainController@getEvents');
Route::get('/qab_event_single/{id}', 'Api\MainController@getEvent');
Route::post('/qab_event_search', 'Api\MainController@getEventsSearch');
// Events

// News

Route::get('/qab_news', 'Api\NewsController@getAppNews');
Route::post('/qab_news_sort', 'Api\NewsController@getAppNewsSort');
Route::get('/qab_news_single/{RegisterId}', 'Api\NewsController@getAppSingleNews');

// News
Route::get('/qab_news_categories', 'Api\NewsController@getAppNewsCategories');
Route::get('/qab_news/{RegisterId}', 'Api\NewsController@getAppSingleNews');
Route::get('/qab_news_categories/{RegisterId}', 'Api\NewsController@getAppselectCategories');
// News

// Pages
Route::get('/qab_page/{RegisterId}', 'Api\MainController@getAppPage');
Route::get('/qab_qatar', 'Api\MainController@getAppQatar');
// Pages

Route::post('/qab_qatar_save/{RegisterId}', 'Api\MainController@getAppSaveBusiness');
Route::delete('/qab_qatar_save_delete/{RegisterId}/business/{Favorite}', 'Api\MainController@getAppSaveDeleteBusiness');

// User
Route::post('/user', 'Api\UserController@RegisterUser');
Route::post('/login', 'Api\UserController@LoginUser');
Route::post('/forgotpass', 'Api\UserController@forgotpass');
Route::post('/updateprofile/{registerid}', 'Api\UserController@UpdateUserProfile');
Route::post('/passwordupdate/{registerid}', 'Api\UserController@UserPasswordUpdate');
Route::get('/qab_user_dashboard/{registerid}', 'Api\UserController@UserDashboard');

Route::post('/post_qabuss_recommend/{userId}', 'Api\MainController@Recommendbusiness');

Route::post('/post_qabuss_Addbusiness/{userId}', 'Api\BusinessController@Addbusiness');
Route::post('/post_qabuss_editbusiness/{userId}', 'Api\BusinessController@Editbusiness');
Route::delete('/post_qabuss_Deletebusiness/{userId}/BusinessId/{CompanyId}', 'Api\BusinessController@Deletebusiness');

// User
Route::get('/qab_main_categories', 'Api\CategoryController@getMainCategories');
Route::get('/qab_sub_categories', 'Api\CategoryController@getSubCategories');
Route::get('/qab_events_upcoming_today', 'Api\EventController@getTodayAndUpcomingEvents');
Route::get('/qab_categories_business', 'Api\CategoryController@getCategoryBusinessList');
Route::get('/qab_app_notifications', 'Api\NotificationController@getAppNotifications');
Route::post('/token', 'Api\MainController@addToken');


Route::get('/hit/{type}/{id}', 'Api\MainController@increaseHit');
