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
        <a href="{{route("groups.create")}}" class="btn btn-success">Create new group</a>
        <table class="table table-striped">
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Teacher</th>
                <th>Students count</th>
                <th>Action</th>
            </tr>

            @foreach($groups as $group)
                <tr>
                    <td>{{ $group->id }}</td>
                    <td>{{ $group->title }}</td>
                    <td>{{ $group->description }}</td>
                    <td>{{ $group->teacher }}</td>
                    <td>{{ $group->groupStudents->count() }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('groups.show', $group)}}">Show</a>
                        <a class="btn btn-secondary" href="{{route('groups.edit', $group)}}">Edit</a>
                        <form method="POST" action="{{route('groups.destroy', $group)}}">
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection