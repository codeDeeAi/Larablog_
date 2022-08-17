@extends('layouts.user')
@section('content')
    <div class="max-w-screen-xl px-4 py-16 mx-auto sm:px-6 lg:px-8">
        <div class="max-w-lg mx-auto">
            <div class="w-full max-w-md p-4 rounded-md shadow sm:p-8 dark:bg-gray-900 dark:text-gray-100">
                <h2 class="mb-3 text-3xl font-semibold text-center">Create a new account</h2>
                <p class="text-sm text-center dark:text-gray-400">Already have an account?
                    <a href="{{ route('login') }}" rel="noopener noreferrer" class="focus:underline hover:underline">Login
                        here</a>
                </p>
                <x-errors.form-error />
                <form novalidate="" action="{{ route('register') }}" method="POST"
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
                    <button type="submit" class="w-full px-8 py-3 font-semibold rounded-md text-white btn-primary">Sign
                        in</button>
                </form>
            </div>
        </div>
    </div>
@endsection
