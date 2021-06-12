<?php

namespace App\Repository\Eloquent;

use App\Models\Teacher;
use App\Repository\Eloquent\Core\BaseRepository;

class TeacherRepository extends BaseRepository implements TeacherRepositoryInterface
{
   public function __construct(Teacher $teacher)
   {
       parent::__construct($teacher);
   }
}