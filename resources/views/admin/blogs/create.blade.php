@extends('layouts.admin')
@section('content')
    {{-- Content --}}
    {{-- Buttons --}}
    <x-buttons.table-buttons :traits="[
        [
            'name' => 'Back',
            'route' => route('admin.blogs.index'),
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
            <form novalidate="" action="{{ route('admin.blogs.store') }}" method="POST" class="space-y-8">
                @csrf
                <div class="space-y-4">
                    <div class=" grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <x-form.inputs.date name="date" id="date" label="Date" :traits="[]" />
                        </div>
                        <div class="space-y-2">
                            <x-form.inputs.select name="is_published" id="is_published" label="Publish" :traits="[]" :options="['Yes'=> true,'No'=> false]" isBool="{{ true }}" />
                        </div>
                    </div>
                    <div class="space-y-2">
                        <x-form.inputs.select name="categories" id="categories" label="Categories" :traits="['multiple' => true]" :options="$categories"  />
                    </div>
                    <div class="space-y-2">
                        <x-form.inputs.select name="tags" id="tags" label="Tags" :traits="['multiple' => true]" :options="$tags"  />
                    </div>
                    <div class="space-y-2">
                        <x-form.inputs.text name="title" id="title" label="Title" placeholder="e.g fiction"
                            :traits="[]" />
                    </div>
                    <div class="space-y-2">
                        <x-form.inputs.text-area name="summary" id="summary" label="Summary" placeholder="Summary"
                            :traits="[]" />
                    </div>
                    <div class="space-y-2">
                        <x-form.inputs.blog-content name="content" label="Blog Post" 
                            :traits="[]" />   
                    </textarea>
                    </div>
                </div>
                <button type="submit"
                    class="w-full px-8 py-3 font-semibold rounded-md text-white btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
