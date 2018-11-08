@extends('layouts.app')

@section('content')

<div class="row ">

<div class="col"></div>

<div class="col-md-6">

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Item name</th>
      <th scope="col"></th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $i = 1;
    $tot = 0;
  ?>

    @foreach(session('cart') as $item)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$item->title}}</td>
      <td></td>
      <td>{{$item->price}}</td>
    </tr>
    <?php 
      $tot+=$item->price;
    ?>
    @endforeach
    <tr>
      <th scope="row"></th>
      <td><b>Total</b> </td>
      <td></td>
      <td>{{$tot}}</td>
    </tr>
  </tbody>
</table>
<form action="/checkout">
<input type="hidden" value="{{$tot}}" name="taka">
<button type="submit" class="btn btn-primary btn-block" style="margin-top:50px;">Continue to checkout</button>
</form>
</div>
<div class="col"></div>
</div>

@endsection