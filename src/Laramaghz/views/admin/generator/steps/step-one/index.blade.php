@extends('laramaghz::admin.layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
            <div class="row mb-2">
        <div class="col-sm-7">
        <h1>
            @lang('laramaghz::laramaghz.laramaghz Generator')
           
        </h1>
        </div>

        <div class="col-sm-5">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> @lang('laramaghz::laramaghz.Home')</a></li>
            <li class="breadcrumb-item"><a href="{{ route('modules') }}"> @lang('laramaghz::laramaghz.Module')</a></li>
            <li class="breadcrumb-item"><a class="active">@lang('laramaghz::laramaghz.Step One')</a></li>
        </ol>
        </div></div></div>
    </section>
    <!-- Main content -->
    <section class="content">
          <div class="container-fluid">
        <div class="callout callout-info">
            <h4>@lang('laramaghz::laramaghz.Step One')!</h4>
            <p>@lang('laramaghz::laramaghz.Step One Description')</p>
        </div>
        <!-- Default card -->
        <div class="card card-info card-outline">
            <div class="card-header with-border">
                <h3 class="card-title">@lang('Step One')</h3>
                <div class="card-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-card-widget="collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-card-widget="remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div> 
            <div class="card-body">
            @if($module)
                {!! Form::open(['route' => ['update-step-one' , $module->id] , 'role' => 'form']) !!}
            @else
                {!! Form::open(['route' => 'store-step-one' , 'role' => 'form']) !!}
            @endif
               
                    @include('laramaghz::fileds.php.text' , ['name' => 'name' , 'label' => trans('laramaghz::laramaghz.Module').' '.trans('laramaghz::laramaghz.Name') , 'value' => $module ? $module->name : '' ])
                    <div class="row">
                        <div class="col-lg-3">
                            @include('laramaghz::fileds.php.select' , ['name' => 'admin' , 'label' => trans('laramaghz::laramaghz.Generate').' '.trans('laramaghz::laramaghz.Admin') , 'array' => yesNoWordArray() , 'value' => $module ?  $module->admin : null])
                        </div>
                        <div class="col-lg-3">
                            @include('laramaghz::fileds.php.select' , ['name' => 'website' , 'label' => trans('laramaghz::laramaghz.Generate').' '.trans('laramaghz::laramaghz.Website') ,'array' => yesNoWordArray() , 'value' => $module ?  $module->website : null  ])
                        </div>
                        <div class="col-lg-3">
                            @include('laramaghz::fileds.php.select' , ['name' => 'api' , 'label' => trans('laramaghz::laramaghz.Generate').' '.trans('laramaghz::laramaghz.Api') ,'array' => yesNoWordArray() , 'value' => $module ?  $module->api : null])
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {!! Form::submit(trans('laramaghz::laramaghz.Save') , ['class' => 'btn btn-info']) !!}
                    @if($module)
                        <a href="{{ route('view-step-two' , ['id' => $module->id ]) }}" class="btn btn-warning"><i class="fa fa-arrow-circle-right"></i> @lang('laramaghz::laramaghz.Next')</a>
                        <a href="{{ route('view-step-three' , ['id' => $module->id ]) }}" class="btn btn-warning"><i class="fa fa-arrow-circle-right"></i> @lang('laramaghz::laramaghz.Step Three')</a>
                        <a href="{{ route('view-step-four' , ['id' => $module->id ]) }}" class="btn btn-warning"><i class="fa fa-arrow-circle-right"></i> @lang('laramaghz::laramaghz.Step Four')</a>
                    @endif
                </div>
                <!-- /.card-footer-->
            {!! Form::close() !!}
        </div>
        <!-- /.card -->
          </div>
    </section>
    <!-- /.content -->
@endsection
