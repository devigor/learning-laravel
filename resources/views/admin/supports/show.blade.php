<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details {{ $support->subject }}</title>
</head>

<body>
    <h1>Details {{ $support->id }}</h1>

    <ul>
        <li>Subject: {{ $support->subject }}</li>
        <li>Status: {{ $support->status }}</li>
        <li>Body: {{ $support->body }}</li>
    </ul>
    <a href="{{  route('supports.index') }}">back</a>

        <form action="{{ route('supports.destroy', $support->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">delete</button>
        </form>
</body>

</html>
