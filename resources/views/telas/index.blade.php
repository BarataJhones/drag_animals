<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Drag Animals</title>
</head>
<body>
    @include ('telas.common.header')

    @if (session('message'))
    <div>
        <h5>
            {{ session('message') }}
        </h5>
    </div>
    @endif
    

</body>
</html>