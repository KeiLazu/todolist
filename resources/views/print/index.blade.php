<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" 
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" 
    integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" 
    crossorigin="anonymous">

    <title>Print</title>
    <style>
      
      @media print { 
        @page { margin: 0; }
        body { margin: 1.6cm; }
      }

    </style>
    <script src="{{asset('js/tinymce/jquery.tinymce.min.js')}}"></script>
    <script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
    <script type="text/javascript">
      window.print();
    </script>
  </head>
  <body>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-2">Name:</div>
        <div class="col-9">{{$userDetail->nama}}</div>
      </div><br><br>
      <div class="row align-items-center">
        <div class="col-2">Title:</div>
        <div class="col-9">{{$todolist->title}}</div>
      </div><br>
      <div class="row align-items-center">
        <div class="col-2">Container:</div>
        <div class="col-9">{!! $todolist->container !!}</div>
      </div><br><br>
      <div class="row align-items-center">
        <div class="col-2">Status:</div>
        <div class="col-9">{{($todolist->status == 0) ? "Not Complete" : 
        (($todolist->status == 1) ? "On Progress" : "Completed")}}</div>
      </div>
    </div>
  </body>
</html>