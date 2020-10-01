@extends('layouts.app')

@section('content')
<h1>Kindly send information to me Personal</h1>
<div class="container">
	<form method="post" action="{{ route('contactus-store') }}">
			@csrf
		  	<div class="form-group">
			    <label for="name">Name </label>
			    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
		  	</div>

			<div>
			  <label for="email">Email address</label>
			  <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" >
			   <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		  	</div>
		  	<div class="form-group">
			    <label for="message">Message</label>
			    <textarea class="form-control" name="message" id="message" rows="3"></textarea>
			 </div>
          <button type="submit" class="btn btn-primary">Submit</button>

    </form>

</div
@endsection
