@extends('layout')

@section('content')
<!-- mengirim data ke controller yang ditampung oleh reques $request -->
<form action="/update/{{$todo['id']}}" method="post">
@csrf
<!-- karena atribute method pda tag form cmn bisa GET/POST sdgkn buat update data itu pake method PATCH, jadi method="post" di form di timpa sama method patch ini -->
@method('PATCH')

    <div class="d-flex flex column">
        <!-- atribut value berfungsi untuk menampilkan data di inputnya, data yg ditampilkan merupakan  -->
    <input type="text" name="tittle" value="{{$todo['tittle']}}">
    </div>

    <div class="d-flex flex-column">
        <br>
    <input type="date" name="date" value="{{$todo['date']}}">
    @error('date')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>

    <div class="d-flex flex-column">
        <label>Description</label>
        <!-- kenapa textarea gapunya atribut value?karena textarea bukan termasuk tag input/select dan dia punya penutup tag,
        jadi buat nampilinnya langsung tnpa atribut value(sblm pnutup textarea) -->
     <textarea class="descript" name="description" cols="30" rows="10">{{$todo['description']}}</textarea>
     @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <button type="submit">Kirim</button>
</form>
@endsection



