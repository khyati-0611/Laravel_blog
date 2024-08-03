<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('user_id',auth()->id())->latest()->get();
        return view('dashboard', compact('blogs'));
    }
}
