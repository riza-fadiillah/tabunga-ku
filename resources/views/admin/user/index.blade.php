<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>

            <a href="{{ route('user.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700">
                Add New User
            </a>
        </div>
    </x-slot>

    <div class="container mx-auto mt-6 px-4">
        <div class="flex items-center justify-between py-4">
            <h1 class="text-2xl font-bold">Users Table</h1>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead class="bg-blue-700 border-b border-gray-200">
                    <tr>
                        <th class="py-3 px-4 text-center text-white">No</th>
                        <th class="py-3 px-4 text-center text-white">Name</th>
                        <th class="py-3 px-4 text-center text-white">Email</th>
                        <th class="py-3 px-4 text-center text-white">Role</th>
                        <th class="py-3 px-4 text-center text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($user as $user)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 text-center">
                            <td class="py-2 px-4 text-gray-700">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4 text-gray-700">{{ $user->name }}</td>
                            <td class="py-2 px-4 text-gray-700">{{ $user->email }}</td>
                            <td class="py-2 px-4 text-gray-700">{{ $user->role }}</td>

                            <td class="py-2 px-4 text-center">
                                <a href="{{ route('user.show', $user->id) }}" class="inline-block px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-green-600 transition duration-200">Detail</a>
                                
                                <a href="{{ route('user.edit', $user->id) }}" class="inline-block px-4 py-2 ml-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 transition duration-200">Edit</a>
                                
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit" 
                                        onclick="return confirm('Are you sure you want to delete this user?')" 
                                        class="px-4 py-2 ml-2 text-white bg-red-500 rounded-lg hover:bg-red-600 transition duration-200"
                                    >
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-2 px-4 text-center text-gray-500">No users found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
