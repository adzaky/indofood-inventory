<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Suppliers') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          {{-- show supplier --}}
          <div class="container h-full m-auto p-6">
            <div class="mb-4">
              <p class="text-gray-600 font-semibold">ID:</p>
              <p class="text-lg">{{ $supplier->id }}</p>
            </div>
            <div class="mb-4">
              <p class="text-gray-600 font-semibold">Name:</p>
              <p class="text-lg">{{ $supplier->name }}</p>
            </div>
            <div class="mb-4">
              <p class="text-gray-600 font-semibold">Contact:</p>
              <p class="text-lg">{{ $supplier->contact }}</p>
            </div>
            <div class="mb-4">
              <p class="text-gray-600 font-semibold">Address:</p>
              <p class="text-lg">{{ $supplier->address }}</p>
            </div>
            <div class="mb-4">
              <p class="text-gray-600 font-semibold">Email:</p>
              <p class="text-lg">{{ $supplier->email }}</p>
            </div>
            <div class="mb-4">
              <p class="text-gray-600 font-semibold">Created By:</p>
              <p class="text-lg">{{ $supplier->createdBy->name }}</p>
            </div>
            <div class="mb-4">
              <p class="text-gray-600 font-semibold">Updated By:</p>
              <p class="text-lg">{{ $supplier->updatedBy->name }}</p>
            </div>
            <div class="mb-4">
              <p class="text-gray-600 font-semibold">Created At:</p>
              <p class="text-lg">{{ \Carbon\Carbon::parse($supplier->created_at)->format('d M Y') }}</p>
            </div>
            <div class="mb-4">
              <p class="text-gray-600 font-semibold">Updated At:</p>
              <p class="text-lg">{{ \Carbon\Carbon::parse($supplier->updated_at)->format('d M Y') }}</p>
            </div>
            <div class="mb-4">
              @if (auth()->user()->role == 'admin')
              <a href="{{ route('supplier.edit', $supplier->id) }}"
                class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Edit</a>
              @endif
              <a href="{{ route('supplier.index') }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Back</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>