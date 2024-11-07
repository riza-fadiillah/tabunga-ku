<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Input Nama -->
                        <div class="mb-4">
                            <x-input-label for="nama" :value="__('Nama Lengkap')" />
                            <x-text-input id="nama" name="nama" type="text" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required />
                            @error('nama')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Input Email -->
                        <div class="mb-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required />
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Input Password -->
                        <div class="mb-4">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" name="password" type="password" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required />
                            @error('password')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Dropdown Pilih Kelas -->
                        <div class="mb-4">
                            <x-input-label for="class_id" :value="__('Kelas')" />
                            <select id="class_id" name="class_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                <option value="">Pilih Kelas</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>
                                        {{ $class->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('class_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Dropdown Pilih Jurusan -->
                        <div class="mb-4">
                            <x-input-label for="major_id" :value="__('Jurusan')" />
                            <select id="major_id" name="major_id" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required>
                                <option value="">Pilih Jurusan</option>
                                @foreach($majors as $major)
                                    <option value="{{ $major->id }}" {{ old('major_id') == $major->id ? 'selected' : '' }}>
                                        {{ $major->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('major_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Tombol Simpan -->
                        <div class="flex justify-end">
                            <button class="px-4 py-3 bg-teal-700 font-bold text-white rounded-full mt-3 hover:bg-teal-800 transition">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
