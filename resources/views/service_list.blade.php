<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div style="width: 100%">
    <table style="margin: 15px ;padding: 20px ; width: 900px ; border: 1px solid">
        <thead>
        <tr style="text-align: left">
            <th>id</th>
            <th>name</th>
            <th>address</th>
            <th>customer_id</th>
            <th>service_type_id</th>
            <th>pop_point_id</th>
        </tr>
        </thead>
        <tbody >

        @forelse ($services  as $service)

                <tr id="{{ $service->id }}">
                        <td> <a href="/service/{{ $service->id }}"> {{ $service->id }}</a> </td>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->address }}</td>
                        <td>{{ $service->customer_id }}</td>
                        <td>{{ $service->service_type_id }}</td>
                        <td>{{ $service->pop_point_id }}</td>
                </tr>

        @empty

            <div style="margin-left: 15px" >
                <p>Empty</p>
            </div>

        @endforelse



        </tbody>
    </table>
    <div style="margin-left: 15px" >
        <a href="/service/create"><input type="submit" value="create"></a>
    </div>

</div>
</body>
</html>
