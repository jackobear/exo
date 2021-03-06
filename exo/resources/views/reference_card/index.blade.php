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
            <th>Name</th><th>Type</th><th>Quantity</th><th>Edit</th>
          </tr>
          @foreach ($reference_cards as $reference_card)
            <tr>
              <td><a href="/reference-card/{{ $reference_card->id }}">{{ $reference_card->name }}</a></td>
              <td>{{ $reference_card->type }}</td>
              <td>{{ $reference_card->quantity }}</td>
              <td><a href="/reference-card/edit/{{ $reference_card->id }}">Edit</a></td>
            </tr>
          @endforeach
        </table>
      </div>
      <a href="/reference-card/save_all_as_png">Save All As PNG</a>
    </div>
  </body>
</html>
