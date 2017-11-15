<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Import Export | {{config('app.name')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" 
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" 
    integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" 
    crossorigin="anonymous">
  </head>

  <body>
    <div class="container">
      <div class="row">
        <div class="col">{!! link_to_route('todolist.exporting', 'Export to Xsl', [], ['class'=>'btn btn-primary']) !!}</div><br><br>
      </div>
      <div class="row">
        <div class="col">
        
        {!! Form::open(['route'=>['todolist.importing'], 'files'=>'true']) !!}        
        <input id="file" type="file" class="form-control" name="file"/><br>
        </div>
      </div>
      <div>
        <div class="col">
        
        {!! Form::submit('Import', ['class'=>'btn btn-primary']) !!}
        
        {!! Form::close() !!}
        
        {!! link_to_route('todolist.index', 'Back to Index', [], ['class'=>'btn btn-primary']) !!}
        </div>
      </div>
    </div>
  </body>
</html>