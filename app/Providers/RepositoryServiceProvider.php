<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Eloquent\MarkRepository;
use App\Repository\Eloquent\TermRepository;
use App\Repository\Eloquent\StudentRepository;
use App\Repository\Eloquent\TeacherRepository;
use App\Repository\Eloquent\Core\BaseRepository;
use App\Repository\Eloquent\MarkRepositoryInterface;
use App\Repository\Eloquent\TermRepositoryInterface;
use App\Repository\Eloquent\StudentRepositoryInterface;
use App\Repository\Eloquent\TeacherRepositoryInterface;
use App\Repository\Eloquent\Core\EloquentRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
        $this->app->bind(TeacherRepositoryInterface::class, TeacherRepository::class);
        $this->app->bind(MarkRepositoryInterface::class, MarkRepository::class);
        $this->app->bind(TermRepositoryInterface::class, TermRepository::class);
    }

    public function boot(): void {}
}
