<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Class') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('classes.update', $classes->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        
                        <div class="mb-4">
                            <label for="major" class="block text-gray-700">Major</label>
                            <select id="major" name="major_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                @foreach ($majors as $major)
                                    <option value="{{ $major->id }}" {{ old('major', $classes->major_id) == $major->id ? 'selected' : '' }}>
                                        {{ $major->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('major')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="user" class="block text-gray-700">User</label>
                            <select id="user" name="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">Select User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user', $classes->user_id) == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Name</label>
                            <input id="name" name="name" type="text" value="{{ $classes->name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-gray-700">Description</label>
                            <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ $classes->description }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button class="px-4 py-3 bg-teal-700 font-bold text-white rounded-full mt-3">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
