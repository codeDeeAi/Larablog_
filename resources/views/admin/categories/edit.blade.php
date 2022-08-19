@extends('layouts.admin')
@section('content')
    {{-- Content --}}
    {{-- Buttons --}}
    <x-buttons.table-buttons :traits="[
        [
            'name' => 'Back',
            'route' => route('category.index'),
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
            <form action="{{ route('category.update', ['category' => $category->id]) }}" method="POST"
                class="space-y-8 ">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="space-y-4">
                    <div class="space-y-2">
                        <x-form.inputs.text name="name" id="name" label="Name" placeholder="e.g fiction"
                            value="{{ $category->name }}" :traits="[]" />
                    </div>
                </div>
                <button type="submit"
                    class="w-full px-8 py-3 font-semibold rounded-md text-white btn-primary">Update</button>
            </form>
        </div>
    </div>

    {{-- Content Ends --}}
@endsection
