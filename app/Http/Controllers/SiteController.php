<?php

namespace App\Http\Controllers;

use App\Image;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SiteController extends Controller
{
    
    public function create()
    {

        //slides
        $slides=[];

        $slides_req=Image::Where('slide', 1)->leftJoin('post','image.idPst','=','post.idPst')
        ->select('image.idPst','desct','linkImg','title')
            
            ->get();
        $i=0;
        
        foreach ($slides_req as $key => $value)
        { 


            $slides[$i]=array(
                        'id'=>$value->idPst,
                        'title' =>  $value->title,
                        'desct' =>  $value->desct,
                        'imgName'=>$value->linkImg,
                        'url' =>  asset('storage/'.$value->linkImg)
                    );
            $i++;
        }

        //$employee[$i]
        //$employee[$i]['name']
        //$employee[$i]['title']

        //$testimonials[$i]
        //$testimonials[$i]['url']
        //$testimonials[$i]['author']
        //$testimonials[$i]['title']
        //$testimonials[$i]['desct']

        //$featured_work[$i]
        //$featured_work[$i]['title']
        //$featured_work[$i]['url']

        //$lastProject[$i]
        //$lastProject[$i]['url']
        //$lastProject[$i]['author']
        //$lastProject[$i]['title']
        //$lastProject[$i]['desct']
        //$lastProject[$i]['created_at']

        //$parteners[$i]
        //$parteners[$i]['url']

        return view('site/main/index',  [
            'slides' => $slides
        ]);
    }

    public function servicesinglecreate($nb)
    {
       


//for detailed_service
        // $all_services[$i]['lib']
        // $all_services[$i]['fa']
        // $all_services[$i]['lib']
        // $service['lib']
        // $service['desct']
        // $service['url']
        // $service['name']

//for Comments
// $post['CommentNumber']
// $post['Comment'][$i]['user']['pp']
// $post['Comment'][$i]['user']['name']
// $post['Comment'][$i]['created_at']
// $post['Comment'][$i]
// $post['Comment'][$i]['reply'][$j]['user']['pp']
// $post['Comment'][$i]['reply'][$j]['user']['name']
// $post['Comment'][$i]['reply'][$j]['created_at']
// $post['Comment'][$i]['reply'][$j]['desct']

//for recentPost
        // $recentPost[$i]['url']
        // $recentPost[$i]['title']
        // $recentPost[$i]['created_at']

//for archives
        //$archive[$i]
        //$archive[$i]['monthYear']

         return view('site/main/single/service');


         //your old single
// $post = $posts = Post::Where('idPst', (int)$nb)->first();
        //$img = Image::where('idPst', $post->idPst)->where('default', 1)->first();
         //return view('site/main/single', [
        //     'post' => $post,
        //     'img'  => $img
        // ]);
    }
    public function blogsinglecreate($nb)
    {
       


//for main
        // $post['url']
        //$post['day']
        //$post['month']
        // $post['title']
        // $post['user']
        // $post['commentNumber']
        // $post['likeNumber']
        // $post['sharedNumber']
        // $post['desct']
        // $post['user']['pp']
        // $post['user']['name']
        // $post['resume']

//for Comments
// $post['CommentNumber']
// $post['Comment'][$i]['user']['pp']
// $post['Comment'][$i]['user']['name']
// $post['Comment'][$i]['created_at']
// $post['Comment'][$i]
// $post['Comment'][$i]['reply'][$j]['user']['pp']
// $post['Comment'][$i]['reply'][$j]['user']['name']
// $post['Comment'][$i]['reply'][$j]['created_at']
// $post['Comment'][$i]['reply'][$j]['desct']

//for recentPost
        // $recentPost[$i]['url']
        // $recentPost[$i]['title']
        // $recentPost[$i]['created_at']

//for archives
        //$archive[$i]
        //$archive[$i]['monthYear']

         return view('site/main/single/blog');


         //your old single
// $post = $posts = Post::Where('idPst', (int)$nb)->first();
        //$img = Image::where('idPst', $post->idPst)->where('default', 1)->first();
         //return view('site/main/single', [
        //     'post' => $post,
        //     'img'  => $img
        // ]);
    }

    public function contactcreate()
    {
        return view('site/main/contact');
    }

    public function servicescreate()
    {

        //$all_service
        //$all_service['fa']

        //$featured_work[$i]
        //$featured_work[$i]['title']
        //$featured_work[$i]['url']

        //$employee[$i]
        //$employee[$i]['name']
        //$employee[$i]['title']

        return view('site/main/services');
        $posts = Post::Where('idCat', 1)->get(); 
        $imgs = [];
        $total = count($posts);
        for ($i = 0; $i < $total; $i++)
        {
            $imgs[$i] =  Image::where('idPst', $posts[$i]->idPst)->where('default', 1)->first();
        }

        return view('site/main/services',  [
            'total' => $total,
            'posts' => $posts,
            'imgs'  => $imgs
        ]);
    }
    public function partenairescreate()
    {
        return view('site/main/partenaires');
        $posts = Post::Where('idCat', 4)->get(); /// idCat : id de categorie |||idCat = 1 : Services
        $imgs = [];
        $total = count($posts);
        for ($i = 0; $i < $total; $i++)
        {
            $imgs[$i] =  Image::where('idPst', $posts[$i]->idPst)->where('default', 1)->first();
        }

        return view('site/main/partenaires',  [
            'total' => $total,
            'post' => $posts,
            'img'  => $imgs
        ]);
    }

    public function eventscreate()
    {
        return view('site/main/events');
        $postss = Post::Where('idCat', 1)->get(); /// idCat : id de categorie |||idCat = 1 : Services
        $imgss = [];
        $totals = count($postss);
        for ($i = 0; $i < $totals; $i++)
        {
            $imgss[$i] =  Image::where('idPst', $postss[$i]->idPst)->where('default', 1)->first();
        }
        $posts = Post::Where('idCat', 3)->get(); /// idCat : id de categorie |||idCat = 1 : Evennements
        $imgs = [];
        $total = count($posts);
        for ($i = 0; $i < $total; $i++)
        {
            $imgs[$i] =  Image::where('idPst', $posts[$i]->idPst)->where('default', 1)->first();
        }

        return view('site/main/events',  [
            'total' => $total,
            'posts' => $posts,
            'imgs'  => $imgs,
            'totals' => $totals,
            'postss' => $postss,
            'imgss'  => $imgss
        ]);
    }

    public function actualitescreate()
    {

        return /*view('site/main/actualites')*/ redirect('/events');;
    }
    public function aboutcreate()
    {

        //$employee[$i]
        //$employee[$i]['name']
        //$employee[$i]['title']


        return view('site/main/about');

    }
    public function blogcreate()
    {
        // $post
        // $post[$i]['title']
        // $post[$i]['created_at']
        // $post[$i]['Comments']['Number']
        // $post[$i]['resume']
        return view('site/main/blog');


    }
    public function gallerycreate()
    {
        return view('site/main/gallery');
    }
}
