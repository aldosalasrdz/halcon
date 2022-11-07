<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-between">
            {{ __('Company') }}
            <a href="{{ route('users.create') }}" class="text-sm bg-green-500 text-white rounded px-4 py-2">
                Create company
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('companies.update', $company) }}" method="POST">
                        @method('PUT')
                        @include('dashboards.administrator.companies._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
