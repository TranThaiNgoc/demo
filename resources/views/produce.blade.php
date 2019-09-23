<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
    body {
        font-family: DejaVu Sans;
    }
    </style>
</head>

<body>
    <h2>Tất cả xưởng sản xuất theo công ty {{ $bus->name }}</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Username</th>
                <th>BU</th>
                <th>Code</th>
                <th>Address</th>
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
                <td>{{ $value->address }}</td>
                <td>{{ $value->mail }}</td>
                <td>{{ $value->phone }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>