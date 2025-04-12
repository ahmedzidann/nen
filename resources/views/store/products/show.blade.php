@extends('store.master')
@section('content')

<div class="page-content">


    <!--start breadcrumb-->



    <!--start product details-->
    <section class="py-4">
     <div class="container">
        <div class="row g-4">
           <div class="col-12 col-xl-7">
             <div class="product-images">
                 <div class="product-zoom-images">
                   <div class="row row-cols-2 g-3">
                     <div class="col">
                       <div class="img-thumb-container overflow-hidden position-relative" data-fancybox="gallery" data-src="{{ asset('storage') . '/' . $product->main_image }}">
                         <img src="{{ asset('storage') . '/' . $product->main_image }}" class="img-fluid" alt="">
                       </div>
                     </div>
                     @foreach ($product->images as $image)
                        <div class="col">
                            <div class="img-thumb-container overflow-hidden position-relative" data-fancybox="gallery" data-src="{{ asset('storage') . '/' . $image->image }}">
                            <img src="{{ asset('storage') . '/' . $image->image }}" class="img-fluid" alt="">
                            </div>
                        </div>
                     @endforeach

                     {{-- <div class="col">
                       <div class="img-thumb-container overflow-hidden position-relative" data-fancybox="gallery" data-src="assets/images/product-images/03.jpg">
                         <img src="assets/images/product-images/03.jpg" class="img-fluid" alt="">
                       </div>
                     </div>
                     <div class="col">
                       <div class="img-thumb-container overflow-hidden position-relative" data-fancybox="gallery" data-src="assets/images/product-images/04.jpg">
                         <img src="assets/images/product-images/04.jpg" class="img-fluid" alt="">
                       </div>
                     </div>
                     <div class="col">
                       <div class="img-thumb-container overflow-hidden position-relative" data-fancybox="gallery" data-src="assets/images/product-images/05.jpg">
                         <img src="assets/images/product-images/05.jpg" class="img-fluid" alt="">
                       </div>
                     </div>
                     <div class="col">
                       <div class="img-thumb-container overflow-hidden position-relative" data-fancybox="gallery" data-src="assets/images/product-images/06.jpg">
                         <img src="assets/images/product-images/06.jpg" class="img-fluid" alt="">
                       </div>
                     </div>
                     <div class="col">
                       <div class="img-thumb-container overflow-hidden position-relative" data-fancybox="gallery" data-src="assets/images/product-images/07.jpg">
                         <img src="assets/images/product-images/07.jpg" class="img-fluid" alt="">
                       </div>
                     </div>
                     <div class="col">
                       <div class="img-thumb-container overflow-hidden position-relative" data-fancybox="gallery" data-src="assets/images/product-images/08.jpg">
                         <img src="assets/images/product-images/08.jpg" class="img-fluid" alt="">
                       </div>
                     </div> --}}
                   </div><!--end row-->
                 </div>
             </div>
           </div>
           <div class="col-12 col-xl-5">
             <div class="product-info">
                   <h4 class="product-title fw-bold mb-1">{{$product->name}}</h4>
                   <p class="mb-0">{!!$product->description!!}</p>
                   <div class="product-rating">
                     <div class="hstack gap-2 border p-1 mt-3 width-content">
                       <div><span class="rating-number">4.8</span><i class="bi bi-star-fill ms-1 text-warning"></i></div>
                       <div class="vr"></div>
                       <div>162 Ratings</div>
                     </div>
                   </div>
                   <hr>
                   <div class="product-price d-flex align-items-center gap-3">
                      <div class="h4 fw-bold">${{$product->price}}</div>
                      {{-- <div class="h5 fw-light text-muted text-decoration-line-through">${{$product->price}}</div> --}}
                      {{-- <div class="h4 fw-bold text-danger">(70% off)</div> --}}
                   </div>
                   <p class="fw-bold mb-0 mt-1 text-success">inclusive of all taxes</p>

                   {{-- <div class="more-colors mt-4">
                     <h6 class="fw-bold mb-3">More Colors</h6>
                     <div class="d-flex align-items-center gap-3">
                       <div class="">
                         <a href="javascript:;">
                           <img src="assets/images/featured-products/01.webp" width="65" alt="">
                         </a>
                       </div>
                       <div class="">
                         <a href="javascript:;">
                           <img src="assets/images/featured-products/02.webp" width="65" alt="">
                         </a>
                       </div>
                       <div class="">
                         <a href="javascript:;">
                           <img src="assets/images/featured-products/03.webp" width="65" alt="">
                         </a>
                       </div>
                       <div class="">
                         <a href="javascript:;">
                           <img src="assets/images/featured-products/04.webp" width="65" alt="">
                         </a>
                       </div>
                     </div>
                   </div>

                   <div class="size-chart mt-4">
                     <h6 class="fw-bold mb-3">Select Size</h6>
                     <div class="d-flex align-items-center gap-2 flex-wrap">
                      <div class="">
                        <button type="button">XS</button>
                      </div>
                      <div class="">
                       <button type="button">S</button>
                     </div>
                      <div class="">
                       <button type="button">M</button>
                     </div>
                     <div class="">
                       <button type="button">L</button>
                     </div>
                     <div class="">
                       <button type="button">XL</button>
                     </div>
                     <div class="">
                       <button type="button">XXL</button>
                     </div>
                    </div>
                   </div> --}}
                   <div class="cart-buttons mt-3">
                     <div class="buttons d-flex flex-column flex-lg-row gap-3 mt-4">
                       <a href="javascript:;"
                        class="btn btn-lg btn-dark btn-ecomm px-5 py-3 col-lg-6 add-to-cart"
                        data-id="{{ $product->id }}"
                        data-name="{{ $product->name }}"
                        data-price="{{ $product->price }}"
                        data-image="{{ asset('storage') . '/' . $product->main_image }}">
                        <i class="bi bi-basket2 me-2">
                            </i>Add to Bag
                        </a>

                       {{-- <a href="javascript:;" class="btn btn-lg btn-outline-dark btn-ecomm px-5 py-3"><i class="bi bi-suit-heart me-2"></i>Wishlist</a> --}}
                     </div>
                   </div>
                   {{-- <hr class="my-3">
                   <div class="product-info">
                     <h6 class="fw-bold mb-3">Product Details</h6>
                      <p class="mb-1">There are many variations of passages of Lorem Ipsum</p>
                      <p class="mb-1">All the Lorem Ipsum generators on the Internet tend to repeat</p>
                      <p class="mb-1">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece</p>
                      <p class="mb-1">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.</p>
                   </div> --}}
                   <hr class="my-3">
                   {{-- <div class="customer-ratings">
                     <h6 class="fw-bold mb-3">Customer Ratings</h6>
                       <div class="d-flex align-items-center gap-4 gap-lg-5 flex-wrap flex-lg-nowrap">
                         <div class="">
                           <h1 class="mb-2 fw-bold">4.8<span class="fs-5 ms-2 text-warning"><i class="bi bi-star-fill"></i></span></h1>
                           <p class="mb-0">3.8k Verified Buyers</p>
                         </div>
                         <div class="vr d-none d-lg-block"></div>
                         <div class="w-100">
                           <div class="rating-wrrap hstack gap-2 align-items-center">
                             <p class="mb-0">5</p>
                             <div class=""><i class="bi bi-star"></i></div>
                             <div class="progress flex-grow-1 mb-0 rounded-0" style="height: 4px;">
                               <div class="progress-bar bg-success" role="progressbar" style="width: 75%"></div>
                             </div>
                             <p class="mb-0">1528</p>
                           </div>
                           <div class="rating-wrrap hstack gap-2 align-items-center">
                             <p class="mb-0">4</p>
                             <div class=""><i class="bi bi-star"></i></div>
                             <div class="progress flex-grow-1 mb-0 rounded-0" style="height: 4px;">
                               <div class="progress-bar bg-success" role="progressbar" style="width: 65%"></div>
                             </div>
                             <p class="mb-0">253</p>
                           </div>
                           <div class="rating-wrrap hstack gap-2 align-items-center">
                             <p class="mb-0">3</p>
                             <div class=""><i class="bi bi-star"></i></div>
                             <div class="progress flex-grow-1 mb-0 rounded-0" style="height: 4px;">
                               <div class="progress-bar bg-info" role="progressbar" style="width: 45%"></div>
                             </div>
                             <p class="mb-0">258</p>
                           </div>
                           <div class="rating-wrrap hstack gap-2 align-items-center">
                             <p class="mb-0">2</p>
                             <div class=""><i class="bi bi-star"></i></div>
                             <div class="progress flex-grow-1 mb-0 rounded-0" style="height: 4px;">
                               <div class="progress-bar bg-warning" role="progressbar" style="width: 35%"></div>
                             </div>
                             <p class="mb-0">78</p>
                           </div>
                           <div class="rating-wrrap hstack gap-2 align-items-center">
                             <p class="mb-0">1</p>
                             <div class=""><i class="bi bi-star"></i></div>
                             <div class="progress flex-grow-1 mb-0 rounded-0" style="height: 4px;">
                               <div class="progress-bar bg-danger" role="progressbar" style="width: 25%"></div>
                             </div>
                             <p class="mb-0">27</p>
                           </div>
                         </div>
                       </div>
                   </div> --}}

                   {{-- <hr class="my-3">
                   <div class="customer-reviews">
                     <h6 class="fw-bold mb-3">Customer Reviews (875)</h6>
                     <div class="reviews-wrapper">
                       <div class="d-flex flex-column flex-lg-row gap-3">
                         <div class=""><span class="badge bg-green rounded-0">5<i class="bi bi-star-fill ms-1"></i></span></div>
                         <div class="flex-grow-1">
                           <p class="mb-2">This is some content from a media component. You can replace this with any content and adjust it as needed. Some quick example text to build on the card title and make.</p>
                           <div class="review-img">
                             <img src="assets/images/featured-products/05.webp" alt="" width="70">
                           </div>
                           <div class="d-flex flex-column flex-sm-row gap-3 mt-3">
                             <div class="hstack flex-grow-1 gap-3">
                               <p class="mb-0">Jhon Deo</p>
                               <div class="vr"></div>
                               <div class="date-posted">12 June 2020</div>
                             </div>
                             <div class="hstack">
                               <div class=""><i class="bi bi-hand-thumbs-up me-2"></i>68</div>
                               <div class="mx-3"></div>
                               <div class=""><i class="bi bi-hand-thumbs-down me-2"></i>24</div>
                             </div>
                           </div>
                         </div>
                       </div>
                       <hr>
                       <div class="d-flex flex-column flex-lg-row gap-3">
                         <div class=""><span class="badge bg-green rounded-0">4<i class="bi bi-star-fill ms-1"></i></span></div>
                         <div class="flex-grow-1">
                           <p class="mb-2">This is some content from a media component. You can replace this with any content.</p>
                           <div class="review-img">
                             <img src="assets/images/featured-products/02.webp" alt="" width="70">
                           </div>
                           <div class="d-flex flex-column flex-sm-row gap-3 mt-3">
                             <div class="hstack flex-grow-1 gap-3">
                               <p class="mb-0">Jhon Deo</p>
                               <div class="vr"></div>
                               <div class="date-posted">15 June 2020</div>
                             </div>
                             <div class="hstack">
                               <div class=""><i class="bi bi-hand-thumbs-up me-2"></i>58</div>
                               <div class="mx-3"></div>
                               <div class=""><i class="bi bi-hand-thumbs-down me-2"></i>34</div>
                             </div>
                           </div>
                         </div>
                       </div>
                       <hr>
                       <div class="d-flex flex-column flex-lg-row gap-3">
                         <div class=""><span class="badge bg-warning rounded-0 text-dark">3<i class="bi bi-star-fill ms-1"></i></span></div>
                         <div class="flex-grow-1">
                           <p class="mb-2">This is some content from a media component. You can replace this with any content and adjust it as needed.</p>
                           <div class="review-img">
                             <img src="assets/images/featured-products/04.webp" alt="" width="70">
                           </div>
                           <div class="d-flex flex-column flex-sm-row gap-3 mt-3">
                             <div class="hstack flex-grow-1 gap-3">
                               <p class="mb-0">Jhon Deo</p>
                               <div class="vr"></div>
                               <div class="date-posted">22 June 2022</div>
                             </div>
                             <div class="hstack">
                               <div class=""><i class="bi bi-hand-thumbs-up me-2"></i>98</div>
                               <div class="mx-3"></div>
                               <div class=""><i class="bi bi-hand-thumbs-down me-2"></i>41</div>
                             </div>
                           </div>
                         </div>
                       </div>
                       <hr>
                       <div class="d-flex flex-column flex-lg-row gap-3">
                         <div class=""><span class="badge bg-danger rounded-0">2<i class="bi bi-star-fill ms-1"></i></span></div>
                         <div class="flex-grow-1">
                           <p class="mb-2">You can replace this with any content and adjust it as needed. Some quick example text to build on the card title and make.</p>
                           <div class="review-img">
                             <img src="assets/images/featured-products/01.webp" alt="" width="70">
                           </div>
                           <div class="d-flex flex-column flex-sm-row gap-3 mt-3">
                             <div class="hstack flex-grow-1 gap-3">
                               <p class="mb-0">Jhon Deo</p>
                               <div class="vr"></div>
                               <div class="date-posted">22 June 2022</div>
                             </div>
                             <div class="hstack">
                               <div class=""><i class="bi bi-hand-thumbs-up me-2"></i>26</div>
                               <div class="mx-3"></div>
                               <div class=""><i class="bi bi-hand-thumbs-down me-2"></i>89</div>
                             </div>
                           </div>
                         </div>
                       </div>
                       <hr>
                       <div class="text-center">
                         <a href="javascript:;" class="btn btn-ecomm btn-outline-dark">View All Reviws<i class="bi bi-arrow-right ms-2"></i></a>
                       </div>
                     </div>
                   </div> --}}
             </div>
           </div>
        </div><!--end row-->
     </div>
   </section>
    <!--start product details-->


   <!--start product details-->
   <section class="section-padding">
     <div class="container">
       <div class="separator pb-3">
         <div class="line"></div>
         <h3 class="mb-0 h3 fw-bold">Similar Products</h3>
         <div class="line"></div>
       </div>
       <div class="similar-products">
         <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 g-4">
           @foreach ($product->similarProducts as $sProduct)
           @if($sProduct->id == $product->id) @continue @endif
           <div class="col">
            <a href="{{route('products.show',['product'=>$sProduct->id])}}">
            <div class="card rounded-0">
              <img src="{{ asset('storage') . '/' . $sProduct->main_image }}" alt="" class="card-img-top rounded-0">
              <div class="card-body border-top">
                <h5 class="mb-0 fw-bold product-short-title">{{$sProduct->name}}</h5>
                <p class="mb-0 product-short-name">{!!$sProduct->description!!}</p>
                <div class="product-price d-flex align-items-center gap-3 mt-2">
                  <div class="h6 fw-bold">${{$sProduct->price}}</div>
                  {{-- <div class="h6 fw-light text-muted text-decoration-line-through">$2089</div> --}}
                  {{-- <div class="h6 fw-bold text-danger">(70% off)</div> --}}
                </div>
              </div>
            </div>
            </a>
          </div>
           @endforeach

           {{-- <div class="col">
             <a href="javascript:;">
             <div class="card rounded-0">
               <img src="assets/images/new-arrival/02.webp" alt="" class="card-img-top rounded-0">
               <div class="card-body border-top">
                 <h5 class="mb-0 fw-bold product-short-title">Syndrona</h5>
                 <p class="mb-0 product-short-name">Color Printed Kurta</p>
                 <div class="product-price d-flex align-items-center gap-3 mt-2">
                   <div class="h6 fw-bold">$458</div>
                   <div class="h6 fw-light text-muted text-decoration-line-through">$2089</div>
                   <div class="h6 fw-bold text-danger">(70% off)</div>
                 </div>
               </div>
             </div>
             </a>
           </div>
           <div class="col">
             <a href="javascript:;">
             <div class="card rounded-0">
               <img src="assets/images/best-sellar/02.webp" alt="" class="card-img-top rounded-0">
               <div class="card-body border-top">
                 <h5 class="mb-0 fw-bold product-short-title">Syndrona</h5>
                 <p class="mb-0 product-short-name">Color Printed Kurta</p>
                 <div class="product-price d-flex align-items-center gap-3 mt-2">
                   <div class="h6 fw-bold">$458</div>
                   <div class="h6 fw-light text-muted text-decoration-line-through">$2089</div>
                   <div class="h6 fw-bold text-danger">(70% off)</div>
                 </div>
               </div>
             </div>
             </a>
           </div>
           <div class="col">
             <a href="javascript:;">
             <div class="card rounded-0">
               <img src="assets/images/new-arrival/04.webp" alt="" class="card-img-top rounded-0">
               <div class="card-body border-top">
                 <h5 class="mb-0 fw-bold product-short-title">Syndrona</h5>
                 <p class="mb-0 product-short-name">Color Printed Kurta</p>
                 <div class="product-price d-flex align-items-center gap-3 mt-2">
                   <div class="h6 fw-bold">$458</div>
                   <div class="h6 fw-light text-muted text-decoration-line-through">$2089</div>
                   <div class="h6 fw-bold text-danger">(70% off)</div>
                 </div>
               </div>
             </div>
            </a>
           </div>
           <div class="col">
             <a href="javascript:;">
             <div class="card rounded-0">
               <img src="assets/images/new-arrival/05.webp" alt="" class="card-img-top rounded-0">
               <div class="card-body border-top">
                 <h5 class="mb-0 fw-bold product-short-title">Syndrona</h5>
                 <p class="mb-0 product-short-name">Color Printed Kurta</p>
                 <div class="product-price d-flex align-items-center gap-3 mt-2">
                   <div class="h6 fw-bold">$458</div>
                   <div class="h6 fw-light text-muted text-decoration-line-through">$2089</div>
                   <div class="h6 fw-bold text-danger">(70% off)</div>
                 </div>
               </div>
              </div>
              </a>
           </div>
           <div class="col">
             <a href="javascript:;">
             <div class="card rounded-0">
               <img src="assets/images/trending-product/03.webp" alt="" class="card-img-top rounded-0">
               <div class="card-body border-top">
                 <h5 class="mb-0 fw-bold product-short-title">Syndrona</h5>
                 <p class="mb-0 product-short-name">Color Printed Kurta</p>
                 <div class="product-price d-flex align-items-center gap-3 mt-2">
                   <div class="h6 fw-bold">$458</div>
                   <div class="h6 fw-light text-muted text-decoration-line-through">$2089</div>
                   <div class="h6 fw-bold text-danger">(70% off)</div>
                 </div>
               </div>
             </div>
              </a>
           </div>
           <div class="col">
             <a href="javascript:;">
             <div class="card rounded-0">
               <img src="assets/images/featured-products/05.webp" alt="" class="card-img-top rounded-0">
               <div class="card-body border-top">
                 <h5 class="mb-0 fw-bold product-short-title">Syndrona</h5>
                 <p class="mb-0 product-short-name">Color Printed Kurta</p>
                 <div class="product-price d-flex align-items-center gap-3 mt-2">
                   <div class="h6 fw-bold">$458</div>
                   <div class="h6 fw-light text-muted text-decoration-line-through">$2089</div>
                   <div class="h6 fw-bold text-danger">(70% off)</div>
                 </div>
               </div>
             </div>
            </a>
           </div>
           <div class="col">
             <a href="javascript:;">
             <div class="card rounded-0">
               <img src="assets/images/trending-product/05.webp" alt="" class="card-img-top rounded-0">
               <div class="card-body border-top">
                 <h5 class="mb-0 fw-bold product-short-title">Syndrona</h5>
                 <p class="mb-0 product-short-name">Color Printed Kurta</p>
                 <div class="product-price d-flex align-items-center gap-3 mt-2">
                   <div class="h6 fw-bold">$458</div>
                   <div class="h6 fw-light text-muted text-decoration-line-through">$2089</div>
                   <div class="h6 fw-bold text-danger">(70% off)</div>
                 </div>
               </div>
             </div>
            </a>
           </div>
           <div class="col">
             <a href="javascript:;">
             <div class="card rounded-0">
               <img src="assets/images/trending-product/01.webp" alt="" class="card-img-top rounded-0">
               <div class="card-body border-top">
                 <h5 class="mb-0 fw-bold product-short-title">Syndrona</h5>
                 <p class="mb-0 product-short-name">Color Printed Kurta</p>
                 <div class="product-price d-flex align-items-center gap-3 mt-2">
                   <div class="h6 fw-bold">$458</div>
                   <div class="h6 fw-light text-muted text-decoration-line-through">$2089</div>
                   <div class="h6 fw-bold text-danger">(70% off)</div>
                 </div>
               </div>
             </div>
             </a>
           </div>
           <div class="col">
             <a href="javascript:;">
              <div class="card rounded-0">
               <img src="assets/images/trending-product/02.webp" alt="" class="card-img-top rounded-0">
               <div class="card-body border-top">
                 <h5 class="mb-0 fw-bold product-short-title">Syndrona</h5>
                 <p class="mb-0 product-short-name">Color Printed Kurta</p>
                 <div class="product-price d-flex align-items-center gap-3 mt-2">
                   <div class="h6 fw-bold">$458</div>
                   <div class="h6 fw-light text-muted text-decoration-line-through">$2089</div>
                   <div class="h6 fw-bold text-danger">(70% off)</div>
                 </div>
               </div>
             </div>
            </a>
           </div> --}}


         </div>
         <!--end row-->
       </div>
     </div>
   </section>
   <!--end product details-->


  </div>
@endsection
