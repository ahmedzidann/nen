<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col col-sm-12"><b>{{ TranslationHelper::translate(ucfirst('Filter Data')??'') }}</b></div>
            <div class="col col-sm-5 col-12">
                <label for="input29" class="form-label">{{ TranslationHelper::translate(ucfirst('Data To')??'')
                    }}</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                    <input type="date" class="form-control datepickerto" name="datepickerto" id="datepickerto"
                        placeholder="{{ TranslationHelper::translate(ucfirst('Data To...')??'') }}">
                </div>
            </div>
            <div class="col col-sm-5 col-12">
                <label for="input29" class="form-label">{{ TranslationHelper::translate(ucfirst('Data From')??'')
                    }}</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                    <input type="date" class="form-control datepickerfrom" name="datepickerfrom" id="datepickerfrom"
                        placeholder="{{ TranslationHelper::translate(ucfirst('Data From...')??'') }}">
                </div>
            </div>
            {{-- <div class="col col-sm-2 col-12">
                <label for="input29" style="visibility:hidden" class="form-label">{{
                    TranslationHelper::translate(ucfirst('Data From')??'') }}</label>
                <div class="input-group">
                    <a href="javascript:;" id="filterButton" class="btn btn-primary px-5 filterButton"><i
                            class="fadeIn animated bx bx-filter"></i>{{
                        TranslationHelper::translate(ucfirst('Filter')??'') }}</a>
                </div>
            </div> --}}
        </div>

        <div class="row">
            <div class="col col-sm-12"><b>parents</b></div>
            <div class="col col-sm-3 col-12">
                <label for="input29" class="form-label">searchs</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                    <input  required="" name="search_text"   class="search" data-search="true">

                </div>
            </div>
            <div class="col col-sm-3 col-12">
                <label for="input29" class="form-label">parents</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                    <x-admin.form.dropdown disabled="" required="" :foreach="$parents"
                    name="parent_id" nameselect="pages" :model="$parents" class="parent_id" data-search="true">
                    </x-admin.form.dropdown>
                </div>
            </div>
            <div class="col col-sm-3 col-12">
                <label for="input29" class="form-label">sub parents</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                    <x-admin.form.dropdown disabled="" required="" :foreach="$subparents"
                    name="sub_parent_id" nameselect="sub_parent_id" :model="$subparents" class="sub_parent_id" data-search="true">
                    </x-admin.form.dropdown>
                </div>
            </div>
            <div class="col col-sm-2 col-12">
                <label for="input29" style="visibility:hidden" class="form-label">{{
                    TranslationHelper::translate(ucfirst('Data From')??'') }}</label>
                <div class="input-group">
                    <a href="javascript:;" id="filterButton" class="btn btn-primary px-5 filterButton"><i
                            class="fadeIn animated bx bx-filter"></i>{{
                        TranslationHelper::translate(ucfirst('Filter')??'') }}</a>
                </div>
            </div>
        </div>




        <br>
        @if (isset($customzie))
        <a href="{{ $route??'' }}" class="btn btn-primary radius-30 mt-2 mt-lg-0">
            <i class="bx bxs-plus-square"></i>{{ TranslationHelper::translate(ucfirst($nameone??'')??'') }}
        </a>
        <a href="{{ $routeCreatesectionTwo??'' }}" class="btn btn-primary radius-30 mt-2 mt-lg-0">
            <i class="bx bxs-plus-square"></i>{{ TranslationHelper::translate(ucfirst($nametwo??'')??'') }}
        </a>
        @else
        <a href="{{ $route??'' }}" class="btn btn-primary radius-30 mt-2 mt-lg-0">
            <i class="bx bxs-plus-square"></i>{{ TranslationHelper::translate(ucfirst('Create')??'') }}
        </a>
        @endif
        <button type="button" class="btn btn-secondary btn-xs " name="bulk_delete" id="bulk_delete"><i
                class="bx bxs-trash"></i>{{ TranslationHelper::translate(ucfirst('Delete')??'') }}</button>
    </div>
</div>
