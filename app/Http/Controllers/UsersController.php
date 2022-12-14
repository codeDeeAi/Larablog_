<?php

namespace App\Http\Controllers;

use App\Enums\UserTypesEnum;
use App\Http\Requests\createUserRequest;
use App\Models\Tag;
use App\Models\User;
use App\Services\SearchableHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Get all users.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $users)
    {
        $pagination = 10;
        $searchable = new SearchableHelper($users, $request, 'username');
        $users = $searchable->search();

        $users = $users->select(
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
    public function store(createUserRequest $request)
    {
        User::create([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'user_type' => UserTypesEnum::ADMIN,
            'email' => $request->email,
            'password' => Hash::make($request->password)
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
