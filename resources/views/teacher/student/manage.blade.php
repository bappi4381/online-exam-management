@extends('teacher.admin')
@section('content')
    <div class="px-2">
        <h1 class="text-primary">Student List</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Password</th>
                    <th>Gender</th>
                    <th>Blood Group</th>
                    <th>Course</th>
                    <th>Parent's Name</th>
                    <th>Parent's Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->password }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->blood_group }}</td>
                    <td>{{ $student->course }}</td>
                    <td>{{ $student->parent_name }}</td>
                    <td>{{ $student->parent_phone }}</td>
                    <td>
                        <!-- Example: Add edit and delete actions -->
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection