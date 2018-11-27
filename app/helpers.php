<?php

use App\Order;
use App\Notification;

function newOrders($id)
{
    if(Auth::user()->role == 1)
        $data = Order::take(5)->orderBy('id', 'desc')->get();
    else if(Auth::user()->role == 9)
    {
        $data = Order::take(5)->where('assigned_courier', $id)->orderBy('id', 'desc')->get();
    }else
    {
        $location = DB::table('locations')->where('manager_id', Auth::user()->id)->get();
        $data = Order::take(5)->where('location_id', $location[0]->id)->orderBy('id', 'desc')->get();
    }

    return $data;
}

function getReplies($comment_id){
	$replies = DB::table('comment_replies')->leftJoin('users', 'users.id', '=', 'comment_replies.user_id')->where('comment_replies.comment_id', $comment_id)->orderBy('comment_replies.id', 'desc')->select('users.*', 'comment_replies.comment_id', 'comment_replies.user_id', 'comment_replies.reply_text as details')->get();
	return $replies;
}

function totalDeliveredOrders($month, $year)
{
        $day=cal_days_in_month(CAL_GREGORIAN,$month,$year);
        if($month < 10)
            $month = "0".$month;
        $start_day = $year."-".$month."-01 00:00:00";
        $end_day = $year."-".$month."-".$day." 23:59:59";

        $count = DB::table('orders')->where('created_at','>=', $start_day)->where('created_at', '<=', $end_day)->where('flag', 9)->count();
        return $count;
}

function totalNewCustomers($month, $year)
{
        $day=cal_days_in_month(CAL_GREGORIAN,$month,$year);
        if($month < 10)
            $month = "0".$month;
        $start_day = $year."-".$month."-01 00:00:00";
        $end_day = $year."-".$month."-".$day." 23:59:59";

        $count = DB::table('customers')->where('created_at','>=', $start_day)->where('created_at', '<=', $end_day)->count();
        return $count;
}

function viewNewNotifications($user_id)
{
    $data = Notification::where('user_id', $user_id)->where('flag', '0')->orderBy('id', 'desc')->get();
    return $data;
}

function isCourierInThisLocation($loc_id, $courier_id)
{
    $data = DB::table('courier_locations')->where('location_id', $loc_id)->where('courier_id', $courier_id)->count();
    return $data;
}

function findPackageHours($package_id)
{
		$data = DB::table('package_hours')->where('package_id', $package_id)->get();
		return $data;
}

function findPackageRates($package_id)
{
		$data = DB::table('shipping_rates')->where('package_id', $package_id)->get();
		return $data;
}

function countTotalRates($package_id)
{
	$count = DB::table('package_hours')->where('package_id', $package_id)->count();
	return $count;
}

function isAreaInThisLocation($loc_id, $area_id)
{
    $data = DB::table('location_upazillas')->where('location_id', $loc_id)->where('upazilla_id', $area_id)->count();
    return $data;
}

function isManager($user_id)
{
    return $count = DB::table('locations')->where('manager_id', $user_id)->count();
}

function isCourierAllocated($courier_id)
{
    $data = DB::table('courier_locations')->where('courier_id', $courier_id)->count();
    return $data;
}

function isCourier($courier_email)
{
    return $count = DB::table('couriers')->where('email', $courier_email)->count();
}

function isCourierGotCycle($courier_id)
{
    $data = DB::table('cycles')->where('courier_id', $courier_id)->where('flag', 1)->count();
    return $data;
}

function isOrderDenied($order_id, $courier_id)
{
    $data = DB::table('order_statuses')->where('order_id', $order_id)->where('courier_id', $courier_id)->where('status_type', 4)->orWhere('status_type', 3)->count();
    return $data;
}

function isOrderAccepted($order_id, $courier_id)
{
    $data = DB::table('order_statuses')->where('order_id', $order_id)->where('courier_id', $courier_id)->where('status_type', 4)->orWhere('status_type', 3)->count();
    return $data;
}

function findLocationDetails($location_id)
{
    return $data = DB::table('locations')->where('id', $location_id)->get();
}

function findCourierLocation($courier_id)
{
    return $data = DB::table('courier_locations')->join('locations', 'locations.id', '=', 'courier_locations.location_id')->where('courier_locations.courier_id', $courier_id)->get();
}

function findManagerLocation($userid)
{
    return $data = DB::table('locations')->where('locations.manager_id', $userid)->get();
}

function is_assigned($order_id, $user_id)
{
    return $count = DB::table('order_statuses')->where('order_id', $order_id)->where('courier_id', $user_id)->where('status_type', 5)->count();
}

function findCustomerDetails($cust_id)
{
    return $data = DB::table('customers')->where('customers.id', $cust_id)->get();
}

function findEmployeeDetails($id)
{
    return $data = DB::table('users')->where('id', $id)->get();
}

