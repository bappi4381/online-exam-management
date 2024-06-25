<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Question;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use PDF;

class TeacherController extends Controller
{
    public function dashboard(){
        return view('teacher.dashboard.dashboard');
    }
    public function studentCreate(){
        return view('teacher.student.add');
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students|max:255',
            'phone' => ['required'],
            'dob' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'blood_group' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'parent_name' => 'required|string|max:255',
            'parent_phone' => ['required'],
            'course' => 'nullable|string', // Adjust validation rules as per your needs
        ]);

        // Generate a unique random password
        $randomPassword = $this->generateUniquePassword();

        // Hash the password before storing it
        

        // Add password to validated data
       
        $validatedData['password'] = $randomPassword;
       

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('student_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Create the student record
        $student = Student::create($validatedData);

        // Optionally, send the plain password to the student's email or display it
        // For example:
        // Mail::to($student->email)->send(new StudentPasswordMail($randomPassword));

        // Redirect or respond as needed
        return redirect()->back()->with('success', 'Student added successfully with password: ' . $randomPassword);
    }
    private function generateUniquePassword()
    {
        do {
            // Generate a random password
            $randomPassword = Str::random(8); // You can adjust the length as needed
            // Check if the password already exists in the database
        } while (Student::where('password', Hash::make($randomPassword))->exists());

        return $randomPassword;
    }
    public function index()
    {
        $students = Student::all();
        return view('teacher.student.manage', compact('students'));
    }
    public function edit(Student $student)
    {
        return view('teacher.student.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => ['required'],
            'dob' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'blood_group' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'parent_name' => 'required|string|max:255',
            'parent_phone' => ['required'],
            'course' => 'nullable|string', // Adjust validation rules as per your needs
        ]);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('student_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Update the student record
        $student->update($validatedData);

        // Redirect or respond as needed
        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }


    //subject
    public function subject(){
       return view ('teacher.subject.create');
    }
    public function createSubject(Request $request){
        $validatedData = $request->validate([
            'subject' => 'required|string|max:255',
            'chapter' => 'required|string|max:255',
            'course' => 'nullable|string', // Adjust validation rules as per your needs
        ]);

        $subject = Subject::create($validatedData);

        // Redirect or respond as needed
        return redirect()->route('subject.index')->with('success', 'Student updated successfully!');
    }
    public function question(){
        $subjects = Subject::all();
        $uniqueCourses = $subjects->unique('course')->values()->all();
        return view ('teacher.subject.question',compact('subjects','uniqueCourses'));
     }
     public function createQuestion(Request $request){
       
        $validatedData = $request->validate([
            'course' => 'nullable|string',
            'subject' => 'required|string|max:255',
            'chapter' => 'required|string|max:255',
            'question' => 'required|string|max:255',
            'A' => 'required|string|max:255',
            'B' => 'required|string|max:255',
            'C' => 'required|string|max:255',
            'D' => 'required|string|max:255',
            'answer' => 'required|string|max:255',
             // Adjust validation rules as per your needs
        ]);
        
        $question = Question::create($validatedData);

        
        return redirect()->route('subject.question');
     }
     public function manageQuestion(Request $request){
        $questions = Question::paginate(5);
        return view('teacher.subject.showQusetion',compact('questions'));
     }
     public function search(Request $request)
     {
        $search = $request->input('search');

        // Fetch paginated questions, filtered by search if applicable
        if ($search) {
            $questions = Question::where('question', 'like', '%' . $search . '%')
            ->orWhere('course', 'like', "%{$search}%")
            ->orWhere('subject', 'like', "%{$search}%")
            ->orWhere('chapter', 'like', "%{$search}%")
            ->paginate(5);
            $questions->appends(['search' => $search]); // Append search query to pagination links
        } else {
            $questions = Question::paginate(10);
        }
         return view('teacher.subject.showQusetion', ['questions' => $questions]);
     }
    //pdf generate
    public function generatePDF()
    {
        $questions = Question::all(); // Fetch users from database

        $pdf = PDF::loadView('teacher.pdf.pdf', compact('questions'));

        return $pdf->download('Question.pdf');
    }

}
