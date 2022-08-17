@extends('layouts.user')
@section('content')
    <div class="max-w-screen-xl px-4 py-16 mx-auto sm:px-6 lg:px-8">
        <div class="max-w-lg mx-auto">
            <div class="w-full max-w-md p-4 rounded-md shadow sm:p-8 dark:bg-gray-900 dark:text-gray-100">
                {{-- Session --}}
                <x-alert.session-message />
                {{-- Session Message --}}
                <h2 class="mb-3 text-3xl font-semibold text-center">Login to your account</h2>
                <p class="text-sm text-center dark:text-gray-400">Dont have account?
                    <a href="{{ route('register') }}" rel="noopener noreferrer" class="focus:underline hover:underline">Sign up here</a>
                </p>
                <div class="my-6 space-y-4">
                    @if (request()->get('type') == 'username')
                        <a aria-label="Login with username" href="{{ route('login', ['type' => 'email']) }}"
                            class="flex items-center justify-center w-full p-4 space-x-4 border rounded-md focus:ring-2 focus:ring-offset-1 dark:border-gray-400 focus:ring-violet-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <p>Login with Email</p>
                        </a>
                    @else
                        <a aria-label="Login with username" href="{{ route('login', ['type' => 'username']) }}"
                            class="flex items-center justify-center w-full p-4 space-x-4 border rounded-md focus:ring-2 focus:ring-offset-1 dark:border-gray-400 focus:ring-violet-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <p>Login with Username</p>
                        </a>
                    @endif
                </div>
                <div class="flex items-center w-full my-4">
                    <hr class="w-full dark:text-gray-400">
                    <p class="px-3 dark:text-gray-400">OR</p>
                    <hr class="w-full dark:text-gray-400">
                </div>
                <x-errors.form-error />
                <form novalidate="" action="{{ route('login') }}" method="POST"
                    class="space-y-8 ng-untouched ng-pristine ng-valid">
                    @csrf
                    <div class="space-y-4">
                        @if (request()->get('type') == 'username')
                            <div class="space-y-2">
                                <x-form.inputs.text name="username" id="username" label="Username" placeholder="JohnDoe" :traits="[]" />
                            </div>
                        @else
                            <div class="space-y-2">
                                <x-form.inputs.email name="email" id="email" label="Email address"
                                    :traits="[]" />
                            </div>
                        @endif
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <label for="password" class="text-sm">Password</label>
                                <a rel="noopener noreferrer" href="#"
                                    class="text-xs hover:underline dark:text-gray-400">Forgot password?</a>
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
