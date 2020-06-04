@extends('laramaghz::admin.layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @lang('laramaghz::laramaghz.laramaghz Generator')
            <small>
                @lang('laramaghz::laramaghz.Here you will generate the Module')
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a class="active">Generator</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="callout callout-info">
            <h4>@lang('laramaghz::laramaghz.Step Two')!</h4>
            <p>@lang('laramaghz::laramaghz.Step Two Description')</p>
        </div>
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('laramaghz::laramaghz.Step Two') @lang('laramaghz::laramaghz.migration')</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                            title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            {!! Form::open(['route' => ['store-step-two' , $module->id] , 'role' => 'form']) !!}
                <div class="box-body">
                    @include('laramaghz::admin.generator.steps.step-two.stored-column')
                    <div class="all-column"></div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {!! Form::submit(trans('laramaghz::laramaghz.Save') , ['class' => 'btn btn-info']) !!}
                    <span  onclick="addNewColumn()" class="btn btn-success"><i class="fa fa-plus"></i> @lang('laramaghz::laramaghz.Add')</span>
                    <span  onclick="deleteAllColumn()" class="btn btn-danger"><i class="fa fa-close"></i> @lang('laramaghz::laramaghz.Clear')</span>
                    <!-- <button onclick="addNewColumn()" class="btn btn-success" > @lang('laramaghz::laramaghz.Add')</button> -->
                    <a href="{{ route('view-step-one' , ['id' => $module->id ]) }}" class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> @lang('laramaghz::laramaghz.Back')</a>
                    <a href="{{ route('view-step-three' , ['id' => $module->id ]) }}" class="btn btn-warning"><i class="fa fa-arrow-circle-right"></i> @lang('laramaghz::laramaghz.Next')</a>
                    <a href="{{ route('view-step-four' , ['id' => $module->id ]) }}" class="btn btn-warning"><i class="fa fa-arrow-circle-right"></i> @lang('laramaghz::laramaghz.Step Four')</a>

                </div>
            <!-- /.box-footer-->
            {!! Form::close() !!}
        </div>
        <!-- /.box -->
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
