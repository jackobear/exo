<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asteroids</title>
    <link rel="stylesheet" href="/css/foundation/foundation.css">
    <link rel="stylesheet" href="/css/foundation/app.css">
  </head>
  <body>
    <div class="row">
      <div class="large-12 columns">
        <h1>Asteroids</h1>
        <table>
          <tr>
            <th>Name</th><th>Type</th><th>Artist URL</th><th>Edit</th>
          </tr>
          @foreach ($asteroids as $asteroid)
            <tr>
              <td><a href="/asteroid/{{ $asteroid->id }}">{{ $asteroid->name }}</a></td>
              <td>{{ $asteroid->type }}</td>
              <td><a href="{{ $asteroid->artist_url }}">{{ $asteroid->artist_url }}</a></td>
              <td><a href="/asteroid/edit/{{ $asteroid->id }}">Edit</a></td>
              <td>
                <form action="/asteroid/destroy/{{ $asteroid->id }}" method="post">
                  {{csrf_field()}}
                  <input name="_method" type="hidden" value="DELETE">
                  <button class="button alert" type="submit">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
  </body>
</html>
