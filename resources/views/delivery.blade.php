@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

<div class="col-md-8">

<form enctype="multipart/form-data" action="/file/{{$user->id}}" method="post">
@csrf
<div class="form-group">
    <label for="exampleFormControlFile1">Details</label>
    <textarea  name="details" class="form-control" rows="15" ></textarea>
   
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Example file input</label>
    <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">

    <input type="hidden" name="itemid" value="{{$itemid}}">
   
  </div> <button type="submit" class="btn btn-primary">send</button>
</form>
</div>
</div>


@endsection
