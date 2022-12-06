<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/img/ge.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>Todo App</title>
</head>
<body>
    @if (Auth::check())
    <nav class="navbar navbar-expand-lg bg-primary w-100">
  <div id="pm" class="container-fluid">
    <a class= "navbar-brand text-white" href="/dashboard">TodoApp</a>
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
@endif
@yield('content')
</body>
</html>
</body>
</html>