<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moons</title>
    <link rel="stylesheet" href="/css/foundation/foundation.css">
    <link rel="stylesheet" href="/css/foundation/app.css">
  </head>
  <body>
    <div class="row">
      <div class="large-12 columns">
        <h1>Moons</h1>
        <table>
          <tr>
            <th>Name</th><th>Type</th><th>EV</th><th>Artist URL</th><th>Edit</th>
          </tr>
          @foreach ($moons as $moon)
            <tr>
              <td><a href="/moon/{{ $moon->id }}">{{ $moon->name }}</a></td>
              <td>{{ $moon->type }}</td>
              <td>{{ $moon->escape_velocity }}</td>
              <td><a href="{{ $moon->artist_url }}">{{ $moon->artist_url }}</a></td>
              <td><a href="/moon/edit/{{ $moon->id }}">Edit</a></td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
  </body>
</html>
