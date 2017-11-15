<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Hello | {{Auth::user()->name}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" 
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" 
    integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" 
    crossorigin="anonymous">
    
  </head>
  <body>
    <div class="container">
    Detail | {{Auth::user()->name}}
      <div class="row">
        <div class="col-3">Name: </div>
        <div class="col-6">{{Auth::user()->name}}</div>
        <div class="col-3"></div> <!-- Buat edit di sini-->
      </div>
      <div class="row">
        <div class="col-6"><button onclick="location.href='{{route('userdetail.edit', Auth::id())}}'" 
        class="btn btn-primary">Edit</button></div>
        <div class="col-6"><button onclick="location.href='{{route('todolist.index')}}'" 
        class="btn btn-primary">Back to Index</div>
      </div>
  </body>
</html>