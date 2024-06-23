@extends('teacher.admin')

@section('content')
   <section>
      <div class="container">
        <h4 class="text-primary text-uppercase font-weight-bold py-3">Add Subject</h4>
        <div class="row">
            <div class="col-8">
                <div class="card px-5 py-5">
                    <form action="{{ route('subject.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Subject Name</label>
                            <input type="text" class="form-control" id="name" name="subject" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">chapter</label>
                            <input type="text" class="form-control" id="name" name="chapter" placeholder="xx.Chapter-xxxxxxxxxx" required>
                        </div>
                        <div class="mb-3">
                            <label for="course" class="form-label">Select class</label>
                            <select class="form-select form-control" id="course" name="course" required>
                                <option value="" selected disabled>Select Class</option>
                                <option value="First year">First year</option>
                                <option value="Second year">Second year</option>
                            </select>
                        </div>
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </form>
                </div>
            </div>
        </div>

      </div>
   </section>
@endsection