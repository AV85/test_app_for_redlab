@extends('layouts.layout')

@section('content')

    <a class="nav-link" href="{{route('departments.create')}}"><i class="fas fa-plus"></i> Добавить отдел</a>

    <table class="table table-striped table-responsive">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Наименование отдела</th>
            <th scope="col">Количество сотрудников</th>
            <th scope="col">Максимальная заработная плата</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        @foreach($departments as $department)
            <tr>
                <td>{{$department->id}}</td>
                <td>{{$department->name}}</td>
                <td>{{count($department->employees)}}</td>
                <td>
                    @if($department->employees->max('salary'))
                     {{$department->employees->max('salary')}} грн.
                    @else
                      0
                    @endif
                </td>
                <td>
                    <a href="{{route('departments.edit', $department->id)}}" title="Редактировать"><i class="fas fa-edit"></i></a>
                    @if(count($department->employees) == 0)
                        {{Form::open(['route'=>['departments.destroy', $department->id], 'method'=>'delete'])}}
                        <button type="submit" onclick="return confirm('Вы уверены?')" class="delete">
                            <a href="#" title="Удалить"><i class="fas fa-trash text-danger"></i></a>
                        </button>
                        {{Form::close()}}
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection
