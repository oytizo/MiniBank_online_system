<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css">
<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

</head>
<body>

<h2 class="text-center">User Info</h2>

<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-5 py-5">
      <ul>
        <li><a class="active" href="{{ route('view') }}">View Account</a></li>
        <li><a href="{{ route('deposite') }}">Deposite</a></li>
        <li><a href="{{ route('transfer') }}">Fund Transfer</a></li>
      </ul>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-success" class="nav-link"><i class="fa fa-power-off"></i>Logout</button>
      </form>
    </div>
  </div>
</div>

<script src="{{ asset('bootstrap/css/bootstrap.min.css') }}"></script>

</body>
</html>