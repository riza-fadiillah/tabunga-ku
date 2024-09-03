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

                        <div class="mb-6">
                            <x-input-label for="nama" :value="__('Nama')" />
                            <x-text-input id="nama" class="block mt-1 w-full border-gray-300 bg-gray-1
                            `0 rounded-lg shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="text" name="nama" value="{{ old('nama', $siswa->nama) }}" required />
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="kelas" :value="__('Kelas')" />
                            <x-text-input id="kelas" class="block mt-1 w-full border-gray-300 bg-gray-100 rounded-lg shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="text" name="kelas" value="{{ old('kelas', $siswa->kelas) }}" required />
                            <x-input-error :messages="$errors->get('kelas')" class="mt-2" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="jurusan" :value="__('Jurusan')" />
                            <x-text-input id="jurusan" class="block mt-1 w-full border-gray-300 bg-gray-100 rounded-lg shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="text" name="jurusan" value="{{ old('jurusan', $siswa->jurusan) }}" required />
                            <x-input-error :messages="$errors->get('jurusan')" class="mt-2" />
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-3 bg-teal-700 font-bold text-white rounded-full mt-3">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
