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
    <table style="margin: 15px ;padding: 20px ; width: 1000px ; border: 1px solid">
        <thead>
        <tr style="text-align: left">
            <th>id</th>
            <th>name</th>
            <th>address</th>
            <th>type</th>
        </tr>
        </thead>
        <tbody >

        @forelse ($poppoints as $poppoint)

                <tr id="{{ $poppoint->id }}">
                        <td> <a href="/popPoint/{{ $poppoint->id }}"> {{ $poppoint->id }}</a> </td>
                        <td>{{ $poppoint->name }}</td>
                        <td>{{ $poppoint->address }}</td>
                        <td>{{ $poppoint->type }}</td>
                </tr>

        @empty
            <p>No Customer</p>
        @endforelse


        </tbody>
    </table>

</div>
</body>
</html>
