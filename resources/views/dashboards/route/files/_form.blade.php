@csrf

<label for="invoice_id" class="text-gray-700">Invoice id</label>
<span class="text-xs text-red-600">@error('invoice_id') {{ $message }} @enderror</span>
<input type="number" id="invoice_id" name="invoice_id" class="rounded border-gray-200 w-full mb-4 mt-2" value="{{ old('invoice_id', $file->invoice_id) }}">

<label for="url" class="text-gray-700">Photo</label>
<span class="text-xs text-red-600">@error('url') {{ $message }} @enderror</span>
<input type="file" id="url" name="url" class="rounded border border-gray-200 w-full mb-4 mt-2 file:mr-2 file:py-2 file:px-4 file:rounded file:border-0" accept="image/*" capture="environment">

<div class="flex justify-between items-center">
    <a href="{{ route('files.index') }}" class="text-indigo-600 hover:underline"> &larr; Back</a>
    <input type="submit" value="Submit" class="bg-green-500 text-white rounded px-4 py-2">
</div>
