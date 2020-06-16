@extends('laramaghz::admin.layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
            <div class="row mb-2">
        <div class="col-sm-7">
        <h1>
            @lang('laramaghz::laramaghz.laramaghz Import')
            <small>
                @lang('laramaghz::laramaghz.Here you Can Upload any module you generated with laramaghz')
            </small>
        </h1>
        </div>
        <div class="col-sm-5">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> @lang('laramaghz::laramaghz.Home')</a></li>
            <li class="breadcrumb-item"><a class="active"> @lang('laramaghz::laramaghz.laramaghz Import')</a></li>
        </ol>
        </div></div></div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="callout callout-info">
            <h4> @lang('laramaghz::laramaghz.laramaghz Import') !</h4>
            <p>@lang('laramaghz::laramaghz.Here you Can Upload any module you generated with laramaghz')</p>
        </div>
        <!-- Default card -->
        <div class="card card-info card-outline">
            <div class="card-header with-border">
                <h3 class="card-title">@lang('laramaghz::laramaghz.laramaghz Import')</h3>
                <div class="card-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-card-widget="collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-card-widget="remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div> 
            <div class="card-body">
            {!! Form::open(['route' => 'post-import', 'role' => 'form' , 'files' => true]) !!}
               
                    @include('laramaghz::fileds.php.file' , ['name' => 'module' , 'value' => ''])
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {!! Form::submit(trans('laramaghz::laramaghz.Save') , ['class' => 'btn btn-info']) !!}
                </div>
            {!! Form::close() !!}
        <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection
