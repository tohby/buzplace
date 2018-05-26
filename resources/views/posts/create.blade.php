<div class="modal fade bd-example-modal-lg" id="createPost" tabindex="-1" role="dialog" aria-labelledby="createPostTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPostTitle">Create new post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="{{action("PostsController@store")}}">
                    @csrf
                    <div class="form-group row">
                        <label for="title" class="col-md-2 col-form-label text-md-left">Title:</label>
                        <div class="col-md-10">
                            <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}"
                                required autofocus> @if ($errors->has('title'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span> @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="body" class="col-md-2 col-form-label text-md-left">Description:</label>
                        <div class="col-md-10">
                            <textarea rows="5" id="body" type="text" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" name="body"
                                value="{{ old('body') }}" required autofocus></textarea> @if ($errors->has('body'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span> @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-md-2 col-form-label text-md-left">Price:</label>
                        <div class="col-md-6">
                            <input id="price" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}"
                                autofocus> @if ($errors->has('price'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span> @endif
                        </div>
                        <div class="col-md-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="negotiable" name="negotiable" value="1">
                                <label class="form-check-label" for="inlineCheckbox1">Negotiable</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="product" class="col-md-2 col-form-label text-md-left">Product:</label>
                        <div class="col-md-10">
                            <input id="product" type="text" class="form-control{{ $errors->has('product') ? ' is-invalid' : '' }}" name="product" value="{{ old('product') }}"
                                autofocus> @if ($errors->has('product'))
                            <span class="invalid-feedback">
                            <strong>{{ $errors->first('product') }}</strong>
                        </span> @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="quantity" class="col-md-2 col-form-label text-md-left">Quantity:</label>
                        <div class="col-md-10">
                            <input id="quantity" type="text" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity"
                                value="{{ old('quantity') }}" autofocus> @if ($errors->has('quantity'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('quantity') }}</strong>
                            </span> @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="photos" class="col-md-2 col-form-label text-md-left">Image:</label>
                        <div class="col-md-10">
                            <input id="photos" name="photos[]" type="file" accept="image/*" multiple>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tags" class="col-md-2 col-form-label text-md-left">Tags:</label>
                        <div class="col-md-10">
                            <input id="tags" type="text" placeholder="seperate tags with commas" class="form-control{{ $errors->has('tags') ? ' is-invalid' : '' }}"
                                name="tags" value="{{ old('tags') }}" autofocus> @if ($errors->has('tags'))
                            <span class="invalid-feedback">
                        <strong>{{ $errors->first('tags') }}</strong>
                    </span> @endif
                        </div>
                    </div>
                    {{-- <input type="hidden" name="photos[]" value="{{Uuid::generate(4)}}" multiple> --}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn" style="background-color:#373f51; color:aliceblue;"> Create Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>