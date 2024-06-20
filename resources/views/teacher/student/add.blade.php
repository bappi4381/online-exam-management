@extends('teacher.admin')

@section('content')
   <section>
      <div class="container">
        <h4 class="text-primary text-uppercase font-weight-bold py-3">Add Student</h4>
        <div class="row">
            <div class="col-8">
                <div class="card px-5 py-5">
                    <form action="{{ route('submit-student') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" pattern="01[1-9]-[0-9]{7,8}" placeholder="Format: 01X-YYYYYYYY">
    
                        </div>
                        <!-- Date of Birth -->
                        <div class="mb-3">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" required>
                        </div>
                        <!-- Gender -->
                        <div class="mb-3 d-flex ">
                            <label class="form-label">Gender</label>

                            <div class="form-check px-3 ml-3">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check px-3">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female" required>
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                            <div class="form-check px-3">
                                <input class="form-check-input" type="radio" name="gender" id="other" value="other" required>
                                <label class="form-check-label" for="other">
                                    Other
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="course" class="form-label">Select class</label>
                            <select class="form-select form-control" id="course" name="course" required>
                                <option value="" selected disabled>Select Class</option>
                                <option value="First year">First year</option>
                                <option value="Second year">Second year</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Student Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <small id="imageHelp" class="form-text text-muted">Upload a photo of the student.</small>
                        </div>
                        <!-- Parent's Name -->
                        <div class="mb-3">
                            <label for="parent_name" class="form-label">Parent's Name</label>
                            <input type="text" class="form-control" id="parent_name" name="parent_name" required>
                        </div>
                        <!-- Parent's Phone Number -->
                        <div class="mb-3">
                            <label for="parent_phone" class="form-label">Parent's Phone Number</label>
                            <input type="tel" class="form-control" id="parent_phone" name="parent_phone" pattern="01[1-9]-[0-9]{7,8}" placeholder="Format: 01X-YYYYYYYY">
                        </div>

                        <div class="mb-3">
                            <label for="blood_group" class="form-label">Blood Group</label>
                            <select class="form-select form-control" id="blood_group" name="blood_group" required>
                                <option value="" selected disabled>Select Blood Group</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
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