<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Savings List') }}
            </h2>
            @if(auth()->user()->role !== 'student')
                <a href="{{ route('savings.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700">
                    Tambah Tabungan
                </a>
            @endif
        </div>
    </x-slot>

    <div class="container mx-auto mt-6 px-4">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead class="bg-blue-700 border-b border-gray-200">
                    <tr>
                        <th class="py-3 px-4 text-center text-white">No</th>
                        {{-- <th class="py-3 px-4 text-center text-white">Nama Siswa</th> --}}
                        <th class="py-3 px-4 text-center text-white">User</th>
                        <th class="py-3 px-4 text-center text-white">Date</th>
                        <th class="py-3 px-4 text-center text-white">Setoran</th>
                        <th class="py-3 px-4 text-center text-white">Saldo</th>
                        <th class="py-3 px-4 text-center text-white">Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($savings as $savingsItem)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 text-center">
                            <td class="py-2 px-4 text-gray-700">{{ $loop->iteration }}</td>
                            {{-- <td class="py-2 px-4 text-gray-700">{{ $savingsItem->siswa ? $savingsItem->siswa->nama : 'No name assigned' }}</td>  --}}
                            <td class="py-2 px-4 text-gray-700">
                                {{ $savingsItem->user ? $savingsItem->user->name : 'No user assigned' }}
                            </td>
                           
                            <td class="py-2 px-4 text-gray-700">{{ $savingsItem->date }}</td>
                            <td class="py-2 px-4 text-gray-700">{{ number_format($savingsItem->deebit, 2) }}</td>
                            <td class="py-2 px-4 text-gray-700">{{ number_format($savingsItem->saldo, 2) }}</td>
                            <td class="py-2 px-4 text-gray-700">{{ $savingsItem->note ?? 'Tidak ada catatan' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-2 px-4 text-center text-gray-500">No savings found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
