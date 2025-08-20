<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">New Student</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('students.store') }}" class="space-y-4">
                    @include('students._form')
                    <div class="flex items-center gap-2">
                        <button style="background-color: rgb(79 70 229) !important;" class="px-4 py-2 bg-indigo-600 text-white rounded-md">Save</button>
                        <a href="{{ route('students.index') }}" class="px-4 py-2 rounded-md border">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
