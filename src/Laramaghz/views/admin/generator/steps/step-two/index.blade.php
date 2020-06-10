@extends('laramaghz::admin.layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
            <div class="row mb-2">
        <div class="col-sm-7">

        <h1>
            @lang('laramaghz::laramaghz.laramaghz Generator')
            <small>
                @lang('laramaghz::laramaghz.Here you will generate the Module')
            </small>
        </h1>
        </div>
        <div class="col-sm-5">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item"><a class="active">Generator</a></li>
        </ol>
        </div></div></div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="callout callout-info">
            <h4>@lang('laramaghz::laramaghz.Step Two')!</h4>
            <p>@lang('laramaghz::laramaghz.Step Two Description')</p>
        </div>
        <!-- Default card -->
        <div class="card card-info card-outline">
            <div class="card-header with-border">
                <h3 class="card-title">@lang('laramaghz::laramaghz.Step Two') @lang('laramaghz::laramaghz.migration')</h3>
                <div class="card-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-card-widget="collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-card-widget="remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
             {!! Form::open(['route' => ['store-step-two' , $module->id] , 'role' => 'form']) !!}
             
                    @include('laramaghz::admin.generator.steps.step-two.stored-column')
                    <div class="all-column"></div>
            </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {!! Form::submit(trans('laramaghz::laramaghz.Save') , ['class' => 'btn btn-info']) !!}
                    <span  onclick="addNewColumn()" class="btn btn-success"><i class="fa fa-plus"></i> @lang('laramaghz::laramaghz.Add')</span>
                    <span  onclick="deleteAllColumn()" class="btn btn-danger"><i class="fa fa-close"></i> @lang('laramaghz::laramaghz.Clear')</span>
                    <!-- <button onclick="addNewColumn()" class="btn btn-success" > @lang('laramaghz::laramaghz.Add')</button> -->
                    <a href="{{ route('view-step-one' , ['id' => $module->id ]) }}" class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> @lang('laramaghz::laramaghz.Back')</a>
                    <a href="{{ route('view-step-three' , ['id' => $module->id ]) }}" class="btn btn-warning"><i class="fa fa-arrow-circle-right"></i> @lang('laramaghz::laramaghz.Next')</a>
                    <a href="{{ route('view-step-four' , ['id' => $module->id ]) }}" class="btn btn-warning"><i class="fa fa-arrow-circle-right"></i> @lang('laramaghz::laramaghz.Step Four')</a>

                </div>
            <!-- /.card-footer-->
            {!! Form::close() !!}
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection

@push('js')
    <script>

        /*
         * Init value
         */

        var allColumn = $('.all-column');
        var template = '@include("laramaghz::admin.generator.steps.step-two.javascript-template")';

        /*
         * add new column
         */

        function addNewColumn() {
            allColumn.append(template);
        }

        /*
         * Remove All columns
         */

        function deleteAllColumn() {
            allColumn.html('');
        }

        /*
         * Remove on column
         */

        function removeThisColumn(e) {
            $(e).closest('.column').remove();
        }

    </script>
@endpush
