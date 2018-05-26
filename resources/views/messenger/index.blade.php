@extends('layouts.app')

@section('content')
<div class="container justify-content-center">
    @include('messenger.partials.flash')

    @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
</div>
@stop