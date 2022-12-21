@extends('layouts.app')

@section('content')
    <div class="container">
    
    <h2>Title: {{$group->title}}</h2>
    <p>Description: {{$group->description}}</p>
    <p>Teacher: {{$group->teacher}}</p>
    </div>
{{-- students store nukelia mus i studens index vaizda --}}
{{-- atgal i show vaizda --}}
<table class="table table-striped">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Group</th>
        <th>Action</th>
    </tr>

    @foreach($group->groupStudents as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->surname }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->phone }}</td>
            <td>{{ $student->studentGroup->title }}</td>
            <td>
                <a class="btn btn-primary" href="{{route('students.show', $student)}}">Show</a>
                <a class="btn btn-secondary" href="{{route('students.edit', $student)}}">Edit</a>
                <form method="POST" action="{{route('students.destroy', $student)}}">
                    @csrf
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

    <form method="POST" action="{{route('students.storeGroupView')}}">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="student_name">
        </div>
        <div class="form-group">
            <label>Surname</label>
            <input type="text" class="form-control" name="student_surname">

        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="student_email">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" name="student_phone">
        </div>
        
            <input type="hidden" class="form-select" name="student_groupid" value="{{$group->id}}">

        <button class="btn btn-primary" type="submit">Create</button>
    </form>


    

@endsection