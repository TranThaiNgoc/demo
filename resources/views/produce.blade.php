<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    body {
        font-family: DejaVu Sans;
    }
    </style>
</head>

<body>
    <div class="container-fluid" style="width:1000px;">
        <h4>All factories are according to the company {{ $bus->name }}</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>BU</th>
                    <th>Code</th>
                    <th>Mail</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach(@$produce as $value)
                <tr>
                    <td class="page-break">{{ $value->name }}</td>
                    <td>
                        {{ ($value->bu_id == $bus->id) ? $bus->name : '' }}
                    </td>
                    <td>{{ $value->code }}</td>
                    <td>{{ $value->mail }}</td>
                    <td>{{ $value->phone }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>