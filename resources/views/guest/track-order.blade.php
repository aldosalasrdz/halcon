@extends('layout')

@section('title', 'Track your order')

@section('content')
<header class="bg-gray-900 p-3 text-white">
    <div class="shrink-0 flex items-center container mx-auto">
        <a href="{{ route('track-order') }}">
            <x-application-logo class="h-10 w-auto fill-current text-transparent" />
        </a>
    </div>
</header>
<main class="container px-20 mx-auto">
    <h1 class="text-3xl mt-7 font-bold">Track your order</h1>
    <form action="" class="mt-3" method="POST">
        @csrf
        <label for="invoice_number" class="text-gray-700">Invoice number</label>
        <input type="number" id="invoice_number" name="invoice_number" class="rounded-lg border-gray-200 w-full mb-4 mt-2">

        <label for="customer_number" class="text-gray-700">Company number</label>
        <input type="number" id="invoice_number" name="invoice_number" class="rounded-lg border-gray-200 w-full mb-4 mt-2">
        <div class="flex justify-end">
            <button type="submit" class="bg-green-500 text-white rounded px-4 py-2">Get status</button>
        </div>
    </form>
</main>
@endsection
