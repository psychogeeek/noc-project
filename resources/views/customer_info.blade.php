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
            <th>first name</th>
            <th>last name</th>
            <th>address</th>
            <th>phone number</th>
            <th>code number</th>
            <th>email</th>
        </tr>
        </thead>
        <tbody >
{{--        <td> <a href="/customer/{{ $customer->id }}"> {{ $customer->id }}</a> </td>--}}


        <tr {{ $customer[0]['id'] }}>
                        <td>{{ $customer[0]['id'] }}</td>
                        <td>{{ $customer[0]['first_name'] }}</td>
                        <td>{{ $customer[0]['last_name'] }}</td>
                        <td>{{ $customer[0]['address'] }}</td>
                        <td>{{ $customer[0]['phone_number'] }}</td>
                        <td>{{ $customer[0]['code_number'] }}</td>
                        <td>{{ $customer[0]['email'] }}</td>
                </tr>

        </tbody>
    </table>

    <div style="margin-left: 15px" >
        <a href="/customer/edit/{{ $customer[0]['id'] }}"><input type="submit" value="edit"></a>
        <a href="/customer/delete/{{ $customer[0]['id']}}"><input type="button" value="delete"></a>
    </div>

</div>
</body>
</html>
