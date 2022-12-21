@extends('layouts.app')

@section('content')
    <div class="container">
    
    <h2>Name: {{$student->name}}</h2>
    <p>Group: {{$student->studentGroup->title}}</p>
    

    

@endsection