@extends('laramaghz::admin.layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
            <div class="row mb-2">
        <div class="col-sm-7">
        <h1>
            @lang('laramaghz::laramaghz.laramaghz')
           
        </h1>

        </div>
        <div class="col-sm-5">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> @lang('laramaghz::laramaghz.Home')</a></li>
            <li class="breadcrumb-item"><a href="{{ route('modules') }}"> @lang('laramaghz::laramaghz.Module')</a></li>
            <li class="breadcrumb-item"><a class="active">@lang('laramaghz::laramaghz.Translate')</a></li>
        </ol>
        </div></div></div>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="callout callout-info">
            <h4>@lang('laramaghz::laramaghz.Translate') !</h4>
            <p>@lang('laramaghz::laramaghz.Add Edit Remove Translation From') {{ $module->name }} .</p>
        </div>
        <!-- Default card -->
        <div class="card card-info card-outline">
            <div class="card-header with-border">
                <h3 class="card-title">@lang('Step One')</h3>
                <div class="card-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div> 
            <div class="card-body">
            {!! Form::open(['route' => ['store-step-five' , $module->id] , 'role' => 'form']) !!}
           
                <div class="row">
                    <div class="col-lg-2">
                        <h3>@lang('laramaghz::laramaghz.Keys')</h3>
                    </div>
                    @foreach($languages as $lang)
                        <div class="col-lg-3">
                            <h3>{{ $lang['native'] }}</h3>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    @foreach($languages as $langKey => $lang)
                        @if(key($languages) == $langKey)
                            <div id="keys" class="keys col-lg-2">
                                @endif
                                @foreach($arrays[$langKey] as $key => $ar)
                                    @if(key($languages) == $langKey)
                                        <div class="row" data-key="{{ $key }}">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input type="text" name="keys[{{ $key }}]" value="{{ $key }}"
                                                           class="form-control keys-count">
                                                    <span class="btn btn-link"
                                                          style="position: absolute;right: 10px;top:0px" onclick="deleteLine('{{ $key }}')"><i
                                                                class="fa fa-trash"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                @if(key($languages) == $langKey)
                            </div>
                        @endif
                    @endforeach
                    @foreach($languages as $langKey => $lang)
                        <div class="col-lg-3 lang" id="{{ $langKey }}">
                            @foreach($arrays[$langKey] as $key => $ar)
                                <div class="form-group" data-key="{{ $key }}">
                                    <input type="text" name="string[{{ $langKey }}][{{$key}}]" value="{{ $ar }}"
                                           class="form-control">
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- /.card-body -->
            <div class="card-footer">
                {!! Form::submit(trans('laramaghz::laramaghz.Save') , ['class' => 'btn btn-info']) !!}
                <span class="btn btn-success" onclick="addNewLine()"><i class="fa fa-plus"></i></span>
                <a href="{{ route('modules')}}" class="btn btn-warning"><i
                            class="fa fa-arrow-circle-left"></i> @lang('laramaghz::laramaghz.Modules')</a>
            </div>
            <!-- /.card-footer-->
            {!! Form::close() !!}
        </div>
        <!-- /.card -->
    </div>
    </section>
    <!-- /.content -->
@endsection


@push('js')
<script>
    var langs = $('.lang'), keys = $('#keys');
    function addNewLine() {
        var countKeys = parseInt($('.keys-count').length) + 1;

        keys.append('<div class="row" data-key="'+countKeys+'"> <div class="col-lg-12"> <div class="form-group"> <input type="text" name="keys[' + countKeys + ']" placeholder="@lang('laramaghz::laramaghz.Key')"  class="form-control keys-count"> <span class="btn btn-link"style="position: absolute;right: 10px;top:0px" onclick="deleteLine('+ countKeys + ')"><i class="fa fa-trash"></i></span> </div> </div> </div>');

        $.each(langs, function () {
            id = $(this).attr('id');
            $(this).append('<div class="form-group" data-key="'+countKeys+'"> <input type="text" name="string[' + id + '][' + countKeys + ']" value="" class="form-control" placeholder="' + id + '"> </div>');
        });
    }

    function deleteLine(key) {
        $('div[data-key = '+key+']').remove();
    }
</script>
@endpush
