<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('500', function()
{
    echo "4";
});

Route::group(['middleware' => 'web'], function () {
    ////////////////////////////////////////////////////////

    Route::get('news/list', ['as' => 'news', 'uses' => 'NewsController@index']);
    Route::get('comments/list', ['as' => 'comments', 'uses' => 'CommentsController@index']);
    Route::get('media/list', ['as' => 'Media', 'uses' => 'MediaController@index']);
    Route::get('news/add', ['as' => 'news', 'uses' => 'NewsController@addNews']);
    Route::get('polls/list', ['as' => 'Polls', 'uses' => 'PollsController@index']);
    Route::get('polls/add', ['as' => 'create poll', 'uses' => 'PollsController@addPolls']);
    Route::post('polls/add', ['as' => 'news', 'uses' => 'PollsController@submitPolls']);
    Route::post('news/search/', ['as' => 'news', 'uses' => 'NewsController@searchNews']);
    Route::post('news/add/{user_type?}', ['as' => 'news', 'uses' => 'NewsController@submitNews']);
    Route::get('news/view/{id}', ['as' => 'news', 'uses' => 'NewsController@viewNews']);
    Route::get('news/front/details/{id}', ['as' => 'news', 'uses' => 'NewsController@viewFrontNews']);
    Route::get('media/view/{id}', ['as' => 'news', 'uses' => 'MediaController@viewMedia']);
    Route::get('news/edit/{id}', ['as' => 'news', 'uses' => 'NewsController@editNews']);
    Route::get('polls/edit/{id}', ['as' => 'edit poll', 'uses' => 'PollsController@editPolls']);
    Route::post('cat/edit/{id}', ['as' => 'news', 'uses' => 'CategoriesController@editCatSubmit']);
    Route::get('categories/edit/{id}', ['as' => 'news', 'uses' => 'CategoriesController@editCat']);
    Route::get('category/searchSubCategory/{parent_category}', ['as' => 'news', 'uses' => 'CategoriesController@seachSubCategory']);
    Route::get('media/edit/{id}', ['as' => 'news', 'uses' => 'MediaController@editMedia']);
    Route::post('news/edit/{id}', ['as' => 'news', 'uses' => 'NewsController@editNewsSubmit']);
    Route::post('polls/edit/{id}', ['as' => 'edit poll', 'uses' => 'PollsController@editPollSubmit']);
    Route::post('media/edit/{id}', ['as' => 'news', 'uses' => 'MediaController@editMediaSubmit']);
    Route::get('news/remove/{id}', ['as' => 'news', 'uses' => 'NewsController@removeNews']);
    Route::get('polls/remove/{id}', ['as' => 'news', 'uses' => 'PollsController@removePoll']);
    Route::get('cat/remove/{id}', ['as' => 'news', 'uses' => 'CategoriesController@removeCat']);
    Route::get('comments/remove/{id}/{flag}', ['as' => 'news', 'uses' => 'CommentsController@removeComment']);
    Route::get('media/remove/{id}', ['as' => 'news', 'uses' => 'MediaController@removeMedia']);
    Route::get('categories/list', ['as' => 'Categories', 'uses' => 'CategoriesController@index']);
    Route::get('categories/add', ['as' => 'add category', 'uses' => 'CategoriesController@addCategories']);
    Route::post('categories/add', ['as' => 'add category', 'uses' => 'CategoriesController@submitCategories']);
    Route::get('media/add', ['as' => 'news', 'uses' => 'MediaController@addMedia']);
    Route::post('media/add', ['as' => 'news', 'uses' => 'MediaController@submitMedia']);
    Route::get('ads', ['as' => 'Ads', 'uses' => 'AdsController@index']);
    Route::get('ads/page/{page?}', ['as' => 'Ads', 'uses' => 'AdsController@adDetails']);
    Route::get('ads/changeBanner/{banner_id}/{image_id}', ['as' => 'Ads', 'uses' => 'AdsController@changeBanner']);
    Route::get('ads/undoBanner/{banner_id}/{image_id}', ['as' => 'Ads', 'uses' => 'AdsController@undoBanner']);

    Route::get('archives/{month?}/{day?}/{year?}', ['as' => 'news', 'uses' => 'NewsController@showArchives']);
    Route::get('author/{id}', ['as' => 'news', 'uses' => 'NewsController@showAuthorPublication']);

	Route::post('uploadBanner', ['as' => 'Ads', 'uses' => 'AdsController@uploadBanner']);
    Route::post('vote', ['as' => 'Ads', 'uses' => 'PollsController@giveVote']);
    Route::get('votes/result', ['as' => 'Ads', 'uses' => 'PollsController@showVotesResult']);
    Route::get('setLanguage/{language}/{page?}', ['as' => 'Ads', 'uses' => 'HomeController@setLanguage']);
    
	Route::get('/redirect', 'SocialAuthController@redirect');
	Route::get('/callback', 'SocialAuthController@callback');

	Route::get('category/national', ['as' => 'national', 'uses' => 'CategoriesController@getNationalPage']);
    Route::get('category/international', ['as' => 'international', 'uses' => 'CategoriesController@getInternationalPage']);
    Route::get('category/economics', ['as' => 'economics', 'uses' => 'CategoriesController@getEconomicsPage']);
    Route::get('category/entertainment', ['as' => 'entertainment', 'uses' => 'CategoriesController@getEntertainmentPage']);
    Route::get('category/education', ['as' => 'education', 'uses' => 'CategoriesController@getEducationPage']);
    Route::get('category/science', ['as' => 'science', 'uses' => 'CategoriesController@getSciencePage']);
    Route::get('category/crime', ['as' => 'crime', 'uses' => 'CategoriesController@getCrimePage']);
    Route::get('category/health', ['as' => 'health', 'uses' => 'CategoriesController@getHealthPage']);
    Route::get('category/travel', ['as' => 'travel', 'uses' => 'CategoriesController@getTravelPage']);
    Route::get('category/kids', ['as' => 'kids', 'uses' => 'CategoriesController@getKidsPage']);
    Route::get('category/legal-aids', ['as' => 'legal-aids', 'uses' => 'CategoriesController@getLegalPage']);
    Route::get('category/lifestyle', ['as' => 'lifestyle', 'uses' => 'CategoriesController@getLifestylesPage']);
    Route::get('category/politics', ['as' => 'politics', 'uses' => 'CategoriesController@getPoliticsPage']);
    Route::get('category/sceince', ['as' => 'sceince', 'uses' => 'CategoriesController@getSciencePage']);
    Route::get('category/women', ['as' => 'women', 'uses' => 'CategoriesController@getWomenPage']);
    Route::get('category/vedios', ['as' => 'vedios', 'uses' => 'CategoriesController@getVediosPage']);
    Route::get('category/probash', ['as' => 'probash', 'uses' => 'CategoriesController@getProbashPage']);
    Route::get('category/nreegoshthi', ['as' => 'nreegoshthi', 'uses' => 'CategoriesController@getNreegoshthiPage']);
    Route::get('category/history', ['as' => 'news', 'uses' => 'CategoriesController@getHistoryPage']);
    Route::get('category/uthan-boithok', ['as' => 'uthan-boithok', 'uses' => 'CategoriesController@getUthanBoithokPage']);

    Route::get('category/islamic', ['as' => 'news', 'uses' => 'CategoriesController@getIslamicPage']);
    Route::post('search', ['as' => 'news', 'uses' => 'NewsController@getSearchResult']);

    
	Route::get('test', ['as' => 'news', 'uses' => 'NewsController@test']);

	Route::get('news/details/{id}', ['as' => 'news', 'uses' => 'NewsController@viewNews']);

    ////////////////////////////////////////////////////////


    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@viewHomePage']);
    Route::get('login', ['as' => 'login', 'uses' => 'UserController@viewLoginForm']);
    Route::get('registration', ['as' => 'login', 'uses' => 'UserController@viewRegistrationForm']);
    Route::get('forget-password', ['as' => 'forget-password', 'uses' => 'UserController@forgetPassword']);
    Route::get('logout', ['as' => 'logout',  'middleware' => 'auth', 'uses' => 'UserController@logOut']);
    Route::get('password/change/{id?}', ['as' => 'password change',  'middleware' => 'auth', 'uses' => 'UserController@changePassword']);
    Route::get('recover_password/{verification_code}', ['as' => 'password change','uses' => 'UserController@loadRecoverPasswordForm']);
    Route::get('password/generate/{id?}', ['as' => 'password change',  'middleware' => 'auth', 'uses' => 'UserController@generatePassword']);
    Route::post('doGeneratePassword', ['as' => 'password change',  'middleware' => 'auth', 'uses' => 'UserController@doGeneratePassword']);
    Route::post('updatePassword', ['as' => 'check_email',  'middleware' => 'auth', 'uses' => 'UserController@doPasswordUpdate']);
    Route::post('checkEmail', ['as' => 'check_email',  'middleware' => 'auth', 'uses' => 'UserController@checkEmail']);
    Route::post('resetPassword', ['as' => 'resetPassword',  'middleware' => 'auth', 'uses' => 'UserController@resetPassword']);
    Route::post('processLogin', ['as' => 'process_login','uses' => 'UserController@processLogin']);
    Route::post('processRecoverPassword', ['as' => 'process_login','uses' => 'UserController@processRecoverPassword']);
    Route::post('registerUser', ['as' => 'register_user', 'uses' => 'UserController@registerUser']);
    Route::get('getUsersList/{user_type}', ['as' => 'users_list',  'middleware' => 'auth', 'uses' => 'UserController@getUsersList']);
    Route::get('deleteUser/{user_type}/{user_id}', ['as' => 'users_list',  'middleware' => 'auth', 'uses' => 'UserController@deleteUser']);
    Route::get('delete_order/{id}', ['as' => 'order_list',  'middleware' => 'auth', 'uses' => 'OrdersController@deleteOrderDetails']);
    Route::get('dashboard', ['as' => 'dashboard', 'middleware' => 'auth',  'middleware' => 'auth', 'uses' => 'DashboardController@viewDashboard']);
    Route::get('deleteLocation/{user_id}', ['as' => 'users_list',  'middleware' => 'auth', 'uses' => 'LocationController@deleteLocation']);
    Route::get('deleteRoute/{id}', ['as' => 'users_list',  'middleware' => 'auth', 'uses' => 'RoutesController@deleteRoute']);
    Route::get('change_courier_status/{courier_id}/{flag}', ['as' => 'change_courier_status',  'middleware' => 'auth', 'uses' => 'CourierController@changeCourierStatus']);
    Route::get('print/receipt/{id}', ['as' => 'Order Receipt',  'middleware' => 'auth', 'uses' => 'OrdersController@printReceipt']);

    Route::get('deleteCycle/{id}', ['as' => 'users_list',  'middleware' => 'auth', 'uses' => 'LocationController@deleteCycle']);
    Route::get('acceptAmount/{id}/{flag}', ['as' => 'users_list',  'middleware' => 'auth', 'uses' => 'AccountController@acceptAmount']);
    Route::get('getOrdersList/{order_status}', ['as' => 'users_list',  'middleware' => 'auth', 'uses' => 'OrdersController@loadOrders']);
    Route::get('loadOrders', ['as' => 'users_list',  'middleware' => 'auth', 'uses' => 'OrdersController@loadOrdersList']);
    Route::get('getUpazilla/{id}', ['as' => 'users_list',  'middleware' => 'auth', 'uses' => 'OrdersController@getUpazilla']);
    Route::get('assignCourier/{order_id}/{courier_id}/{location_id}', ['as' => 'users_list',   'middleware' => 'auth','uses' => 'OrdersController@assignCourier']);
    Route::get('getLocationbasedCourier/{id}', ['as' => 'users_list',  'middleware' => 'auth', 'uses' => 'LocationController@getLocationbasedCourier']);
    Route::get('changeOrderStatus/{order_id}/{status}/{location_id?}', ['as' => 'users_list',  'middleware' => 'auth', 'uses' => 'OrdersController@changeStatus']);
    Route::get('getCouriersList', ['as' => 'users_list',  'middleware' => 'auth', 'uses' => 'CourierController@loadCouriers']);
    Route::get('fetchUserDetails/{user_id}', ['as' => 'users_list',  'middleware' => 'auth', 'uses' => 'UserController@getUserDetails']);
    Route::get('fetchReceiverDetails/{user_name}', ['as' => 'users_list',  'middleware' => 'auth', 'uses' => 'UserController@fetchReceiverDetails']);
    Route::get('gehboard/orders/alltLocationsList', ['as' => 'locations_list',  'middleware' => 'auth', 'uses' => 'LocationController@loadLocations']);
    Route::get('getLocationBasedCouriersList/{loc_id}', ['as' => 'locations_list',  'middleware' => 'auth', 'uses' => 'LocationController@getLocationBasedCouriersList']);
    Route::get('roles', ['as' => 'roles_list',  'middleware' => 'auth', 'uses' => 'UserController@getRoles']);
    Route::get('view/{user_type}/{id?}', ['as' => 'profile',  'middleware' => 'auth', 'uses' => 'UserController@viewUserDetails']);
    Route::get('edit/{user_type}/{id?}', ['as' => 'profile',  'middleware' => 'auth', 'uses' => 'UserController@editUserDetails']);
    Route::post('roles', ['as' => 'roles list',  'middleware' => 'auth', 'uses' => 'UserController@addRoles']);
    Route::post('submitComment', ['as' => 'comments',  'uses' => 'CommentsController@submitComment']);
    Route::post('sendReply', ['as' => 'comments',  'uses' => 'CommentsController@sendReply']);
    Route::get('permissions', ['as' => 'permissions_list',  'middleware' => 'auth', 'uses' => 'UserController@getPermissions']);
    Route::post('permissions', ['as' => 'permissions_list',  'middleware' => 'auth', 'uses' => 'UserController@addPermissions']);
    Route::post('filterSearchOrder', ['as' => 'filter_order',  'middleware' => 'auth', 'uses' => 'OrderController@filterSearchOrder']);
    Route::get('handoverMoney/{order_id}/{flag?}', ['as' => 'roles',   'middleware' => 'auth', 'uses' => 'OrdersController@handOverMoney']);
    Route::get('dashboard/roles', ['as' => 'roles',   'middleware' => 'auth', 'uses' => 'UserController@viewRoles']);
    Route::get('dashboard/reports/accounts', ['as' => 'accounts',   'middleware' => 'auth', 'uses' => 'OrdersController@viewReports']);
    Route::get('dashboard/accounts/deposits', ['as' => 'accounts',   'middleware' => 'auth', 'uses' => 'AccountController@loadDepositForm']);
    Route::get('dashboard/accounts/disburse', ['as' => 'accounts',   'middleware' => 'auth', 'uses' => 'AccountController@showDisburseStatus']);
    Route::post('submitDeposit', ['as' => 'accounts',   'middleware' => 'auth', 'uses' => 'AccountController@submitDeposit']);
    Route::get('dashboard/statements/{duration}', ['as' => 'accounts',   'middleware' => 'auth', 'uses' => 'OrdersController@viewStatements']);
    Route::get('handoverAll/{data}', ['as' => 'accounts',   'middleware' => 'auth', 'uses' => 'OrdersController@handoverAll']);
    Route::get('disburseMoney/{data}', ['as' => 'accounts',   'middleware' => 'auth', 'uses' => 'OrdersController@disburseMoney']);
    Route::post('dashboard/reports/accounts', ['as' => 'accounts',   'middleware' => 'auth', 'uses' => 'OrdersController@filterAccountReport']);
    Route::get('dashboard/role/{role_id}/permission', ['as' => 'assign_permission',  'middleware' => 'auth', 'uses'=>'UserController@assignPermission']);
    Route::get('complains/list', ['as' => 'dashboard', 'middleware' => 'auth',  'middleware' => 'auth', 'uses' => 'ComplainController@index']);
    Route::get('resolveComplain/{complain_id}/{flag}', ['as' => 'dashboard', 'middleware' => 'auth',  'middleware' => 'auth', 'uses' => 'ComplainController@resolveComplain']);
    Route::post('submitCustomerComplain', ['as' => 'dashboard', 'middleware' => 'auth',  'middleware' => 'auth', 'uses' => 'ComplainController@submitCustomerComplain']);
    Route::get('assignPermissions/{action}/{role}/{id}', ['as' => 'assign_permissions',  'middleware' => 'auth', 'middleware' => 'auth', 'uses' => 'UserController@assignPermissionToRole']);
    Route::post('orders/add', ['as' => 'add_order',  'middleware' => 'auth', 'uses' => 'OrdersController@addOrder']);
    Route::post('order/update', ['as' => 'update_order',   'uses' => 'OrdersController@updateOrder']);
    Route::post('location/add', ['as' => 'add_location', 'uses' => 'LocationController@addLocation']);
    Route::post('cycle/add', ['as' => 'add_location', 'uses' => 'LocationController@addCycle']);
    Route::post('location/update', ['as' => 'add_location',  'middleware' => 'auth', 'uses' => 'LocationController@updateLocation']);
    Route::post('cycle/update', ['as' => 'add_location',  'middleware' => 'auth', 'uses' => 'LocationController@updateCycle']);
    Route::post('route/update', ['as' => 'add_location',  'middleware' => 'auth', 'uses' => 'RoutesController@updateRoute']);
    Route::post('location/addCourier', ['as' => 'add_courier_to_location',  'middleware' => 'auth', 'uses' => 'LocationController@addCourierToLocation']);
    Route::post('location/addArea', ['as' => 'add_area_to_location',  'middleware' => 'auth', 'uses' => 'LocationController@addAreaToLocation']);
    Route::post('dashboard/couriers/add', ['as' => 'add_order',  'middleware' => 'auth', 'uses' => 'CourierController@addCourier']);
    Route::post('dashboard/couriers/update', ['as' => 'add_order',  'middleware' => 'auth', 'uses' => 'CourierController@updateCourier']);
    Route::post('dashboard/users/update', ['as' => 'add_order',  'middleware' => 'auth', 'uses' => 'UserController@updateUser']);
    Route::post('dashboard/visitor/update', ['as' => 'add_order',  'middleware' => 'auth', 'uses' => 'UserController@updateVisitorInfo']);
    Route::get('userslist', ['as' => 'add_order',  'middleware' => 'auth', 'uses' => 'UserController@getUsersList']);
    Route::get('dashboard/permissions', ['as' => 'permissions',  'middleware' => 'auth', 'uses' => 'UserController@viewPermissions']);
    Route::get('logout', ['as' => 'logout',  'middleware' => 'auth', 'uses' => 'UserController@doLogout']);
    Route::get('dashboard/{user_type}/list', ['as' => 'clients', 'middleware' => 'auth', 'uses' => 'UserController@loadUsersList']);
    Route::get('dashboard/orders/all/{order_status}/{from_date?}/{to_date?}/{order_id?}', ['as' => 'orders',   'middleware' => 'auth','uses' => 'OrdersController@fetchOrdersList']);
    Route::get('dashboard/orders/track/{order_id}', ['as' => 'orders',   'middleware' => 'auth','uses' => 'OrdersController@trackOrder']);
    Route::get('dashboard/couriers/all', ['as' => 'orders',  'middleware' => 'auth', 'uses' => 'CourierController@fetchCouriersList']);
    Route::get('dashboard/couriers/summeries', ['as' => 'orders',  'middleware' => 'auth', 'uses' => 'CourierController@viewSummeries']);
    Route::get('dashboard/locations/all', ['as' => 'orders',  'middleware' => 'auth', 'uses' => 'LocationController@fetchLocationsList']);
    Route::get('dashboard/cycles/all', ['as' => 'orders',  'middleware' => 'auth', 'uses' => 'LocationController@fetchCyclesList']);
    Route::get('dashboard/routes/all', ['as' => 'orders',  'middleware' => 'auth', 'uses' => 'RoutesController@fetchRoutesList']);
    Route::get('getDistrictList', ['as' => 'orders',  'middleware' => 'auth', 'uses' => 'RoutesController@getDistrictList']);
    Route::get('removeAreaFromLocation/{area_id}', ['as' => 'orders',  'middleware' => 'auth', 'uses' => 'LocationController@removeAreaFromLocation']);
    Route::get('checkCycleNumber/{number}', ['as' => 'orders',  'middleware' => 'auth', 'uses' => 'LocationController@checkCycleNumber']);
    Route::get('getRelaventDistricts/{id}', ['as' => 'orders',  'middleware' => 'auth', 'uses' => 'RoutesController@getRelaventDistricts']);
    Route::get('dashboard/routes/add', ['as' => 'orders',  'middleware' => 'auth',  'uses' => 'RoutesController@addRoute']);
    Route::post('dashboard/route/addPrice', ['as' => 'orders',  'middleware' => 'auth', 'uses' => 'RoutesController@addPrice']);
    Route::post('getPriceQuotion', ['as' => 'orders',  'middleware' => 'auth', 'uses' => 'RoutesController@getPriceQuotion']);
    Route::post('order/deny', ['as' => 'deny order',  'middleware' => 'auth', 'uses' => 'OrdersController@denyOrder']);
    Route::post('order/accept', ['as' => 'deny order',  'middleware' => 'auth', 'uses' => 'OrdersController@AcceptOrder']);
    Route::get('dashboard/routes/view/{id}', ['as' => 'routes',  'middleware' => 'auth',  'middleware' => 'auth', 'uses' => 'RoutesController@getRouteDetails']); 


    Route::post('dashboard/routes/add', ['as' => 'orders',  'middleware' => 'auth', 'uses' => 'RoutesController@addNewRoute']);
    Route::get('dashboard/locations/view/{id}', ['as' => 'orders',  'middleware' => 'auth', 'uses' => 'LocationController@viewLocation']);
    Route::get('dashboard/locations/get/{id}', ['as' => 'orders',  'middleware' => 'auth', 'uses' => 'LocationController@getLocations']);
    Route::get('dashboard/cycle/get/{id}', ['as' => 'orders',  'middleware' => 'auth', 'uses' => 'LocationController@getCycles']);
    Route::get('dashboard/locations/edit/{id}', ['as' => 'orders',  'middleware' => 'auth', 'uses' => 'LocationController@loadEditLocationForm']);
    Route::get('dashboard/order/change_notification_status/{notification_id}/{order_id}', ['as' => 'orders', 'middleware' => 'auth', 'uses' => 'OrdersController@changeNotificationStatus']);
    Route::get('dashboard/orders/add', ['as' => 'orders', 'middleware' => 'auth', 'uses' => 'OrdersController@loadAddOrderForm']);
    Route::get('dashboard/order/{id}', ['as' => 'orders',  'middleware' => 'auth', 'uses' => 'OrdersController@getOrderDetails']);
    Route::get('dashboard/couriers/add', ['as' => 'orders',  'middleware' => 'auth', 'uses' => 'CourierController@loadAddCourierForm']);
    Route::get('dashboard/courier/{id}', ['as' => 'orders',  'middleware' => 'auth',  'uses' => 'CourierController@viewCourierDetails']);
    Route::post('findCustomerOrders', ['as' => 'orders',  'middleware' => 'auth',  'uses' => 'OrdersController@findCustomerOrders']);
    Route::get('dashboard/courier/edit/{id}', ['as' => 'orders',  'middleware' => 'auth',  'uses' => 'CourierController@editCourierDetails']);
    Route::get('dashboard/courier/delete/{id}', ['as' => 'orders',  'middleware' => 'auth',  'uses' => 'CourierController@deleteCourier']);
    Route::get('dashboard/courier/remove_from_branch/{id}', ['as' => 'orders',  'middleware' => 'auth',  'uses' => 'CourierController@removeFromBranch']);
    Route::get('dashboard/get_courier/{id}', ['as' => 'orders',  'middleware' => 'auth', 'uses' => 'CourierController@fetchCourierDetails']);


    Route::get('dashboard/assets/add', ['as' => 'assets', 'middleware' => 'auth', 'uses' => 'AssetsController@add']);
    Route::post('dashboard/assets/add',['as' => 'assets', 'middleware' => 'auth', 'uses' => 'AssetsController@store']);
    Route::get('dashboard/assets/all', ['as' => 'assets',  'middleware' => 'auth', 'uses' => 'AssetsController@fetchAssetsList']);
    Route::get('dashboard/asset/{id}', ['as' => 'assets',  'middleware' => 'auth', 'uses' => 'AssetsController@viewAssets']);
	
	
});

Route::group(['prefix' => 'apis/'], function() {
	Route::get('initializeData ', ['as' => 'process_login','uses' => 'ApisController@initializeData']); 
	Route::get('getCategoryDetails/{category} ', ['as' => 'process_login','uses' => 'ApisController@getCategoryDetails']);  
	Route::get('getNewsDetails/{news_id} ', ['as' => 'process_login','uses' => 'ApisController@getNewsDetails']);  
	Route::get('getImages/', ['as' => 'process_login','uses' => 'ApisController@getImages']);  
});
