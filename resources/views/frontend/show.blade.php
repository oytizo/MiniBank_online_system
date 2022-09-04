<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/showstyle.css">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Account Status</h2>

                <table>
                    <thead>
                        <tr>
                            <th>SI.</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $x=1;
                        @endphp
                        
                        @foreach ($account as $item)
                        <tr>
                            <td>{{ $x }}</td>
                            <td>{{ $item->balance }}</td>
                        </tr>
                        @endforeach
                      
                    </tbody>
            
                </table>
            </div>
        </div>
    </div>
   
 <script src="{{ asset('bootstrap/css/bootstrap.min.css') }}"></script>

</body>

</html>
