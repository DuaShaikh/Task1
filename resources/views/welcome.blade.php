@extends('layout.ecommerce')
@section('title','Home')
@section('main')
<div class="container-fuild">
    <div class="row">
        @if (Session::get('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>{{ session::get('status') }}</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
</div>
    <x-slider />
    @livewire('shop.list-product')
@endsection