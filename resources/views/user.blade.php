@extends('layouts.app')

@section('content')



<hr class="">
<div class="container target">
    <div class="row">
        <div class="col-sm-10">
             <h1 class="">{{$user->name}}</h1>
         <form action="/message/{{$user->id}}">
          <button type="submit" class="btn btn-primary">Send message</button>  
          </form>
<br>
        </div>
      <div class="col-sm-2"><a href="/profile/{{$user->id}}" class="pull-sright"><img title="profile image" class="img-circle img-responsive" src="{{$user->image}}"></a>

        </div>
    </div>
  <br>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->
            <ul class="list-group">
                <li class="list-group-item text-muted" contenteditable="false">Profile</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Name: </strong></span> {{$user->name}}</li>
                
                
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Email: </strong></span> {{$user->email}}</li>
                
                
             
                
            </ul>
         
           
          
            
        </div>
        <!--/col-3-->
        <div class="col-sm-9" style="" contenteditable="false">
            <div class="panel panel-default">
                

                </div>
            </div>
            <div class="panel panel-default target">
               
                 @foreach($user->posts as $post)
            <div class="col-md-4">
	<figure class="card card-product">
		<div class="img-wrap"><img src="{{asset($post->image)}}"></div>
		<figcaption class="info-wrap">
				<h4 class="title">{{$post->title}}</h4>
				<p class="desc">{{$post->details}}</p>
				<div class="rating-wrap">
					<div class="label-rating"><a href="/profile/{{$post->user->id}}">{{$post->user->name}}</a></div>
                    <br>
					<div class="label-rating">{{$post->created_at}}</div>
				</div> <!-- rating-wrap.// -->
		</figcaption>
		<div class="bottom-wrap">
            <form action="/addcart" method="post">
                @csrf
                <input type="hidden" name="item" id="" value="{{$post->id}}">
                <button class="btn btn-sm btn-primary float-right">Order Now</button>
            </form>
			<div class="price-wrap h5">
				<span class="price-new">${{$post->price}}</span> 
			</div> <!-- price-wrap.// -->
		</div> <!-- bottom-wrap.// -->
	</figure>
</div> <!-- col // -->  
@endforeach
				
            </div>
           
            </div>
                 
        </div>
              
    </div>
           
</div></div>
                
</div>


@endsection
