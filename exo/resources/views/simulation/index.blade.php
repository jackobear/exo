<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulations</title>
    <link rel="stylesheet" href="/css/foundation/foundation.css">
    <link rel="stylesheet" href="/css/foundation/app.css">
  </head>
  <body>
    <div class="row">
      <div class="large-12 columns">
        <h1>Simulations</h1>
        <table style='width: 1100px;'>
          <thead style='display: table;width: 100%;table-layout: fixed;'>
            <tr>
              <th>VPs To Win</th><th>VPs / Colony</th><th>VPs / Exo</th><th>Exo Cost</th><th>Strat</th><th>Colony Limit</th><th>SP Limit</th><th>Turns Til Victory</th><th>Remainder</th><th>Details</th>
            </tr>
          </thead>
          <tbody style='height:550px;overflow:scroll;display: block;'>
          @foreach ($simulations as $simulation)
            <tr style='display: table;width: 100%;table-layout: fixed;'>
              <td>{{ $simulation['vps_to_win'] }}</a></td>
              <td>{{ $simulation['vps_per_colony'] }}</td>
              <td>{{ $simulation['vps_per_exocolony'] }}</td>
              <td>{{ $simulation['exocolony_cost'] }}</td>
              <td style='overflow:hidden;'>{{ $simulation['strat'] }}</td>
              <td>{{ $simulation['colony_limit'] }}</td>
              <td>{{ $simulation['spaceport_limit'] }}</td>
              <td>{{ $simulation['turns_til_victory'] }}</td>
              <td>{{ $simulation['remainder'] }}</td>
              <td><span data-tooltip aria-haspopup="true" class="has-tip" title="{{ $simulation['details'] }}">Details</span></td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
