@extends('teacher.admin')

@section('content')
   <section>
      <div class="container">
        <h4 class="text-primary text-uppercase font-weight-bold py-3">Add Subject</h4>
        <div class="row">
            <div class="col-8">
                <div class="card bg-secondary px-5 py-5">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Select Subject</label>
                            <select class="form-select form-control" id="course" name="" required>
                                <option value="" selected disabled>Select Class</option>
                                @foreach ($uniqueCourses as $subject )
                                   <option value="{{$subject->course}}">{{$subject->course}}</option>
                                @endforeach
                                
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="chapter" class="form-label">Select Chapter</label>
                            <select class="form-select form-control" id="chapter" name="chapter" required>
                                <option value="" selected disabled>Select Chapter</option>
                            </select>
                        </div>
                         
                        <div class="mb-3">
                            <div class="card" style="width:100%">
                                <div class="card-body">
                                  <h5 class="card-title">Question</h5>
                                  <p class="card-text">
                                    <div class="mb-3" >
                                        <label for="name" class="form-label">Create Question</label>
                                        <input type="text" class="form-control" id="name" name="question" required>
                                      </div>

                                  </p>
                                  
                                  <div class="mb-3" style="width:60%">
                                    <label for="name" class="form-label">Multiqle question 'A'</label>
                                    <input type="text" class="form-control" id="name" name="A" required>
                                  </div>
                                  <div class="mb-3" style="width:60%">
                                    <label for="name" class="form-label">Multiqle question 'B'</label>
                                    <input type="text" class="form-control" id="name" name="B" required>
                                  </div>
                                  <div class="mb-3" style="width:60%">
                                    <label for="name" class="form-label">Multiqle question 'C'</label>
                                    <input type="text" class="form-control" id="name" name="C" required>
                                  </div>
                                  <div class="mb-3" style="width:60%">
                                    <label for="name" class="form-label">Multiqle question 'D'</label>
                                    <input type="text" class="form-control" id="name" name="D" required>
                                  </div>

                                  <div class="mb-3" style="width:100%">
                                    <label for="name" class="form-label">Anaswer</label>
                                    <input type="text" class="form-control" id="name" name="answer" required>
                                  </div>
                                  
                                </div>
                            </div>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const subjects = @json($subjects); // Convert PHP array to JavaScript array

        const courseSelect = document.getElementById('course');
        const chapterSelect = document.getElementById('chapter');

        courseSelect.addEventListener('change', function () {
            const selectedCourse = this.value;

            // Clear existing options
            chapterSelect.innerHTML = '<option value="" selected disabled>Select Chapter</option>';

            // Filter chapters based on selected course
            const filteredChapters = subjects.filter(subject => subject.course === selectedCourse);

            // Populate chapter dropdown with filtered chapters
            filteredChapters.forEach(subject => {
                const option = document.createElement('option');
                option.value = subject.chapter;
                option.textContent = subject.chapter;
                chapterSelect.appendChild(option);
            });
        });
    });
</script>