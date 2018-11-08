@extends('layouts.app')

@section('content')


<style>
@import "http://fonts.googleapis.com/css?family=Roboto:300,400,500,700";

.container { margin-top: 20px; }
.mb20 { margin-bottom: 20px; } 

hgroup { padding-left: 15px; border-bottom: 1px solid #ccc; }
hgroup h1 { font: 500 normal 1.625em "Roboto",Arial,Verdana,sans-serif; color: #2a3644; margin-top: 0; line-height: 1.15; }
hgroup h2.lead { font: normal normal 1.125em "Roboto",Arial,Verdana,sans-serif; color: #2a3644; margin: 0; padding-bottom: 10px; }

.search-result .thumbnail { border-radius: 0 !important; }
.search-result:first-child { margin-top: 0 !important; }
.search-result { margin-top: 20px; }
.search-result .col-md-2 { border-right: 1px dotted #ccc; min-height: 140px; }
.search-result ul { padding-left: 0 !important; list-style: none;  }
.search-result ul li { font: 400 normal .85em "Roboto",Arial,Verdana,sans-serif;  line-height: 30px; }
.search-result ul li i { padding-right: 5px; }
.search-result .col-md-7 { position: relative; }
.search-result h3 { font: 500 normal 1.375em "Roboto",Arial,Verdana,sans-serif; margin-top: 0 !important; margin-bottom: 10px !important; }
.search-result h3 > a, .search-result i { color: #248dc1 !important; }
.search-result p { font: normal normal 1.125em "Roboto",Arial,Verdana,sans-serif; } 
.search-result span.plus { position: absolute; right: 0; top: 126px; }
.search-result span.plus a { background-color: #248dc1; padding: 5px 5px 3px 5px; }
.search-result span.plus a:hover { background-color: #414141; }
.search-result span.plus a i { color: #fff !important; }
.search-result span.border { display: block; width: 97%; margin: 0 15px; border-bottom: 1px dotted #ccc; }


.input-group.md-form.form-sm.form-1 input{
    border: 1px solid #bdbdbd;
    border-top-right-radius: 0.25rem;
    border-bottom-right-radius: 0.25rem;
}
.input-group.md-form.form-sm.form-2 input {
    border: 1px solid #bdbdbd;
    border-top-left-radius: 0.25rem;
    border-bottom-left-radius: 0.25rem;
}
.input-group.md-form.form-sm.form-2 input.red-border  {
    border: 1px solid #ef9a9a;
}
.input-group.md-form.form-sm.form-2 input.lime-border  {
    border: 1px solid #cddc39;
}
.input-group.md-form.form-sm.form-2 input.amber-border  {
    border: 1px solid #ffca28;
}


</style>



<div class="row">
<div class="col"></div>
<div class="col"><form action="">
<div class="input-group md-form form-sm form-2 pl-0">
    
  <input class="form-control my-0 py-1 amber-border" type="text" placeholder="Search" aria-label="Search">
  <div class="input-group-append">
    <span class="input-group-text amber lighten-3" id="basic-text1"><i class="fa fa-search text-grey"
        aria-hidden="true"></i></span>
  </div>
  
</div>
</div></form>
<div class="col"></div>
</div>








<div class="container">

<hgroup class="mb20">
    <h1>Freelancers</h1>
    <!-- <h2 class="lead"><strong class="text-danger">3</strong> results were found for the search for <strong class="text-danger">Lorem</strong></h2>								 -->
</hgroup>

@foreach($users as $user)
<section class="col-xs-12 col-sm-6 col-md-12">
    <article class="search-result row">
        <div class="col-xs-12 col-sm-12 col-md-3">
            <a href="#" title="Lorem ipsum" class="thumbnail"><img src="{{asset($user->image)}}" alt="Lorem ipsum" /></a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-2">
            <ul class="meta-search">
                <li><i class="glyphicon glyphicon-calendar"></i> <span>name</span></li>
                <li><i class="glyphicon glyphicon-time"></i> <span>join date</span></li>
                <li><i class="glyphicon glyphicon-tags"></i> <span>Rating</span></li>
            </ul>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-7 excerpet">
            <h3><a href="#" title="">heading</a></h3>
            <p> {{$user->details}}</p>						
            
        </div>
        <span class="clearfix borda"></span>
    </article>

    	

</section>
@endforeach

</div>

@endsection
