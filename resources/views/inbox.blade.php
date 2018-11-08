@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

<div class="col-md-8">

<div class="card-header">
    Messages
  </div>

@foreach($threads as $thread)
<div class="card" style="margin-top:20px;">
  
  <div class="card-body">
    <h5 class="card-title">{{\App\User::find($thread->p_id)->name}}</h5>
    <p class="card-text"></p>
    <a href="/message/{{\App\User::find($thread->p_id)->id}}" class="btn btn-primary">Start chat</a>
  </div>
</div>


 @endforeach
 </div>
</div>
@endsection
