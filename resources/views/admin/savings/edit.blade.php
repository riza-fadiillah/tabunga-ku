<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Savings') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-6 px-4">
        <form action="{{ route('savings.update', $saving->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="teacher_id" class="block text-gray-700">Teacher ID</label>
                <input id="teacher_id" name="teacher_id" type="text" class="form-input mt-1 block w-full" value="{{ $saving->teacher_id }}" required />
                @error('teacher_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="user_id" class="block text-gray-700">User ID</label>
                <input id="user_id" name="user_id" type="text" class="form-input mt-1 block w-full" value="{{ $saving->user_id }}" required />
                @error('user_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="date" class="block text-gray-700">Date</label>
                <input id="date" name="date" type="date" class="form-input mt-1 block w-full" value="{{ \Carbon\Carbon::parse($saving->date)->format('Y-m-d') }}"
                required />
                @error('date')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="deebit" class="block text-gray-700">Deebit</label>
                <input id="deebit" name="deebit" type="number" step="0.01" class="form-input mt-1 block w-full" value="{{ $saving->deebit }}" required />
                @error('deebit')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="kredit" class="block text-gray-700">Kredit</label>
                <input id="kredit" name="kredit" type="number" step="0.01" class="form-input mt-1 block w-full" value="{{ $saving->kredit }}" required />
                @error('kredit')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="note" class="block text-gray-700">Note</label>
                <textarea id="note" name="note" class="form-input mt-1 block w-full" rows="3">{{ $saving->note }}</textarea>
                @error('note')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700">
                Save
            </button>
        </form>
    </div>
</x-app-layout>
