<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Users') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          {{-- index user --}}
          <div class="container mx-auto p-8">
            <div class="flex justify-between items-center">
              <h1 class="text-3xl font-bold mb-2">All Users</h1>
              @if (auth()->user()->role === 'admin')
              <a href="{{ route('user.create') }}" class="text-white">
                <button class="bg-blue-500 rounded px-4 py-2 hover:bg-blue-500/90">
                  Add User
                </button>
              </a>
              @endif
            </div>
        
            <div class="overflow-x-scroll">
              <table id="dataTables" class="table-auto border-collapse w-full mt-4">
                <thead>
                  <tr class="text-center">
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Role</th>
                    @if (auth()->user()->role === 'admin')
                    <th class="border px-4 py-2">Action</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                  <tr class="text-center">
                    <td class="border px-4 py-2">
                      {{ $loop->iteration }}
                    </td>
                    <td class="border px-4 py-2">{{ $user->name }}</td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                    <td class="border px-4 py-2">{{ ucwords($user->role) }}</td>
                    @if (auth()->user()->role === 'admin')
                    <td class="border px-4 py-2">
                      <form onsubmit="return confirm('Are You Sure?');" action="{{ route('user.destroy', $user->id) }}"
                        method="POST">
                        <a href="{{ route('user.show', $user->id) }}"
                          class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Show</a>
                        <a href="{{ route('user.edit', $user->id) }}"
                          class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                          class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Delete</button>
                      </form>
                    </td>
                    @endif
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            {{ $users->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>