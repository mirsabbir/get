@extends('layouts.app')

@section('content')


<div class="row justify-content-center">

@foreach($items as $item)
    <div class="col-md-8">

    <div class="card">
  <div class="card-header">
    {{$item->title}}
  </div>
  <div class="card-body">
    <h5 class="card-title">By <a href="/profile/{{$item->orderer}}">{{ \App\User::find($item->orderer)->name }}</a></h5>
    <p class="card-text">{{$item->details}}</p>
    <a href="/order/dispatch/{{\App\User::find($item->orderer)->id}}?itemid={{$item->id}}" class="btn btn-primary">complete order</a>
  </div>
</div>
    </div>


@endforeach
</div>



@endsection
