<?php
namespace App\Repository\Eloquent\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface EloquentRepositoryInterface
{
   public function create(array $attributes): Model;

   public function paginate(int $count = 10): LengthAwarePaginator;

   public function update(Model $model, array $attributes): bool;

   public function delete(Model $model): bool;

   public function all(): Collection;
}

?>