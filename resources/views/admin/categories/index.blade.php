@extends('layouts.admin')
@section('content')
    {{-- Top Bar --}}
    {{-- Top Bar Ends --}}

    {{-- Content --}}
    {{-- Buttons --}}
    <div class="flex justify-between">
        <x-buttons.table-buttons :traits="[['name' => 'Create', 'route' => route('category.create')]]" />
        <x-search.form-search-with-filters id="admin_tags_search" route="{{ route('category.index') }}" :filters="[
            'name' => 'name',
            'Date' => 'created_at',
        ]" />
    </div>
    {{-- Buttons Ends --}}
    {{-- Session --}}
    <x-alert.session-message />
    {{-- Session Message --}}
    <div class="border rounded-lg overflow-x-auto">
        <table class="min-w-full text-sm divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4 font-bold text-left whitespace-nowrap">
                        <div class="flex items-center">
                            Name
                        </div>
                    </th>
                    <th class="p-4 font-bold text-left whitespace-nowrap">
                        <div class="flex items-center">
                            Last Updated
                        </div>
                    </th>
                    <th class="p-4 font-bold text-left whitespace-nowrap">
                        <div class="flex items-center">
                            {{-- Handle --}}
                        </div>
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                @foreach ($categories as $category)
                    <tr>
                        <td class="p-4 font-medium whitespace-nowrap">{{ $category->name }}</td>
                        <td class="p-4 whitespace-nowrap">{{ $category->updated_at }}</td>
                        <td class="p-4 whitespace-nowrap">
                            <x-buttons.table-actions :traits="[
                                'show' => ['disabled' => 'true'],
                                'edit' => ['event' => 'onclick'],
                                'delete' => ['event' => 'onclick'],
                            ]"
                                editEvent="goToRoute('{{ route('category.edit', ['category' => $category->id]) }}')"
                                deleteEvent="deleteTableItem('{{ 'category_delete_form_' . $category->id }}')" />
                            <x-form.delete-form route="{{ route('category.destroy', ['category' => $category->id]) }}"
                                id="{{ 'category_delete_form_' . $category->id }}" method="DELETE" :fields="[]" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="py-2 flex justify-end">
            {{ $categories->links() }}
        </div>
    </div>

    {{-- Content Ends --}}
@endsection
