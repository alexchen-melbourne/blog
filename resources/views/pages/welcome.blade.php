@extends('main')

@section('stylesheets')

@endsection

@section('title', '| Homepage')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="jumbotron">
          <h1>Welcome to My Blog</h1>
          <p class="lead">Thank you so mush for visiting. Check the latest post. </p>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">Latest Post</a></p>
        </div>
      </div>
    </div><!-- end header row -->

    <div class="row">
      <div class="col-md-8">

        @foreach($posts as $post)

          <div class="post">
            <h3>{{ $post->title }}</h3>
            <p>{{ substr($post->body, 0, 50) }}{{ strlen($post->body > 50 ? '...' : '') }}</p>
            <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
          </div>


        @endforeach

      </div>

      <div class="col-md-3 col-md-offset-1">
        <h2>Side bar</h2>
      </div><!-- side bar -->
    </div>
  </div>
@endsection

@section('scripts')

@endsection
