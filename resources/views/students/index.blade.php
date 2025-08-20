<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Students</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                @if (session('success'))
                    <div class="mb-4 rounded-md bg-green-50 p-3 text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex items-center justify-between mb-4">
                    <form method="GET" action="{{ route('students.index') }}" class="flex gap-2">
                        <input type="text" name="q" value="{{ $q }}" placeholder="Search name/email/roll/standard"
                               class="rounded-md border-gray-300" />
                        <button class="px-4 py-2 bg-gray-800 text-white rounded-md">Search</button>
                        @if($q)
                            <a href="{{ route('students.index') }}" class="px-3 py-2 rounded-md border">Clear</a>
                        @endif
                    </form>

                    <a href="{{ route('students.create') }}"
                       class="px-4 py-2 bg-indigo-600 text-white rounded-md">+ New Student</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead>
                            <tr class="text-left border-b">
                                <th class="py-2 pr-4">Name</th>
                                <th class="py-2 pr-4">Email</th>
                                <th class="py-2 pr-4">Roll #</th>
                                <th class="py-2 pr-4">Standard</th>
                                <th class="py-2 pr-4">Phone</th>
                                <th class="py-2 pr-4">DOB</th>
                                <th class="py-2 pr-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($students as $student)
                            <tr class="border-b">
                                <td class="py-2 pr-4">{{ $student->name }}</td>
                                <td class="py-2 pr-4">{{ $student->email }}</td>
                                <td class="py-2 pr-4">{{ $student->roll_number }}</td>
                                <td class="py-2 pr-4">{{ $student->standard }}</td>
                                <td class="py-2 pr-4">{{ $student->phone }}</td>
                                <td class="py-2 pr-4">
                                    {{ optional($student->dob)->format('d-M-Y') }}
                                </td>
                                <td class="py-2 pr-4 flex gap-2">
                                    <a href="{{ route('students.edit', $student) }}"
                                       class="px-3 py-1 rounded-md border">Edit</a>
                                    <form method="POST" action="{{ route('students.destroy', $student) }}"
                                          onsubmit="return confirm('Delete this student?')">
                                        @csrf @method('DELETE')
                                        <button class="px-3 py-1 rounded-md bg-red-600 text-white">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="7" class="py-4">No students found.</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $students->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
