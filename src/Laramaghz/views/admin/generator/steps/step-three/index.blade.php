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
        </div>
            </div>
    </div>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">

        <div class="callout callout-info">
            <h4>@lang('laramaghz::laramaghz.Step Three')!</h4>
            <p>@lang('laramaghz::laramaghz.Step Three Description')</p>
        </div>
        <!-- Default card -->
        <div class="card  card-info card-outline">
            <div class="card-header with-border">
                <h3 class="card-title">@lang('laramaghz::laramaghz.Step Three')</h3>
                <div class="card-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-card-widget="collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-card-widget="remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
            {!! Form::open(['route' => ['store-step-three' ,  $module->id] , 'role' => 'form']) !!}
            
                <table class="table table-bordered table-responsive ">
                <thead>
                <tr>
                        <th style="width:200px">
                            @lang('laramaghz::laramaghz.Name')
                        </th>
                        <th  style="width:auto">
                            @lang('laramaghz::laramaghz.Validation')
                        </th>
                        <th style="width:400px">#</th>
                    </tr>
                </thead>
                    @foreach($module->columns as $column)
                        @if(isset($column->details))
                            @php $validation  =   json_decode($column->details->validation , true) ?? [] @endphp
                        @else
                            @php $validation  = [] @endphp
                        @endif
                        <tr>
                            <td>
                                {{ $column->name }}
                            </td>
                            <td>
                                <div class="row">
                                @foreach($validationRules as $key => $value)

                                    <div class="col-lg-6">
                                        @if(!$value)
                                            {!!  Form::checkbox('validation['.$column->id.']['.$key.']' , $key, in_array($key , $validation) , ['id' => $key]) !!}
                                            <label for="{{ $value }}">{{ $key }}</label>
                                        @else
                                            <label for="{{ $value }}">{{ $key }}</label>
                                            @include('laramaghz::fileds.php.text' , ['name' =>'validation['.$column->id.']['.$key.']' ,'value' => key_exists($key , $validation) ? $validation[$key] : '' ])
                                        @endif
                                    </div>
                                @endforeach
                                <div class="col-lg-12">
                                    @include('laramaghz::fileds.php.text' , ['name' =>'custom_validation['.$column->id.']', 'label' => trans('laramaghz::laramaghz.custom validation')  ,'value' => isset($column->details->custom_validation) ? $column->details->custom_validation :  null ])
                                </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                @if($module->admin == 'yes')
                                    <div class="col-lg-6">
                                        @include('laramaghz::fileds.php.select' , ['name' => 'admin_crud['.$column->id.']' ,'array' => yesNoWordArray() , 'label' => trans('laramaghz::laramaghz.Show in admin crud') , 'value' => isset($column->details->admin_crud) ? $column->details->admin_crud :  null ])
                                    </div>
                                    <div class="col-lg-6">
                                        @include('laramaghz::fileds.php.select' , ['name' => 'admin_filter['.$column->id.']' ,'array' => yesNoWordArray() , 'label' => trans('laramaghz::laramaghz.Show in admin Filter') , 'value' => isset($column->details->admin_filter) ? $column->details->admin_filter :  null ])
                                    </div>
                                @endif
                                @if($module->website == 'yes')
                                    <div class="col-lg-6">
                                        @include('laramaghz::fileds.php.select' , ['name' => 'site_crud['.$column->id.']' ,'array' => yesNoWordArray(), 'label' => trans('laramaghz::laramaghz.Show in website crud') , 'value' => isset($column->details->site_crud) ? $column->details->site_crud :  null ])
                                    </div>
                                    <div class="col-lg-6">
                                        @include('laramaghz::fileds.php.select' , ['name' => 'website_filter['.$column->id.']' ,'array' => yesNoWordArray(), 'label' => trans('laramaghz::laramaghz.Show in website Filter') , 'value' => isset($column->details->website_filter) ? $column->details->website_filter :  null ])
                                    </div>
                                @endif
                                @if($module->api == 'yes')
                                    <div class="col-lg-6">
                                        @include('laramaghz::fileds.php.select' , ['name' => 'transformer['.$column->id.']' ,'array' => yesNoWordArray() , 'label' => trans('laramaghz::laramaghz.Show in transformers') , 'value' => isset($column->details->transformer) ? $column->details->transformer :  null ])
                                    </div>
                                @endif
                                <div class="col-lg-6">
                                    @include('laramaghz::fileds.php.select' , ['name' => 'html_type['.$column->id.']' ,'array' => $htmlInputType, 'label' => trans('laramaghz::laramaghz.Input Type') , 'value' => isset($column->details->html_type) ? $column->details->html_type :  null ])
                                </div>
                                </div>
                            </td>
                            {!! Form::hidden('column_id[]' , $column->id) !!}
                        </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                {!! Form::submit(trans('laramaghz::laramaghz.Save') , ['class' => 'btn btn-info']) !!}
                <a href="{{ route('view-step-two' , ['id' => $module->id ]) }}" class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> @lang('laramaghz::laramaghz.Back')</a>
                <a href="{{ route('view-step-one' , ['id' => $module->id ]) }}" class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> @lang('laramaghz::laramaghz.Step One')</a>
                <a href="{{ route('view-step-four' , ['id' => $module->id ]) }}" class="btn btn-warning"><i class="fa fa-arrow-circle-right"></i> @lang('laramaghz::laramaghz.Step Four')</a>

            </div>
            <!-- /.card-footer-->
            {!! Form::close() !!}
        </div>
        <!-- /.card -->
    </div>
    </section>
    <!-- /.content -->

@endsection
