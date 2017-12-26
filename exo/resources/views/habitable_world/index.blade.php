<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habitable Worlds</title>
    <link rel="stylesheet" href="/css/foundation/foundation.css">
    <link rel="stylesheet" href="/css/foundation/app.css">
  </head>
  <body>
    <div class="row">
      <div class="large-12 columns">
        <h1>Habitable Worlds</h1>
        <table>
          <tr>
            <th>Name</th><th>Type</th><th>EV</th><th>Artist URL</th><th>Edit</th>
          </tr>
          @foreach ($habitable_worlds as $habitable_world)
            <tr>
              <td><a href="/habitable_world/{{ $habitable_world->id }}">{{ $habitable_world->name }}</a></td>
              <td>{{ $habitable_world->type }}</td>
              <td>{{ $habitable_world->escape_velocity }}</td>
              <td><a href="{{ $habitable_world->artist_url }}">{{ $habitable_world->artist_url }}</a></td>
              <td><a href="/habitable_world/edit/{{ $habitable_world->id }}">Edit</a></td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
  </body>
</html>
