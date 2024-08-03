<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $blogs = Blog::with('user:id,name,email')->withCount('comments')->whereNotNull('user_id')->get();
        return view('welcome',compact('blogs'));
    }
    public function checkLogin(Request $request)
    {
        if (Auth::check()) {
            $auth = Auth::id();
            $comments = Comment::with('user:id,name')->where('blog_id',$request->id)->get();
            return response()->json(['loggedIn' => true, 'data' => $comments]);
        } else {
            return response()->json(['loggedIn' => false]);
        }
    }
}
