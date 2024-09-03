<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Kelas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('classes.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <x-input-label for="major_id" :value="__('Major ID')" />
                            <x-text-input id="major_id" class="block mt-1 w-full" type="text" name="major_id" required />
                            <x-input-error :messages="$errors->get('major_id')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="user_id" :value="__('User ID')" />
                            <x-text-input id="user_id" class="block mt-1 w-full" type="text" name="user_id" />
                            <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <button type="submit" class="px-4 py-3 bg-teal-700 font-bold text-white rounded-full mt-6">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
