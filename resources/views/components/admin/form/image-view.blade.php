<div class="d-flex align-items-center">
    @if (!empty($model->getFirstMediaUrl($name)))
    <img src="{{ asset($model->getFirstMediaUrl($name) )}}" class="rounded-lg me-2"  width="100"  height="90" alt="">
    @else
    <img src="{{ asset('admin/images/noimage.jpg') }}" class="rounded-lg me-2" width="50" alt="">
    @endif
</div>