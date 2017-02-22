@extends('main')

@section('title', '| Edit Post')

@section('stylesheets')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

  <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script type="text/javascript">
    tinymce.init({ selector: 'textarea' });
  </script>
@endsection

@section('content')

  <div class="row">
    {!! Form::model($post, ['route'=> ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}

    <div class="col-md-8">
      {{ Form::label('title', 'Title:')}}
      {{ Form::text('title', null, ['class' => 'form-control input-lg'])}}

      {{ Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) }}
      {{ Form::text('slug', null, ['class' => 'form-control']) }}

      {{ Form::label('category_id', 'Category:', ['class' => 'form-spacing-top']) }}
      {{ Form::select('category_id', $cats, null, ['class' => 'form-control']) }}

      {{ Form::label('tags', 'Tags:', ['class' => 'form-spacing-top']) }}
      {{ Form::select('tags[]', $tags, null, ['class' => 'form-control s2', 'multiple' => 'multiple']) }}

      {{ Form::label('featured_image', 'Update featured image:', ['class' => 'form-spacing-top'])}}
      {{ Form::file('featured_image') }}

      {{ Form::label('body', 'Body:', ['class' => 'form-spacing-top'])}}
      {{ Form::textarea('body', null, ['class' => 'form-control']) }}
    </div>

    <div class="col-md-4">
      <div class="well">
        <dl class="dl-horizontal">
          <dt>Created At:</dt>
          <dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
        </dl>

        <dl class="dl-horizontal">
          <dt>Last Updated:</dt>
          <dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
        </dl>

        <hr>

        <div class="row">
          <div class="col-md-6">
              {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
          </div>

          <div class="col-md-6">
              {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
          </div>
        </div>
      </div>
    </div>
    {!! Form::close() !!}
  </div>

@stop

@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

  <script type="text/javascript">
  $(".s2").select2();
  $('.s2').select2().val({!! $t !!}).trigger('change');
  </script>
@endsection
