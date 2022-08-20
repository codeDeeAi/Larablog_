@extends('layouts.admin')
@section('content')
    {{-- Top Bar --}}
    {{-- Top Bar Ends --}}

    {{-- Content --}}
    {{-- Buttons --}}
    <x-buttons.table-buttons :traits="[['name' => 'Create', 'route' => route('tag.create')]]" />
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
                @foreach ($tags as $tag)
                    <tr>
                        <td class="p-4 font-medium whitespace-nowrap">{{ $tag->name }}</td>
                        <td class="p-4 whitespace-nowrap">{{ $tag->updated_at }}</td>
                        <td class="p-4 whitespace-nowrap">
                            <x-buttons.table-actions :traits="[
                                'show' => ['disabled' => 'true'],
                                'edit' => ['event' => 'onclick'],
                                'delete' => ['event' => 'onclick'],
                            ]"
                                editEvent="goToRoute('{{ route('tag.edit', ['tag' => $tag->id]) }}')"
                                deleteEvent="deleteTableItem('{{ 'tag_delete_form_' . $tag->id }}')" />
                            <x-form.delete-form route="{{ route('tag.destroy', ['tag' => $tag->id]) }}"
                                id="{{ 'tag_delete_form_' . $tag->id }}" method="DELETE" :fields="[]" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="py-2 flex justify-end">
            {{ $tags->links() }}
        </div>
    </div>

    {{-- Content Ends --}}
@endsection
