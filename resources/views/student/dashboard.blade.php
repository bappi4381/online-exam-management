@extends('student.student')

@section('content')
 <h1 class="text-center mt-5">Welcome......  {{Session::get('student_name')}}  </h1>
 <div class="container">
    <div class="row justify-content-center mt-5 ">
        <div class="col-8">
            <div class="card text-center">
                <div class="card-body">
                  <h5 class="card-title">Prepared Exam</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="" class="btn btn-primary">Go Exam</a>
                </div>
              </div>
        </div>
     </div>
 </div>
 
 
@endsection