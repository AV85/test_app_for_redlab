@extends('layouts.layout')

@section('content')
    {!! Form::open(['route' => ['employees.update', $employee->id], 'method'=>'put']) !!}
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)
                <div>
                    {{$error}}
                </div>
            @endforeach
        </div>
    @endif
    <label for="InputLastName">Фамилия</label>
    <input type="text" class="form-control" id="InputLastName" name="last_name" value="{{$employee->last_name}}">
    <label for="InputFirstName">Имя</label>
    <input type="text" class="form-control" id="InputFirstName" name="first_name" value="{{$employee->first_name}}">
    <label for="InputPatronymic">Отчество</label>
    <input type="text" class="form-control" id="InputPatronymic" name="patronymic" value="{{$employee->patronymic}}">
    <label for="InputSex">Пол</label>
    <select class="custom-select" id="InputSex" name="sex">
        <option value="Мужской">Мужской</option>
        <option value="Женский">Женский</option>
        <option selected="selected">
            {{$employee->sex}}
        </option>
    </select>
    <label for="InputSalary">Зарплата</label>
    <input type="text" class="form-control" id="InputSalary" name="salary" value="{{$employee->salary}}">

    <div class="form-group">
        <div>Отделы</div>
        @foreach($departments as $department)
            <div>
                <label>
                    <input type="checkbox" name="departments[]" value="{{$department->id}}"
                    @if($employee->departments->where('id', $department->id)->count())
                        checked="checked"
                    @endif
                    >
                </label>
                <label>{{ucfirst($department->name)}}</label>
            </div>
        @endforeach
    </div>
    <button type="submit" class="btn btn-success">Обновить</button>
    {!! Form::close() !!}
@endsection
