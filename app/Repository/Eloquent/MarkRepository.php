<?php

namespace App\Repository\Eloquent;

use App\Models\Mark;
use App\Repository\Eloquent\Core\BaseRepository;
use App\Repository\Eloquent\MarkRepositoryInterface;

class MarkRepository extends BaseRepository implements MarkRepositoryInterface
{
   public function __construct(Mark $model)
   {
       parent::__construct($model);
   }
}