<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stars</title>
    <link rel="stylesheet" href="/css/foundation/foundation.css">
    <link rel="stylesheet" href="/css/foundation/app.css">
  </head>
  <body>
    <div class="row">
      <div class="large-12 columns">
        <h1>Stars</h1>
        <table>
          <tr>
            <th>Name</th><th>Type</th><th>Artist URL</th><th>Edit</th>
          </tr>
          @foreach ($stars as $star)
            <tr>
              <td><a href="/star/{{ $star->id }}">{{ $star->name }}</a></td>
              <td>{{ $star->type }}</td>
              <td><a href="{{ $star->artist_url }}">{{ $star->artist_url }}</a></td>
              <td><a href="/star/edit/{{ $star->id }}">Edit</a></td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
  </body>
</html>
