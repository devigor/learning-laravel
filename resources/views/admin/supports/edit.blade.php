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
    <form action="{{ route('supports.update', $support->id) }}" method="post">
        {{-- <input type="hidden" value="{{ csrf_token() }}" name="_token" /> --}}
        @csrf
        @method('put')
        <input type="text" name="subject" placeholder="Title" value="{{ $support->subject }}" />
        <textarea name="body" cols="30" rows="5" placeholder="Subject">{{ $support->body }}</textarea>
        <button type="submit">Send</button>
    </form>
    @if ($errors->any())
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif
    <a href="{{ route('supports.index') }}">Back</a>
</body>

</html>
