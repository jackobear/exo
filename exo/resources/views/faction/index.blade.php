<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factions</title>
    <link rel="stylesheet" href="/css/foundation/foundation.css">
    <link rel="stylesheet" href="/css/foundation/app.css">
  </head>
  <body>
    <div class="row">
      <div class="large-12 columns">
        <h1>Factions</h1>
        <table>
          <tr>
            <th>Name</th><th>PlanetShip Cost</th><th>StarShip Cost</th><th>Artist URL</th><th>Edit</th>
          </tr>
          @foreach ($factions as $faction)
            <tr>
              <td><a href="/faction/{{ $faction->id }}">{{ $faction->name }}</a></td>
              <td>{{ $faction->planetship_cost }}</td>
              <td>{{ $faction->starship_cost }}</td>
              <td><a href="{{ $faction->artist_url }}">{{ $faction->artist_url }}</a></td>
              <td><a href="/faction/edit/{{ $faction->id }}">Edit</a></td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
  </body>
</html>
