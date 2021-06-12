@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif     

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __(' Student') }}</div>
                        <form action="{{ route('student.update', $student->id) }}" method="POST" >
                @CSRF
                {{ method_field('PUT') }}
                <div class="form-group col-md-12">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                    <input type="text" required class="form-control" id="name" name="name" value="{{ $student->name}}">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="age" class="col-sm-2 col-form-label">Age</label>
                    <div class="col-sm-10">
                    <input type="text" required class="form-control" id="age" name="age" value="{{ $student->age}}">
                    </div>
                </div>
                <fieldset class="form-group col-md-12">
                    <div class="row col-md-12">
                    <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                    <div class="form-check">
                        <input value="M" class="form-check-input" type="radio" name="gender" id="male" {{ $student->gender ==='M'?'checked':'' }}>
                        <label class="form-check-label" for="male">
                        Male
                        </label>
                        </div>
                        <div class="form-check">
                        <input value="F" class="form-check-input" type="radio" name="gender" id="female" {{ $student->gender ==='F'?'checked':'' }}>
                        <label class="form-check-label" for="female">
                        Female
                        </label>
                    </div>
                    </div>
                </fieldset>

                <div class="form-group col-md-9">
                    <div class="col-sm-10">
                        <label for="inputState ">Teacher</label>
                    </div>
                    <div class="col-sm-10">
                        <select id="teacher_id" class="form-control"  name="teacher_id" required>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-9">
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">UPDATE</button>
                    </div>
                </div>
            </form>
                    </div>
                </div>
            </div>  
        </div>  
@endsection