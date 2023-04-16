<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Suporte</title>
</head>
<body>
  <h1>List supports</h1>
  <a href="{{ route('supports.create') }}">Create new support</a>
  <table>
    <thead>
      <th>subject</th>
      <th>status</th>
      <th>body</th>
    </thead>
    <tbody>
      @foreach ($supports as $support)
          <tr>
            <td>{{ $support->subject }}</td>
            <td>{{ $support->status }}</td>
            <td>{{ $support->body }}</td>
            <td>
              <a href="{{ route('supports.show', $support->id) }}">details</a>
            </td>
          </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>