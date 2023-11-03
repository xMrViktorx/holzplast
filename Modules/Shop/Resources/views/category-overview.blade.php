@extends('shop::layouts.master')

@section('content')
    @include('shop::cards', $products)
@endsection
