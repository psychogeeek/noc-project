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
    <table style="margin: 15px ;padding: 20px ; width: 400px ; border: 1px solid">
        <thead>
        <tr style="text-align: left">
            <th>id</th>
            <th>name</th>
            <th>number</th>
        </tr>
        </thead>
        <tbody >

        @forelse ($servicetypes  as $servicetype)

                <tr id="{{ $servicetype->id }}">
                        <td> <a href="/serviceType/{{ $servicetype->id }}"> {{ $servicetype->id }}</a> </td>
                        <td>{{ $servicetype->name }}</td>
                        <td>{{ $servicetype->number }}</td>
                </tr>

        @empty

            <div style="margin-left: 15px" >
                <p>Empty</p>
            </div>

        @endforelse



        </tbody>
    </table>
    <div style="margin-left: 15px" >
        <a href="/serviceType/create"><input type="submit" value="create"></a>
    </div>

</div>
</body>
</html>
