@extends('master')
@section('title','Master111')

@section('noi_dung')
{{ '<h1>asdasdaaa</h1>' }}
{!! $name or 'tao' !!}

@stop

@section('sidebar')
    @parent
	This is the master sidebar.
	@include('nhung', ['some' => 'data Lar'])
@stop