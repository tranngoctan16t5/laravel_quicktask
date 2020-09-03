@extends('layouts.app')
@section('content')
<div class="panel-body">
    @include('common.errors')
    <form action="{{ route('tasks.index') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">{{ trans('message.task') }}</label>
            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-success">
                <i class="fa fa-plus"></i>{{ trans('message.addtask')}}
                </button>
            </div>
        </div>
    </form>
</div>
@if (count($tasks) > 0)
<div class="card">
    <div class="card-heading">
        {{ trans('message.currenttask') }}
    </div>
    <div class="card-body">
        <table class="table table-striped task-table">
            <thead>
                <th>{{ trans('message.task') }}</th>
                <th>&nbsp;</th>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <!-- Task Name -->
                    <td class="table-text">
                        <div>{{ $task->name }}</div>
                    </td>
                    <td>
                        <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                            <i class="fa fa-btn fa-trash"></i>{{ trans('message.delete') }}
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection
