<!-- resources/views/tasks/index.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="{{$url}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            {{ method_field($method) }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control" value="{{$name or ''}}">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
              @if($name == '')
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i>
                          Add Task
                    </button>
                </div>

              @else

                <div class="col-sm-offset-3 col-sm-1">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i>
                          Update
                    </button>
                </div>
                <div class="col-sm-1">
                  <a href="{{url('tasks/')}}" class="btn btn-default">Cancle</a>
                </div>
              @endif
            </div>
        </form>
    </div>

    <!-- Current Tasks -->
    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Tasks
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th width="30%">Task</th>
                        <th width="10%">&nbsp;</th>
                        <th width="60%">&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>
                                <td>
                                  <form class="" action="{{ url('task/'.$task->id).'/edit' }}" method="GET">
                                    {{ csrf_field() }}
                                    <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-primary">
                                        <i class="fa fa-btn fa-trash"></i>Edit
                                    </button>
                                  </form>
                                </td>
                                <td>
                                  <form action="{{ url('task/'.$task->id) }}" method="POST">
                                      {{ csrf_field() }}
                                      {{ method_field('DELETE') }}
                                      <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                          <i class="fa fa-btn fa-trash"></i>Delete
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
