@extends('main')

@section('title', '| Contact')

@section('content')
    <div class="row">
      <div class="col-md-12 text-center">
        <h1>Contact me</h1>
        <form class="form-horizontal" role="form" method="post" action="index.php">
        	<div class="form-group">
        		<label for="name" class="col-sm-2 control-label">Name</label>
        		<div class="col-sm-10">
        			<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="">
        		</div>
        	</div>
        	<div class="form-group">
        		<label for="email" class="col-sm-2 control-label">Email</label>
        		<div class="col-sm-10">
        			<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="">
        		</div>
        	</div>
        	<div class="form-group">
        		<label for="message" class="col-sm-2 control-label">Message</label>
        		<div class="col-sm-10">
        			<textarea class="form-control" rows="4" name="message"></textarea>
        		</div>
        	</div>
        	</div>
        	<div class="form-group">
        		<div class="col-sm-10 col-sm-offset-2">
        			<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
        		</div>
        	</div>
        	<div class="form-group">
        		<div class="col-sm-10 col-sm-offset-2">
        			<!-- Will be used to display an alert to the user-->
        		</div>
        	</div>
        </form>
    </div>
@endsection
