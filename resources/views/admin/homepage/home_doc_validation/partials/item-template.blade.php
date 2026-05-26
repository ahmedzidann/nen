<div class="item-card border rounded p-3 mb-3" data-idx="{{ $idx }}">
    <input type="hidden" name="item_id[{{ $idx }}]" value="{{ $item->id ?? '' }}">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="mb-0 fw-bold">Card #{{ $idx + 1 }}</h6>
        <button type="button" class="btn btn-sm btn-outline-danger remove-item-btn">
            <i class="bx bxs-trash"></i> Remove
        </button>
    </div>

    {{-- Icon Image --}}
    <div class="mb-3">
        <label class="form-label fw-semibold">Icon Image</label>
        @if($item && $item->image)
        <div class="mb-2">
            <img src="{{ asset('/storage/' . $item->image) }}" alt="icon"
                style="width:60px;height:60px;object-fit:cover;border-radius:50%;border:2px solid #ddd;">
        </div>
        @endif
        <input type="file" name="item_image[{{ $idx }}]" class="form-control" accept="image/*">
    </div>

    {{-- Title per language --}}
    <ul class="nav nav-tabs nav-sm mb-2" role="tablist">
        @foreach($translation as $t)
        <li class="nav-item">
            <a class="nav-link py-1 px-2 {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                href="#item-{{ $idx }}-{{ $t->id }}">{{ ucfirst($t->name) }}</a>
        </li>
        @endforeach
    </ul>
    <div class="tab-content mb-3">
        @foreach($translation as $t)
        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="item-{{ $idx }}-{{ $t->id }}">
            <input type="text" name="item_title[{{ $t->key }}][{{ $idx }}]"
                value="{{ $item ? $item->translate('title', $t->key) : '' }}"
                class="form-control" placeholder="Card title ({{ ucfirst($t->name) }})">
        </div>
        @endforeach
    </div>

    {{-- Bullet Points --}}
    <div class="mb-2">
        <label class="form-label fw-semibold">Bullet Points</label>
        <div id="bullets-container-{{ $idx }}"
             data-idx="{{ $idx }}"
             data-langs="{{ json_encode($translation->map(fn($t) => ['key' => $t->key, 'name' => ucfirst($t->name)])) }}">
            @if($item)
                @foreach($item->details as $bIdx => $detail)
                <div class="bullet-row border rounded p-2 mb-2">
                    <input type="hidden" name="bullet_id[{{ $idx }}][{{ $bIdx }}]" value="{{ $detail->id }}">
                    <div class="row g-2">
                        @foreach($translation as $t)
                        <div class="col-md-6">
                            <label class="form-label small text-muted mb-1">{{ ucfirst($t->name) }}</label>
                            <input type="text"
                                name="item_bullets[{{ $idx }}][{{ $t->key }}][]"
                                value="{{ $detail->translate('title', $t->key) }}"
                                class="form-control form-control-sm"
                                placeholder="Bullet ({{ ucfirst($t->name) }})">
                        </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-sm btn-danger remove-bullet-btn mt-2">
                        <i class="bx bxs-trash"></i> Remove
                    </button>
                </div>
                @endforeach
            @endif
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary add-bullet-btn mt-1" data-idx="{{ $idx }}">
            <i class="bx bx-plus"></i> Add Bullet
        </button>
    </div>
</div>
