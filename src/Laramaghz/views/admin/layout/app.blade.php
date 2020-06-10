@php
    $adminMenu = Almaghz\Laramaghz\Laramaghz\Models\MenuItem::where('menu_id' , 1)
        ->orderBy('order')
        ->where('parent_id' ,0)
        ->with('parent')
        ->get();
    $segment = request()->segment(3);
@endphp

@extends('adminlte::page')

@section('title',trans('laramaghz::laramaghz.laramaghz'))


@section('content')
@yield('content')
@stop


@section('footer')
<div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.5
    </div>
    <strong>Copyright &copy; 2020 <a href="http://almaghz.com">Ahmed Almaghz</a>.</strong> All rights
    reserved.
@stop

@section('css')
<!-- direction RTL -->
@if(LaravelLocalization::setLocale()=='ar')
 <!-- Bootstrap 4 RTL -->
 <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
 <!-- Custom style for RTL -->
 <link rel="stylesheet" href="{{ url('css/custom.css') }}">
<!-- End direction RTL -->
    @endif
    
@stop

@section('js')

<!-- direction RTL -->
@if(LaravelLocalization::setLocale()=='ar')
<!-- Bootstrap 4 rtl -->
<script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script>
<!-- End direction RTL -->
@endif
    <script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
  });
</script>

@stack('js')
@stop
