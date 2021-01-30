@extends('admin.layout.frontend')

@section('header')

    @includeIf('admin.layout.header', ['title' => 'Create Todo', 'subtitle' => 'Create Todo'])

@endsection

@section('main-content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- right column -->
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Create Todo</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" action="/create-todo" method="post">
                            @includeIf('admin.layout.error_template')
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3"
                                            placeholder="Enter todo name" name="name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword3"
                                            placeholder="Enter toto title" name="title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="inputEmail3" rows="10"
                                            placeholder="Enter todo description" name="description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning">Create</button>
                                <button type="submit" class="btn btn-default float-right"><a href="/">Cancel </a></button>
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
