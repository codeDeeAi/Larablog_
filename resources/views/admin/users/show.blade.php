@extends('layouts.admin')
@section('content')
    {{-- Content --}}
    {{-- Buttons --}}
    <x-buttons.table-buttons :traits="[
        [
            'name' => 'Back',
            'route' => route('users.index'),
            'class' => 'px-5 py-2.5 text-sm font-medium bg-gray-200 hover:bg-gray-100 rounded-md shadow',
        ],
    ]" />
    {{-- Buttons Ends --}}
    <div class="flex justify-center">
        <div class="w-full max-w-md p-4 rounded-md shadow sm:p-8 dark:bg-gray-900 dark:text-gray-100">
            {{-- Session --}}
            <x-alert.session-message />
            {{-- Session Message --}}
            <x-errors.form-error />
            <form action="" method="POST" class="space-y-8 ">
                <div class="space-y-4">
                    <div class="space-y-2">
                        <x-form.inputs.text name="first_name" id="first_name" label="First name" placeholder=""
                            value="{{ $user->first_name }}" :traits="[]" />
                        <x-form.inputs.text name="last_name" id="last_name" label="Last name" placeholder=""
                            value="{{ $user->last_name }}" :traits="[]" />
                        <x-form.inputs.text name="username" id="username" label="Username" placeholder=""
                            value="{{ $user->username }}" :traits="[]" />
                        <x-form.inputs.text name="email" id="email" label="Email" placeholder=""
                            value="{{ $user->email }}" :traits="[]" />
                        <x-form.inputs.text name="phone" id="phone" label="Phone" placeholder=""
                            value="{{ $user->phone }}" :traits="[]" />
                        <x-form.inputs.text name="user_type" id="user_type" label="User Type" placeholder=""
                            value="{{ $user->user_type }}" :traits="[]" />
                        <x-form.inputs.text name="role_id" id="role_id" label="Role" placeholder=""
                            value="{{ $user->role_id }}" :traits="[]" />
                        <x-form.inputs.text name="created_at" id="created_at" label="Created" placeholder=""
                            value="{{ $user->created_at }}" :traits="[]" />
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Content Ends --}}
@endsection
