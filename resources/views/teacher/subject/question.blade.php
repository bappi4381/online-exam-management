@extends('teacher.admin')

@section('content')
   <section>
      <div class="container">
        <h4 class="text-primary text-uppercase font-weight-bold py-3">Add Subject</h4>
        <div class="row">
            <div class="col-8">
                <div class="card bg-secondary px-5 py-5">
                    <form action="{{ route('question.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="course" class="form-label">Select Year</label>
                            <select class="form-select form-control" id="course" name="course" required>
                                <option value="" selected disabled>Select Class</option>
                                @foreach ($uniqueCourses as $subject )
                                   <option value="{{$subject->course}}">{{$subject->course}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="mb-3">
                          <label for="chapter" class="form-label">Select Chapter</label>
                          <select class="form-select form-control" id="subject" name="subject" required>
                              <option value="" selected disabled>Select Chapter</option>
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
                                        <input type="text" class="form-control" id="question" name="question" required>
                                      </div>

                                  </p>
                                  
                                  <div class="mb-3" style="width:60%">
                                    <label for="name" class="form-label">Multiqle question 'A'</label>
                                    <input type="text" class="form-control" id="A" name="A" required>
                                  </div>
                                  <div class="mb-3" style="width:60%">
                                    <label for="name" class="form-label">Multiqle question 'B'</label>
                                    <input type="text" class="form-control" id="B" name="B" required>
                                  </div>
                                  <div class="mb-3" style="width:60%">
                                    <label for="name" class="form-label">Multiqle question 'C'</label>
                                    <input type="text" class="form-control" id="C" name="C" required>
                                  </div>
                                  <div class="mb-3" style="width:60%">
                                    <label for="name" class="form-label">Multiqle question 'D'</label>
                                    <input type="text" class="form-control" id="D" name="D" required>
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
      const subjectSelect = document.getElementById('subject');
      const chapterSelect = document.getElementById('chapter');

      courseSelect.addEventListener('change', function () {
          const selectedCourse = this.value;

          // Clear existing options
          subjectSelect.innerHTML = '<option value="" selected disabled>Select Subject</option>';
          chapterSelect.innerHTML = '<option value="" selected disabled>Select Chapter</option>';

          // Filter subjects based on selected course
          const filteredSubjects = subjects.filter(subject => subject.course === selectedCourse);

          // Create a Set to store unique subjects
          const uniqueSubjects = new Set(filteredSubjects.map(subject => subject.subject));

          // Populate subject dropdown with unique subjects
          uniqueSubjects.forEach(subject => {
              const option = document.createElement('option');
              option.value = subject;
              option.textContent = subject;
              subjectSelect.appendChild(option);
          });
      });

      subjectSelect.addEventListener('change', function () {
          const selectedSubject = this.value;

          // Clear existing options
          chapterSelect.innerHTML = '<option value="" selected disabled>Select Chapter</option>';

          // Filter chapters based on selected subject
          const filteredChapters = subjects.filter(subject => subject.subject === selectedSubject);

          // Create a Set to store unique chapters
          const uniqueChapters = new Set(filteredChapters.map(subject => subject.chapter));

          // Populate chapter dropdown with unique chapters
          uniqueChapters.forEach(chapter => {
              const option = document.createElement('option');
              option.value = chapter;
              option.textContent = chapter;
              chapterSelect.appendChild(option);
          });
      });
  });
</script>