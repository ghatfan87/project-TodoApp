<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/img/2248.jpg')}}">
    <title>TodoApp</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary w-100">
  <div id="pm" class="container-fluid">
    <a class="navbar-brand text-white" href="/dashboard">TodoApp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav" >
        <li class="nav-item">
          <a class="nav-link text-white" href="/data">Data</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="/create">Create</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="/logout">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<form action="/store" method="post" style="max-width: 500px; margin:auto;">
<!-- mengirim data ke controller yang ditampung oleh reques $request -->
@csrf

    <div class="d-flex flex-column pt-2">
        <label>Title</label>
    <input type="text" name="tittle">
    @error('tittle')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>

    <div class="d-flex flex-column w-100">
        <label>Date</label>
    <input type="date" name="date">
    @error('date')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>

    <div class="d-flex flex-column">
        <label>Description</label>
     <textarea class="descript" name="description" cols="30" rows="10"></textarea>
     @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <br>
    <button class="ghost" type="submit">Kirim</button>
</form>
</body>
</html>



