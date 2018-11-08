@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="text-center">Create post</h4>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="post" action="/posts" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="post title">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Post image</label>
    <input type="file" class="form-control" name="image" id="exampleFormControlInput1">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">price</label>
    <input type="text" class="form-control" name="price" id="exampleFormControlInput1" >
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlSelect1">Category</label>
    <select class="form-control" name="cat" id="exampleFormControlSelect1">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Subcategory</label>
    <select class="form-control" name="sub" id="exampleFormControlSelect2">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Post details</label>
    <textarea class="form-control" name="details" id="exampleFormControlTextarea1" rows="7"></textarea>
  </div>

    <button type="submit" class="btn btn-primary btn-lg btn-block">  Post </button>

</form>
    
</div>
@endsection
