@extends('app')

@section('content')

@include('partials.grouptab')


<div class="tab_content">

<h2>{{trans('messages.files_in_this_group')}}

  @if ($upload_allowed)
  <a class="btn btn-primary btn-xs" href="{{ action('FileController@create', $group->id ) }}">
   <i class="fa fa-plus"></i>
   {{trans('messages.create_file_button')}}</a>
  @endif

</h2>


  <table class="table table-hover">
    @forelse( $files as $file )
    <tr>

      <td>
        <a href="{{ action('FileController@show', [$group->id, $file->id]) }}"><img src="{{ action('FileController@thumbnail', [$group->id, $file->id]) }}"/></a>
      </td>

      <td>
        <a href="{{ action('FileController@show', [$group->id, $file->id]) }}">{{ $file->name }}</a>
      </td>

      <td>
        <a href="{{ action('FileController@show', [$group->id, $file->id]) }}">Download</a>
      </td>

      <td>
        @unless (is_null ($file->user))
        <a href="{{ action('UserController@show', $file->user->id) }}">{{ $file->user->name }}</a>
        @endunless
      </td>

      <td>
        {{ $file->created_at->diffForHumans() }}
      </td>
    </tr>
    @empty
    {{trans('messages.nothing_yet')}}

    @endforelse
  </table>

  {!! $files->render() !!}

</div>


@endsection