@csrf
<div class="grid sm:grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium">Name</label>
        <input name="name" type="text" value="{{ old('name', $student->name ?? '') }}"
               class="mt-1 w-full rounded-md border-gray-300" required />
        @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Email</label>
        <input name="email" type="email" value="{{ old('email', $student->email ?? '') }}"
               class="mt-1 w-full rounded-md border-gray-300" required />
        @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Roll Number</label>
        <input name="roll_number" type="text" value="{{ old('roll_number', $student->roll_number ?? '') }}"
               class="mt-1 w-full rounded-md border-gray-300" required />
        @error('roll_number') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Standard</label>
        <input name="standard" type="text" value="{{ old('standard', $student->standard ?? '') }}"
               class="mt-1 w-full rounded-md border-gray-300" />
        @error('standard') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Phone</label>
        <input name="phone" type="text" value="{{ old('phone', $student->phone ?? '') }}"
               class="mt-1 w-full rounded-md border-gray-300" />
        @error('phone') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Date of Birth</label>
        <input name="dob" type="date" value="{{ old('dob', optional($student->dob ?? null)->format('Y-m-d')) }}"
               class="mt-1 w-full rounded-md border-gray-300" />
        @error('dob') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>
</div>
