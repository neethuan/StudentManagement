@extends('layouts.app')

@section('content')
<div class="container">
    @if (Session::has('message'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    @if(Session::has('message'))
         <p class="alert alert-danger">{{ Session::get('message') }}</p>
         @endif
         </div>
    @endif
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Students') }}</div>

                <div class="card-body">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Age</th>
                        <th scope="col">Teacher</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($students as $student)
                        <tr>
                        <th scope="row">{{ $student->id }}</th>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->teacher->name }}</td>
                        <td>
                            <a href="{{ route('student.edit', $student->id) }}" class="btn btn-primary justify-content-end class">Edit</a>
                            <form method="POST" action="{{ route('student.destroy', $student->id) }}">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" class="p-2 btn btn-danger" href="{{ route('student.destroy', $student->id) }}">Delete</a>
                            </form>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    {{ $students->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection