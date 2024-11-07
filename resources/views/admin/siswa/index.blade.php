<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Data Siswa') }}
            </h2>

            <a href="{{ route('siswa.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700">
                Tambah Data Siswa
            </a>
        </div>
    </x-slot>

    <div class="container mx-auto mt-6 px-4">
        <div class="flex items-center justify-between py-4">
            <h1 class="text-2xl font-bold">Tabel Data Siswa</h1>
        </div>

        <div class="mb-6">
            <form method="GET" action="{{ route('siswa.index') }}">
                <div class="flex items-center">
                    <select name="kelas_jurusan" class="border rounded-lg px-4 py-2 w-64">
                        <option value="">Pilih Kelas dan Jurusan</option>
                        <option value="X-RPL" {{ request('kelas_jurusan') == 'X-RPL' ? 'selected' : '' }}>Kelas X - RPL</option>
                        <option value="X-TKJ" {{ request('kelas_jurusan') == 'X-TKJ' ? 'selected' : '' }}>Kelas X - TKJ</option>
                        <option value="X-TKKR" {{ request('kelas_jurusan') == 'X-TKKR' ? 'selected' : '' }}>Kelas X - TKKR</option>
                        <option value="X-TBSM" {{ request('kelas_jurusan') == 'X-TBSM' ? 'selected' : '' }}>Kelas X - TBSM</option>
                        <option value="XI-RPL" {{ request('kelas_jurusan') == 'XI-RPL' ? 'selected' : '' }}>Kelas XI - RPL</option>
                        <option value="XI-TKJ" {{ request('kelas_jurusan') == 'XI-TKJ' ? 'selected' : '' }}>Kelas XI - TKJ</option>
                        <option value="XI-TKKR" {{ request('kelas_jurusan') == 'XI-TKKR' ? 'selected' : '' }}>Kelas XI - TKKR</option>
                        <option value="XI-TBSM" {{ request('kelas_jurusan') == 'XI-TBSM' ? 'selected' : '' }}>Kelas XI - TBSM</option>
                        <option value="XII-RPL" {{ request('kelas_jurusan') == 'XII-RPL' ? 'selected' : '' }}>Kelas XII - RPL</option>
                        <option value="XII-TKJ" {{ request('kelas_jurusan') == 'XII-TKJ' ? 'selected' : '' }}>Kelas XII - TKJ</option>
                        <option value="XII-TKKR" {{ request('kelas_jurusan') == 'XII-TKKR' ? 'selected' : '' }}>Kelas XII - TKKR</option>
                        <option value="XII-TBSM" {{ request('kelas_jurusan') == 'XII-TBSM' ? 'selected' : '' }}>Kelas XII - TBSM</option>
                    </select>
        
                    <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700">Cari</button>
                </div>
            </form>
        </div>
       
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead class="bg-blue-700 border-b border-gray-200">
                    <tr>
                        <th class="py-3 px-4 text-center text-white">No</th>
                        <th class="py-3 px-4 text-center text-white">Nama Siswa</th>
                        <th class="py-3 px-4 text-center text-white">Kelas</th>
                        <th class="py-3 px-4 text-center text-white">Jurusan</th>
                        <th class="py-3 px-4 text-center text-white">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($siswa as $nilai)
                    <tr class="border-b border-gray-200 hover:bg-gray-50 text-center">
                        <td class="py-2 px-4 text-gray-700">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 text-gray-700">{{ $nilai->user->name }}</td>
                        <td class="py-2 px-4 text-gray-700">{{ $nilai->classes->name }}</td> 
                        <td class="py-2 px-4 text-gray-700">{{ $nilai->major->name }}</td>       
                            <td class="py-2 px-4 text-center">
                                <a href="{{ route('siswa.show', $nilai->id) }}" class="inline-block px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-green-600 transition duration-200">Detail</a>
                                
                                <a href="{{ route('siswa.edit', $nilai->id) }}" class="inline-block px-4 py-2 ml-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 transition duration-200">Edit</a>
                                
                                <form action="{{ route('siswa.destroy', $nilai->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit" 
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" 
                                        class="px-4 py-2 ml-2 text-white bg-red-500 rounded-lg hover:bg-red-600 transition duration-200"
                                    >
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-2 px-4 text-center text-gray-500">Tidak ada data siswa ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>