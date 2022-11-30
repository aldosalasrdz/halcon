<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-between">
            {{ __('Invoices') }}
            <a href="{{ route('invoices.create') }}" class="text-sm bg-green-500 text-white rounded px-4 py-2">
                Create invoice
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-auto rounded shadow">
                        <form action="{{ route('invoices.index') }}" method="GET" class="flex-grow">
                            <input type="text" name="search" placeholder="Buscar..." value="{{ request('search') }}" class="border border-gray-200 rounded py-2 px-4 w-1/2">
                        </form>
                        <table class="w-full">
                            <thead class="bg-gray-100 border-b-2 border-gray-300">
                                <tr>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">#</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Company</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Status</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Total</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Delivery address</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Created at</th>
                                    <th colspan="2" class="p-3 text-sm font-semibold tracking-wide text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($invoices as $invoice)
                                <tr class="border-b">
                                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $invoice->id }}</td>
                                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $invoice->company->name }}</td>
                                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                        @switch($invoice->invoiceStatus->name)
                                        @case('In process')
                                        <span class="p-1.5 text-xs font-medium uppercase tracking-wider rounded-lg bg-opacity-50 text-blue-800 bg-blue-200">{{ $invoice->invoiceStatus->name }}</span>
                                        @break
                                        @case('In route')
                                        <span class="p-1.5 text-xs font-medium uppercase tracking-wider rounded-lg bg-opacity-50 text-orange-800 bg-orange-200">{{ $invoice->invoiceStatus->name }}</span>
                                        @break
                                        @case('Delivered')
                                        <span class="p-1.5 text-xs font-medium uppercase tracking-wider rounded-lg bg-opacity-50 text-green-800 bg-green-200">{{ $invoice->invoiceStatus->name }}</span>
                                        @break
                                        @default
                                        <span class="p-1.5 text-xs font-medium uppercase tracking-wider rounded-lg bg-opacity-50 text-yellow-800 bg-yellow-200">{{ $invoice->invoiceStatus->name }}</span>
                                        @endswitch
                                    </td>
                                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">${{ $invoice->total }}</td>
                                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $invoice->delivery_address }}</td>
                                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $invoice->created_at->format('d/m/Y h:m') }}</td>
                                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap w-10">
                                        <a href="{{ route('invoices.edit', $invoice) }}" class="text-indigo-600 hover:underline">Edit</a>
                                    </td>
                                    <td class="p-3 text-sm whitespace-nowrap">
                                        <form action="{{ route('invoices.destroy', $invoice) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <input type="submit" value="Delete" class="bg-red-600 text-white rounded px-4 py-2 hover:bg-red-700" onclick="return confirm('Do you want to remove this invoice?')">
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="p-3 text-sm text-gray-700">
                                        No invoice found.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $invoices->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
