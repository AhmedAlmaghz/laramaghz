@extends('laramaghz::admin.layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
        <div class="col-sm-6">
        <h1>
        Blank example to the fixed layout
        </h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Layout</a></li>
            <li class="breadcrumb-item active">Fixed</li>
        </ol>
        </div>
            </div>
</div>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="callout callout-info">
            <h4>Tip!</h4>

            <p>Add the fixed class to the body tag to get this layout. The fixed layout is your best option if your
                sidebar
                is bigger than your content because it prevents extra unwanted scrolling.</p>
        </div>
        <!-- Default card -->
        <div class="container-fluid">
        <div class="row">
            <div class="col">
        <div class="card">
            <div class="card-header with-border">
                <h3 class="card-title">Title</h3>

                <div class="card-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                            title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                Start creating your amazing application!
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>

        <!-- /.card -->
</div>
        </div>
    </div>
    </section>
    <!-- /.content -->
@endsection
