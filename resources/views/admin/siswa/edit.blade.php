<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <x-input-label for="user_id" :value="__('User ID')" />
                            <select id="user_id" name="user_id" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required>
                                <option value="">Pilih User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kelas -->
                        <div class="mb-6">
                            <x-input-label for="class_id" :value="__('Kelas')" />
                            <select 
                                id="class_id" 
                                name="class_id" 
                                class="block mt-1 w-full border-gray-300 bg-gray-100 rounded-lg shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                                required
                            >
                                <option value="">Pilih Kelas</option>
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}" {{ old('class_id', $siswa->class_id) == $class->id ? 'selected' : '' }}>
                                        {{ $class->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('class_id')" class="mt-2" />
                        </div>

                        <!-- Jurusan -->
                        <div class="mb-6">
                            <x-input-label for="major_id" :value="__('Jurusan')" />
                            <select id="major_id"  name="major_id"  class="block mt-1 w-full border-gray-300 bg-gray-100 rounded-lg shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"required >
                                <option value="">Pilih Jurusan</option>
                                @foreach($majors as $major)
                                    <option value="{{ $major->id }}" {{ old('major_id', $siswa->major_id) == $major->id ? 'selected' : '' }}>
                                        {{ $major->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('major_id')" class="mt-2" />
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-3 bg-teal-700 font-bold text-white rounded-full mt-3 hover:bg-teal-800 transition">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
