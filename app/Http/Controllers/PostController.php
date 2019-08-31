<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
//use App\Http\Controller;
use App\Http\Controllers\Controller;
use App\Model\Meta;
use App\Model\Post;
use App\Model\PostCategory;
//use App\Model\Tag;
//use App\Task;

class PostController extends Controller
{   

    public function index($id = null){
        $common = new CommonController;
		$nav = $common->common();  
		$category = PostCategory::where('published', 1)->orderBy('sort', 'asc')->get();
        $title = '最新消息';
        $count = 9;
		if($id){
			
			$posts = Post::where('published', 1)->where('category_id', $id)->with('category')->orderBy('publish_at', 'desc')->paginate($count);
			$title = count($posts)?$posts[0]->category->name:'最新消息';
			//return count($products);
		}else{
			$posts = Post::where('published', 1)->orderBy('publish_at', 'desc')->paginate($count);//->paginate(9);
		}
		
		$posts->setPath('news/'.$id);
		//return $posts;
		return view('front.post.index',
        	[
				'nav' => $nav,
				'title' => $title,
				'id' => $id,
				'category' => $category,
				'posts' => $posts,

        	]
        ); 
    }
	
	public function inner($id){
        $common = new CommonController;
		$nav = $common->common();  
        $post = Post::where('id', $id)->with('category')->first();
        
        $category = PostCategory::where('published', 1)->orderBy('sort', 'asc')->get();
        $nav['meta']->image = $post->cover;
        $nav['meta']->description = mb_substr(strip_tags($post->content), 0, 300, 'UTF-8');

        
    
		return view('front.post.inner',
        	[
        		'nav' => $nav,
               
                //'next' => $next,
                //'prev' => $prev,
				'category' => $category,
				'post' => $post,
        	]
        ); 
    }
	
}
