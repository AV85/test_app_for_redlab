@extends('layouts.layout')

@section('content')
    {!! Form::open(['route' => ['departments.update', $department->id], 'method'=>'put']) !!}
    @include('shared.errors')
    <label for="InputName">Наименование отдела</label>
    <input type="text" class="form-control" id="InputName" name="name" value="{{$department->name}}">
    <br>
    <button type="submit" class="btn btn-success">Добавить</button>
    {!! Form::close() !!}
@endsection
