<x-app-layout>
    <x-slot name="header">
        <div class="bg-blue-600 py-4 px-6 rounded-lg shadow-lg">
            <h2 class="text-3xl font-semibold text-white">{{ __('Data Majors') }}</h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <a href="{{ route('majors.index') }}" class="text-blue-500 hover:underline font-medium">
                            &larr; Kembali ke Data Majors
                        </a>
                        
                        <a href="{{ route('majors.edit', $major->id) }}" class="inline-block px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-green-600 transition duration-200">
                            Edit Data
                        </a>
                    </div>

                    <div class="bg-gray-50 border border-gray-200 rounded-lg shadow-md p-6">
                        <div class="flex items-center mb-4">
                            <ul>
                                <li class="text-2xl font-bold text-gray-900">{{ $major->name }}</li>
                                <li class="text-xl text-gray-700 mt-2">Description: {{ $major->description }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
