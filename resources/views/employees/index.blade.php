@extends('layouts.layout')

@section('content')

    <a class="nav-link" href="{{route('employees.create')}}"><i class="fas fa-plus"></i> Добавить сотрудника</a>

    <table class="table table-striped table-responsive">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Фамилия</th>
            <th scope="col">Имя</th>
            <th scope="col">Отчество</th>
            <th scope="col">Пол</th>
            <th scope="col">Заработная плата</th>
            <th scope="col">Перечень отделов</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        @foreach($employees as $employee)
            <tr>
                <td>{{$employee->id}}</td>
                <td>{{$employee->last_name}}</td>
                <td>{{$employee->first_name}}</td>
                <td>{{$employee->patronymic}}</td>
                <td>{{$employee->sex}}</td>
                <td>{{$employee->salary}}</td>
                <td>
                    @foreach($employee->departments as $department)
                        {{$department->name}},
                    @endforeach
                </td>
                <td>
                    <a href="{{route('employees.edit', $employee->id)}}" title="Редактировать"><i class="fas fa-edit"></i></a>
                        {{Form::open(['route'=>['employees.destroy', $employee->id], 'method'=>'delete'])}}
                        <button type="submit" onclick="return confirm('Вы уверены?')" class="delete">
                            <a href="#" title="Удалить"><i class="fas fa-trash text-danger"></i></a>
                        </button>
                        {{Form::close()}}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection
