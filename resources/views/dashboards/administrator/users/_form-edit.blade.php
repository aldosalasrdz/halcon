@csrf

<label for="name" class="text-gray-700">Name</label>
<span class="text-xs text-red-600">@error('name') {{ $message }} @enderror</span>
<input type="text" id="name" name="name" class="rounded border-gray-200 w-full mb-4 mt-2" value="{{ old('name', $user->name) }}">

<label for="email" class="text-gray-700">Email</label>
<span class="text-xs text-red-600">@error('email') {{ $message }} @enderror</span>
<input type="email" id="email" name="email" class="rounded border-gray-200 w-full mb-4 mt-2" value="{{ old('email', $user->email) }}">

<label for="role" class="text-gray-700">Role</label>
<span class="text-xs text-red-600">@error('role') {{ $message }} @enderror</span>
<select name="role" id="role" class="rounded border-gray-200 w-full mb-4 mt-2">
    <option value="" selected>
      Select a role
    </option>
    @foreach ($roles as $role)
    <option value="{{ $role->id }}" @selected(old('role') == $role)>
        {{ $role->name }}
    </option>
    @endforeach
</select>

<div class="flex justify-between items-center">
    <a href="{{ route('users.index') }}" class="text-indigo-600 hover:underline"> &larr; Back</a>
    <input type="submit" value="Submit" class="bg-green-500 text-white rounded px-4 py-2">
</div>
