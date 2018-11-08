@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

<div class="col-md-6">
<div class="card text-center">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <form action="/download" style="margin-top:20px;">
        <input type="hidden" name ="file"value="{{$file->name}}">
        <h5>{{$file->details}}</h5>
        <button type="submit" class="btn btn-primary">Download</button>
    </form>
  </div>
  <form action="/done" method="post">
    <input type="hidden" name="item" id="" value="{{$file->item_id}}">
    @csrf
    <button type="submit" class="btn btn-primary"> complete task </button>
  
  </form>
</div>
</div>

</div>

@endsection
