<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profil Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Informasi Siswa</h3>
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md mb-4">

                        <a href="{{ route('profile.pdf', $siswa->id) }}" 
                            class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700 mb-4 inline-block">
                             Download PDF
                         </a>
                        <tr>
                            <th class="px-6 py-3 text-left text-gray-600">Nama</th>
                            <td class="px-6 py-3">{{ $siswa->user->name }}</td>
                        </tr>
                        <tr>
                            <th class="px-6 py-3 text-left text-gray-600">Kelas</th>
                            <td class="px-6 py-3">{{ $siswa->classes->name ?? 'Tidak ada data' }}</td>
                        </tr>
                        <tr>
                            <th class="px-6 py-3 text-left text-gray-600">Jurusan</th>
                            <td class="px-6 py-3">{{ $siswa->major->name ?? 'Tidak ada data' }}</td> 
                        </tr>

                    </table>

                    <h3 class="text-lg font-bold mb-4">Tabungan Siswa</h3>
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md mb-4">
                        <thead class="bg-blue-500 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-white">Tanggal</th>
                                <th class="px-6 py-3 text-left text-white">Setoran</th>
                                <th class="px-6 py-3 text-left text-white">Saldo</th>
                                <th class="px-6 py-3 text-left text-white">Catatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($siswa->savings ?? [] as $saving)
                                <tr class="border-b">
                                    <td class="px-6 py-4">{{ $saving->date }}</td>
                                    <td class="px-6 py-4">Rp. {{ number_format($saving->deebit, 2) }}</td>
                                    <td class="px-6 py-4">Rp. {{ number_format($saving->saldo, 2) }}</td>
                                    <td class="px-6 py-4">{{ $saving->note }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-2 px-4 text-center text-gray-500">Belum ada tabungan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
