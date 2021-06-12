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
                    <div class="card-header">{{ __('Add Marks') }}</div>
                        <form action="{{ route('mark.store') }}" method="POST" >
                            @CSRF
                            <div class="form-group col-md-4">
                                <label for="inputState">Student</label>
                                <select id="student_id" class="form-control"  name="student_id" required>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputState">Term</label>
                                <select id="term_id" class="form-control"  name="term_id" required>
                                    @foreach ($terms as $term)
                                        <option value="{{ $term->id }}">{{ $term->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                           <div class="form-group col-md-9">
                                <label for="age" class="col-form-label">Maths</label>
                                <input type="text" required min=0 max=100 class="form-control" id="maths" name="maths" placeholder="maths">
                            </div>

                            <div class="form-group col-md-9">
                                <label for="science" class="col-sm-2 col-form-label">Science</label>
                                <input type="text" required min=0 max=100 class="form-control" id="science" name="science" placeholder="science">
                            </div>

                            <div class="form-group col-md-9">
                                <label for="age" class="col-sm-2 col-form-label">History</label>
                                <input type="text" required min=0 max=100 class="form-control" id="history" name="history" placeholder="history">
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('ADD') }}
                                    </button>
                                    <a href="{{ route('mark.index') }}" class="btn btn-primary justify-content-end class">Back</a>
                                </div>
                            </div>
                        </form>
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection