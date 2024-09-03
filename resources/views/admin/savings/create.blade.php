<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Savings') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-6 px-4">
        <form action="{{ route('savings.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="class_id" class="block text-gray-700">Id_Class</label>
                <input id="class_id" name="class_id" class="form-input mt-1 block w-full">
                @error('class_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input id="name" name="name" type="text" class="form-input mt-1 block w-full" required />
                @error('name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="role" class="block text-gray-700">Role</label>
                <input id="role" name="role" type="text" class="form-input mt-1 block w-full" required />
                @error('role')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700">
                Save
            </button>
        </form>
    </div>
</x-app-layout>
