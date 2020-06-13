@extends('laramaghz::admin.layout.app')
@php use Illuminate\Support\Arr
@endphp
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
            <div class="row mb-2">
        <div class="col-sm-7">
        <h1>
            @lang('laramaghz::laramaghz.build menu')
            <!-- <small>
                @lang('laramaghz::laramaghz.Here you Can build your menu')
            </small> -->
        </h1>
        </div>
        <div class="col-sm-5">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> @lang('laramaghz::laramaghz.Home')</a></li>
            <li class="breadcrumb-item"><a class="active"> @lang('laramaghz::laramaghz.menu builder')</a></li>
        </ol>
        </div></div></div>
    </section>

    <section class="content">
    <div class="container-fluid">
        <div class="callout callout-info">
            <h4> @lang('laramaghz::laramaghz.menu controller') !</h4>
            <p> @lang('laramaghz::laramaghz.Here you Can control your menu')</p>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <!-- Default card -->
                <div class="card card-info card-outline">
                    <div class="card-header with-border">
                        <h3 class="card-title">@lang('laramaghz::laramaghz.add item')</h3>
                        <div class="card-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-card-widget="collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-card-widget="remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                     <div class="card-body">
                    {!! Form::open(['route' => 'itmes.store', 'role' => 'form']) !!}
                       
                            @include('laramaghz::fileds.php.text' , ['name' => 'name_ar' , 'label' => trans('laramaghz::laramaghz.Item name Arabic')])
                            @include('laramaghz::fileds.php.text' , ['name' => 'name_en' , 'label' => trans('laramaghz::laramaghz.Item name English')])
                            @include('laramaghz::fileds.php.text' , ['name' => 'icon' , 'label' => trans('laramaghz::laramaghz.icon') , 'placeholder' => '<i class="fa fa-trash"></i>'])
                            @include('laramaghz::fileds.php.text' , ['name' => 'link' , 'label' => trans('laramaghz::laramaghz.link')])
                            @include('laramaghz::fileds.php.select' , ['name' => 'parent_id' , 'label' => trans('laramaghz::laramaghz.Parent Item') , 'array' => [ 0 => trans('laramaghz::laramaghz.No parent menu')] + $parents])
                            <input type="hidden" name="menu_id" value="{{ $menu->id }}">
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
                        <h3 class="card-title">@lang('laramaghz::laramaghz.menu builder') {{ $menu->name }}</h3>
                        <div class="card-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-card-widget="collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-card-widget="remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                    <table class="table table-borderd table-stripped">
                        @foreach($items as $item)
                            @php $parent = $item->parent->count() > 0 ? true : false @endphp
                            <tr>
                                <td>
                                    {{ $item->{fwcl('name')} }}
                                </td>
                                <td>
                                    {!! Form::open(['route' => [ 'itmes.destroy' , $item->id], 'role' => 'form' , 'class' => 'form-inline']) !!}
                                        {{ method_field('delete') }}
                                        <button  class="btn btn-danger" ><i class="fa fa-trash"></i></button>
                                        <span class="btn btn-success" onclick="showEdit(this)"><i class="fa fa-edit"></i></span>
                                    @if($parent)
                                        <span class="btn btn-info" onclick="showChilds(this)"><i class="fa fa-link"></i></span>
                                    @endif
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            <tr style="display: none" class="edit">
                                <td colspan="3">
                                    {!! Form::model( $item , ['route' => ['itmes.update' , $item->id ], 'role' => 'form']) !!}
                                    {{ method_field('patch') }}
                                    <div class="card-body">
                                        @include('laramaghz::fileds.php.text' , ['name' => 'name_ar' , 'value' => $item->name_ar , 'label' => trans('laramaghz::laramaghz.Item name Arabic')])
                                        @include('laramaghz::fileds.php.text' , ['name' => 'name_en' , 'value' => $item->name_en , 'label' => trans('laramaghz::laramaghz.Item name English')])
                                        @include('laramaghz::fileds.php.text' , ['name' => 'icon' , 'value' => $item->icon , 'label' => trans('laramaghz::laramaghz.icon'), 'placeholder' => '<i class="fa fa-trash"></i>'])
                                        @include('laramaghz::fileds.php.text' , ['name' => 'link', 'value' => $item->link  , 'label' => trans('laramaghz::laramaghz.link')])
                                        @include('laramaghz::fileds.php.select' , ['name' => 'parent_id', 'value' => $item->parent_id  ,  'label' => trans('laramaghz::laramaghz.Parent Item') , 'array' => [ 0 => trans('laramaghz::laramaghz.No parent menu')] + Arr::except( $parents, $item->id)])
                                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        {!! Form::submit(trans('laramaghz::laramaghz.Save') , ['class' => 'btn btn-info']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @if($parent)
                                <tr style="display: none" class="child">
                                <td colspan="3">
                                    <ol class="list-group">
                                        @foreach($item->parent  as $item)
                                            <li class="list-group-item">
                                                {!! Form::open(['route' => [ 'itmes.destroy' , $item->id], 'role' => 'form' , 'class' => 'inline-form']) !!}
                                                {{ $item->{fwcl('name')} }}
                                                {{ method_field('delete') }}
                                                <button  class="btn btn-link" ><i class="fa fa-trash"></i></button>
                                                <span class="btn btn-link" onclick="showEditChild(this)"><i class="fa fa-edit"></i></span>
                                                {!! Form::close() !!}
                                                {!! Form::model( $item , ['route' => ['itmes.update' , $item->id ], 'role' => 'form' , 'style' => 'display: none']) !!}
                                                {{ method_field('patch') }}
                                                <div class="card-body">
                                                    @include('laramaghz::fileds.php.text' , ['name' => 'name_ar' , 'value' => $item->name_ar , 'label' => trans('laramaghz::laramaghz.Item name Arabic')])
                                                    @include('laramaghz::fileds.php.text' , ['name' => 'name_en' , 'value' => $item->name_en , 'label' => trans('laramaghz::laramaghz.Item name English')])
                                                    @include('laramaghz::fileds.php.text' , ['name' => 'icon' , 'value' => $item->icon , 'label' => trans('laramaghz::laramaghz.icon'), 'placeholder' => '<i class="fa fa-trash"></i>'])
                                                    @include('laramaghz::fileds.php.text' , ['name' => 'link', 'value' => $item->link  , 'label' => trans('laramaghz::laramaghz.link')])
                                                    @include('laramaghz::fileds.php.select' , ['name' => 'parent_id', 'value' => $item->parent_id  ,  'label' => trans('laramaghz::laramaghz.Parent Item') , 'array' => [ 0 => trans('laramaghz::laramaghz.No parent menu')] + Arr::except( $parents, $item->id)])
                                                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                                </div>
                                                <!-- /.card-body -->
                                                <div class="card-footer">
                                                    {!! Form::submit(trans('laramaghz::laramaghz.Save') , ['class' => 'btn btn-info']) !!}
                                                </div>
                                                {!! Form::close() !!}
                                            </li>
                                        @endforeach
                                    </ol>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>


@endsection

@push('js')
    <script>
        function showEdit(e) {
            $(e).closest('tr').next('tr').toggle(100);
        }
        function showChilds(e) {
            $(e).closest('tr').next('tr').next('tr').toggle(100);
        }
        function showEditChild(e) {
            $(e).closest('form').next('form').toggle(100);
        }
    </script>
@endpush
