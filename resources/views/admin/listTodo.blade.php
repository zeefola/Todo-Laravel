@extends('admin.layout.frontend')

@section('header')

    @includeIf('admin.layout.header', ['title' => 'All Todo', 'subtitle' => 'All Todo'])

@endsection

@section('main-content')
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        @if ($todos->count() > 0)
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Todos</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                            title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body p-0">
                    @includeIf('admin.layout.error_template')
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Description
                                </th>
                                {{-- <th style="width: 8%" class="text-center">
                                    Status
                                </th> --}}
                                <th class="project-actions text-right">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($todos as $todo)
                                <tr>
                                    <td>
                                        {{ $todo->id }}
                                    </td>
                                    <td>
                                        {{ $todo->name }}
                                    </td>
                                    <td>
                                        {{ $todo->title }}
                                    </td>
                                    <td>
                                        {{ $todo->description }}
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="{{ route('editTodo', $todo->id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="{{ route('deleteTodo', $todo->id) }}">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

        @else
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Empty Record</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form role="form">
                        <div class="row">
                            <div class="form-group">
                                <div class="custom-control">
                                    <label for="customSwitch1">No Todo Yet, Create One.</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning"> <a href="/create"> Create </a> </button>
                            <button type="submit" class="btn btn-default float-right"> <a href="/">Cancel </a>
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        @endif
        <!-- /.card -->
    </section>
    <!-- /.content -->

@endsection
