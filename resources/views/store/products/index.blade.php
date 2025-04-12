@extends('store.master')
@section('content')

<div class="page-content">


    <!--start breadcrumb-->
    {{-- <div class="py-4 border-bottom">
     <div class="container">
       <nav aria-label="breadcrumb">
         <ol class="breadcrumb mb-0">
           <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
           <li class="breadcrumb-item"><a href="javascript:;">Shop</a></li>
           <li class="breadcrumb-item active" aria-current="page">Shop With Grid</li>
         </ol>
       </nav>
     </div>
    </div> --}}
    <!--end breadcrumb-->


    <!--start product grid-->
    <section class="section-padding">
     <h5 class="mb-0 fw-bold d-none">Product Grid</h5>
     <div class="container">
       <div class="btn btn-dark btn-ecomm d-xl-none position-fixed top-50 start-0 translate-middle-y"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarFilter"><span><i class="bi bi-funnel me-1"></i> Filters</span></div>
        <div class="row">
           <div class="col-12 col-xl-3 filter-column">
               <nav class="navbar navbar-expand-xl flex-wrap p-0">
                 <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbarFilter" aria-labelledby="offcanvasNavbarFilterLabel">
                   <div class="offcanvas-header">
                     <h5 class="offcanvas-title mb-0 fw-bold" id="offcanvasNavbarFilterLabel">Filters</h5>
                     <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                   </div>
                   <div class="offcanvas-body">
                     <div class="filter-sidebar">
                       <div class="card rounded-0">
                         <div class="card-header d-none d-xl-block bg-transparent">
                             <h5 class="mb-0 fw-bold">Filters</h5>
                         </div>
                         <div class="card-body">
                            <form method="GET" action="{{ route('products.index') }}">
                           <h6 class="p-1 fw-bold bg-light">Categories</h6>
                             <div class="categories">
                              <div class="categories-wrapper height-1 p-1">
                                {{-- products_count --}}

                                @foreach ($categories as $category)
                                <div class="form-check">
                                    {{-- <input class="form-check-input" type="checkbox" value="" id="chekCate1"> --}}
                                    <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}"
                                            {{ in_array($category->id, request()->get('categories', [])) ? 'checked' : '' }} id="chekCate{{$category->id}}">
                                    <label class="form-check-label" for="chekCate{{$category->id}}">

                                      <span>{{$category->title}}</span><span class="product-number">({{$category->products_count}})</span>
                                    </label>
                                  </div>
                                @endforeach


                              </div>
                           </div>
                           <hr>
                           <div class="Price">
                             <h6 class="p-1 fw-bold bg-light">Price</h6>
                              <div class="Price-wrapper p-1">
                               <div class="input-group">
                                 {{-- <input type="text" class="form-control rounded-0" placeholder="$10">
                                 <span class="input-group-text bg-section-1 border-0">-</span>
                                 <input type="text" class="form-control rounded-0" placeholder="$10000"> --}}

                                 <input type="text" name="min_price" class="form-control rounded-0" placeholder="Min" value="{{ request('min_price') }}">
                                 <span class="input-group-text bg-section-1 border-0">-</span>
                                 <input type="text" name="max_price" class="form-control rounded-0" placeholder="Max" value="{{ request('max_price') }}">

                                 {{-- <button type="button" class="btn btn-outline-dark rounded-0 ms-2"><i class="bi bi-chevron-right"></i></button> --}}
                                <div class="row">

                                </div>
                            </div>
                            <button type="submit" class="btn btn-dark mt-2">Filter</button>
                              </div>
                            </div>
                        </form>




                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
             </nav>
           </div>
           <div class="col-12 col-xl-9">
             <div class="shop-right-sidebar">
               <div class="card rounded-0">
                 <div class="card-body p-2">
                   <div class="d-flex align-items-center justify-content-between bg-light p-2">
                      <div class="product-count">{{ $products->total() }} Items Found</div>
                      {{-- <div class="view-type hstack gap-2 d-none d-xl-flex">
                         <p class="mb-0">Grid</p>
                         <div>
                           <a href="shop-grid.html" class="grid-type-3 d-flex gap-1 active">
                             <span></span>
                             <span></span>
                             <span></span>
                           </a>
                         </div>
                         <div>
                           <a href="shop-grid-type-5.html" class="grid-type-3 d-flex gap-1">
                           <span></span>
                           <span></span>
                           <span></span>
                           <span></span>
                           <span></span>
                           </a>
                         </div>
                      </div> --}}
                      <form>
                        <form method="GET" action="{{ route('products.index') }}">
                            {{-- Keep existing filter inputs here if needed --}}
                            <div class="input-group">
                              <span class="input-group-text bg-transparent rounded-0 border-0">Sort By</span>
                              <select class="form-select rounded-0" name="sort" onchange="this.form.submit()">
                                <option value="">Select</option>
                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                                <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest</option>
                                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                              </select>
                            </div>

                            {{-- You can optionally add a submit button for non-JS fallback --}}
                          </form>
                     </form>
                   </div>
                 </div>
               </div>

               <div class="product-grid mt-4">
                 <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                   @foreach ($products as $product)
                   <div class="col">
                    <div class="card border shadow-none">
                      <div class="position-relative overflow-hidden">
                        <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                          {{-- <a href="javascript:;"><i class="bi bi-basket3"></i></a> --}}
                          <a href="javascript:;" class="add-to-cart"
                          data-id="{{ $product->id }}"
                          data-name="{{ $product->name }}"
                          data-price="{{ $product->price }}"
                          data-image="{{ asset('storage') . '/' . $product->main_image }}">
                          <i class="bi bi-basket3"></i>
                      </a>
                          {{-- <a href="javascript:;"><i class="bi bi-zoom-in"></i></a> --}}
                          <a href="javascript:;"
                          class="quick-view-btn"
                          data-bs-toggle="modal"
                          data-bs-target="#QuickViewModal"
                          data-id="{{ $product->id }}"
                          data-name="{{ $product->name }}"
                          data-description="{{ $product->description }}"
                          data-price="{{ $product->price }}"
                          data-image="{{ asset('storage/' . $product->main_image) }}"
                          data-images="{{ json_encode($product->images->pluck('image')) }}">
                          <i class="bi bi-zoom-in"></i>
                      </a>
                        </div>
                        <a href="{{route('products.show',['product'=>$product->id])}}">
                          <img src="{{ asset('storage') . '/' . $product->main_image }}" class="card-img-top" alt="...">
                        </a>
                      </div>
                      <div class="card-body border-top">
                        <h5 class="mb-0 fw-bold product-short-title">{{ $product->name }}</h5>
                        <p class="mb-0 product-short-name">{!! $product->description !!}</p>
                        <div class="product-price d-flex align-items-center gap-2 mt-2">
                          <div class="h6 fw-bold">${{ $product->price }}</div>
                          {{-- <div class="h6 fw-light text-muted text-decoration-line-through">$2089</div> --}}
                          {{-- <div class="h6 fw-bold text-danger">(70% off)</div> --}}
                        </div>
                      </div>
                    </div>
                  </div>
                   @endforeach

               </div><!--end row-->
             </div>

             <hr class="my-4">
             <div class="product-pagination">
                {{-- {{ $products->links() }} --}}
                {{ $products->appends(request()->query())->links() }}
            </div>
             {{-- <div class="product-pagination">
               <nav>
                 <ul class="pagination justify-content-center">
                   <li class="page-item disabled">
                     <a class="page-link">Previous</a>
                   </li>
                   <li class="page-item active"><a class="page-link" href="javascript:;">1</a></li>
                   <li class="page-item"><a class="page-link" href="javascript:;">2</a></li>
                   <li class="page-item"><a class="page-link" href="javascript:;">3</a></li>
                   <li class="page-item">
                     <a class="page-link" href="javascript:;">Next</a>
                   </li>
                 </ul>
               </nav>
             </div> --}}

             </div>
           </div>
        </div><!--end row-->

     </div>
   </section>

  </div>
@endsection
