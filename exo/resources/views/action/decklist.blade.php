<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actions</title>
    <link rel="stylesheet" href="/css/foundation/foundation.css">
    <link rel="stylesheet" href="/css/foundation/app.css">
  </head>
  <body>
    <div class="row">
      <div class="large-12 columns">
        <h1>Action Decklist</h1>
        <table>
          <tr>
            <th>Quantity</th><th>Name</th>
          </tr>
          @php
            $total = 0;
          @endphp
          @foreach ($actions as $action)
            <tr>
              <td>{{ $action->quantity }}</td>
              <td>{{ $action->name }}</td>
            </tr>
            @php
              $total += $action->quantity
            @endphp
          @endforeach
          <tr>
            <td>{{ $total }}</td>
            <td>TOTAL</td>
          </tr>
        </table>
      </div>
    </div>
  </body>
</html>
