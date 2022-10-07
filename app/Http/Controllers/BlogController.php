<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Returns Blog
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $blog_slug)
    {
        $blog = Blog::where('slug', $blog_slug)->findOrFail();
        return view('user.home', []);
    }
}
