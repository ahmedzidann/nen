<div class="d-flex align-items-center">
    @if (!empty($model->getFirstMediaUrl($name)))
    <img src="{{ asset($model->getFirstMediaUrl($name) )}}" class="rounded-lg me-2" width="24" alt="">
    @else
    <img src="{{ asset('admin/images/noimage.jpg') }}" class="rounded-lg me-2" width="24" alt="">
    @endif
    <span class="w-space-no">{{ Str::limit(TranslationHelper::translate($nameUser)??'', 10) }}</span>

</div>