<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Tabungan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('savings.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- <input type="hidden" name="siswa_id" value="{{ $siswa->id }}"> --}}
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">   

                        <select id="user" name="siswa_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="">Pilih Nama Siswa</option>
                            @foreach ($siswa as $sis)
                                <option value="{{ $sis->id }}" {{ old('siswa_id') == $sis->id ? 'selected' : '' }}>
                                    {{ $sis->user->name ?? $sis->nama }} <!-- Gunakan field 'nama' jika ada -->
                                </option>
                            @endforeach
                        </select>

                        <div class="mb-4">
                            <label for="date" class="block text-gray-700">Tanggal</label>
                            <input id="date" name="date" type="date" value="{{ date('Y-m-d') }}" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                            @error('date')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="deebit" class="block text-gray-700">Setoran</label>
                            <input id="deebit" name="deebit" type="number" step="0.01" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                            @error('deebit')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="note" class="block text-gray-700">Catatan</label>
                            <textarea id="note" name="note" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm" rows="3"></textarea>
                            @error('note')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="px-4 py-3 bg-teal-700 font-bold text-white rounded-full mt-6 hover:bg-teal-600 transition">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>