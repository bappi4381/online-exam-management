@extends('student.student')

@section('content')
 <h1 class="text-center mt-5">Exam</h1>
 <div class="container">
    <div class="row justify-content-center mt-5 ">
        <div class="col-8">
            <div class="card ">
                <div class="card-body">
                    @foreach($questions as $question)
                     <li>{{ $question->question }}</li>
                    @endforeach
                </div>
              </div>
        </div>
     </div>
 </div>
 
 
@endsection