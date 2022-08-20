<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Get all blogs.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Blog $blogs)
    {
        $pagination = 10;
        // $blogs = Blog::select('id', 'name', 'image', 'updated_at')->paginate($pagination);
        // if($request)
        return view('admin.blogs.index', compact('blogs'));
    }
}
