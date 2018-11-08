@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
		<div class="col-md-3 ">
		     <div class="list-group ">
              <a href="#" class="list-group-item list-group-item-action active">Dashboard</a>
              <a href="/posts/create" class="list-group-item list-group-item-action">Create post</a>
              <a href="/posts" class="list-group-item list-group-item-action">Posts</a>
              <a href="/orders" class="list-group-item list-group-item-action">Recieved Orders</a>
              <a href="/file/show" class="list-group-item list-group-item-action">My Orders</a>
              
              <form id="my_form" method = "post" action="/logout">
              @csrf
              <!-- Your Form -->    
              <a href="javascript:{}" class="list-group-item list-group-item-action"onclick="document.getElementById('my_form').submit(); return false;">Logout</a>
              </form>
              
              
              
              
            </div> 
		</div>
		<div class="col-md-9">
		    <div class="card">
		        <div class="card-body">
		            <div class="row">
		                <div class="col-md-12">
		                    <div class="row">
                          <div class="col"><h4>Profile</h4> </div>
                          <div class="col float-right"><img style="border-radius:50%;" src="{{asset(\Auth::user()->image)}}" alt="" height=50 width=50></div>
                        </div>
                        
		                    <hr>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-md-12">
		                    <form action="/profile" method="post" enctype="multipart/form-data">
                        @csrf
                              <div class="form-group row">
                                <label for="username" class="col-4 col-form-label">Name</label> 
                                <div class="col-8">
                                  <input id="username" name="name" placeholder="Name" class="form-control here"  type="text">
                                </div>
                              </div>
                              
                              
                              <div class="form-group row">
                                <label for="text" class="col-4 col-form-label">Profile picture</label> 
                                <div class="col-8">
                                  <input  name="image" class="form-control here"  type="file">
                                </div>
                              </div>
                              
                              <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">Email</label> 
                                <div class="col-8">
                                  <input id="email" name="email" placeholder="Email" class="form-control here"  type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="website" class="col-4 col-form-label">Website</label> 
                                <div class="col-8">
                                  <input id="website" name="website" placeholder="website" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="publicinfo" class="col-4 col-form-label">About yourself</label> 
                                <div class="col-8">
                                  <textarea id="publicinfo" name="details" cols="40" rows="4" class="form-control"></textarea>
                                </div>
                              </div>
                              
                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button name="submit" type="submit" class="btn btn-primary">Update My Profile</button>
                                </div>
                              </div>
                            </form>
		                </div>
		            </div>
		            
		        </div>
		    </div>
		</div>
	</div>
</div>
@endsection
