<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome to my blog -- Contact Me</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  </head>
  <body>

    <!-- Default bootstrap navbar -->
    <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"> Alex Chen's Blog </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="/">Home</a></li>
          <li><a href="/about">About</a></li>
          <li class="active"><a href="#">Contact</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Separated link</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <div class="container">
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
    </div>
  </div>

  <footer class="footer text-center">
    <div class="container">
      <a href="#myPage" title="To Top">
          <span class="glyphicon glyphicon-chevron-up"></span></a>
      <span class="text-muted">Copyright@AlexChen.Melbourne Driven by Laravel</p>
    </div>
  </footer>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
