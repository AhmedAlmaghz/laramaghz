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
            <h4>@lang('laramaghz::laramaghz.Step Four')!</h4>
            <p>@lang('laramaghz::laramaghz.Step Four Description')</p>
        </div>

        <div class="row">

            <div class="col-lg-7">
                <div class="card card-info card-outline">
                    <div class="card-header with-border">
                        <h3 class="card-title">@lang('laramaghz::laramaghz.Relation')</h3>
                        <div class="card-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-card-widget="collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-card-widget="remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>

                    <table class="table table-bordered ">

                        <tr>
                            <th>
                                @lang('laramaghz::laramaghz.Related Modules')
                            </th>
                            <th>
                                @lang('laramaghz::laramaghz.Type')
                            </th>
                            <th>
                                @lang('laramaghz::laramaghz.Input Type')
                            </th>
                            <th>
                                @lang('laramaghz::laramaghz.Edit')
                            </th>
                            <th>
                                @lang('laramaghz::laramaghz.Delete')
                            </th>
                        </tr>

                        @if(!empty($relations))
                            @foreach($relations as $relation)
                                <tr>
                                    <td>
                                        {{ $relation->module_to->name }}
                                    </td>
                                    <td>
                                        {{ $relation->type }}
                                    </td>
                                    <td>
                                        {{ $relation->input_type }}
                                    </td>
                                    <td>
                                        {{ $relation->module_to->name }}
                                    </td>
                                    <td>
                                        <a href="{{ route('delete-relation' , $relation->id) }}" class="btn btn-danger"><i
                                                    class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </table>

                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="row">
                            <span>
                        {!! Form::open(['route' => ['build-module' ,  $module->id] , 'role' => 'form' , 'class' => 'pull-left']) !!}
                        {!! Form::submit(trans('laramaghz::laramaghz.Build') , ['class' => 'btn btn-info']) !!}
                        {!! Form::close() !!}
                            </span>
                            <span>
                        {!! Form::open(['route' => ['migrate-module' ,  $module->id] , 'role' => 'form' , 'method' => 'post' ,'class' => 'pull-left' , 'style' => 'margin:0px 10px;']) !!}
                        {!! Form::submit(trans('laramaghz::laramaghz.Migrate') , ['class' => 'btn btn-info']) !!}
                        {!! Form::close() !!}
                            </span>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <!-- Default card -->
                <div class="card card-info card-outline">
                    <div class="card-header with-border">
                        <h3 class="card-title">@lang('laramaghz::laramaghz.Add New Relation')</h3>
                        <div class="card-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-card-widget="collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-card-widget="remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    {!! Form::open(['route' => ['store-step-four' ,  $module->id] , 'role' => 'form']) !!}
                    <div class="card-body">
                        {!! Form::hidden('module_id_from' , $module->id) !!}
                        <div class="row">

                            <div class="col-lg-12">
                                <h3>
                                    {{ trans('laramaghz::laramaghz.Related Module')  }}
                                </h3>
                            </div>

                            <div class="col-lg-6">
                                @include('laramaghz::fileds.php.select' , ['name' => 'module_to_id' ,'array' => $modules->toArray(), 'label' => trans('laramaghz::laramaghz.Related Module')  ])
                            </div>

                            <div class="col-lg-6">
                                @include('laramaghz::fileds.php.select' , ['name' => 'column_id' ,'array' => [], 'label' => trans('laramaghz::laramaghz.Related Module Columns')])
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-lg-12">
                                <h3>
                                    {{ trans('laramaghz::laramaghz.Relation')  }}
                                </h3>
                            </div>

                            <div class="col-lg-6">
                                @include('laramaghz::fileds.php.select' , ['name' => 'type' ,'array' => $relationType, 'label' => trans('laramaghz::laramaghz.Relation type') ])
                            </div>

                            <div class="col-lg-6">
                                @include('laramaghz::fileds.php.select' , ['name' => 'input_type' ,'array' => $relationInput, 'label' => trans('laramaghz::laramaghz.Relation type') ])
                            </div>


                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        {!! Form::submit(trans('laramaghz::laramaghz.Save') , ['class' => 'btn btn-info']) !!}
                        <a href="{{ route('view-step-three' , ['id' => $module->id ]) }}" class="btn btn-warning"><i
                                    class="fa fa-arrow-circle-left"></i> @lang('laramaghz::laramaghz.Back')</a>
                        <a href="{{ route('view-step-two' , ['id' => $module->id ]) }}" class="btn btn-warning"><i
                                    class="fa fa-arrow-circle-left"></i> @lang('laramaghz::laramaghz.Step Two')</a>
                        <a href="{{ route('view-step-one' , ['id' => $module->id ]) }}" class="btn btn-warning"><i
                                    class="fa fa-arrow-circle-left"></i> @lang('laramaghz::laramaghz.Step One')</a>
                    </div>
                    <!-- /.card-footer-->
                    {!! Form::close() !!}
                </div>
                <!-- /.card -->
            </div>

        </div>

    </section>
    <!-- /.content -->
@endsection

@push('js')
@include('laramaghz::admin.generator.steps.step-four.scripts.related-model')
@endpush
