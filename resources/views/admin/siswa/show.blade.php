<x-app-layout>
    <x-slot name="header">
        <div class="bg-blue-600 py-4 px-6 rounded-lg shadow-lg">
            <h2 class="text-3xl font-semibold text-white">{{ __('Data Siswa') }}</h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Add a back button or links for navigation -->
                    <div class="flex justify-between items-center mb-6">
                        <a href="{{ route('siswa.index') }}" class="text-blue-500 hover:underline font-medium">
                            &larr; Kembali ke Data Siswa
                        </a>
                        <a href="{{ route('siswa.edit', $siswa->id) }}" class="inline-block px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-green-600 transition duration-200">
                            Edit Data
                        </a>
                    </div>

                    <!-- Profile Card -->
                    <div class="bg-gray-50 border border-gray-200 rounded-lg shadow-md p-6">
                        <div class="flex items-center mb-4">
                            <!-- Optional: Add an avatar or icon -->
                            <!-- <img src="{{ asset('path/to/avatar.jpg') }}" alt="Avatar" class="w-16 h-16 rounded-full mr-4"> -->
                         
                                <ul>
                                    <li  class="text-2xl font-bold text-gray-900">{{ $siswa->nama }}</li>
                                    <li class="text-xl text-gray-700 mt-2">Kelas :{{ $siswa->kelas }}</li>
                                        <li  class="text-xl text-gray-700 mt-2">Jurusan :{{ $siswa->jurusan }}</li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
