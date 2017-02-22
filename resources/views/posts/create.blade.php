@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script type="text/javascript">
    tinymce.init({ selector: 'textarea' });
  </script>
@endsection

@section('content')

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>Create New Post</h1>
      <hr>

      {!! Form::open(['route' => 'posts.store']) !!}
        {{ Form::label('title', 'Title:') }}
        {{ Form::text('title', null, array('class' => 'form-control', 'required' => '')) }}

        {{ Form::label('slug', 'Slug:') }}
        {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}

        {{ Form::label('category_id', 'Category:') }}
        <select class="form-control" name="category_id">
          @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>

        {{ Form::label('tags', 'Tags:') }}
        <select class="form-control s2" name="tags[]" multiple="multiple">
          @foreach ($tags as $tag)
          <option value="{{ $tag->id }}">{{ $tag->name }}</option>
          @endforeach
        </select>

        {{ Form::label('body', 'Post Body:') }}
        {{ Form::textarea('body', null, array('class' => 'form-control')) }}

        {{ Form::submit('Create  Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;' )) }}

      {!! Form::close() !!}
    </div>
  </div>

@endsection

@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

  <script type="text/javascript">
  $(".s2").select2();
  </script>
@endsection
