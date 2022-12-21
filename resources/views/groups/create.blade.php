@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{route('groups.store')}}">
            @csrf
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="group_title">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="group_description">
                </textarea>
            </div>
            <div class="form-group">
                <label>Group teacher</label>
                <input type="text" class="form-control" name="group_teacher">
            </div>
            <button class="btn btn-primary" type="submit">Create</button>
        </form>
    </div>
@endsection