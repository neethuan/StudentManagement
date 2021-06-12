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
                    <div class="card-header">{{ __('Edit Marks') }}</div>
                    <form action="{{ route('mark.update', $mark->id) }}" method="POST" >
                @CSRF
                {{ method_field('PUT') }}
                <div class="form-group col-md-4">
                    <label for="Student">Student</label>
                    <select id="student_id" class="form-control"  name="student_id" disabled>
                        <option>Open this select menu</option>
                        @foreach($students as $student)
                        <option {{ $mark->student_id === $student->id ? 'selected' : '' }} value="{{ $student->id }}"> {{ $student->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="Term">Term</label>
                    <select id="term_id" class="form-control"  name="term_id" disabled>
                    <option>Open this select menu</option>
                    @foreach($terms as $term)
                    <option {{$mark->term_id === $term->id ? 'selected' : '' }} value="{{ $term->id }}"> {{ $term->name }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <label for="Maths" class="col-sm-2 col-form-label">Maths</label>
                    <div class="col-sm-10">
                    <input type="number" required min=0 max=100 class="form-control" id="maths" name="maths" placeholder="maths" value="{{ old('maths')?old('maths'):$mark->maths }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Science" class="col-sm-2 col-form-label">Science</label>
                    <div class="col-sm-10">
                    <input type="number" required min=0 max=100 class="form-control" id="science" name="science" placeholder="science" value="{{ old('science')?old('maths'):$mark->maths }}" >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="History" class="col-sm-2 col-form-label">History</label>
                    <div class="col-sm-10">
                    <input type="number" required min=0 max=100 class="form-control" id="history" name="history" placeholder="history" value="{{ old('history')?old('history'):$mark->history }}">
                    </div>
                </div>

                <div class="form-group row">
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