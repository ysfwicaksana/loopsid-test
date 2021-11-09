<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Str;

use Carbon\Carbon;

class BlogController extends Controller
{
    function content_post(){

        $posts = Post::join('users','users.id','=','posts.user_id')->get(['posts.*','users.name','users.email']);
        
        $data = [];
        foreach($posts as $post) {

            array_push($data,[
                'id' => $post->id,
                'title' => $post->title,
                'slug' => $post->slug,
                'content' => Str::limit($post->content,50),
                'created_at' => Carbon::parse($post->created_at)->format('d-m-Y'),
                'updated_at' => Carbon::parse($post->updated_at)->format('d-m-Y'),
                'name' => $post->name,
                'email' => $post->email
            ]);
        }

        return view('pages.blog',['data' => $data]);


        // dd($data);
    }

    function read_more($slug) {


        $post = Post::join('users','users.id','=','posts.user_id')->where('slug',$slug)->get(['posts.*','users.email','users.name'])->first();
        
        $comments_user_regist = User::join('comments','comments.user_id','=','users.id')
                      ->join('posts','comments.post_id','=','posts.id')
                      ->where('posts.slug',$slug)
                      ->get(['users.name','users.email','comments.comment','comments.created_at']);


        $comments_user_not_regist = Comment::where('user_id',null)->get(['name','email','comment','created_at']);

        $data = [
            'id' => $post->id,
            'title' => $post->title,
            'slug' => $post->slug,
            'content' => $post->content,
            'created_at' => Carbon::parse($post->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::parse($post->updated_at)->format('d-m-Y'),
            'name' => $post->name,
            'email' => $post->email
        ];


        return view('pages.detail',['post' => $data, 'comments_user_regist' => $comments_user_regist, 'comments_user_not_regist' => $comments_user_not_regist]);

    }

    function user_list(){

        
         
        $users = User::join('comments','comments.user_id','=','users.id')->get(['users.*','comment']);

        dd($users);
    
    }

    function comment_guest(){

        $comment = Comment::where('user_id',null)->get();

        // dd($comment);

        return view('pages.blog');
    }
}
