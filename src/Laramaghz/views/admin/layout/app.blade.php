@extends('adminlte::page')

@section('title',trans('laramaghz::laramaghz.laramaghz'))


@section('content')
@yield('content')
@stop


@section('footer')
<div class="float-right d-none d-sm-block">
      <b>Version</b> 1.1.0
    </div>
    <strong>Copyright &copy; 2020 <a href="http://almaghz.com">Ahmed Almaghz</a>.</strong> All rights
    reserved.
@stop

@section('css')
<!-- direction RTL -->
@if(LaravelLocalization::setLocale()=='ar')
<!--Arabic Font Cairo from google-->
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">

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
