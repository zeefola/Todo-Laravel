@extends('admin.layout.frontend')

@section('header')

    @includeIf('admin.layout.header', ['title' => 'Edit Todo', 'subtitle' => 'Edit Todo'])

@endsection

@section('main-content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- right column -->
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Update Todo</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" action="{{ route('todoEdit', $todo->id) }}" method="post">
                            @includeIf('admin.layout.error_template')
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3" name="name"
                                            value="{{ $todo->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword3" name="title"
                                            value="{{ $todo->title }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="inputEmail3" rows="10"
                                            name="description"> {{ $todo->description }} </textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Update</button>
                                <button type="submit" class="btn btn-default float-right"><a href="/">Cancel</a></button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
