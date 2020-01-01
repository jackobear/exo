<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dwarf Planets</title>
    <link rel="stylesheet" href="/css/foundation/foundation.css">
    <link rel="stylesheet" href="/css/foundation/app.css">
  </head>
  <body>
    <div class="row">
      <div class="large-12 columns">
        <h1>Dwarf Planets</h1>
        <table>
          <tr>
            <th>Name</th><th>Type</th><th>EV</th><th>Artist URL</th><th>Edit</th>
          </tr>
          @foreach ($dwarf_planets as $dwarf_planet)
            <tr>
              <td><a href="/dwarf-planet/{{ $dwarf_planet->id }}">{{ $dwarf_planet->name }}</a></td>
              <td>{{ $dwarf_planet->type }}</td>
              <td>{{ $dwarf_planet->escape_velocity }}</td>
              <td><a href="{{ $dwarf_planet->artist_url }}">{{ $dwarf_planet->artist_url }}</a></td>
              <td><a href="/dwarf-planet/edit/{{ $dwarf_planet->id }}">Edit</a></td>
            </tr>
          @endforeach
        </table>
      </div>
      <a href="/dwarf-planet/save_all_as_png">Save All As PNG</a>
    </div>
  </body>
</html>
