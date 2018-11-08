@extends('layouts.app')

@section('content')
<div class="container">
<section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">All posts</h1>
          
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
            
            @foreach($posts as $post)
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <a href="/posts/{{$post->id}}"><img class="card-img-top"src="{{asset($post->image)}}" alt="Card image cap"></a>
                <div class="card-body">
                  <p class="card-text">{{$post->details}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <form action="/posts/{{$post->id}}/edit">
                      <button type="submit" class="btn btn-sm btn-outline-secondary">Edit</button>
                      </form>
                      
                    </div>
                    <small class="text-muted">{{$post->created_at}}</small>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            

            
          </div>
        </div>
      </div>

</div>
@endsection
