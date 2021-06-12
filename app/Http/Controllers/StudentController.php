<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Student;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Repository\Eloquent\StudentRepositoryInterface;
use App\Repository\Eloquent\TeacherRepositoryInterface;

class StudentController extends Controller
{
    private $studentRepository;
  
    public function __construct(
        StudentRepositoryInterface $studentRepository,
        TeacherRepositoryInterface $teacherRepository
     )
    {
        $this->studentRepository = $studentRepository;
        $this->teacherRepository = $teacherRepository;
    }
    
    public function index(): View
    {
        $students = $this->studentRepository->paginate(5);
        return view('student.index', ['students' => $students]);
    }

    public function create(): View
    {
        $teachers = $this->teacherRepository->all();
        return view('student.create', ['teachers' => $teachers]);
    }

    public function store(StoreStudentRequest $request): RedirectResponse 
    {
        $studentDetails = $request->validated();
        $this->studentRepository->save($studentDetails);
        
        return redirect('student');
    }

    public function edit(Student $student): View 
    {
        $teachers = $this->teacherRepository->all();

        return view('student.edit', ['student' => $student, 'teachers' => $teachers]);
    }

    public function update(Student $student, UpdateStudentRequest $request): RedirectResponse 
    {
        $studentDetails = $request->validated();
        $this->studentRepository->update($student, $studentDetails);
        
        return redirect('student');
    }
    
    public function destroy(Student $student): RedirectResponse 
    {
        try {
            $this->studentRepository->delete($student);
            Session::flash('message', 'Student Record Deleted successfully');
        } catch (Throwable $exception) {
            Session::flash('message', 'Error!!');
        }
        
        return redirect('student');
    }
}
