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
        <h1>Actions</h1>
        <table>
          <tr>
            <th>Name</th><th>Type</th><th>Cost</th><th>Artist URL</th><th>Edit</th><th>Delete</th>
          </tr>
          @foreach ($actions as $action)
            <tr>
              <td><a href="/action/{{ $action->id }}">{{ $action->name }}</a></td>
              <td>{{ $action->type }}</td>
              <td>{{ $action->cost }}</td>
              <td><a href="{{ $action->artist_url }}">{{ $action->artist_url }}</a></td>
              <td><a href="/action/edit/{{ $action->id }}">Edit</a></td>
              <td>
                <form action="/action/destroy/{{ $action->id }}" method="post">
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
