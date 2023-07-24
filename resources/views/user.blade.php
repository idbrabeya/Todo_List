<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
           @foreach($product as $key=>$productss)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$productss->name}}</td>
                <td>{{$productss->des}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>