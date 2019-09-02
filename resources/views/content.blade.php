@extends('backpack::layout')

@isset($title)
@section('header')
    <section class="content-header">
      <h1>
        {{ $title }}
      </h1>
    </section>
@endsection
@endisset


@section('content')
    <div class="row">
        <div class="col-md-9">
            
                {!! $content !!}

        </div>
    </div>
@endsection
