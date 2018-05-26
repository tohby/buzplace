<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Are you sure you want to delete this post?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        This process cannot be reversed once completed, do you still want to continue?
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {!!Form::open(['action'
                    => ['PostsController@destroy', $posts->id], 'method' => 'POST'])!!} {{Form::hidden('_method',
                    'DELETE')}} {{Form::submit('Delete', ['class' => 'btn btn-outline-danger'])}} 
        {!!Form::close()!!}
        </div>
    </div>
    </div>
</div>