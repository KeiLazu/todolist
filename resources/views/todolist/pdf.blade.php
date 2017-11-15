<!DOCTYPE html>
<html lang="en">
{{--  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PDF | {{config('app.name')}}</title>
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="/js/bootstrap.min.css" rel="stylesheet">
  <link href="/js/jquery.min.css" rel="stylesheet">
</head>  --}}
<body>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 align="center">Todolist</h3>
      <h5 align="center">Name: {{$userDetail->nama}}</h5>
    </div>
    <div class="panel-body">
      
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Title</th>
            <th>Container</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
        @foreach($todolist as $todolistdata)
          <tr>
            <td>{{$todolistdata->title}}</td>
            <td>{{$todolistdata->container}}</td>
            <td>
              @php
                switch($todolistdata->status) {
                  case 0:
                    echo "Not Completed";
                    break;
                  case 1:
                  echo "On Progress";
                    break;
                  case 2:
                  echo "Completed";
                    break;
                }
              @endphp
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>