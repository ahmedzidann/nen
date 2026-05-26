@extends('admin.layouts.master')
@section('titleadmin') Homepage - Create Doc Validation @endsection

@section('contentadmin')
<div class="page-wrapper"><div class="page-content">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Homepage</div>
        <div class="ps-3"><nav><ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.homepage.home-doc-validation.index') }}">Doc Validation</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol></nav></div>
    </div>

    <form method="POST" action="{{ route('admin.homepage.home-doc-validation.store') }}" enctype="multipart/form-data">
        @csrf

        {{-- Section Header --}}
        <div class="card mb-3">
            <div class="card-header"><h5 class="mb-0">Section Header</h5></div>
            <div class="card-body">
                <ul class="nav nav-tabs nav-danger mb-3" role="tablist">
                    @foreach($translation as $item)
                    <li class="nav-item"><a class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab" href="#hdr-{{ $item->id }}">{{ ucfirst($item->name) }}</a></li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach($translation as $item)
                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="hdr-{{ $item->id }}">
                        <div class="row g-3 mt-1">
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Title ({{ ucfirst($item->name) }})</label>
                                <input type="text" name="title[{{ $item->key }}]" class="form-control" placeholder="Section title">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Description ({{ ucfirst($item->name) }})</label>
                                <textarea name="description[{{ $item->key }}]" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Button Text ({{ ucfirst($item->name) }})</label>
                                <input type="text" name="button_text[{{ $item->key }}]" class="form-control" placeholder="e.g. See More">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row g-3 mt-1">
                    <div class="col-md-8">
                        <label class="form-label fw-semibold">Button URL</label>
                        <input type="url" name="button_url" class="form-control" placeholder="https://...">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Status</label>
                        <select name="is_active" class="form-select">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        {{-- Items / Cards --}}
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0">Cards</h5>
            </div>
            <div class="card-body" id="items-container">
                @include('admin.homepage.home_doc_validation.partials.item-template', ['item' => null, 'idx' => 0, 'translation' => $translation, 'translationFirst' => $translationFirst])
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-success btn-sm" id="add-item-btn"><i class="bx bx-plus me-1"></i>Add Card</button>
            </div>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4"><i class="bx bx-save me-1"></i>Save</button>
            <a href="{{ route('admin.homepage.home-doc-validation.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div></div>
@endsection

@section('jsadmin')
<script>
let itemIndex = 1;

document.getElementById('add-item-btn').addEventListener('click', function () {
    fetch('{{ route("admin.homepage.home-doc-validation.item-template") }}?idx=' + itemIndex)
        .then(r => r.text())
        .then(html => {
            document.getElementById('items-container').insertAdjacentHTML('beforeend', html);
            itemIndex++;
        });
});

document.addEventListener('click', function (e) {
    if (e.target.closest('.remove-item-btn')) {
        e.target.closest('.item-card').remove();
    }
    if (e.target.closest('.add-bullet-btn')) {
        const btn = e.target.closest('.add-bullet-btn');
        const idx = btn.dataset.idx;
        const container = document.getElementById('bullets-container-' + idx);
        const langs = JSON.parse(container.dataset.langs);
        const fieldsHtml = langs.map(l => `
            <div class="col-md-6">
                <label class="form-label small text-muted mb-1">${l.name}</label>
                <input type="text" name="item_bullets[${idx}][${l.key}][]" class="form-control form-control-sm" placeholder="Bullet (${l.name})">
            </div>`).join('');
        const html = `<div class="bullet-row border rounded p-2 mb-2">
            <div class="row g-2">${fieldsHtml}</div>
            <button type="button" class="btn btn-sm btn-danger remove-bullet-btn mt-2"><i class="bx bxs-trash"></i> Remove</button>
        </div>`;
        container.insertAdjacentHTML('beforeend', html);
    }
    if (e.target.closest('.remove-bullet-btn')) {
        e.target.closest('.bullet-row').remove();
    }
});
</script>
@endsection
