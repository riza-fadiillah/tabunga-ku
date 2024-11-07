<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teacher Detail') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-6 px-4">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-4">{{ $teacher->name }}</h3>
            <p><strong>Email:</strong> {{ $teacher->email }}</p>
            <p><strong>Phone:</strong> {{ $teacher->phone }}</p>

            <a href="{{ route('teachers.edit', $teacher->id) }}" class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700">
                Edit Teacher
            </a>
            <a href="{{ route('teachers.index') }}" class="mt-4 inline-block px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                Back to Teacher List
            </a>
        </div>
    </div>
</x-app-layout>
