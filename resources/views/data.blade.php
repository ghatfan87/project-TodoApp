@extends('layout')

@section('content')


@if (session('succesDelete'))
<div class="alert alert-danger">
    {{ session('succesDelete') }}
</div>
@endif

@if (session('succesUpdate'))
<div class="alert alert-success">
    {{ session('succesUpdate') }}
</div>
@endif
@if (session('done'))
<div class="alert alert-success">
    {{ session('done') }}
</div>
@endif
<table class="table table-primary text-center table-striped">
    <tr>
        <td>No</td>
        <td>Kegiatan</td>
        <td>Deskripsi</td>
        <td>Batas Waktu</td>
        <td>Status</td>
        <td>Aksi</td>

    </tr>
    @php
        $no = 1;
  @endphp
   @foreach ($todos as $todo)
    <tr>
        <!-- tiap di looping, $no bakal ditambah 1 -->
        <td>{{ $no++ }}</td>
        <td>{{ $todo['tittle'] }}</td>
        <td>{{ $todo['description'] }}</td>
    <!-- Carbon : package date pada laravel, nntinya si date yg 2022-11-22 formatnya jadi 22 November,2022 -->
        <td>{{ \Carbon\Carbon::parse($todo['date'])->format('j F, Y') }}</td>
        <!-- konsep ternary, if statusnya 1 nampilin teks complated kalo 0 nampilin teks on-process. status tuh boolean kan? cmn antara 1 atau 0 -->
        <td>{{ $todo['status']? 'Complated' : 'On-Process' }}</td>
            <td class="d-flex">
                
                <a class="btn btn-primary me-2 mt-3 "  href="/edit/{{$todo['id']}}"><i class="fa fa-user-pen"></i></a>
                
                
                <form action="/destroy/{{$todo['id']}}" method="POST">
                    @csrf
                    <!-- menimpa method="POST", krn di route nya menggunakan method delete -->
                    @method('DELETE')
                    <button class="btn btn-primary me-2" type="submit"><i class="fa fa-trash"></i></button>
                </form>
                @if ($todo['status']== 0)
                <form action="/complated/{{$todo['id']}}" method="POST">
                    @csrf
                    <!-- menimpa method="POST", krn di route nya menggunakan method delete -->
                    @method('PATCH')
                    <button class="btn btn-success" type="submit">Complated</button>
                </form>
                @endif
            </td>
    </tr>
    @endforeach
</table>
@endsection