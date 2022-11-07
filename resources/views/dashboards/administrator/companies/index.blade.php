<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-between">
            {{ __('Companies') }}
            <a href="{{ route('companies.create') }}" class="text-sm bg-green-500 text-white rounded px-4 py-2">
                Create company
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-auto rounded shadow">
                        <table class="w-full">
                            <thead class="bg-green-500 border-b-2 border-green-600 text-white">
                                <tr>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">#</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Name</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">RFC</th>
                                    <th colspan="2" class="p-3 text-sm font-semibold tracking-wide text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($companies as $company)
                            <tr class="border-b">
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $company->id }}</td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $company->name }}</td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $company->rfc }}</td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap w-10">
                                    <a href="{{ route('companies.edit', $company) }}" class="text-indigo-600 hover:underline">Edit</a>
                                </td>
                                <td class="p-3 text-sm whitespace-nowrap">
                                    <form action="{{ route('companies.destroy', $company) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <input type="submit" value="Delete" class="bg-red-600 text-white rounded px-4 py-2 hover:bg-red-700" onclick="return confirm('Do you want to remove this company?')">
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="p-3 text-sm text-gray-700">
                                    No companies found.
                                </td>
                            </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $companies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
