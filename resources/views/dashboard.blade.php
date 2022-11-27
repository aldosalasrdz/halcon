<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-5 gap-4 p-5">
                        <a class="bg-gray-200 rounded p-4" href="">Administrator &#8599;</a>
                        <a class="bg-gray-200 rounded p-4" href="">Sales &#8599;</a>
                        <a class="bg-gray-200 rounded p-4" href="">Purchasing &#8599;</a>
                        <a class="bg-gray-200 rounded p-4" href="">Warehouse &#8599;</a>
                        <a class="bg-gray-200 rounded p-4" href="">Route &#8599;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
