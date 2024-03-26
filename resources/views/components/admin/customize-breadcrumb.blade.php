<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">
        <a href="{{ $routeView??'' }}">
            {{ str_replace("-"," ",ucfirst(Request()->item)) }}
        </a>
    </div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                @if (!empty(Request('category')))
                    <li class="breadcrumb-item active" aria-current="page">
                            {{ str_replace("-"," ",ucfirst($category->name??'')) }}
                    </li>
                @endif
                @if (!empty(Request('subcategory')))
                    <li class="breadcrumb-item active" aria-current="page">
                            {{ str_replace("-"," ",ucfirst($subcategory->name??'')) }}
                    </li>
                @endif
                @if (!empty(Request('subsubcategory')))
                    <li class="breadcrumb-item active" aria-current="page">
                            {{ str_replace("-"," ",ucfirst($subsubcategory->name??'')) }}
                    </li>
                @endif
                    <li class="breadcrumb-item active" aria-current="page">{{ TranslationHelper::translate(ucfirst($type)??'') }}</li>
            </ol>
        </nav>
    </div>
</div>
@if(!empty($subsubcategory))
<h6 class="mb-0 text-uppercase">{{ ucfirst($subsubcategory->name??'') }}</h6>
@elseif(!empty($subcategory))
<h6 class="mb-0 text-uppercase">{{ ucfirst($subcategory->name??'') }}</h6>
@endif
