@extends('layout')
@section('card-header')
<div class="card-header">
    <h4>
        Completed Tasks
        <a href="{{route('index')}}" class="btn btn-primary float-end">All Task</a>
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
        <th>Restore</th>
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
                <td>{{$task->dt_ddl}}</td>
                <td><a href="{{route('task.complete.edit', [$task->id, $task->id])}}"class="btn btn-success btn-sm">Restore</a></td>
                <td><a href="{{route('task.delete.edit', [$task->id, $task->id])}}"class="btn btn-danger btn-sm">Delete</a></td>
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