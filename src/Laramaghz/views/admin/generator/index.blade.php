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
            <h4>@lang('laramaghz::laramaghz.Modules')!</h4>
            <p>@lang('laramaghz::laramaghz.Modules Description')</p>
        </div>
        <!-- Default card -->
        <div class="card card-info card-outline">
            <div class="card-header with-border">
                <h3 class="card-title">@lang('laramaghz::laramaghz.Modules')</h3>
                <div class="card-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-card-widget="collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-card-widget="remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-responsive table-bordered ">
                    <tr >
                        <th >
                            @lang('laramaghz::laramaghz.Name')
                        </th>
                        <th align="center">
                            @lang('laramaghz::laramaghz.Delete')
                        </th>
                        <th align="center">
                            @lang('laramaghz::laramaghz.Setting')
                        </th>
                        <th align="center">
                            @lang('laramaghz::laramaghz.Migration')
                        </th>
                        <th align="center">
                            @lang('laramaghz::laramaghz.Validation')
                        </th>
                        <th align="center">
                            @lang('laramaghz::laramaghz.Relations')
                        </th>
                        <th align="center">
                            @lang('laramaghz::laramaghz.Translation')
                        </th>
                    </tr>
                    @foreach($modules as $module)
                        <tr>
                            <td>{{ $module->name  }}</td>
                            <td width="100" align="center"><a href="{{ route('delete-module' , ['id' => $module->id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                            <td width="100" align="center"><a href="{{ route('view-step-one' , ['id' => $module->id]) }}" class="btn btn-warning"><i class="fa fa-gear"></i></a></td>
                            <td width="100" align="center"><a href="{{ route('view-step-two' , ['id' => $module->id]) }}" class="btn btn-success"><i class="fa fa-database"></i></a></td>
                            <td width="100" align="center"><a href="{{ route('view-step-three' , ['id' => $module->id]) }}" class="btn btn-success"><i class="fa fa-check"></i></a></td>
                            <td width="100" align="center"><a href="{{ route('view-step-four' , ['id' => $module->id]) }}" class="btn btn-success"><i class="fa fa-link"></i></a></td>
                            <td width="100" align="center"><a href="{{ route('view-step-five' , ['id' => $module->id]) }}" class="btn btn-success"><i class="fa fa-language"></i></a></td>

                        </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection
