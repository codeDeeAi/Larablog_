<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Get all users.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 10;
        $users = User::select(
            'id',
            'username',
            'email',
            'first_name',
            'last_name',
            'phone',
            'user_type',
            'role_id',
            'created_at'
        )->paginate($pagination);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Create Admin User Page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.users.create');
    }

    /**
     * Create Admin User.
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
        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    /**
     * Show User Page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $user)
    {
        $user = User::select(
            'id',
            'username',
            'email',
            'first_name',
            'last_name',
            'phone',
            'user_type',
            'role_id',
            'created_at'
        )->findOrFail($user);
        return view('admin.users.show', compact('user'));
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
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
