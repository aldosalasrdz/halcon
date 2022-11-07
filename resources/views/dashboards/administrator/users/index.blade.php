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
                    <div class="overflow-auto rounded shadow">
                        <table class="w-full">
                            <thead class="bg-gray-100 border-b-2 border-gray-300">
                                <tr>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">#</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Name</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Email</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Role</th>
                                    <th colspan="2" class="p-3 text-sm font-semibold tracking-wide text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($users as $user)
                                <tr class="border-b">
                                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $user->id }}</td>
                                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $user->name }}</td>
                                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $user->email }}</td>
                                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $user->role->name }}</td>
                                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap w-10">
                                        <a href="{{ route('users.edit', $user) }}" class="text-indigo-600 hover:underline">Edit</a>
                                    </td>
                                    <td class="p-3 whitespace-nowrap">
                                        <form action="{{ route('users.destroy', $user) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <input type="submit" value="Delete" class="bg-red-600 text-white rounded px-4 py-2 hover:bg-red-700" onclick="return confirm('Do you want to remove this user?')">
                                        </form>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="p-3">
                                    There are no users to display
                                </td>
                            </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
