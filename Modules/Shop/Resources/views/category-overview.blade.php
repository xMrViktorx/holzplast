@extends('shop::layouts.master')

@section('content')
    @include('shop::cards', $products)
    {{ $products->links('shop::pagination') }}
@endsection
