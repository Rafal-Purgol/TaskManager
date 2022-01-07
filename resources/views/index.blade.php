@if (Auth::user())
@extends('layout')
@section('card-header')
<div class="card-header">
    <h4>
        Current Tasks {{--{{Auth::user()->id}}--}}
        <a href="{{route('task.create')}}" class="btn btn-primary float-end" >New Task</a>
        <a href="{{route('comindex')}}" class="btn btn-info float-end"style="margin-right: 5px">Completed Tasks</a>
    </h4>
</div>
@endsection
@section('card-body')
@php
    $currdt = date('Y-m-d H:i:s');
@endphp
<thead>
    <tr>
        <th>ID</th>
        <th>Task Name</th>
        <th>Description</th>
        <th>Deadline</th>
        <th>Complete</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody>
    <?php $test = 'test' ?>
        @foreach ($tasks as $task)
        @if ($task->is_del === 'false')
            <tr>
                <td>{{$task->id}}</td>
                <td>{{$task->title}}</td>
                <td>{{$task->dscrpt}}</td>
                <td>
                    @if ($task->is_com === "true")
                    <p style="color:green">{{$task->dt_ddl}}</p>
                    @elseif ($task->dt_ddl < $currdt)
                    <p style="color:red">{{$task->dt_ddl}}</p>
                    @else
                    {{$task->dt_ddl}}
                    @endif
                </td>
                <td><a href="{{route('task.complete.edit', [$task->id, $task->id])}}"class="btn btn-success btn-sm">Complete</a></td>
                <td><a href="{{route('task.edit', $task->id)}}"class="btn btn-primary btn-sm">Edit</a></td>
                <td><a href="{{route('task.delete.edit', [$task->id, $task->id])}}"class="btn btn-danger btn-sm">delete</a></td>
                {{-- <td>
                    <form action="{{route('is.edit', $task->id, 'test')}}">
                        @csrf
                        @method('POST')
                        <button class="btn btn-danger btn-sm">delete</button>
                    </form>
                </td> --}}
            </tr>
        @else
        @endif
        @endforeach
    
</tbody>
@endsection
@else
@section('card-body')
<h1 class="d-flex justify-content-center">Log In to check or create some tasks</h1>    
@endsection
@endif
