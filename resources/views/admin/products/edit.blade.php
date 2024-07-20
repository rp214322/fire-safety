<form id="editable-form" action="{!! route('admin.products.update',array($product->id)) !!}" method="POST">
    @csrf
    @method('PATCH')
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">Edit Products </h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="modal_form">
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{!! $product->name !!}" placeholder="Name" required>
    </div>
    <div class="form-group">
        <label>Price</label>
        <input type="text" name="price" class="form-control" value="{!! $product->price !!}" placeholder="Price" required>
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" id="description" class="form-control" placeholder="description">{!! $product->description !!}</textarea>
    </div>
    </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <a href="javascript:;" type="submit" class="btn btn-primary btn-submit" data-id="products_{!! $product->id !!}">Save changes</a>
    </div>
    </form>
    <script>
        var options = {
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
            allowedContent:true
        };
        $(document).ready(function() {
            var editor = CKEDITOR.replace( 'description',options);
        });
        </script>
