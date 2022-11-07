@csrf
<div class="card-body">
    @if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif
</div>

<label for="name" class="text-gray-700">Name</label>
<span class="text-xs text-red-600">@error('name') {{ $message }} @enderror</span>
<input type="text" id="name" name="name" class="rounded border-gray-200 w-full mb-4 mt-2" value="{{ old('name', $company->name) }}">

<label for="rfc" class="text-gray-700">RFC</label>
<span class="text-xs text-red-600">@error('rfc') {{ $message }} @enderror</span>
<input type="text" id="rfc" name="rfc" class="rounded border-gray-200 w-full mb-4 mt-2" value="{{ old('rfc', $company->rfc) }}">


<div class="flex justify-between items-center">
    <a href="{{ route('companies.index') }}" class="text-indigo-600 hover:underline"> &larr; Back</a>
    <input type="submit" value="Submit" class="bg-green-500 text-white rounded px-4 py-2">
</div>
