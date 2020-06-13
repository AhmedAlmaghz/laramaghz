@extends('laramaghz::admin.layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
        <div class="col-sm-6">
        <h1>
       Dashboard
        </h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        </div>
            </div>
</div>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="callout callout-info">
            <h4>Tip!</h4>

            <p> LaraMaghz - Amazing ,Easy and Scalable Applications By laravel 7 -(Dashborad Admin , Web and Api) </p>
        </div>
        <!-- Default card -->
   
        <div class="row">
            <div class="col">
        <div class="card card-info card-outline">
            <div class="card-header with-border">
                <h3 class="card-title">Laramaghz</h3>

                <div class="card-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove">
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
