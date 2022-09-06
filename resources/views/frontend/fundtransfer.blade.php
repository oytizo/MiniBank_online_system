<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deposite</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="{{ route('fundtransfer') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Fund Transfer</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="ftransfer"
                            aria-describedby="emailHelp" placeholder="Enter Amount">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Personal Code</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="pcode"
                            aria-describedby="emailHelp" placeholder="Enter Personal Code">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-primary m-0" href="{{ route('dashboard') }}">View Account</a>

                </form>

            </div>
        </div>
    </div>
    <script src="{{ asset('bootstrap/css/bootstrap.min.css') }}"></script>
</body>

</html>
