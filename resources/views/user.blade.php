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
               
                <div class="panel-body">
                  <div class="row">
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/UPMCEast_CTscan.jpg/280px-UPMCEast_CTscan.jpg">
						<div class="caption">
							<h3>
								Computed Tomography Scan
							</h3>
							<p>
								For potential transcatheter repair and replacement of heart valves 
							</p>
							<p>
							
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTEQz__ycuhuAoNISn3rNWuaZhhzH4lAnPg0IvmQXJpkN08pC5oZA">
						<div class="caption">
							<h3>
								Counselling Service
							</h3>
							<p>
								For stability of emotional threshold throughout the battery of tests
							</p>
							<p>
							
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="https://assets.nhs.uk/prod/images/C0097883.2e16d0ba.fill-920x613.jpg">
						<div class="caption">
							<h3>
								Cardiac Catheterization
							</h3>
							<p>
								For further evaluation of other implicitly acquired cardiovascular conditions
							</p>
							<p>
							
							</p>
						</div>
                </div>
                 
            </div>
                     
            </div>
                 
        </div>
              
    </div>
           <div class="panel panel-default">
                <div class="panel-heading"><b>Daily Medication and Treatment Breakdown:</b></div>
                <div class="panel-body"> Textual, descriptive form of the above checklist
                <br><button type="button" class="btn btn-primary">Generate Report

                </div>
</div></div>
                
</div>


@endsection
