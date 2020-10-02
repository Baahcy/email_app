@extends('layouts.app')
@section('content')
<h1>Kindly send Message to me Personally</h1>
<div class="container">
	<form method="post" action="{{ route('sendmail-store') }}">
			@csrf

		  	<div class="form-group">
			    <label for="message">Message</label>
			    <textarea class="form-control" name="message" id="message" rows="3"></textarea>
			 </div>
          <button type="submit" class="btn btn-primary">Submit</button>

    </form>

</div
@endsection
