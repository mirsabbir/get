@extends('layouts.app')

@section('content')


<div class="row justify-content-center">
@foreach($files as $file)

<div class="col-md-8" style="margin-top:20px;">
<div class="card text-center">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <h5 class="card-title">Order complete</h5>
    <p class="card-text">{{$file->details}}</p>
    <a href="/file/download/{{$file->id}}">view file</a>
  </div>
  <div class="card-footer text-muted">
    2 days ago
  </div>
</div>
</div>


    
   
@endforeach

</div>

@endsection
