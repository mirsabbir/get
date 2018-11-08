@extends('layouts.app')

@section('content')
<div class="card grey lighten-3 chat-room">
  <div class="card-body">

    <!-- Grid row -->
    <div class="row px-lg-2 px-2 justify-content-center">

     

      <!-- Grid column -->
      <div class="col-md-6 col-xl-8 pl-md-3 px-lg-auto px-0">

        <div class="chat-message">

          <ul class="list-unstyled chat">

            @foreach($thread->messages as $message)
            @if($message->sender==\Auth::id())
            <li class="d-flex justify-content-left mb-4">
              <img src="{{$message->thread->user->image}}" alt="avatar" height=50 width=50 class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1">
              <div class="chat-body white ">
                <div class="header" >
                  <strong class="primary-font">{{\Auth::user()->name}}</strong>
                  <small class=""><i class="fa fa-clock-o"></i> {{$message->created_at}}</small>
                </div>
                <hr class="w-100">
                <h5 class="mb-0">
                 <b>{{$message->msg}} </b> 
                </h5>
              </div>
            </li>
            @else
            <li class="d-flex justify-content-left mb-4">
              <img src="{{$user->image}}" alt="avatar" height=50 width=50 class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1">
              <div class="chat-body white ">
                <div class="header" >
                  <strong class="primary-font">{{$user->name}}</strong>
                  <small class=""><i class="fa fa-clock-o"></i> {{$message->created_at}}</small>
                </div>
                <hr class="w-100">
                <h5 class="mb-0">
                 <b>{{$message->msg}} </b> 
                </h5>
              </div>
            </li>
            @endif
            @endforeach
            <form action="/message/{{$thread->p_id}}" method="post">
            @csrf
            <li class="white">
              <div class="form-group basic-textarea">
                <textarea class="form-control pl-2 my-0" name="msg" id="exampleFormControlTextarea2" rows="3" placeholder="Type your message here..."></textarea>
              </div>
            </li>
            <button type="submit" class="btn btn-info btn-rounded btn-sm waves-effect waves-light float-right">Send</button>
            </form>
          </ul>

        </div>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
</div>
@endsection
