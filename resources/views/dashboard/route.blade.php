<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-between">
            {{ __('Route') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="" method="POST">
                        <label for="uploadFile" class="block mb-2 mt-4 text-gray-700">Upload file</label>
                        <input type="file" id="uploadFile" class="block w-full mb-4 border border-gray-200 rounded file:mr-2 file:py-2 file:px-4 file:rounded file:border-0" accept="image/*" capture="environment">
                        <div class="flex justify-end">
                            <button type="submit" class="bg-green-500 text-white rounded px-4 py-2">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
