@csrf

<label for="company" class="text-gray-700">Company</label>
<span class="text-xs text-red-600">@error('name') {{ $message }} @enderror</span>
<input type="text" list="companies" id="company" name="company" class="rounded border-gray-200 w-full mb-4 mt-2" placeholder="Select a company">
<datalist id="companies">
    @foreach ($companies as $company)
    <option value="{{ $company->name }}" @selected(old('company') == $company)>
    @endforeach
</datalist>

<label for="status" class="text-gray-700">Status</label>
<span class="text-xs text-red-600">@error('status') {{ $message }} @enderror</span>
<select name="status" id="status" class="rounded border-gray-200 w-full mb-4 mt-2">
    <option value="" selected>
      Select a status
    </option>
    @foreach ($statuses as $status)
    <option value="{{ $status->id }}" @selected(old('status') == $status)>
        {{ $status->name }}
    </option>
    @endforeach
</select>

<h3 class="font-semibold text-lg text-gray-800 leading-tight flex items-center justify-between">Invoice rows</h3>

<div class="flex justify-between items-center">
    <a href="{{ route('invoices.index') }}" class="text-indigo-600 hover:underline"> &larr; Back</a>
    <input type="submit" value="Submit" class="bg-green-500 text-white rounded px-4 py-2">
</div>

