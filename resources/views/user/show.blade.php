<x-app-layout>
  <x-slot name="header">
    <h2 class=text-xl text-gray-800 leading-tight">
      {{ __('Users') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm p-6 sm:rounded-lg">
        <div class="text-gray-900">
          {{-- show user --}}
          <div class="container mx-auto">
            <h2 class="text-xl font-bold mb-4">User ID #{{ $user->id }}</h2>
            <div class="mb-4">
              <p class="text-gray-600">Name:</p>
              <p class="text-lg">{{ $user->name }}</p>
            </div>
            <div class="mb-4">
              <p class="text-gray-600">Email:</p>
              <p class="text-lg">{{ $user->email }}</p>
            </div>
            <div class="mb-4">
              <p class="text-gray-600">Role:</p>
              <p class="text-lg">{{ ucwords($user->role) }}</p>
            </div>
            <div class="mb-4">
              <a href="{{ route('user.edit', $user->id) }}"
                class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Edit</a>
              <a href="{{ route('user.index') }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Back</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>