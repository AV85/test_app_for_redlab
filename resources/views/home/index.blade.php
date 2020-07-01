@extends('layouts.layout')

@section('content')

    <table class="table table-responsive table-bordered">
        <thead class="thead-dark">
            <tr>
                <th></th>
                @foreach($departments as $department)
                <th scope="col">
                    {{$department->name}}
                </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
            <tr>
                <td>{{$employee->last_name}} {{$employee->first_name}} {{$employee->patronymic}}</td>
                @foreach($departments as $department)
                    <td class="text-success text-center">
                        @if($employee->departments->where('id', $department->id)->count())
                        <i class="fas fa-check"></i>
                        @endif
                    </td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
