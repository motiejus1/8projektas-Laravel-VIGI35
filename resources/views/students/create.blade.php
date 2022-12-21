@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{route('students.store')}}">
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
            <div class="form-control">
                <label> Group</label>
                <select class="form-select" name="student_groupid">
                    @foreach($groups as $group) 
                        <option value="{{$group->id}}">{{$group->title}}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary" type="submit">Create</button>
        </form>
    </div>
@endsection