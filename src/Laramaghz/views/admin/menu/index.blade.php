@extends('laramaghz::admin.layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
            <div class="row mb-2">
        <div class="col-sm-7">
        <h1>
            @lang('laramaghz::laramaghz.menu control')
            <!-- <small>
                @lang('laramaghz::laramaghz.Here you Can control your menu')
            </small> -->
        </h1>
        </div>
        <div class="col-sm-5">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> @lang('laramaghz::laramaghz.Home')</a></li>
            <li class="breadcrumb-item"><a class="active">    @lang('laramaghz::laramaghz.menu control')</a></li>
        </ol>
        </div></div></div>
    </section>

    <section class="content">
    <div class="container-fluid">
        <div class="callout callout-info">
            <h4>    @lang('laramaghz::laramaghz.menu control')!</h4>
            <p> @lang('laramaghz::laramaghz.Here you Can control your menu')</p>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <!-- Default card -->
                <div class="card card-info card-outline">
                    <div class="card-header with-border">
                        <h3 class="card-title">@lang('laramaghz::laramaghz.add menu')</h3>
                        <div class="card-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-card-widget="collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-card-widget="remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div> 
                     <div class="card-body">
                    {!! Form::open(['route' => 'post-menu', 'role' => 'form']) !!}
                 
                        @include('laramaghz::fileds.php.text' , ['name' => 'name' , 'label' => trans('laramaghz::laramaghz.Menu name')])
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        {!! Form::submit(trans('laramaghz::laramaghz.Save') , ['class' => 'btn btn-info']) !!}
                    </div>
                {!! Form::close() !!}
                <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-lg-8">
                <div class="card card-info card-outline">
                    <div class="card-header with-border">
                        <h3 class="card-title">   @lang('laramaghz::laramaghz.menu control')</h3>
                        <div class="card-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-card-widget="collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-card-widget="remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                    <table class="table table-borderd table-stripped">
                        <tr>
                            <th>
                                @lang('laramaghz::laramaghz.Name')
                            </th>
                            <th>
                                @lang('laramaghz::laramaghz.Control')
                            </th>
                        </tr>
                        @foreach($menus as $menu)
                            <tr>
                                <td>
                                    {{ $menu->name }}
                                </td>
                                <td>
                                    <a href="{{ route('build-menu' , ['id' => $menu->id]) }}"
                                       class="btn btn-success"><i
                                                class="fa fa-plus"></i></a>
                                    @if($menu->id != 1)
                                        <a href="{{ route('delete-menu' , ['id' => $menu->id]) }}"
                                           class="btn btn-danger"><i
                                                    class="fa fa-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>


@endsection
