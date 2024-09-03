<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight font-serif">
                {{ __('Data Siswa') }}
            </h2>

            <a href="{{ route('siswa.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700">
                Add New Class
            </a>
            
            
                    </div>
    </x-slot>

    <div class="container mx-auto mt-6 px-4">
        <div class="flex items-center justify-between py-4">
            <h1 class="text-2xl font-bold font-serif">Tabel Data Siswa</h1>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead class="bg-blue-500 border-b border-gray-200">
                    <tr>
                        <th class="py-3 px-4 text-center text-white">No</th>
                        <th class="py-3 px-4 text-center text-white">Nama Siswa</th>
                        <th class="py-3 px-4 text-center text-white">Kelas</th>
                        <th class="py-3 px-4 text-center text-white">Jurusan</th>
                        <th class="py-3 px-4 text-center text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($siswa as $nilai)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 text-center">
                            <td class="py-2 px-4 text-gray-700">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4 text-gray-700">{{ $nilai->nama }}</td>
                            <td class="py-2 px-4 text-gray-700">{{ $nilai->kelas }}</td>
                            <td class="py-2 px-4 text-gray-700">{{ $nilai->jurusan }}</td>
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
                                    Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-2 px-4 text-center text-gray-500">Tidak Ada Data Siswa</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
