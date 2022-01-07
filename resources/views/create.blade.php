@extends('layout')
@section('card-header')
<div class="card-header">
    <h4>
        New Tasks
        <a href="{{route('index')}}" class="btn btn-primary float-end">All Task</a>
    </h4>
</div>
@endsection
@section('card-body')
<div class="col-md-6" style="margin:auto">
<form action="{{route('task.store')}}" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="title">Task Name</label>
        <input type="text" name="title" class="form-control" id="title">
    </div>
    <div class="form-group mb-3">
        <label for="dscrpt">Task Descripton</label>
        <textarea type="text" name="dscrpt" class="form-control" id="dscrpt" rows="5"></textarea>
    </div>
    <div class="form-group mb-3">
        <label for="dt_ddl">Deadline Date</label>
        <input type="datetime-local" name="dt_ddl" class="form-control" id="dt_ddl">
    </div>
    <div class="form-group mb-3">
        <button type="submit" class="btn btn-primary">Add Task</button>
    </div>
</form>
</div>
@endsection