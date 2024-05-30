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
          {{-- create supplier --}}
          <div class="container mx-auto mt-5 mb-5">
            <div class="shadow-sm rounded-md p-5">
              <form action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="mb-4">
                  <label class="font-semibold">Name</label>
                  <input type="text"
                    class="p-2 w-full mt-1 rounded-md @error('name') border-2 border-red-500 @enderror" name="name"
                    value="{{ old('name') }}" placeholder="Supplier name">

                  <!-- error message untuk name -->
                  @error('name')
                  <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-4">
                  <label class="font-semibold">Contact</label>
                  <input type="text"
                    class="p-2 w-full mt-1 rounded-md @error('contact') border-2 border-red-500 @enderror" name="contact"
                    value="{{ old('contact') }}" placeholder="Supplier contact">

                  <!-- error message untuk contact -->
                  @error('contact')
                  <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-4">
                  <label class="font-semibold">Address</label>
                  <input type="text"
                    class="p-2 w-full mt-1 rounded-md @error('address') border-2 border-red-500 @enderror" name="address"
                    value="{{ old('address') }}" placeholder="Supplier address">

                  <!-- error message untuk address -->
                  @error('address')
                  <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-4">
                  <label class="font-semibold">Email</label>
                  <input type="email"
                    class="p-2 w-full mt-1 rounded-md @error('email') border-2 border-red-500 @enderror" name="email"
                    value="{{ old('email') }}" placeholder="Supplier email">

                  <!-- error message untuk email -->
                  @error('email')
                  <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mt-4">
                  <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
                  <a href="{{ route('supplier.index') }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Back</a>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>