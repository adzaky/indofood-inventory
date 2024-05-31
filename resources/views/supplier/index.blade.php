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
          {{-- index supplier --}}
          <div class="container mx-auto p-8">
            <div class="flex justify-between items-center">
              <h1 class="text-3xl font-bold mb-2">All Suppliers</h1>
              @if (auth()->user()->role == 'admin')
              <a href="{{ route('supplier.create') }}" class="text-white">
                <button class="bg-blue-500 rounded px-4 py-2 hover:bg-blue-500/90">
                  Add Supplier
                </button>
              </a>
              @endif
            </div>

            <div class="overflow-x-scroll">
              <table id="dataTables" class="table-auto border-collapse w-full mt-4">
                <thead>
                  <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Contact</th>
                    <th class="border px-4 py-2">Address</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($suppliers as $supplier)
                  <tr class="text-center text-nowrap">
                    <td class="border px-4 py-2">
                      {{ $loop->iteration }}
                    </td>
                    <td class="border px-4 py-2">{{ $supplier->name }}</td>
                    <td class="border px-4 py-2">{{ $supplier->contact }}</td>
                    <td class="border px-4 py-2">{{ $supplier->address }}</td>
                    <td class="border px-4 py-2">{{ $supplier->email }}</td>
                    <td class="border px-4 py-2">
                      <form onsubmit="return confirm('Are You Sure?');"
                        action="{{ route('supplier.destroy', $supplier->id) }}" method="POST">
                        <a href="{{ route('supplier.show', $supplier->id) }}"
                          class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Show</a>
                        @if (auth()->user()->role == 'admin')
                        <a href="{{ route('supplier.edit', $supplier->id) }}"
                          class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                          class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Delete</button>
                        @endif
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="flex items-center justify-between">
              <span class="hidden text-sm sm:block"></span>
              <div class="flex-1 md:flex-none">
                {{ $suppliers->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>