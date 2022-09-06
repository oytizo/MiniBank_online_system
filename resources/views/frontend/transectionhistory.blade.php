<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/showstyle.css">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Receiver History</h2>

                <table>
                    <thead>
                        <tr>
                            <th>SI.</th>
                            <th>Sender Name</th>
                            <th>Receiver Name</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $x = 1;
                        @endphp

                        @foreach ($user_sender_info as $item)
                            <tr>
                                <td>{{ $x }}</td>
                                <td>{{ $username }}</td>
                                @foreach ($allhistory as $alltrans)
                                    @if ($item->receiver_user_id == $alltrans->id)
                                        <td>{{ $alltrans->name }}</td>
                                    @endif
                                @endforeach
                                <td>{{ $item->amount }}</td>
                            </tr>
                            @php
                                $x = $x + 1;
                            @endphp
                        @endforeach
                        @foreach ($user_receiver_info as $item)
                            <tr>
                                <td>{{ $x }}</td>
                                @foreach ($allhistory as $alltrans)
                                    @if ($item->sender_user_id == $alltrans->id)
                                        <td>{{ $alltrans->name }}</td>
                                    @endif
                                @endforeach
                                <td>{{ $username }}</td>
                                <td>{{ $item->amount }}</td>
                            </tr>
                            @php
                                $x = $x + 1;
                            @endphp
                        @endforeach

                    </tbody>

                </table>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 p-3">
                <a class="btn btn-primary m-0" href="{{ route('dashboard') }}">View Account</a>
            </div>
        </div>

    </div>

    <script src="{{ asset('bootstrap/css/bootstrap.min.css') }}"></script>

</body>

</html>
