@if (count($resources) > 0)
    <div class="d-flex flex-column justify-content-center align-items-center gap-1">
        <h5 class="global-title mb-0 text-dark">
            Quick Access
        </h5>
        <div class="under-title-vector">
            <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy"
                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                alt="vector">
        </div>
    </div>
    <!--Start Swiper Container -->
    <div class="tabs-items mt-md-4 mt-3">
        <div class="swiper-container">
            <!-- Swiper Wrapper for Tabs -->
            <div class="swiper-wrapper px-5">
                @forelse ($resources as $resource)
                    <!-- Static Card 1 -->
                    <div class="swiper-slide nav-item" role="presentation">
                        <div class="documents-sections mb-1 mt-2 h-100">
                            <div id="hovering-top-border-card" class="document-content">
                                <div class="d-flex flex-column gap-2 p-3 justify-content-between align-items-center">
                                    <div
                                        class="top-content d-flex flex-column gap-2 justify-content-center align-items-center pt-2">
                                        @if ($resource->type == 'file')
                                            <a href="{{ asset('/storage') . '/' . $resource->resource }}"
                                                target="_blank">
                                                <svg width="56" height="64" viewBox="0 0 28 32" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg" style="transform: scale(0.9);">
                                                    <path
                                                        d="M8.60623 24.8485C8.91734 24.6845 9.25734 24.5245 9.62623 24.3725C9.31461 24.7906 8.98089 25.1951 8.62623 25.5845C8.00401 26.2585 7.51957 26.6165 7.21512 26.7285C7.18985 26.7381 7.16386 26.7461 7.13734 26.7525C7.11516 26.7248 7.09583 26.6953 7.07957 26.6645C6.95512 26.4445 6.95957 26.2325 7.16845 25.9445C7.40401 25.6145 7.87734 25.2365 8.60623 24.8485ZM14.0618 21.5545C13.7973 21.6045 13.5351 21.6545 13.2707 21.7105C13.6624 21.0198 14.0329 20.3195 14.3818 19.6105C14.7331 20.1963 15.1112 20.7688 15.5151 21.3265C15.0329 21.3905 14.5462 21.4665 14.0618 21.5545ZM19.6729 23.4325C19.3277 23.1819 19.0046 22.9078 18.7062 22.6125C19.2129 22.6225 19.6707 22.6565 20.0662 22.7205C20.7707 22.8345 21.1018 23.0145 21.2173 23.1385C21.2538 23.1731 21.2744 23.2188 21.2751 23.2665C21.2673 23.4076 21.2216 23.5448 21.1418 23.6665C21.097 23.7639 21.025 23.8493 20.9329 23.9145C20.887 23.9398 20.833 23.9504 20.7796 23.9445C20.5796 23.9385 20.2062 23.8125 19.6729 23.4325ZM14.7285 13.9405C14.6396 14.4285 14.4885 14.9885 14.284 15.5985C14.2087 15.3701 14.1427 15.1393 14.0862 14.9065C13.9173 14.2005 13.8929 13.6465 13.984 13.2625C14.0685 12.9085 14.2285 12.7665 14.4196 12.6965C14.5221 12.6558 14.6306 12.6289 14.7418 12.6165C14.7707 12.6765 14.804 12.8005 14.8129 13.0125C14.824 13.2565 14.7973 13.5665 14.7285 13.9425V13.9405Z"
                                                        fill="#DA0016" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M5.22179 0.000488281H16.984C17.5733 0.000601556 18.1385 0.21139 18.5551 0.586488L26.7929 8.00049C27.2097 8.37547 27.4439 8.8841 27.444 9.41449V28.0005C27.444 29.0614 26.9758 30.0788 26.1423 30.8289C25.3088 31.5791 24.1783 32.0005 22.9996 32.0005H5.22179C4.04305 32.0005 2.91259 31.5791 2.07909 30.8289C1.2456 30.0788 0.777344 29.0614 0.777344 28.0005V4.00049C0.777344 2.93962 1.2456 1.92221 2.07909 1.17206C2.91259 0.421916 4.04305 0.000488281 5.22179 0.000488281ZM17.444 3.00049V7.00049C17.444 7.53092 17.6781 8.03963 18.0949 8.4147C18.5116 8.78977 19.0769 9.00049 19.6662 9.00049H24.1107L17.444 3.00049ZM5.58845 27.3365C5.78845 27.6965 6.09957 28.0225 6.56179 28.1745C7.02179 28.3245 7.47734 28.2545 7.85068 28.1145C8.55734 27.8545 9.26179 27.2425 9.90846 26.5425C10.6485 25.7405 11.4262 24.6885 12.1773 23.5225C13.6274 23.1357 15.1123 22.864 16.6151 22.7105C17.2818 23.4765 17.9707 24.1365 18.6373 24.6105C19.2596 25.0505 19.9773 25.4165 20.7129 25.4445C21.1136 25.4623 21.5102 25.3657 21.8462 25.1685C22.1907 24.9665 22.4462 24.6745 22.6329 24.3365C22.8329 23.9745 22.9551 23.5965 22.9396 23.2105C22.9255 22.8299 22.7689 22.4648 22.4951 22.1745C21.9929 21.6345 21.1707 21.3745 20.3618 21.2445C19.3806 21.1077 18.385 21.0741 17.3951 21.1445C16.5592 20.081 15.8304 18.9525 15.2173 17.7725C15.7729 16.4525 16.1885 15.2045 16.3729 14.1845C16.4529 13.7485 16.4951 13.3325 16.4796 12.9565C16.4768 12.5833 16.3803 12.2154 16.1973 11.8805C16.0919 11.6956 15.9421 11.5342 15.7588 11.408C15.5754 11.2817 15.3631 11.1938 15.1373 11.1505C14.6885 11.0645 14.2262 11.1505 13.8018 11.3045C12.964 11.6045 12.5218 12.2445 12.3551 12.9505C12.1929 13.6305 12.2662 14.4225 12.4573 15.2225C12.6529 16.0345 12.9862 16.9185 13.4129 17.8125C12.7304 19.3401 11.9422 20.8277 11.0529 22.2665C9.90766 22.5908 8.80374 23.0232 7.75957 23.5565C6.93734 23.9965 6.20623 24.5165 5.76623 25.1305C5.29957 25.7825 5.15512 26.5585 5.58845 27.3365Z"
                                                        fill="#DA0016" />
                                                </svg>
                                            </a>
                                        @elseif ($resource->type == 'url')
                                            <a href="{{ $resource->resource }}" target="_blank">
                                                <svg width="56" height="64" viewBox="0 0 28 32" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="28" height="32" rx="4" fill="#007BFF"
                                                        style="transform: scale(0.9);" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M9.00003 16.5C9.00003 15.9477 9.44776 15.5 10 15.5H18C18.5523 15.5 19 15.9477 19 16.5C19 17.0523 18.5523 17.5 18 17.5H10C9.44776 17.5 9.00003 17.0523 9.00003 16.5Z"
                                                        fill="white" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.5 12C12.5 11.4477 12.9478 11 13.5 11H18C19.3807 11 20.5 12.1193 20.5 13.5V18C20.5 18.5523 20.0523 19 19.5 19C18.9478 19 18.5 18.5523 18.5 18V13.5C18.5 13.2239 18.2761 13 18 13H13.5C12.9478 13 12.5 12.5523 12.5 12Z"
                                                        fill="white" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M8.5 13C8.5 12.4477 8.05228 12 7.5 12C6.94772 12 6.5 12.4477 6.5 13V18.5C6.5 19.8807 7.61929 21 9 21H14.5C15.0523 21 15.5 20.5523 15.5 20C15.5 19.4477 15.0523 19 14.5 19H9C8.72386 19 8.5 18.7761 8.5 18.5V13Z"
                                                        fill="white" />
                                                </svg>
                                            </a>
                                        @elseif ($resource->type == 'image')
                                            <img src="{{ asset('/storage') . '/' . $resource->resource }}"
                                                alt="icon"
                                                style="width: 56px; height: 64px; border-radius: 4px; background-color: #007BFF; transform: scale(0.9);" />
                                        @endif

                                        <p class="description fs-6 text-muted lh-base mt-0 pt-0 text-center"
                                            style="width: 5rem; word-break: break-all; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                            {{ $resource->title }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse

            </div>

            <!-- Swiper Navigation Buttons -->
            <div class="slider-button slider-prev" tabindex="0" role="button" aria-label="Previous slide">
                <i class="fa fa-chevron-left"></i>
            </div>
            <div class="slider-button slider-next" tabindex="0" role="button" aria-label="Next slide">
                <i class="fa fa-chevron-right"></i>
            </div>
        </div>
    </div>
    <!--End Swiper Container -->
@endif
