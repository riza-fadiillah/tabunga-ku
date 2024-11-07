<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1: Total Siswa -->
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-lg font-medium">Total Data Siswa</h3>
                    <p class="text-2xl font-bold text-blue-600">{{$totalsiswa}}</p>
                </div>

                <!-- Card 2: Total Majors -->
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-lg font-medium">Total Majors</h3>
                    <p class="text-2xl font-bold text-green-600">{{$totalmajors}}</p>
                </div>

                <!-- Card 3: Total Classes -->
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-lg font-medium">Total Classes</h3>
                    <p class="text-2xl font-bold text-purple-600">{{$totalclasses}}</p>
                  
                </div>

                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-lg font-medium">Total User</h3>
                    <p class="text-2xl font-bold text-purple-600">{{$totaluser}}</p>
                </div>

                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-lg font-medium">Total Savings</h3>
                    <p class="text-2xl font-bold text-purple-600">{{$totalsavings}}</p>
                </div>
            </div>

            <!-- <div class="mt-8">
                <h2 class="text-xl font-semibold text-gray-800">Recent Activity</h2>
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">User</th>
                                <th class="py-2 px-4 border-b">Action</th>
                                <th class="py-2 px-4 border-b">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 border-b">John Doe</td>
                                <td class="py-2 px-4 border-b">Updated Profile</td>
                                <td class="py-2 px-4 border-b">2024-09-20</td>
                            </tr>
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 border-b">Jane Smith</td>
                                <td class="py-2 px-4 border-b">Added Major</td>
                                <td class="py-2 px-4 border-b">2024-09-19</td>
                            </tr>
                        </tbody>
                    </table>
                </div> --> --}}
            </div>
        </div>
    </div>
</x-app-layout>
