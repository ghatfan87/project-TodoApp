@extends('layout')

@section('content')


@if (session('islogin'))
                    <div class="alert alert-success text-center w-100">
                        {{ session('islogin') }}
                    </div>
                @endif                  

@if (session('notAllowed'))
                    <div class="alert alert-danger">
                        {{ session('notAllowed') }}
                    </div>
                @endif
                <div class="jdl">
                <h1>Selamat datang di Halaman Dashboard!</h1>
                </div>


                @if (Session::get('addTodo'))
<div class="alert alert-success">
    {{ Session::get('addTodo') }}
</div>

@endif
@endsection
