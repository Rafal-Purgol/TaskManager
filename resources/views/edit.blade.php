@extends('layout')
@section('card-header')
<div class="card-header">
    <h4>
        Edit Tasks <span class="badge bg-info">{{$task->title}}</span>
        <a href="{{route('index')}}" class="btn btn-primary float-end">All Task</a>
    </h4>
</div>
@endsection
@section('card-body')
@php
    $currdt = date('Y.m.d H:i:s');
@endphp
<div class="col-md-6" style="margin:auto">
<form action="{{route('task.update', $task->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label for="title">Task Name</label>
        <input type="text" name="title" class="form-control" id="title" value="{{$task->title}}">
    </div>
    <div class="form-group mb-3">
        <label for="dscrpt">Task Descripton</label>
        <textarea type="text" name="dscrpt" class="form-control" id="dscrpt" rows="5" >{{$task->dscrpt}}</textarea>
    </div>
    <div class="form-group col-md-6" style="float: left">
        <label for="dt_ddl">Deadline Date</label>
        <input type="datetime-local" name="dt_ddl" class="form-control" id="dt_ddl" >
    </div>
        <div class="form-group col-md-6" style="float: right">
            <label for="is_com">Status</label>
            <select name="is_com" class="form-control" id="is_com" >
                @foreach ($statuses as $status)
                    <option value="{{$status['value']}}" {{$task->is_com === $status['value'] ? 'selected' :''}}> {{$status['label']}}</option>
                @endforeach
            </select>
        </div>
    <div class="form-group mb-3">
        <button type="submit" class="btn btn-primary">Edit Task</button>
    </div>
</form>
</div>
@endsection