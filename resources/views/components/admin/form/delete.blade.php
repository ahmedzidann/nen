<button type="button" style="padding: 6px 13px;" class="btn btn-danger shadow btn-xs sharp" data-toggle="modal" data-target="#delete{{ $id }}"> 
  <i class="fa fa-trash"></i>
</button>

<div class="modal fade" id="delete{{ $id }}">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteLabel{{ $id }}"> {{ ('Delete') }}<span style="color: #ababab"><i class="fa fa-trash"></i></span></h5>
            <button type="button" class="btn btn-danger" data-dismiss="modal">x</button>
        </div>
        <div class="modal-body">
            {{ __('Are you sure you want to delete :name ?', ['name' => $name]) }}
        <form action="{{ $route }}" method="post">
            @csrf
            @method('delete')
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">{{ ('Delete') }}</button>
        </div>
        </form>
    </div>
</div>
</div>



