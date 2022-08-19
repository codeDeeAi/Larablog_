<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Get all tags.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 10;
        $tags = Tag::select('id', 'name', 'updated_at')->paginate($pagination);
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Create Tag Page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.tags.create');
    }

    /**
     * Create Tag.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:tags,name,except,id|string|max:35'
        ]);

        Tag::create([
            'name' => $request->name
        ]);

        // Return with success message
        return redirect()->route('tag.index')->with('success', 'Tag created successfully!');
    }

    /**
     * Edit Tag Page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $tag)
    {
        $tag = Tag::select('id', 'name')->findOrFail($tag);
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update Tag.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tag)
    {
        $this->validate($request, [
            'name' => 'required|unique:tags,name,except,id|string|max:35'
        ]);
        
        $tag = Tag::findOrFail($tag);
        $tag->update([
            'name' => $request->name
        ]);
        
        // Return with success message
        return redirect()->route('tag.index')->with('success', 'Tag updated successfully!');
    }

    /**
     * Delete Tag.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $tag)
    {
        $tag = Tag::findOrFail($tag);
        $tag->delete();

        // Return with success message
        return redirect()->route('tag.index')->with('success', 'Tag deleted successfully!');
    }
}