function findTotalAmount($id)
{
	$amount = DB::table('item_orders')->where('order_id', $id)->sum('subtotal');
	return $amount;
}
function findTotalOrdersByCategory()
{
    $data = DB::table('orders')->groupBy('flag')->select('flag', DB::raw('count(*) as total_order'))->get();
    return $data;
}
function findBranchManager($location_id)
{
    $manager = DB::table('locations')->where('id', $location_id)->get();
    return $manager[0]->manager_id;
}


function findBranchManagerByOrderId($order_id)
{
    $manager = DB::table('orders')->where('orders.id', $order_id)->join('locations', 'locations.id', '=', 'orders.branch_id')->join('users', 'users.id', '=', 'locations.manager_id')->select('locations.manager_id', 'users.email')->get();
    return $manager[0]->manager_id;
}
function findBranchManagerEmail($order_id)
{
    $manager = DB::table('orders')->where('orders.id', $order_id)->join('locations', 'locations.id', '=', 'orders.branch_id')->join('users', 'users.id', '=', 'locations.manager_id')->select('locations.manager_id', 'users.email')->get();
    return $manager[0]->email;
}
function isAreaAlloted($area_id)
{
    $data = DB::table('location_upazillas')->where('upazilla_id', $area_id)->count();
    return $data;
}

function findDistrictDetails($dist_id)
{
    return $data = DB::table('districts')->where('id', $dist_id)->select('name')->get();
}

function findCourierDetails($courier_id)
{
    return $data = DB::table('couriers')->where('id', $courier_id)->select('first_name', 'last_name', 'picture')->get();
}

//////////////////////////////////

function findNewsCategories($news_id)
{
	return DB::table('news')->join('cms_categories', 'cms_categories.id', '=', 'news.parent_cat_id')->where('news.id', $news_id)->select('cms_categories.category_name')->get();
}
function findNewsTags($news_id)
{
	return DB::table('tags')->where('news_id', $news_id)->select('tags.tag_name')->get();
}
function findUserDetails($user_id)
{
	return DB::table('users')->where('id', $user_id)->get();
}
function findUserCategories($id)
{
	return DB::table('permission_users')->join('cms_categories', 'cms_categories.id', '=', 'permission_users.category_id')->where('user_id', $id)->get();
}
function findMyCategories($id)
{
	if(Auth::user()->role ==1)
	{
		return DB::table('permission_users')->join('cms_categories', 'cms_categories.id', '=', 'permission_users.category_id')->select('cms_categories.*')->get();
	}
	else 
	{
		return DB::table('permission_users')->join('cms_categories', 'cms_categories.id', '=', 'permission_users.category_id')->where('user_id', $id)->select('cms_categories.*')->get();
	}
	
}

function findCategoryDetails($id){
	return DB::table('cms_categories')->where('id', $id)->get();
}

function findTotalNews($user_id){
	return DB::table('news')->where('created_by', $user_id)->where('flag', 1)->count();
}

function checkLanguage(){
	if(Session::get('language') ==  'english'){
		$local = "english";
		Session::put('breaking_news',   "Breaking News");
		Session::put('recent',   "Recent");
		Session::put('reporting',   "Reporting Based News");
		Session::put('middleast',   "Middle East");
		Session::put('northamerica',   "North America");
		Session::put('europe',   "Europe");
		Session::put('asia',   "Asia");
		Session::put('readmore',   "Read More");
		Session::put('shoddoprapto',   "Just Now");
		Session::put('language',   "english");
	}
	else{
		$local = "bangla";
		Session::put('breaking_news',   "ব্রেকিং নিউজ");
		Session::put('recent',   "সাম্প্রতিক");
		Session::put('reporting',   "রিপোরটিং-বেজড নিউজ");
		Session::put('middleast',   "মধ্যপ্রাচ্য");
		Session::put('northamerica',   "উত্তর আমেরিকা");
		Session::put('europe',   "ইউরোপ");
		Session::put('readmore',   "বিস্তারিত");
		Session::put('shoddoprapto',   "সদ্যপ্রাপ্ত");
		Session::put('language',   "bangla");
	}
	
	return $local;
}

function findBreakingNews(){
	$data = DB::table('news')->where('is_breaking_news', '1')->where('language', 'bangla')->orderBy('id', 'desc')->take(3)->get();
	return $data;
}

function findAds($page){
	$data = DB::table('ads')->where('page', $page)->orderBy('id', 'asc')->get();
	return $data;
}

function findLatestNews(){
	$data = DB::table('latest_news')->join('news', 'news.id', '=','latest_news.news_id')->where('language', 'bangla')->select('news.id', 'news.category_id', 'featured_image', 'news.title', 'news.details')->orderBy('news.id', 'desc')->take(3)->get();
	return $data;
}

function findTopNews(){
	$data = DB::table('news')->take(5)->orderBy('total_views', 'desc')->get();
	return $data;
}

function findMostCommented(){
	
	$data = DB::table('news')->orderBy('total_comments', 'desc')->take(5)->get();
	return $data;
}

function findTotalComments($id){
	$count = DB::table("comments")->where('news_id', $id)->count();
	return $count;
}