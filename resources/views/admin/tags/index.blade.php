@extends('layouts.admin')
@section('content')
   {{-- Top Bar --}}
   {{-- Top Bar Ends --}}

   {{-- Content --}}
   {{-- Create button --}}
   <x-buttons.table-buttons :traits="[['name' => 'Create', 'route' => route('tag.create') ]]" />
   {{-- Create button Ends--}}
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
        <tr>
          <td class="p-4 font-medium whitespace-nowrap">Gary Barlow</td>
          <td class="p-4 whitespace-nowrap">(+44) 2819 450650</td>
          <td class="p-4 whitespace-nowrap">
            {{-- {{ route() }} --}}
            <x-buttons.table-actions :traits='[
                "show" => ["disabled" => "true"],
                "edit" => [ "onclick" => "goToRoute(`/`)"],
                "delete" => ["onclick" => "deleteTableItem(`dsfsdfdf`)"]
              ]' />
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  
   {{-- Content Ends --}}
@endsection