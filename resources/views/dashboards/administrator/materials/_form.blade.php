@csrf

<div class="mb-4">
  <label for="name">Name</label>
  <span class="text-xs text-red-600">@error('name') {{ $message }} @enderror</span>
  <input type="text" id="name" name="name" class="rounded border-gray-200 w-full" value="{{ old('name', $material->name) }}">
</div>

<div class="mb-4">
  <label for="cost">Cost</label>
  <span class="text-xs text-red-600">@error('cost') {{ $message }} @enderror</span>
  <div class="relative">
    <div class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">$</div>
    <input type="number" step="0.01" id="cost" name="cost" class="rounded border-gray-200 w-full pl-7" value="{{ old('cost', $material->cost) }}">
  </div>
</div>

<div class="mb-4">
  <label for="price">Price</label>
  <span class="text-xs text-red-600">@error('price') {{ $message }} @enderror</span>
  <div class="relative">
    <div class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">$</div>
  <input type="number" step="0.01" id="price" name="price" class="rounded border-gray-200 w-full pl-7" value="{{ old('price', $material->price) }}">
  </div>
</div>

<div class="mb-4">
  <label for="amount">Amount</label>
  <span class="text-xs text-red-600">@error('amount') {{ $message }} @enderror</span>
  <input type="number" step="0.01" id="amount" name="amount" class="rounded border-gray-200 w-full" value="{{ old('amount', $material->amount) }}">
</div>

<div class="flex justify-between items-center">
  <a href="{{ route('materials.index') }}" class="text-indigo-600 hover:underline"> &larr; Back</a>
  <input type="submit" value="Submit" class="bg-green-500 text-white rounded px-4 py-2">
</div>
