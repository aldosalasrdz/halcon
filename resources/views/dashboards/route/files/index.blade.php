<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-between">
      {{ __('Files') }}
      <a href="{{ route('files.create') }}" class="text-sm bg-green-500 text-white rounded px-4 py-2">
        Upload file
      </a>
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="overflow-auto rounded shadow">
            <table class="w-full">
              <thead class="bg-gray-100 border-b-2 border-gray-300 peer-focus:">
                <tr>
                  <th class="p-3 text-sm font-semibold tracking-wide text-left">#</th>
                  <th class="p-3 text-sm font-semibold tracking-wide text-left">Invoice ID</th>
                  <th class="p-3 text-sm font-semibold tracking-wide text-left">URL</th>
                  <th colspan="2" class="p-3 text-sm font-semibold tracking-wide text-left">Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($files as $file)
                <tr class="border-b">
                  <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $file->id }}</td>
                  <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $file->invoice->id }}</td>
                  <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                    <a href="{{ $file->url }}" class="text-indigo-600 hover:underline" target="_blank">{{ $file->url }}</a>
                  </td>
                  <td class="p-3 text-sm text-gray-700 whitespace-nowrap w-10">
                    <a href="{{ route('files.edit', $file) }}" class="text-indigo-600 hover:underline">Edit</a>
                  </td>
                  <td class="p-3 text-sm whitespace-nowrap">
                    <form action="{{ route('files.destroy', $file) }}" method="POST">
                      @csrf
                      @method('DELETE')

                      <input type="submit" value="Delete" class="bg-red-600 text-white rounded px-4 py-2 hover:bg-red-700" onclick="return confirm('Do you want to remove this invoice?')">
                    </form>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="3" class="p-3 text-sm text-gray-700">
                    No files found.
                  </td>
                </tr>
                @endforelse
              </tbody>
            </table>
            {{ $files->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
