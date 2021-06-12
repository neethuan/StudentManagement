<?php

namespace App\Repository\Eloquent;

use App\Models\Term;
use App\Repository\Eloquent\Core\BaseRepository;
use App\Repository\Eloquent\TermRepositoryInterface;

class TermRepository extends BaseRepository implements TermRepositoryInterface
{
   public function __construct(Term $term)
   {
       parent::__construct($term);
   }
}