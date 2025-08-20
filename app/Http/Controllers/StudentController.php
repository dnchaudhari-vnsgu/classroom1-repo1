<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // protect all student routes
    }

    public function index(Request $request)
    {
        $q = $request->input('q');

        $students = Student::query()
            ->when($q, function ($query) use ($q) {
                $like = "%{$q}%";
                $query->where(function ($q2) use ($like) {
                    $q2->where('name', 'like', $like)
                       ->orWhere('email', 'like', $like)
                       ->orWhere('roll_number', 'like', $like)
                       ->orWhere('standard', 'like', $like);
                });
            })
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('students.index', compact('students', 'q'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => ['required','string','min:2'],
            'email'       => ['required','email','unique:students,email'],
            'roll_number' => ['required','string','max:50','unique:students,roll_number'],
            'standard'    => ['nullable','string','max:50'],
            'phone'       => ['nullable','string','max:20'],
            'dob'         => ['nullable','date'],
        ]);

        Student::create($data);

        return redirect()->route('students.index')->with('success', 'Student created.');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'name'        => ['required','string','min:2'],
            'email'       => ['required','email', Rule::unique('students','email')->ignore($student->id)],
            'roll_number' => ['required','string','max:50', Rule::unique('students','roll_number')->ignore($student->id)],
            'standard'    => ['nullable','string','max:50'],
            'phone'       => ['nullable','string','max:20'],
            'dob'         => ['nullable','date'],
        ]);

        $student->update($data);

        return redirect()->route('students.index')->with('success', 'Student updated.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted.');
    }
}
