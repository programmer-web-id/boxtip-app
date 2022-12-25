@extends('layouts.app')

@section('content')
    @include('components.form_cp')
    <div class="container py-5">
        <div class="card">
            <div class="card-body">
                @yield('form')
            </div>
        </div>
    </div>
@endsection
