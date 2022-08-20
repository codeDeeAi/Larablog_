@extends('layouts.admin')
@section('content')
    {{-- Content --}}
    {{-- Buttons --}}
    <x-buttons.table-buttons :traits="[
        [
            'name' => 'Back',
            'route' => route('tag.index'),
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
            <form novalidate="" action="{{ route('user.admin.store') }}" method="POST"
                class="space-y-8 ng-untouched ng-pristine ng-valid">
                @csrf
                <div class="space-y-4">
                    <div class="space-y-2">
                        <x-form.inputs.text name="first_name" id="first_name" label="First Name" placeholder="John" :traits="['required']" />
                    </div>
                    <div class="space-y-2">
                        <x-form.inputs.text name="last_name" id="last_name" label="Last Name" placeholder="Doe" :traits="['required']" />
                    </div>
                    <div class="space-y-2">
                        <x-form.inputs.text name="username" id="username" label="Username" placeholder="JohnDoe" :traits="['required']" />
                    </div>
                    <div class="space-y-2">
                        <x-form.inputs.email name="email" id="email" label="Email address" :traits="['required']" />
                    </div>
                    <div class="space-y-2">
                        <x-form.inputs.text name="phone" id="phone" label="Phone Number" placeholder="234-703-***" :traits="['required']" />
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <label for="password" class="text-sm">Password</label>
                        </div>
                        <x-form.inputs.password name="password" id="password" :traits="['required']" />
                    </div>
                </div>
                <button type="submit" class="w-full px-8 py-3 font-semibold rounded-md text-white btn-primary">Create</button>
            </form>
        </div>
    </div>

    {{-- Content Ends --}}
@endsection
