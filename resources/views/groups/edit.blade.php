@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{route('groups.update', $group)}}">
            @csrf
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="group_title" value='{{$group->title}}'>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="group_description">
                    {{$group->description}}
                </textarea>
            </div>
            <div class="form-group">
                <label>Group teacher</label>
                <input type="text" class="form-control" name="group_teacher" value='{{$group->teacher}}'>
            </div>
            <button class="btn btn-primary" type="submit">Update</button>
        </form>
    </div>
@endsection