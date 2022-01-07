@extends('layout')
@section('card-header')
<div class="card-header">
    <h4>
        Complete Tasks <span class="badge bg-info">{{$task->title}}</span>
        <a href="{{route('index')}}" class="btn btn-primary float-end">All Task</a>
    </h4>
</div>
@endsection
@section('card-body')
@php
    $currdt = date('Y.m.d H:i:s');
@endphp
<div class="col-md-6" style="margin:auto">
<form action="{{route('task.complete.update', [$task->id, $task->id])}}" method="POST">
    @csrf
    @method('PUT')
    <tr>
        
        <div class="form-group col-md-6" style="margin:auto">
            <label for="is_com">Complete task</label>
            <select name="is_com" class="form-control" id="is_com" >
                @foreach ($statuses as $status)
                    <option value="{{$status['value']}}" {{$task->is_com === $status['value'] ? 'selected' :''}}> {{$status['label']}}</option>
                @endforeach
            </select>
        </div>
    </tr>
    <tr>
        <br>
    <div class="form-group col-md-6" style="margin:auto">
        <button type="submit" class="btn btn-success">Complete</button>
    </div>
    </tr>
</form>
</div>
@endsection