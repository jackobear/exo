<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lifeforms</title>
    <link rel="stylesheet" href="/css/foundation/foundation.css">
    <link rel="stylesheet" href="/css/foundation/app.css">
  </head>
  <body>
    <div class="row">
      <div class="large-12 columns">
        <h1>Lifeforms</h1>
        <table>
          <tr>
            <th>Name</th><th>Type</th><th>Artist URL</th><th>Edit</th>
          </tr>
          @foreach ($lifeforms as $lifeform)
            <tr>
              <td><a href="/lifeform/{{ $lifeform->id }}">{{ $lifeform->name }}</a></td>
              <td>{{ $lifeform->type }}</td>
              <td><a href="{{ $lifeform->artist_url }}">{{ $lifeform->artist_url }}</a></td>
              <td><a href="/lifeform/edit/{{ $lifeform->id }}">Edit</a></td>
            </tr>
          @endforeach
        </table>
      </div>
      <a href="/lifeform/save_all_as_png">Save All As PNG</a>
    </div>
  </body>
</html>
