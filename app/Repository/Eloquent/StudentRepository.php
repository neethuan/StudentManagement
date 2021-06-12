<?php

namespace App\Repository\Eloquent;

use App\Models\Student;
use App\Repository\Eloquent\Core\BaseRepository;

class StudentRepository extends BaseRepository implements StudentRepositoryInterface
{
   public function __construct(Student $student)
   {
       parent::__construct($student);
   }

}