<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>

<body>
    <h1>Edit support {{ $support->id }}</h1>
    <x-alert />
    <form action="{{ route('supports.update', $support->id) }}" method="post">
        @method('put')
        @include('admin.supports.partials.form', [
            'support' => $support    
        ])
    </form>
    <a href="{{ route('supports.index') }}">Back</a>
</body>

</html>
