<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Savings') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-6 px-4">
        <div class="bg-white shadow-md rounded-lg p-4">
            <h3 class="text-lg font-semibold mb-4">Details</h3>

            <div class="mb-2">
                <strong>Teacher ID:</strong>
                <p>{{ $saving->teacher_id }}</p>
            </div>

            <div class="mb-2">
                <strong>User ID:</strong>
                <p>{{ $saving->user_id }}</p>
            </div>

            <div class="mb-2">
                <strong>Date:</strong>
                <p>{{ date('Y-m-d', strtotime($saving->date)) }}</p>
            </div>

            <div class="mb-2">
                <strong>Deebit:</strong>
                <p>{{ number_format($saving->deebit, 2) }}</p>
            </div>

            <div class="mb-2">
                <strong>Kredit:</strong>
                <p>{{ number_format($saving->kredit, 2) }}</p>
            </div>

            <div class="mb-2">
                <strong>Note:</strong>
                <p>{{ $saving->note ?? 'No Notes Provided' }}</p>
            </div>

            <div class="mt-4">
                <a href="{{ route('savings.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Back to List
                </a>
                <a href="{{ route('savings.edit', $saving->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700 ml-2">
                    Edit
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
