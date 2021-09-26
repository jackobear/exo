<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reference Cards</title>
    <link rel="stylesheet" href="/css/foundation/foundation.css">
    <link rel="stylesheet" href="/css/foundation/app.css">
  </head>
  <body>
    <div class="row">
      <div class="large-12 columns">
        <h1>Reference Cards</h1>
        <table>
          <tr>
            <th>Name</th><th>Show</th>
          </tr>
          @for ($i=0;$i<count($cards);$i++)
            <tr>
              <td>{{ $cards[$i] }}</td>
              <td><a href="/reference-card/{{ $i }}">Show</a></td>
            </tr>
          @endfor
        </table>
      </div>
      <a href="/reference-card/save_all_as_png">Save All As PNG</a>
    </div>
  </body>
</html>
