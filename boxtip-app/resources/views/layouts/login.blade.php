@extends('home')
@section('content')
    <div class="card rounded-0">
        <div class="card-header text-center bg-white pb-0 pt-3 border-0">
            <img src="/logo.svg" alt="">
            <hr>
        </div>
        <div class="card-body">
            @include('components.login_form')
        </div>
    </div>
@endsection
