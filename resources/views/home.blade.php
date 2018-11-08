@extends('layouts.app')

@section('content')

<style>

    .form-control-borderless {
    border: none;
}

.form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
    border: none;
    outline: none;
    box-shadow: none;
}
</style>



<div class="container">
    <br/>
	<div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            <form class="card card-sm" action="/search">
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="fas fa-search fa-2x"></i>
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
                                        <input name="q" class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search freelancers , works">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-success" type="submit">Search</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                        </div>
                        <!--end of col-->
                    </div>
</div>

<div class="container" style="margin-top:25px;">

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="/img/baner.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/img/baner.png" alt="Second slide">
    </div>
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    
</div>


<h3 class="text-center" style="margin-top:20px;">Popular posts</h3>





<div class="container" style="margin-top:20px;">




<div class="row" style="margin-top:20px;">
@foreach($posts as $post)
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
</div> <!-- row.// -->



</div> 
<!--container.//-->

<br><br><br>

<style>

.card-product .img-wrap {
    border-radius: 3px 3px 0 0;
    overflow: hidden;
    position: relative;
    height: 220px;
    text-align: center;
}
.card-product .img-wrap img {
    max-height: 100%;
    max-width: 100%;
    object-fit: cover;
}
.card-product .info-wrap {
    overflow: hidden;
    padding: 15px;
    border-top: 1px solid #eee;
}
.card-product .bottom-wrap {
    padding: 15px;
    border-top: 1px solid #eee;
}

.label-rating { margin-right:10px;
    color: #333;
    display: inline-block;
    vertical-align: middle;
}

.card-product .price-old {
    color: #999;
}

</style>

@endsection
