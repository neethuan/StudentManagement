<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Mark;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreMarkRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateMarkRequest;
use App\Repository\Eloquent\MarkRepositoryInterface;
use App\Repository\Eloquent\TermRepositoryInterface;
use App\Repository\Eloquent\StudentRepositoryInterface;

class MarkController extends Controller
{
    private $markRepository;
    private $studentRepository;
    private $termRepository;
  
   public function __construct(
       MarkRepositoryInterface $markRepository,
       StudentRepositoryInterface $studentRepository,
       TermRepositoryInterface $termRepository
    )
   {
       $this->markRepository = $markRepository;
       $this->studentRepository = $studentRepository;
       $this->termRepository = $termRepository;
   }

    public function index(): View 
    {
        $marks = $this->markRepository->paginate(1);
       return view('mark.index', ['marks' => $marks]);
    }

    public function create(): View
    {
        $students = $this->studentRepository->all();
        $terms = $this->termRepository->all();

        return view('mark.create', ['students' => $students, 'terms' => $terms]);
    }

    public function store(StoreMarkRequest $request): RedirectResponse 
    {
        $studentDetails = $request->validated();
        $this->markRepository->save($studentDetails);
        
        return redirect('mark');
    }

    public function edit(Mark $mark): View 
    {
        $students = $this->studentRepository->all();
        $terms = $this->termRepository->all();

        return view('mark.edit', ['mark' => $mark, 'students' => $students, 'terms' => $terms]);
    }

    public function update(Mark $mark, UpdateMarkRequest $request): RedirectResponse 
    {
        $markDetails = $request->validated();
        $this->markRepository->update($mark, $markDetails);
        
        return redirect('mark');
    }

    public function destroy(Mark $mark): RedirectResponse 
    {
        try {
            $this->markRepository->delete($mark);
            Session::flash('message', 'Student Record Deleted successfully');
        } catch (Throwable $exception) {
            Session::flash('message', 'Error!!');
        }
        
        return redirect('mark');
    }
}
