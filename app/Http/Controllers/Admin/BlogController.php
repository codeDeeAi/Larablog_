<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserTypesEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\createBlogRequest;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\Category;
use App\Models\Tag;
use App\Services\SearchableHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

        $blogs = $blogs->with(['categories', 'tags'])->join('users', 'blogs.user_id', '=', 'users.id')
                        ->join('categories_list', 'blogs.categories.blog_id', '=', 'categories.blog_id')
                        // ->join('tags', 'blogs.id', '=', 'tags.blog_id')
                        ;

                        dd($blogs->get());
        $searchable = new SearchableHelper($blogs, $request, 'title');
        $blogs = $searchable->search();
        $blogs = $blogs->select('blogs.*', 'users.*', 'tags.name', 'categories.name')->paginate($pagination);
        // if($request)
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Create A Blog Post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::pluck('id', 'name');
        $tags = Tag::pluck('id', 'name');

        return view('admin.blogs.create', compact('tags', 'categories'));
    }

    /**
     * Store a Blog Post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createBlogRequest $request)
    {
        DB::beginTransaction();
        try {
            $slug = create_blog_slug($request->title);
            $blog = Blog::create([
                'user_id' => auth()->user()->id,
                'date' => $request->date,
                'title' => $request->title,
                'slug' => $slug,
                'is_published' => $request->is_published,
                'summary' => $request->summary,
                'content' => $request->content
            ]);

            foreach ($request->tags as $key => $value) {
                BlogTag::create(['blog_id' => $blog->id, 'tag_id' => $value]);
            }
            foreach ($request->categories as $key => $value) {
                BlogCategory::create(['blog_id' => $blog->id, 'category_id' => $value]);
            }

            DB::commit();

            // Return with success message
            if(auth()->user()->user_type->value === UserTypesEnum::ADMIN->value){
                return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully!');
            } else {
                return redirect()->route('/')->with('success', 'Blog created successfully!');
            }
            
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('error', json_encode($th, true));
        }
    }
}
