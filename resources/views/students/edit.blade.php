@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{route('students.update', $student)}}">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="student_name" value='{{$student->name}}'>
            </div>
            <div class="form-group">
                <label>Surname</label>
                <input type="text" class="form-control" name="student_surname" value='{{$student->surname}}'>

            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="student_email" value='{{$student->email}}'>
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" name="student_phone" value='{{$student->phone}}'>
            </div>
            <div class="form-control">
                <label> Group</label>
                <select class="form-select" name="student_groupid">
                    @foreach($groups as $group) 
                        @if($student->group_id == $group->id)
                        <option value="{{$group->id}}" selected>{{$group->title}}</option>
                        @else
                        <option value="{{$group->id}}">{{$group->title}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary" type="submit">Update</button>
        </form>
    </div>
@endsection