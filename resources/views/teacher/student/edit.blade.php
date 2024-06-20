@extends('teacher.admin')

@section('content')
<div class="container">
    <h1>Edit Student</h1>

    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $student->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $student->email) }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" pattern="01[1-9]-[0-9]{7,8}" value="{{ old('phone', $student->phone) }}" placeholder="Format: 01X-YYYYYYYY" required>
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{ old('dob', $student->dob) }}" required>
            @error('dob')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 d-flex">
            <label class="form-label">Gender</label>
            <div class="form-check px-3 ml-3">
                <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ old('gender', $student->gender) == 'male' ? 'checked' : '' }} required>
                <label class="form-check-label" for="male">
                    Male
                </label>
            </div>
            <div class="form-check px-3">
                <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ old('gender', $student->gender) == 'female' ? 'checked' : '' }} required>
                <label class="form-check-label" for="female">
                    Female
                </label>
            </div>
            <div class="form-check px-3">
                <input class="form-check-input" type="radio" name="gender" id="other" value="other" {{ old('gender', $student->gender) == 'other' ? 'checked' : '' }} required>
                <label class="form-check-label" for="other">
                    Other
                </label>
            </div>
        </div>

        <div class="mb-3">
            <label for="course" class="form-label">Select class</label>
            <select class="form-select form-control" id="course" name="course" required>
                <option value="" disabled>Select Class</option>
                <option value="First year" {{ old('course', $student->course) == 'First year' ? 'selected' : '' }}>First year</option>
                <option value="Second year" {{ old('course', $student->course) == 'Second year' ? 'selected' : '' }}>Second year</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Student Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
            <small id="imageHelp" class="form-text text-muted">Upload a photo of the student.</small>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="parent_name" class="form-label">Parent's Name</label>
            <input type="text" class="form-control @error('parent_name') is-invalid @enderror" id="parent_name" name="parent_name" value="{{ old('parent_name', $student->parent_name) }}" required>
            @error('parent_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="parent_phone" class="form-label">Parent's Phone Number</label>
            <input type="tel" class="form-control @error('parent_phone') is-invalid @enderror" id="parent_phone" name="parent_phone" pattern="01[1-9]-[0-9]{7,8}" value="{{ old('parent_phone', $student->parent_phone) }}" placeholder="Format: 01X-YYYYYYYY" required>
            @error('parent_phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="blood_group" class="form-label">Blood Group</label>
            <select class="form-select form-control @error('blood_group') is-invalid @enderror" id="blood_group" name="blood_group" required>
                <option value="" disabled>Select Blood Group</option>
                <option value="A+" {{ old('blood_group', $student->blood_group) == 'A+' ? 'selected' : '' }}>A+</option>
                <option value="A-" {{ old('blood_group', $student->blood_group) == 'A-' ? 'selected' : '' }}>A-</option>
                <option value="B+" {{ old('blood_group', $student->blood_group) == 'B+' ? 'selected' : '' }}>B+</option>
                <option value="B-" {{ old('blood_group', $student->blood_group) == 'B-' ? 'selected' : '' }}>B-</option>
                <option value="O+" {{ old('blood_group', $student->blood_group) == 'O+' ? 'selected' : '' }}>O+</option>
                <option value="O-" {{ old('blood_group', $student->blood_group) == 'O-' ? 'selected' : '' }}>O-</option>
                <option value="AB+" {{ old('blood_group', $student->blood_group) == 'AB+' ? 'selected' : '' }}>AB+</option>
                <option value="AB-" {{ old('blood_group', $student->blood_group) == 'AB-' ? 'selected' : '' }}>AB-</option>
            </select>
            @error('blood_group')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection