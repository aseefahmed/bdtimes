<?php

namespace App\Http\Controllers;

use App\Division;
use App\Nationalnewstag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\News;
use App\Tag;
use App\LatestNews;
use App\NewsType;
use Session;
use App\Http\Requests;

class NewsController extends Controller
{
    public function test(){
        // Name of the file
        $filename = 'testdb.sql';
        // MySQL host
        $mysql_host = 'localhost';
        // MySQL username
        $mysql_username = 'root';
        // MySQL password
        $mysql_password = '';
        // Database name
        $mysql_database = 'new1';

        // Connect to MySQL server
        $connect = mysqli_connect($mysql_host, $mysql_username, $mysql_password, $mysql_database) or die('Error connecting to MySQL server: ' . mysql_error());
        // Select database

        // Temporary variable, used to store current query
        $templine = '';
        // Read in entire file
        $lines = file($filename);
        // Loop through each line
        foreach ($lines as $line)
        {
            // Skip it if it's a comment
            if (substr($line, 0, 2) == '--' || $line == '')
                continue;

            // Add this line to the current segment
            $templine .= $line;
            // If it has a semicolon at the end, it's the end of the query
            if (substr(trim($line), -1, 1) == ';')
            {
                // Perform the query
                mysqli_query($connect, $templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
                // Reset temp variable to empty
                $templine = '';
            }
        }
        echo "Tables imported successfully";
    }
    public function index()
    {
        $data['categories'] = DB::table('cms_categories')->get();
        if(Auth::user()->role == 1)
        {
            $data['news_list'] = DB::table('news')->orderBy('id', 'desc')->paginate(10);
        }
        else if(Auth::user()->role == 2)
        {
            $my_catagories = DB::table('permission_users')->join('cms_categories', 'cms_categories.id', '=', 'permission_users.category_id')->where('user_id', Auth::user()->id)->select('cms_categories.id')->get();

            $cat_arr = array();
            foreach($my_catagories as $cat)
            {
                array_push($cat_arr, $cat->id);
            }
            $data['news_list'] = DB::table('news')->whereIn('news.parent_cat_id', $cat_arr)->orderBy('id', 'desc')->select('news.*')->paginate(10);
        }
        else if(Auth::user()->role == 3 || Auth::user()->role == "")
        {
            $data['news_list'] = DB::table('news')->where('created_by', Auth::user()->id)->orderBy('id', 'desc')->paginate(10);
        }
        else if(Auth::user()->role == 4)
        {
            $data['news_list'] = DB::table('news')->where('created_by', Auth::user()->id)->orderBy('id', 'desc')->paginate(10);
        }
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        session(['cat' => $categories]);
        return view('news.index', $data);
    }

    public function addNews()
    {

        $data['categories'] = DB::table('cms_categories')->where('parent_category_id', 0)->select('id', 'category_name', 'label')->get();
        $data['divisions'] = DB::table('divisions')->get();

        $data['tags'] = DB::table('tags')->distinct()->get(['tag_name']);
        return view('news.add', $data);
    }

    public function addVideoNews()
    {

        $data['categories'] = DB::table('cms_categories')->where('parent_category_id', 0)->select('id', 'category_name', 'label')->get();
        $data['divisions'] = DB::table('divisions')->get();

        $data['tags'] = DB::table('tags')->distinct()->get(['tag_name']);
        return view('news.addvideo', $data);
    }

    public function addPictureNews()
    {

        $data['categories'] = DB::table('cms_categories')->where('parent_category_id', 0)->select('id', 'category_name', 'label')->get();
        $data['divisions'] = DB::table('divisions')->get();

        $data['tags'] = DB::table('tags')->distinct()->get(['tag_name']);
        return view('news.addpicture', $data);
    }

    public function showAuthorPublication($id){
        $data['user'] = DB::table('users')->where('id', $id)->get();
        $data['newslist'] =  DB::table("news")->where('created_by', $id)->paginate(10);
        $data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();
        $data['poll'] = DB::table('polls')->where('flag', '1')->orderBy('id', 'asc')->take(1)->get();
        $data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->take(3)->get();

        $data['top_news'] = DB::table('news')->take(10)->orderBy('total_views', 'desc')->get();
        $data['most_commented'] = DB::table('news')->orderBy('total_comments', 'desc')->take(10)->get();


        return view('frontend.authors_publication', $data);
    }
    public function showArchives($month=null, $day=null, $year=null){
        $data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();
        $data['poll'] = DB::table('polls')->where('flag', '1')->orderBy('id', 'asc')->take(1)->get();
        $data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->take(3)->get();

        $data['top_news'] = DB::table('news')->take(10)->orderBy('total_views', 'desc')->get();
        $data['most_commented'] = DB::table('news')->orderBy('total_comments', 'desc')->take(10)->get();
        $data['month_date'] = $month;
        $data['day_date'] = $day;
        $data['year_date'] = $year;
        $news = DB::table('news');
        if(!isset($month)){
            $data['selected_date'] = Date('dS M, Y');
            $data['newslist'] = $news->orderBy('id', 'desc')->paginate(20);
        }
        else {
            $date = $year."-".$month."-".$day;
            $data['selected_date'] = date_format(date_create($date),'dS M, Y');
            $data['newslist'] = $news->where('created_at', '>=', $date.' 00:00:00')->where('created_at', '<=', $date.' 23:59:59')->orderBy('id', 'desc')->paginate(20);
        }
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        session(['cat' => $categories]);

        return view('frontend.archives', $data);
    }
    public function submitNews(Request $request, $user_type=null)
    {


        if(!isset($user_type)){
            $testDiv = new Division;
            $national_news_tag = new Nationalnewstag;
            $news = new News();
            $news->id = time();
            $news->title = $request->news_title;
            $news->sub_title = $request->sub_title;
            $news->details = $request->news_details;
            if($request->short_desc==""){
                $news->short_description = $request->news_details;
            }
            else{
                $news->short_description = $request->short_desc;
            }
            $news->meta_desc = $request->meta_desc;
            $news->vedio_link = $request->vedio_link;
            if(isset($request->breaking_news)){
                $news->is_breaking_news = $request->breaking_news;
            }
            $news->flag = $request->flag;
            $news->created_by = Auth::user()->id;

            if(isset($request->sub_categories))
            {
                $news->category_id = $request->sub_categories;
            }
            else{
                $news->category_id = $request->categories;
            }
            if(isset($request->sub_categories))
            {
                $news->sub_title = $request->sub_categories;
            }


            $news->parent_cat_id = $request->categories;
            $news->creator_name = Auth::user()->first_name." ".Auth::user()->last_name;
            $news->language = $request->language;
            if($request->featured_image){
                dd($request->file('featured_image'));
                $file_extension = $request->file('featured_image')->guessExtension();
                $file_name = "featured_images_".time().".".$file_extension;
                if(Auth::user()->role !=1){
                    if($request->language == "bangla")
                        $request->file('featured_image')->move('public/images/news/featured', $file_name);
                    elseif($request->language == "english")
                        $request->file('featured_image')->move('en/public/images/news/featured', $file_name);
                    else
                        $request->file('featured_image')->move('public/images/news/featured', $file_name);


                }
                else{
                    if($request->language == "bangla")
                        $request->file('featured_image')->move('public/images/news/featured', $file_name);
                    else
                        $request->file('featured_image')->move('en/public/images/news/featured', $file_name);
                }

                $news->featured_image = $file_name;
                $news->image_caption = $request->image_caption;
            }else{
                //$file_name = "";
                $file_name = "featured_images_default.png";
                $news->featured_image = $file_name;
                //$news->image_caption = $request->image_caption;
            }


            $news->save();
            $national_news_tag_id= $news->id;
            if($request->divisions)
            {
                $national_news_tag->division_name = $request->divisions;
                $national_news_tag->district_name = $request->districts;
                $national_news_tag->upazila_name = $request->upazilas;
                $national_news_tag->news_id = $national_news_tag_id;
                $national_news_tag->save();
            }


            if($request->flag == 1){
                $count = DB::table('latest_news')->where('category_id', $news->category_id)->count();
                if($count < 4){
                    DB::table('latest_news')->insert([
                        'category_id' => $news->category_id,
                        'news_id' => $news->id
                    ]);
                }
                else if($count == 4){
                    $latest_news = DB::table('latest_news')->where('category_id', $news->category_id)->orderBy('id', 'asc')->take(1)->get();
                    DB::table('latest_news')->where('id', $latest_news[0]->id)->delete();

                    DB::table('latest_news')->insert([
                        'category_id' => $news->category_id,
                        'news_id' => $news->id
                    ]);

                }
            }

            if(count($request->tags) > 0 )
            {
                foreach($request->tags as $tag)
                {
                    $tags = new Tag();
                    $tags->tag_name = $tag;
                    $tags->news_id = $news->id;
                    $tags->save();
                }
            }
        }
        else{
            $national_news_tag = new Nationalnewstag;
            //$testDiv = new Division;
            $news = new News();
            $news->id = time();
            $news->title = $request->news_title;
            $news->category_id = 27;
            $news->details = $request->news_details;
            $news->flag = $request->flag;
            $news->vedio_link = "";
            if($request->featured_image){
                $file_extension = $request->file('featured_image')->guessExtension();
                $file_name = "featured_images_".time().".".$file_extension;
                $request->file('featured_image')->move('/public/images/news/featured', $file_name);

                $news->featured_image = $file_name;
            }else{
                $file_name = "";
            }
            $news->created_by = Auth::user()->id;
            $news->creator_name = Auth::user()->first_name." ".Auth::user()->last_name;


            $news->save();

            $national_news_tag_id = $news->id;
            if($request->divisions)
            {
                $national_news_tag->division_name = $request->divisions;
                $national_news_tag->district_name = $request->districts;
                $national_news_tag->upazila_name = $request->upazilas;
                $national_news_tag->news_id = $national_news_tag_id;
                $national_news_tag->save();
            }



        }


    }





    public function submitVideoNews(Request $request)
    {
        //dd('testing submit video news');

            $news = new News();
            $news->id = time();
            $news->title = $request->news_title;

            $news->details = "N/A";

            $news->short_description = "N/A";

            $news->vedio_link = $request->video_link;

            $news->flag = '1';
            $news->created_by = Auth::user()->id;
            $news->image_caption = "N/A";
            if(isset($request->sub_categories))
            {
                $news->category_id = $request->sub_categories;
            }
            else{
                $news->category_id = $request->categories;
            }

            $news->parent_cat_id = $request->categories;

            $news->creator_name = Auth::user()->first_name." ".Auth::user()->last_name;
            $news->language = $request->language;
            $news->is_breaking_news='1';
            $news->total_comments=0;
            //$news->totla_views=0;

            if($request->featured_image){
                $file_extension = $request->file('featured_image')->guessExtension();

                $file_name = "featured_images_".time().".".$file_extension;
                if(Auth::user()->role !=1){
                    if($request->language == "bangla")
                        $request->file('featured_image')->move('public/images/news/featured', $file_name);
                    elseif($request->language == "english")
                        $request->file('featured_image')->move('en/public/images/news/featured', $file_name);
                    else
                        $request->file('featured_image')->move('public/images/news/featured', $file_name);


                }
                else{
                    if($request->language == "bangla")
                        $request->file('featured_image')->move('public/images/news/featured', $file_name);
                    else
                        $request->file('featured_image')->move('en/public/images/news/featured', $file_name);
                }

                $news->featured_image = $file_name;
                $news->image_caption = "N/A";
            }else{
                //$file_name = "";
                $file_name = "featured_images_default.png";
                $news->featured_image = $file_name;
                //$news->image_caption = $request->image_caption;
            }


            $news->save();
            //$national_news_tag_id = $news->id;
            //dd($national_news_tag_id);
            return redirect('news/list');

    }



    public function submitPictureNews(Request $request)
    {

        //dd('testing submit picture news');

        $news = new News();
        $news->id = time();
        $news->title = $request->news_title;

        $news->details = "N/A";

        $news->short_description = "N/A";

        $news->vedio_link = "N/A";

        $news->flag = '1';
        $news->created_by = Auth::user()->id;
        $news->image_caption = "N/A";
        if(isset($request->sub_categories))
        {
            $news->category_id = $request->sub_categories;
        }
        else{
            $news->category_id = $request->categories;
        }

        $news->parent_cat_id = $request->categories;

        $news->creator_name = Auth::user()->first_name." ".Auth::user()->last_name;
        $news->language = $request->language;
        $news->is_breaking_news='1';
        $news->total_comments=0;
        //$news->totla_views=0;

        if($request->featured_image){
            $file_extension = $request->file('featured_image')->guessExtension();

            $file_name = "featured_images_".time().".".$file_extension;
            if(Auth::user()->role !=1){
                if($request->language == "bangla")
                    $request->file('featured_image')->move('public/images/news/featured', $file_name);
                elseif($request->language == "english")
                    $request->file('featured_image')->move('en/public/images/news/featured', $file_name);
                else
                    $request->file('featured_image')->move('public/images/news/featured', $file_name);


            }
            else{
                if($request->language == "bangla")
                    $request->file('featured_image')->move('public/images/news/featured', $file_name);
                else
                    $request->file('featured_image')->move('en/public/images/news/featured', $file_name);
            }

            $news->featured_image = $file_name;
            $news->image_caption = "N/A";
        }else{
            //$file_name = "";
            $file_name = "featured_images_default.png";
            $news->featured_image = $file_name;
            //$news->image_caption = $request->image_caption;
        }


        $news->save();
        //$national_news_tag_id = $news->id;
        //dd($national_news_tag_id);
        return redirect('news/list');

    }




    public function getSearchResult(Request $request){
        $data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();
        $data['poll'] = DB::table('polls')->where('flag', '1')->orderBy('id', 'asc')->take(1)->get();
        $data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->take(3)->get();

        $data['top_news'] = DB::table('news')->take(10)->orderBy('total_views', 'desc')->get();
        $data['most_commented'] = DB::table('news')->orderBy('total_comments', 'desc')->take(10)->get();

        $data['newslist'] = DB::table('news')->where('title', 'like', "%{$request->search_keyword}%")->orWhere('details', 'like', "%{$request->search_keyword}%")->paginate(20);
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        session(['cat' => $categories]);
        return view('frontend.search_results', $data);
    }
    public function searchNews(Request $request){

        /*$data['news_list'] = DB::table('news')
                            ->join('users', 'users.id', '=', 'news.created_by')
                            ->join('cms_categories', 'cms_categories.id', '=', 'news.category_id')
                            ->where(function($query) use($request){
                                if($request->news_cat_id == 0){
                                    $query->where('cms_categories.label', '=', $request->search_news)
                                        ->orWhere('cms_categories.category_name', '=', $request->search_news)
                                        ->orWhere('news.title', 'LIKE', "%$request->search_news%")
                                        ->orWhere('news.details', 'LIKE', "%$request->search_news%")
                                        ->orWhere('news.creator_name', 'LIKE', "%$request->search_news%");
                                }
                                else{
                                    $query->where('cms_categories.label', '=', $request->search_news)
                                    ->orWhere('cms_categories.category_name', '=', $request->search_news)
                                    ->orWhere('news.title', 'LIKE', "%$request->search_news%")
                                    ->orWhere('news.details', 'LIKE', "%$request->search_news%")
                                    ->orWhere('news.creator_name', 'LIKE', "%$request->search_news%")
                                    ->orWhere('news.category_id', $request->news_cat_id);
                                }
                                
                            })
                            ->select( 'cms_categories.*','news.*'	)
                            ->orderBy('news.id', 'desc')
                            ->get();*/

        $data['news_list'] = DB::table('news')
            ->join('users', 'users.id', '=', 'news.created_by')
            ->join('cms_categories', 'cms_categories.id', '=', 'news.category_id')
            ->where('news.category_id', $request->news_cat_id)
            ->select( 'cms_categories.*','news.*'	)
            ->orderBy('news.id', 'desc')
            ->get();
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        session(['cat' => $categories]);
        return view('ajax_views.news_list', $data);
    }
    public function viewFrontNews($id)
    {

        //$data['menus'] = DB::table('cms_categories')->get();
        $data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();
        $data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->take(3)->get();
        //$data['latest_news'] = DB::table('latest_news')->join('news', 'news.id', '=','latest_news.news_id')->orderBy('news.created_at', 'desc')->get();
        /* $data['images'] = DB::table('images')->get();
        $data['shapes'] = DB::table('images')->where('file_type', '!=', '')->distinct()->get(['file_type']);
         */
        $data['keywords'] = DB::table('tags')->where('news_id', $id)->get();
        $keywords = "";
        foreach($data['keywords'] as $tag){
            $keywords.=$tag->tag_name.",";
        }
        $data['keywords'] = substr($keywords, 0, -1);
        $data['news_details'] = DB::table('news')->where('id', $id)->get();
        $data['relevant_news'] = DB::table('news')->whereIn('category_id', [2,3,4])->take(20)->get();
        $count = DB::table('news_views')->where('news_id', $id)->where('ip_address', $_SERVER['REMOTE_ADDR'])->count();
        if($count == 0)
        {
            DB::table('news_views')->insert([
                'news_id' => $id,
                'ip_address' => $_SERVER['REMOTE_ADDR'],
            ]);

            DB::table('news')->where('id', $id)->increment('total_views');
            DB::table('cms_categories')->where('id', $data['news_details'][0]->category_id)->increment('total_views');
        }
        $data['popular_news'] = DB::table('news')->orderBy('created_at')->whereNotIn('parent_cat_id', [138])->take(21)->get();
        $data['comments'] = DB::table('comments')->leftJoin('users', 'users.id', '=', 'comments.user_id')->where('comments.news_id', $id)->where('comments.flag', 1)->orderBy('comments.id', 'desc')->select('users.*', 'comments.id', 'comments.user_id', 'comments.details')->get();
        $data['url'] = 'http://139.59.90.229/news/front/details/'.$id;
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        session(['cat' => $categories]);
        return view('frontend.details', $data);
    }





    public function searchAncolikNews(Request $request)
    {

        if($request->division && $request->districts && $request->upazilas){

            $data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();
            $data['divisions'] = DB::table('divisions')->get();
            $data['all_news'] = DB::table('news')
                ->join('nationalnewstags', 'nationalnewstags.news_id', '=', 'news.id')
                ->where('nationalnewstags.upazila_name', $request->upazilas)
                ->select('nationalnewstags.*', 'news.*')
                ->orderBy('news.id', 'desc')
                ->get();
            //dd(count($data['all_news']));
            if (count($data['all_news']) == 0) {
                $local = "bangla";
                $data['all_news'] = DB::table('news')
                    ->join('nationalnewstags', 'news.id', '=', 'nationalnewstags.news_id')
                    ->select('news.*', 'nationalnewstags.*')
                    ->get();
            }
            $categories = DB::table('cms_categories')->where([
                ['status', '=', 1],
                ['link', '<>', ''],
            ])->get();
            //dd(count($data['all_news']));
            session(['cat' => $categories]);
            return view('frontend.ancolik', $data);
        }

        elseif($request->division && $request->districts ) {

            $data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();
            $data['divisions'] = DB::table('divisions')->get();
            $data['all_news'] = DB::table('news')
                ->join('nationalnewstags', 'nationalnewstags.news_id', '=', 'news.id')
                ->where('nationalnewstags.district_name', $request->districts)
                ->select('nationalnewstags.*', 'news.*')
                ->orderBy('news.id', 'desc')
                ->get();
            if (count($data['all_news']) == 0) {
                $local = "bangla";
                $data['all_news'] = DB::table('news')
                    ->join('nationalnewstags', 'news.id', '=', 'nationalnewstags.news_id')
                    ->select('news.*', 'nationalnewstags.*')
                    ->get();
            }
            $categories = DB::table('cms_categories')->where([
                ['status', '=', 1],
                ['link', '<>', ''],
            ])->get();
            session(['cat' => $categories]);
            return view('frontend.ancolik', $data);
        }

        elseif ($request->division){
            $data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();
            $data['divisions'] = DB::table('divisions')->get();
            $data['all_news'] = DB::table('news')
                ->join('nationalnewstags', 'nationalnewstags.news_id', '=', 'news.id')
                ->where('nationalnewstags.division_name', $request->division)
                ->select('nationalnewstags.*', 'news.*')
                ->orderBy('news.id', 'desc')
                ->get();
            if (count($data['all_news']) == 0) {
                $local = "bangla";
                $data['all_news'] = DB::table('news')
                    ->join('nationalnewstags', 'news.id', '=', 'nationalnewstags.news_id')
                    ->select('news.*', 'nationalnewstags.*')
                    ->get();
            }
            $categories = DB::table('cms_categories')->where([
                ['status', '=', 1],
                ['link', '<>', ''],
            ])->get();
            session(['cat' => $categories]);
            return view('frontend.ancolik', $data);
        }
        else{
            $data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();
            $data['divisions'] = DB::table('divisions')->get();



                $data['all_news'] = DB::table('news')
                    ->join('nationalnewstags', 'news.id', '=', 'nationalnewstags.news_id')
                    ->select('news.*', 'nationalnewstags.*')
                    ->get();

            $categories = DB::table('cms_categories')->where([
                ['status', '=', 1],
                ['link', '<>', ''],
            ])->get();
            session(['cat' => $categories]);
            return view('frontend.ancolik', $data);
        }




    }






    public function viewNews($id)
    {
        $data['menus'] = DB::table('cms_categories')->get();
        $data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();
        $data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->take(3)->get();
        //$data['latest_news'] = DB::table('latest_news')->join('news', 'news.id', '=','latest_news.news_id')->orderBy('news.created_at', 'desc')->get();
        $data['images'] = DB::table('images')->get();
        $data['shapes'] = DB::table('images')->where('file_type', '!=', '')->distinct()->get(['file_type']);

        $data['news'] = DB::table('news')->where('id', $id)->get();
        $data['popular_news'] = DB::table('news')->orderBy('created_at')->take(21)->get();
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        session(['cat' => $categories]);
        return view('news.details', $data);
    }

    public function removeNews($id)
    {
        DB::table('nationalnewstags')->where('news_id',$id)->delete();
        DB::table('news')->where('id', $id)->delete();
        DB::table('latest_news')->where('news_id', $id)->delete();
    }

    public function editNews($id)
    {
        $data['news'] = DB::table('news')->leftJoin('news_types', 'news_types.news_id', '=', 'news.id')->where('news.id', $id)->select('news.*', 'news_types.category_id', 'news_types.sub_category_id')->get();
        $data['categories'] = DB::table('cms_categories')->where('parent_category_id', 0)->select('id', 'category_name')->get();
        $data['num_of_sub_cat'] = DB::table('cms_categories')->where('parent_category_id', $data['news'][0]->category_id)->count();
        $data['sub_categories'] = DB::table('cms_categories')->where('parent_category_id', $data['news'][0]->category_id)->get();
        $data['tags'] = DB::table('tags')->distinct()->get(['tag_name']);
        return view('news.edit', $data);
    }

    public function editNewsSubmit(Request $request)
    {
        $news = News::find($request->id);
        $news->title = $request->news_title;
        $news->sub_title = $request->sub_title;
        $news->meta_desc = $request->meta_desc;
        $news->language = $request->language;
        $news->details = $request->news_details;
        if($request->short_desc==""){
            $news->short_description = $request->news_details;
        }
        else{
            $news->short_description = $request->short_desc;
        }
        $news->flag = $request->flag;
        $news->vedio_link = $request->vedio_link;
        $news->is_breaking_news = $request->breaking_news;
        if($request->featured_image){
            $file_extension = $request->file('featured_image')->guessExtension();
            $file_name = "featured_images_".time().".".$file_extension;
            $request->file('featured_image')->move('public/images/news/featured', $file_name);

            $news->featured_image = $file_name;
        }

        if(isset($request->sub_categories))
        {
            $news->category_id = $request->sub_categories;
            $news->parent_cat_id = $request->categories[0];
        }
        else{
            $news->category_id = $request->categories[0];
        }

        $news->image_caption = $request->image_caption;
        $news->save();
        DB::table('news_types')->where('news_id', $request->id)->delete();
        DB::table('tags')->where('news_id', $request->id)->delete();
        DB::table('latest_news')->where('news_id', $news->id)->delete();
        if(count($request->categories) > 0 )
        {
            foreach($request->categories as $category)
            {
                $news_types = new NewsType();
                $news_types->news_id = $news->id;
                $news_types->category_id = $category;
                if(isset($request->sub_categories))
                {
                    $news_types->sub_category_id = $request->sub_categories;
                }
                $news_types->save();

                if($request->flag == 1){
                    $count = DB::table('latest_news')->where('category_id', $category)->count();
                    if($count < 4){
                        DB::table('latest_news')->insert([
                            'category_id' => $category,
                            'news_id' => $news->id
                        ]);
                    }
                    else if($count == 4){
                        $latest_news = DB::table('latest_news')->where('category_id', $category)->orderBy('id', 'asc')->take(1)->get();
                        DB::table('latest_news')->where('id', $latest_news[0]->id)->delete();
                        DB::table('latest_news')->insert([
                            'category_id' => $category,
                            'news_id' => $news->id
                        ]);

                    }
                }
            }
        }

        if(count($request->tags) > 0 )
        {
            foreach($request->tags as $tag)
            {
                $tags = new Tag();
                $tags->tag_name = $tag;
                $tags->news_id = $news->id;
                $tags->save();
            }
        }




    }
}