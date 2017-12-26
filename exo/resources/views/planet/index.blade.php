<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planets</title>
    <link rel="stylesheet" href="/css/foundation/foundation.css">
    <link rel="stylesheet" href="/css/foundation/app.css">
  </head>
  <body>
    <div class="row">
      <div class="large-12 columns">
        <h1>Planets</h1>
        <table>
          <tr>
            <th>Name</th><th>Type</th><th>EV</th><th>Artist URL</th><th>Edit</th>
          </tr>
          @foreach ($planets as $planet)
            <tr>
              <td><a href="/planet/{{ $planet->id }}">{{ $planet->name }}</a></td>
              <td>{{ $planet->type }}</td>
              <td>{{ $planet->escape_velocity }}</td>
              <td><a href="{{ $planet->artist_url }}">{{ $planet->artist_url }}</a></td>
              <td><a href="/planet/edit/{{ $planet->id }}">Edit</a></td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
  </body>
</html>
