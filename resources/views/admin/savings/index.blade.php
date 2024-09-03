<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Savings List') }}
            </h2>
            <a href="{{ route('savings.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700">
                Add New Savings
            </a>
        </div>
    </x-slot>

    <div class="container mx-auto mt-6 px-4">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead class="bg-blue-700 border-b border-gray-200">
                    <tr>
                        <th class="py-3 px-4 text-center text-white">No</th>
                        <th class="py-3 px-4 text-center text-white">Id_Class</th>
                        <th class="py-3 px-4 text-center text-white">Name</th>
                        <th class="py-3 px-4 text-center text-white">Role</th>
                        <th class="py-3 px-4 text-center text-white">Actions</th>
                    </tr
                </thead>
                <tbody>
                    @forelse ($savings as $savingsItem)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 text-center">
                            <td class="py-2 px-4 text-gray-700">{{ $savingsItem->id }}</td>
                            <td class="py-2 px-4 text-gray-700">{{ $savingsItem->class_id}}</td>
                            <td class="py-2 px-4 text-gray-700">{{ $savingsItem->name }}</td>
                            <td class="py-2 px-4 text-gray-700">{{ $savingsItem->role }}</td>
                            <td class="py-2 px-4 text-center">
                                <a href="{{ route('savings.show', $savingsItem->id) }}" class="inline-block px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-green-600">Detail</a>
                                <a href="{{ route('savings.edit', $savingsItem->id) }}" class="inline-block px-4 py-2 ml-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Edit</a>
                                <form action="{{ route('savings.destroy', $savingsItem->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="px-4 py-2 ml-2 text-white bg-red-500 rounded-lg hover:bg-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-2 px-4 text-center text-gray-500">No savings found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
