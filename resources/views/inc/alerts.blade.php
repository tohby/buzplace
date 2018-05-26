@if(count($errors) > 0) @foreach($errors->all as $error)
<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button> 
    <strong>{{$error}}</strong>
</div>
@endforeach @endif @if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button> 
    <strong>{{session('success')}}</strong>
</div>
@endif @if(session('error'))
<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button> 
    <strong>{{session('error')}}</strong>
</div>
@endif