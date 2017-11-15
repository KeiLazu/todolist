@if (session('success'))
  <script>
    toastr.success("{{ session('success') }}", "Yaay~");
  </script>
@elseif (!empty($errors->all()))
  @foreach ($errors->all() as $key=>$val)
    <script>toastr.error("{{$val}}", "Aaah")</script>
  @endforeach
@endif