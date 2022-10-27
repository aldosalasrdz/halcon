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
<input type="text" id="name" name="name" class="rounded border-gray-200 w-full mb-4 mt-2" value="{{ old('name', $role->name) }}">

<label for="description" class="text-gray-700">Description</label>
<span class="text-xs text-red-600">@error('email') {{ $message }} @enderror</span>
<input type="text" id="description" name="description" class="rounded border-gray-200 w-full mb-4 mt-2" value="{{ old('description', $role->description) }}">

<div class="flex justify-between items-center">
    <a href="{{ route('roles.index') }}" class="text-indigo-600 hover:underline"> &larr; Back</a>
    <input type="submit" value="Submit" class="bg-green-500 text-white rounded px-4 py-2">
</div>
