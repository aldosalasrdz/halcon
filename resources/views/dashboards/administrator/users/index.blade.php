<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-between">
            {{ __('Users') }}
            <a href="{{ route('users.create') }}" class="text-sm bg-green-500 text-white rounded px-4 py-2">
                Create user
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-auto">
                        <table class="mb-4 text-left w-full">
                            <thead class="text-sm">
                                <tr class="border-b">
                                    <th class="px-4 py-4">Name</th>
                                    <th class="px-4 py-4">Email</th>
                                    <th class="px-4 py-4">Role</th>
                                    <th colspan="2" class="px-4 py-4">Actions</th>
                                </tr>
                            </thead>
                            @forelse ($users as $user)
                            <tr class="border-b border-gray-200 text-sm">
                                <td class="px-4 py-4 whitespace-nowrap">{{ $user->name }}</td>
                                <td class="px-4 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                <td class="px-4 py-4 whitespace-nowrap">{{ $user->role->name }}</td>
                                <td class="px-4 py-4 w-5 whitespace-nowrap">
                                    <a href="{{ route('users.edit', $user) }}" class="text-indigo-600">Edit</a>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <input type="submit" value="Delete" class="bg-red-600 text-white rounded px-4 py-2 hover:bg-red-700" onclick="return confirm('Do you want to remove this user?')">
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr class="border-b border-gray text-sm justify-center">
                                There are no users to display
                            </tr>
                            @endforelse
                        </table>
                    </div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>