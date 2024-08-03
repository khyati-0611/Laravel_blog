<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:500',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        auth()->user()->blogs()->create($request->all());

        return redirect()->route('dashboard')->with('success','Blog post Created Successfully.');
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:500',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $blog->update($request->all());

        return redirect()->route('dashboard')->with('success','Blog post Updated Successfully.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('dashboard')->with('success','Blog post Deleted Successfully.');
    }
}
