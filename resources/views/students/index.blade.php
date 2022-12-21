@extends('layouts.app')

@section('content')
    <div class="container">
        
        @if(session('danger_message'))
            <div class="alert alert-danger">
                {{ session('danger_message')}}
            </div>
        @endif

        @if(session('success_message'))
            <div class="alert alert-success">
                {{ session('success_message')}}
            </div>
        @endif
        <a href="{{route("students.create")}}" class="btn btn-success">Create new student</a>
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

            @foreach($students as $student)
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
    </div>
@endsection