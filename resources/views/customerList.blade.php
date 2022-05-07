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

        @forelse ($customers as $customer)

                <tr id="{{ $customer->id }}">
                        <td> <a href="/customer/{{ $customer->id }}"> {{ $customer->id }}</a> </td>
                        <td>{{ $customer->first_name }}</td>
                        <td>{{ $customer->last_name }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->phone_number }}</td>
                        <td>{{ $customer->code_number }}</td>
                        <td>{{ $customer->email }}</td>
                </tr>

        @empty
            <div style="margin-left: 15px" >
                <p>Empty</p>
            </div>
        @endforelse


        </tbody>
    </table>

    <div style="margin-left: 15px" >
        <a href="/customer/create"><input type="submit" value="create"></a>
    </div>

</div>
</body>
</html>
