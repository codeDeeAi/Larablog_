@extends('layouts.admin')
@section('content')
    {{-- Top Bar --}}
    {{-- Top Bar Ends --}}

    {{-- Content --}}
    {{-- Buttons --}}
    <x-buttons.table-buttons :traits="[['name' => 'Create', 'route' => route('user.admin.create')]]" />
    {{-- Buttons Ends --}}
    {{-- Session --}}
    <x-alert.session-message />
    {{-- Session Message --}}
    <div class="border rounded-lg overflow-x-auto">
        <table class="min-w-full text-sm divide-y divide-gray-200">
            <thead class="bg-gray-100">
                @php
                    $table_headers = ['username', 'email', 'name', 'phone', 'user type', 'role', 'created'];
                @endphp
                <tr>
                    @foreach ($table_headers as $header)
                        <th class="p-4 font-bold text-left whitespace-nowrap">
                            <div class="flex items-center capitalize">
                                {{ $header }}
                            </div>
                        </th>
                    @endforeach
                    <th class="p-4 font-bold text-left whitespace-nowrap">
                        <div class="flex items-center">
                            {{-- Handle --}}
                        </div>
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                @foreach ($users as $user)
                    <tr>
                        <td class="p-4 font-medium whitespace-nowrap">{{ $user->username }}</td>
                        <td class="p-4 font-medium whitespace-nowrap">{{ $user->email }}</td>
                        <td class="p-4 whitespace-nowrap">{{ $user->first_name . ' ' . $user->last_name }}</td>
                        <td class="p-4 font-medium whitespace-nowrap">{{ $user->phone }}</td>
                        <td class="p-4 whitespace-nowrap">
                            @switch($user->user_type)
                                @case(\App\Enums\UserTypesEnum::ADMIN->value)
                                    <strong
                                        class="inline-flex items-center border border-blue-500 text-blue-500 border-current uppercase px-5 py-1.5 rounded-full text-[10px] tracking-wide">
                                        {{ \App\Enums\UserTypesEnum::ADMIN->name }}
                                    </strong>
                                @break

                                @default
                                    <strong
                                        class="inline-flex items-center border border-teal-500 text-teal-500 border-current uppercase px-5 py-1.5 rounded-full text-[10px] tracking-wide">
                                        {{ \App\Enums\UserTypesEnum::USER->name  }}
                                    </strong>
                            @endswitch
                        </td>
                        <td class="p-4 font-medium whitespace-nowrap">{{ $user->role_id }}</td>
                        <td class="p-4 whitespace-nowrap">{{ $user->created_at }}</td>
                        <td class="p-4 whitespace-nowrap">
                            <x-buttons.table-actions :traits="[
                                'show' => ['event' => 'onclick'],
                                'edit' => ['disabled' => 'true'],
                                'delete' => ['event' => 'onclick'],
                            ]"
                                showEvent="goToRoute('{{ route('users.show', ['user' => $user->id]) }}')"
                                deleteEvent="deleteTableItemWithPrompt('{{ json_encode(['formId' => 'users_delete_form_' . $user->id,'compareValue' => $user->email ]) }}')" />
                            <x-form.delete-form route="{{ route('users.destroy', ['user' => $user->id]) }}"
                                id="{{ 'users_delete_form_' . $user->id }}" method="DELETE" :fields="[]" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="py-2 flex justify-end">
            {{ $users->links() }}
        </div>
    </div>

    {{-- Content Ends --}}
@endsection
