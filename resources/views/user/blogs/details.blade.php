@extends('user.layout.blogs.master')
@section('parent_page_name')
    Blog Details
@endsection
@section('page_name')
    Blog Details
@endsection
@section('websiteStyle')
    <link rel="stylesheet" href="{{ asset('content/styles/pages/blogs-page/details.css') }}" />
    {{-- start toastr --}}
    <link rel="stylesheet" href="{{ asset('toastr/css/toastr.min.css') }}" />
    {{-- end toastr --}}
    <style>

    </style>
@endsection
@section('content')
    <!-- start page -->
    <div class="page px-lg-3 pb-3">
        <!-- bread-crumb -->

        <div class="bread-crumb fs-6" id="breadCrumb">
            <span><a href="index.html" class=" text-dark d-flex gap-1 align-items-center">
                    <svg width="40" class="no-rotate" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4.18753 11.3788C4.03002 11.759 4 11.9533 4 12V20.0018C4 20.5529 4.44652 21 5 21H8V15C8 13.8954 8.89543 13 10 13H14C15.1046 13 16 13.8954 16 15V21H19C19.5535 21 20 20.5529 20 20.0018V12C20 11.9533 19.97 11.759 19.8125 11.3788C19.6662 11.0256 19.4443 10.5926 19.1547 10.1025C18.5764 9.1238 17.765 7.97999 16.8568 6.89018C15.9465 5.79788 14.9639 4.78969 14.0502 4.06454C13.5935 3.70204 13.1736 3.42608 12.8055 3.2444C12.429 3.05862 12.1641 3 12 3C11.8359 3 11.571 3.05862 11.1945 3.2444C10.8264 3.42608 10.4065 3.70204 9.94978 4.06454C9.03609 4.78969 8.05348 5.79788 7.14322 6.89018C6.23505 7.97999 5.42361 9.1238 4.8453 10.1025C4.55568 10.5926 4.33385 11.0256 4.18753 11.3788ZM10.3094 1.45091C10.8353 1.19138 11.4141 1 12 1C12.5859 1 13.1647 1.19138 13.6906 1.45091C14.2248 1.71454 14.7659 2.07921 15.2935 2.49796C16.3486 3.33531 17.4285 4.45212 18.3932 5.60982C19.3601 6.77001 20.2361 8.0012 20.8766 9.08502C21.1963 9.62614 21.4667 10.1462 21.6602 10.6134C21.8425 11.0535 22 11.5467 22 12V20.0018C22 21.6599 20.6557 23 19 23H16C14.8954 23 14 22.1046 14 21V15H10V21C10 22.1046 9.10457 23 8 23H5C3.34434 23 2 21.6599 2 20.0018V12C2 11.5467 2.15748 11.0535 2.33982 10.6134C2.53334 10.1462 2.80369 9.62614 3.12345 9.08502C3.76389 8.0012 4.63995 6.77001 5.60678 5.60982C6.57152 4.45212 7.65141 3.33531 8.70647 2.49796C9.2341 2.07921 9.77521 1.71454 10.3094 1.45091Z"
                                fill="#0F0F0F"></path>
                        </g>
                    </svg><span id="home"> Home</span></a></span>
            <svg height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g stroke-width="0"></g>
                <g stroke-linecap="round" stroke-linejoin="round"></g>
                <g>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12.2929 4.29289C12.6834 3.90237 13.3166 3.90237 13.7071 4.29289L20.7071 11.2929C21.0976 11.6834 21.0976 12.3166 20.7071 12.7071L13.7071 19.7071C13.3166 20.0976 12.6834 20.0976 12.2929 19.7071C11.9024 19.3166 11.9024 18.6834 12.2929 18.2929L17.5858 13H4C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11H17.5858L12.2929 5.70711C11.9024 5.31658 11.9024 4.68342 12.2929 4.29289Z"
                        fill="#000000"></path>
                </g>
            </svg>
            <span><a href="./index.html#blogList" class=" text-dark">Blogs</a></span>
        </div>
        <!-- End bread-crumb -->
        <div class="img-container" id="imgContainer"></div>
        <div class="page-content">


            <!-- start Article -->
            <div class=" d-flex align-items-center justify-content-between">
                <div>
                    <div id="articleTitle" class="article-title">
                        <h1></h1>

                    </div>
                    <div class="category mt-4 mb-2 d-flex gap-4 flex-wrap flex-row justify-content-between">
                        <div class="category-content align-items-center  flex-grow-1 d-flex flex-row gap-3"
                            id="categoryContent">
                        </div>
                    </div>
                </div>
                <div class="category d-flex gap-4 flex-wrap flex-row justify-content-between">
                    <div class="category-content align-items-center  flex-grow-1 d-flex flex-row gap-3"
                        id="categoryContent">
                    </div>
                </div>
                <div id="share" class="share d-flex  align-items-center  gap-2">
                    <div class="share-icon">
                        <svg width="26" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g stroke-width="0"></g>
                            <g stroke-linecap="round" stroke-linejoin="round"></g>
                            <g>
                                <path
                                    d="M9 12C9 13.3807 7.88071 14.5 6.5 14.5C5.11929 14.5 4 13.3807 4 12C4 10.6193 5.11929 9.5 6.5 9.5C7.88071 9.5 9 10.6193 9 12Z"
                                    stroke="#990000" stroke-width="1.5"></path>
                                <path d="M14 6.5L9 10" stroke="#990000" stroke-width="1.5" stroke-linecap="round">
                                </path>
                                <path d="M14 17.5L9 14" stroke="#990000" stroke-width="1.5" stroke-linecap="round">
                                </path>
                                <path
                                    d="M19 18.5C19 19.8807 17.8807 21 16.5 21C15.1193 21 14 19.8807 14 18.5C14 17.1193 15.1193 16 16.5 16C17.8807 16 19 17.1193 19 18.5Z"
                                    stroke="#990000" stroke-width="1.5"></path>
                                <path
                                    d="M19 5.5C19 6.88071 17.8807 8 16.5 8C15.1193 8 14 6.88071 14 5.5C14 4.11929 15.1193 3 16.5 3C17.8807 3 19 4.11929 19 5.5Z"
                                    stroke="#990000" stroke-width="1.5"></path>
                            </g>
                        </svg>
                    </div>
                    <span>Share</span>
                </div>
                <div class="share-popup" id="sharePopup">
                    <div class="share-container">
                        <button class="close-popup" id="closePopup">
                            <svg width="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g stroke-width="0"></g>
                                <g stroke-linecap="round" stroke-linejoin="round"></g>
                                <g>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10.9393 12L6.9696 15.9697L8.03026 17.0304L12 13.0607L15.9697 17.0304L17.0304 15.9697L13.0607 12L17.0303 8.03039L15.9696 6.96973L12 10.9393L8.03038 6.96973L6.96972 8.03039L10.9393 12Z"
                                        fill="#080341"></path>
                                </g>
                            </svg>
                        </button>
                        <h5 id="shareTitle">Share</h5>
                        <div class="share-icons d-flex gap-2 ">
                            <button id="facebookShareButton" name="facebookShare" aria-label="Share on Facebook"
                                title="Share this content on Facebook"> <svg width="30" class="no-rotate"
                                    viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <circle cx="16" cy="16" r="14" fill="url(#paint0_linear_87_7208)">
                                        </circle>
                                        <path
                                            d="M21.2137 20.2816L21.8356 16.3301H17.9452V13.767C17.9452 12.6857 18.4877 11.6311 20.2302 11.6311H22V8.26699C22 8.26699 20.3945 8 18.8603 8C15.6548 8 13.5617 9.89294 13.5617 13.3184V16.3301H10V20.2816H13.5617V29.8345C14.2767 29.944 15.0082 30 15.7534 30C16.4986 30 17.2302 29.944 17.9452 29.8345V20.2816H21.2137Z"
                                            fill="white"></path>
                                        <defs>
                                            <linearGradient id="paint0_linear_87_7208" x1="16" y1="2"
                                                x2="16" y2="29.917" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#18ACFE"></stop>
                                                <stop offset="1" stop-color="#0163E0"></stop>
                                            </linearGradient>
                                        </defs>
                                    </g>
                                </svg>
                                <span>Facebook</span>
                            </button>
                            <button id="twitterShareButton" name="twitterShare" aria-label="Share on Twitter"
                                title="Share this content on Twitter"> <svg width="30" class="no-rotate"
                                    xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision"
                                    text-rendering="geometricPrecision" image-rendering="optimizeQuality"
                                    fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 512">
                                    <path
                                        d="M256 0c141.385 0 256 114.615 256 256S397.385 512 256 512 0 397.385 0 256 114.615 0 256 0z" />
                                    <path fill="#fff" fill-rule="nonzero"
                                        d="M318.64 157.549h33.401l-72.973 83.407 85.85 113.495h-67.222l-52.647-68.836-60.242 68.836h-33.423l78.052-89.212-82.354-107.69h68.924l47.59 62.917 55.044-62.917zm-11.724 176.908h18.51L205.95 176.493h-19.86l120.826 157.964z" />
                                </svg>
                                <span>Twitter</span>


                            </button>
                        </div>
                        <div class="copy">
                            <h5 class="fs-5 pt-5 opacity-75" id="pageLink">Copy url</h5>
                            <div
                                class="d-flex justify-content-between align-items-center bg-light text-muted-color py-2 px-3 rounded mt-3 gap-3">
                                <p class="mb-0 opacity-25" id="link"></p>
                                <button id="copyLinkBtn" class="copy" name="copyLink"
                                    aria-label="Copy link to clipboard" title="Copy the link to clipboard">
                                    <span class="copied">Copied</span>

                                    <span>
                                        <svg xml:space="preserve" style="enable-background:new 0 0 512 512"
                                            class="no-rotate" viewBox="0 0 6.35 6.35" y="0" x="0" height="20"
                                            width="20" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path fill="currentColor"
                                                    d="M2.43.265c-.3 0-.548.236-.573.53h-.328a.74.74 0 0 0-.735.734v3.822a.74.74 0 0 0 .735.734H4.82a.74.74 0 0 0 .735-.734V1.529a.74.74 0 0 0-.735-.735h-.328a.58.58 0 0 0-.573-.53zm0 .529h1.49c.032 0 .049.017.049.049v.431c0 .032-.017.049-.049.049H2.43c-.032 0-.05-.017-.05-.049V.843c0-.032.018-.05.05-.05zm-.901.53h.328c.026.292.274.528.573.528h1.49a.58.58 0 0 0 .573-.529h.328a.2.2 0 0 1 .206.206v3.822a.2.2 0 0 1-.206.205H1.53a.2.2 0 0 1-.206-.205V1.529a.2.2 0 0 1 .206-.206z">
                                                </path>
                                            </g>
                                        </svg>
                                    </span>

                                </button>


                                <button id="linkedinShareButton" name="linkedinShare" aria-label="Share on LinkedIn">
                                    <svg class="no-rotate" width="30" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill="#0077B5" fill-rule="evenodd"
                                                d="M22.0367422,22 L17.8848745,22 L17.8848745,15.5036305 C17.8848745,13.9543347 17.85863,11.9615082 15.7275829,11.9615082 C13.5676669,11.9615082 13.237862,13.6498994 13.237862,15.3925291 L13.237862,22 L9.0903683,22 L9.0903683,8.64071385 L13.0707725,8.64071385 L13.0707725,10.4673257 L13.1276354,10.4673257 C13.6813927,9.41667396 15.0356049,8.3091593 17.0555507,8.3091593 C21.2599073,8.3091593 22.0367422,11.0753215 22.0367422,14.6734319 L22.0367422,22 Z M4.40923804,6.81585163 C3.07514653,6.81585163 2,5.73720584 2,4.40748841 C2,3.07864579 3.07514653,2 4.40923804,2 C5.73720584,2 6.81585163,3.07864579 6.81585163,4.40748841 C6.81585163,5.73720584 5.73720584,6.81585163 4.40923804,6.81585163 L4.40923804,6.81585163 Z M6.48604672,22 L2.32980492,22 L2.32980492,8.64071385 L6.48604672,8.64071385 L6.48604672,22 Z">
                                            </path>
                                        </g>
                                    </svg> <span>Linkedin</span>

                                </button>
                                <button id="whatsappShareButton" name="whatsappShare" aria-label="Share on WhatsApp"
                                    title="Share this content on WhatsApp"><svg width="30" viewBox="0 0 32 32"
                                        fill="none" class="no-rotate" xmlns="http://www.w3.org/2000/svg">
                                        <g stroke-width="0"></g>
                                        <g stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M16 31C23.732 31 30 24.732 30 17C30 9.26801 23.732 3 16 3C8.26801 3 2 9.26801 2 17C2 19.5109 2.661 21.8674 3.81847 23.905L2 31L9.31486 29.3038C11.3014 30.3854 13.5789 31 16 31ZM16 28.8462C22.5425 28.8462 27.8462 23.5425 27.8462 17C27.8462 10.4576 22.5425 5.15385 16 5.15385C9.45755 5.15385 4.15385 10.4576 4.15385 17C4.15385 19.5261 4.9445 21.8675 6.29184 23.7902L5.23077 27.7692L9.27993 26.7569C11.1894 28.0746 13.5046 28.8462 16 28.8462Z"
                                                fill="#BFC8D0"></path>
                                            <path
                                                d="M28 16C28 22.6274 22.6274 28 16 28C13.4722 28 11.1269 27.2184 9.19266 25.8837L5.09091 26.9091L6.16576 22.8784C4.80092 20.9307 4 18.5589 4 16C4 9.37258 9.37258 4 16 4C22.6274 4 28 9.37258 28 16Z"
                                                fill="url(#paint0_linear_87_7264)"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M16 30C23.732 30 30 23.732 30 16C30 8.26801 23.732 2 16 2C8.26801 2 2 8.26801 2 16C2 18.5109 2.661 20.8674 3.81847 22.905L2 30L9.31486 28.3038C11.3014 29.3854 13.5789 30 16 30ZM16 27.8462C22.5425 27.8462 27.8462 22.5425 27.8462 16C27.8462 9.45755 22.5425 4.15385 16 4.15385C9.45755 4.15385 4.15385 9.45755 4.15385 16C4.15385 18.5261 4.9445 20.8675 6.29184 22.7902L5.23077 26.7692L9.27993 25.7569C11.1894 27.0746 13.5046 27.8462 16 27.8462Z"
                                                fill="white"></path>
                                            <path
                                                d="M12.5 9.49989C12.1672 8.83131 11.6565 8.8905 11.1407 8.8905C10.2188 8.8905 8.78125 9.99478 8.78125 12.05C8.78125 13.7343 9.52345 15.578 12.0244 18.3361C14.438 20.9979 17.6094 22.3748 20.2422 22.3279C22.875 22.2811 23.4167 20.0154 23.4167 19.2503C23.4167 18.9112 23.2062 18.742 23.0613 18.696C22.1641 18.2654 20.5093 17.4631 20.1328 17.3124C19.7563 17.1617 19.5597 17.3656 19.4375 17.4765C19.0961 17.8018 18.4193 18.7608 18.1875 18.9765C17.9558 19.1922 17.6103 19.083 17.4665 19.0015C16.9374 18.7892 15.5029 18.1511 14.3595 17.0426C12.9453 15.6718 12.8623 15.2001 12.5959 14.7803C12.3828 14.4444 12.5392 14.2384 12.6172 14.1483C12.9219 13.7968 13.3426 13.254 13.5313 12.9843C13.7199 12.7145 13.5702 12.305 13.4803 12.05C13.0938 10.953 12.7663 10.0347 12.5 9.49989Z"
                                                fill="white"></path>
                                            <defs>
                                                <linearGradient id="paint0_linear_87_7264" x1="26.5" y1="7"
                                                    x2="4" y2="28" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#5BD066"></stop>
                                                    <stop offset="1" stop-color="#27B43E"></stop>
                                                </linearGradient>
                                            </defs>
                                        </g>
                                        <span>WhatsApp</span>

                                    </svg>
                                </button>
                                <button id="instagramShareButton" name="instagramShare" aria-label="Share on Instagram"
                                    title="Share this content on Instagram"><svg viewBox="0 0 32 32" class="no-rotate"
                                        fill="none" width="30" xmlns="http://www.w3.org/2000/svg">
                                        <g stroke-width="0"></g>
                                        <g stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g>
                                            <rect x="2" y="2" width="28" height="28" rx="6"
                                                fill="url(#paint0_radial_87_7153)">
                                            </rect>
                                            <rect x="2" y="2" width="28" height="28" rx="6"
                                                fill="url(#paint1_radial_87_7153)">
                                            </rect>
                                            <rect x="2" y="2" width="28" height="28" rx="6"
                                                fill="url(#paint2_radial_87_7153)">
                                            </rect>
                                            <path
                                                d="M23 10.5C23 11.3284 22.3284 12 21.5 12C20.6716 12 20 11.3284 20 10.5C20 9.67157 20.6716 9 21.5 9C22.3284 9 23 9.67157 23 10.5Z"
                                                fill="white"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M16 21C18.7614 21 21 18.7614 21 16C21 13.2386 18.7614 11 16 11C13.2386 11 11 13.2386 11 16C11 18.7614 13.2386 21 16 21ZM16 19C17.6569 19 19 17.6569 19 16C19 14.3431 17.6569 13 16 13C14.3431 13 13 14.3431 13 16C13 17.6569 14.3431 19 16 19Z"
                                                fill="white"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M6 15.6C6 12.2397 6 10.5595 6.65396 9.27606C7.2292 8.14708 8.14708 7.2292 9.27606 6.65396C10.5595 6 12.2397 6 15.6 6H16.4C19.7603 6 21.4405 6 22.7239 6.65396C23.8529 7.2292 24.7708 8.14708 25.346 9.27606C26 10.5595 26 12.2397 26 15.6V16.4C26 19.7603 26 21.4405 25.346 22.7239C24.7708 23.8529 23.8529 24.7708 22.7239 25.346C21.4405 26 19.7603 26 16.4 26H15.6C12.2397 26 10.5595 26 9.27606 25.346C8.14708 24.7708 7.2292 23.8529 6.65396 22.7239C6 21.4405 6 19.7603 6 16.4V15.6ZM15.6 8H16.4C18.1132 8 19.2777 8.00156 20.1779 8.0751C21.0548 8.14674 21.5032 8.27659 21.816 8.43597C22.5686 8.81947 23.1805 9.43139 23.564 10.184C23.7234 10.4968 23.8533 10.9452 23.9249 11.8221C23.9984 12.7223 24 13.8868 24 15.6V16.4C24 18.1132 23.9984 19.2777 23.9249 20.1779C23.8533 21.0548 23.7234 21.5032 23.564 21.816C23.1805 22.5686 22.5686 23.1805 21.816 23.564C21.5032 23.7234 21.0548 23.8533 20.1779 23.9249C19.2777 23.9984 18.1132 24 16.4 24H15.6C13.8868 24 12.7223 23.9984 11.8221 23.9249C10.9452 23.8533 10.4968 23.7234 10.184 23.564C9.43139 23.1805 8.81947 22.5686 8.43597 21.816C8.27659 21.5032 8.14674 21.0548 8.0751 20.1779C8.00156 19.2777 8 18.1132 8 16.4V15.6C8 13.8868 8.00156 12.7223 8.0751 11.8221C8.14674 10.9452 8.27659 10.4968 8.43597 10.184C8.81947 9.43139 9.43139 8.81947 10.184 8.43597C10.4968 8.27659 10.9452 8.14674 11.8221 8.0751C12.7223 8.00156 13.8868 8 15.6 8Z"
                                                fill="white"></path>
                                            <defs>
                                                <radialGradient id="paint0_radial_87_7153" cx="0" cy="0"
                                                    r="1" gradientUnits="userSpaceOnUse"
                                                    gradientTransform="translate(12 23) rotate(-55.3758) scale(25.5196)">
                                                    <stop stop-color="#B13589"></stop>
                                                    <stop offset="0.79309" stop-color="#C62F94"></stop>
                                                    <stop offset="1" stop-color="#8A3AC8"></stop>
                                                </radialGradient>
                                                <radialGradient id="paint1_radial_87_7153" cx="0" cy="0"
                                                    r="1" gradientUnits="userSpaceOnUse"
                                                    gradientTransform="translate(11 31) rotate(-65.1363) scale(22.5942)">
                                                    <stop stop-color="#E0E8B7"></stop>
                                                    <stop offset="0.444662" stop-color="#FB8A2E"></stop>
                                                    <stop offset="0.71474" stop-color="#E2425C"></stop>
                                                    <stop offset="1" stop-color="#E2425C" stop-opacity="0"></stop>
                                                </radialGradient>
                                                <radialGradient id="paint2_radial_87_7153" cx="0" cy="0"
                                                    r="1" gradientUnits="userSpaceOnUse"
                                                    gradientTransform="translate(0.500002 3) rotate(-8.1301) scale(38.8909 8.31836)">
                                                    <stop offset="0.156701" stop-color="#406ADC"></stop>
                                                    <stop offset="0.467799" stop-color="#6A45BE"></stop>
                                                    <stop offset="1" stop-color="#6A45BE" stop-opacity="0"></stop>
                                                </radialGradient>
                                            </defs>
                                        </g>
                                    </svg>
                                    <span>Instagram</span>

                                </button>
                            </div>
                            <div class="copy">
                                <h5 class="fs-5 pt-5 opacity-75" id="pageLink">Copy url</h5>
                                <div
                                    class="d-flex justify-content-between align-items-center bg-light text-muted-color py-2 px-3 rounded mt-3 gap-3">
                                    <p class="mb-0 opacity-25" id="link"></p>
                                    <button id="copyLinkBtn" class="copy" name="copyLink"
                                        aria-label="Copy link to clipboard" title="Copy the link to clipboard">
                                        <span class="copied">Copied</span>
                                        <span data-text-end="Copied!" data-text-initial="Copy to clipboard"
                                            class="tooltip"></span>
                                        <span>
                                            <svg xml:space="preserve" style="enable-background:new 0 0 512 512"
                                                class="no-rotate" viewBox="0 0 6.35 6.35" y="0" x="0" height="20"
                                                width="20" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                    <path fill="currentColor"
                                                        d="M2.43.265c-.3 0-.548.236-.573.53h-.328a.74.74 0 0 0-.735.734v3.822a.74.74 0 0 0 .735.734H4.82a.74.74 0 0 0 .735-.734V1.529a.74.74 0 0 0-.735-.735h-.328a.58.58 0 0 0-.573-.53zm0 .529h1.49c.032 0 .049.017.049.049v.431c0 .032-.017.049-.049.049H2.43c-.032 0-.05-.017-.05-.049V.843c0-.032.018-.05.05-.05zm-.901.53h.328c.026.292.274.528.573.528h1.49a.58.58 0 0 0 .573-.529h.328a.2.2 0 0 1 .206.206v3.822a.2.2 0 0 1-.206.205H1.53a.2.2 0 0 1-.206-.205V1.529a.2.2 0 0 1 .206-.206z">
                                                    </path>
                                                </g>
                                            </svg>
                                        </span>
                                    </button>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="row mt-4 align-items-start justify-content-between  ">
                    <div class="description position-relative p-s-5 col-md-12 gap-2 col-lg-9" id="description"></div>
                    <div class="sidebar col-md-3 col-sm-0">
                        <div class="cards">
                            <div class="categorates">
                                <h2 id="categorateTitle">Top Categories:</h2>
                                <div class="under-title-vector">
                                    <img src="https://dev.nendemo2024.xyz/content/images/vector-title.svg" loading="lazy"
                                        alt="vector">
                                </div>
                                <div class="d-flex flex-wrap gap-1 pt-3 align-items-center" id="categorates">
                                    @foreach ($blog->categories as $category)
                                        <div class="gap-0">
                                            <button class="button-2 d-flex align-items-center gap-1" name="culinary"
                                                aria-label="Explore Culinary" title="Discover Culinary tips and recipes">
                                                <svg class="no-rotate" width="15" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g stroke-width="0"></g>
                                                    <g stroke-linecap="round" stroke-linejoin="round"></g>
                                                    <g>
                                                        <path
                                                            d="M5 10H7C9 10 10 9 10 7V5C10 3 9 2 7 2H5C3 2 2 3 2 5V7C2 9 3 10 5 10Z"
                                                            stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path
                                                            d="M17 10H19C21 10 22 9 22 7V5C22 3 21 2 19 2H17C15 2 14 3 14 5V7C14 9 15 10 17 10Z"
                                                            stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path
                                                            d="M17 22H19C21 22 22 21 22 19V17C22 15 21 14 19 14H17C15 14 14 15 14 17V19C14 21 15 22 17 22Z"
                                                            stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path
                                                            d="M5 22H7C9 22 10 21 10 19V17C10 15 9 14 7 14H5C3 14 2 15 2 17V19C2 21 3 22 5 22Z"
                                                            stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </g>
                                                </svg>
                                                <span> {{ $category->title }}</span>
                                            </button>
                                        </div>
                                    @endforeach
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- End Article -->
            @if ($blog->video)
                <!-- Start video -->
                <div class="video ">
                    <div class="explan p-2 w-100">
                        <h2 class="fs-2 ">Explanatory Video</h2>
                        <div class="under-title-vector">
                            <img src="https://dev.nendemo2024.xyz/content/images/vector-title.svg" loading="lazy"
                                alt="vector">
                        </div>
                    </div>
                    <div class="video-container">
                        <video id="myVideo">
                            <source src="{{ asset('storage/') . '/' . $blog->video }}" type="video/mp4">
                        </video>
                        <!-- Overlay content -->
                        <div class="overlay" id="overlay">
                            <button class="resume" id="playPauseButton" name="playPause" aria-label="Play or Pause"
                                title="Click to play or pause the video"> <svg width="100px" fill="#ffffff"
                                    height="200px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 52 52" xml:space="preserve">
                                    <g stroke-width="0"></g>
                                    <g stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g>
                                        <g>
                                            <path
                                                d="M26,0C11.663,0,0,11.663,0,26s11.663,26,26,26s26-11.663,26-26S40.337,0,26,0z M26,50C12.767,50,2,39.233,2,26 S12.767,2,26,2s24,10.767,24,24S39.233,50,26,50z">
                                            </path>
                                            <polygon points="32,36.783 32,15.438 14.043,25.806 "></polygon>
                                        </g>
                                    </g>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- End video -->
            @endif
            <!-- start Latest  -->
            <div class="latest">
                <div>
                    <h2 class="fs-2 fw-bold">Latest Articles</h2>
                    <div class="under-title-vector border-1">
                        <img src="https://dev.nendemo2024.xyz/content/images/vector-title.svg" loading="lazy"
                            onerror="this.onerror=null;this.src='https://dev.nendemo2024.xyz/content/images/not-found/no-image.svg';"
                            alt="vector">
                    </div>
                </div>
                <div class="row" id="latestArticles">
                </div>
            </div>

            <!-- End Latest  -->

        </div>
        <script>
            const lang = localStorage.getItem('lang');
            let descriptionContent = `{!! $blog->content !!}`;
            //Function to get Id

            //Get Articles
            let article = {
                imgSrc: "{{ asset('storage/' . $blog->banner) }}",
                date: '{{ $blog->created_at->format('j F Y') }}',
                readTime: '{{ $blog->created_at->diffForHumans() }}',
                title: '{{ $blog->title }}',
                description: "Explore the intersection of fashion and travel as we dive into the wardrobes of globetrotters.",
                author: {
                    name: "Maximilian Bartholomew",
                    nameAr: "ماكسيميليان بارتولوميو",
                    imgSrc: "./images/people/person2.jpg"
                },
                category: '{{ $blog->categories->first()->title }}',
            }

            //Put Content of Article
            function putText() {
                const imgContainer = document.getElementById('imgContainer');
                const artileTitle = document.querySelector('#articleTitle h1');
                const categoryName = document.querySelector('#categoryContent');
                const description = document.getElementById('description');

                const title = lang === 'ar' ? article.titleAr : article.title;
                const category = lang === 'ar' ? article.categoryAr : article.category;
                const publicationDate = lang === 'ar' ? article.dateAr : article.date;
                const readTime = lang === 'ar' ? article.readTimeAr : article.readTime;

                console.log(title, category)
                imgContainer.innerHTML = `<img class="main-img" src="${article.imgSrc}" alt="${title}">`;
                artileTitle.innerHTML = `${title}`
                categoryName.innerHTML = `
        <div class="d-flex align-items-center gap-4 flex-wrap">
        <div class="d-flex gap-2">
  <svg class="no-rotate" width="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g stroke-width="0"></g>
                                            <g stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g>
                                                <path d="M5 10H7C9 10 10 9 10 7V5C10 3 9 2 7 2H5C3 2 2 3 2 5V7C2 9 3 10 5 10Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M17 10H19C21 10 22 9 22 7V5C22 3 21 2 19 2H17C15 2 14 3 14 5V7C14 9 15 10 17 10Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M17 22H19C21 22 22 21 22 19V17C22 15 21 14 19 14H17C15 14 14 15 14 17V19C14 21 15 22 17 22Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M5 22H7C9 22 10 21 10 19V17C10 15 9 14 7 14H5C3 14 2 15 2 17V19C2 21 3 22 5 22Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
        <p class="name fw-bold m-auto">${category}</p>
        </div>
        <div class="author-name d-flex gap-3 flex-row align-items-center">
                    <span class="d-flex gap-2 align-items-center">
                    <svg  class="no-rotate" fill="#000000" width="16" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M256,0C114.84,0,0,114.84,0,256s114.84,256,256,256s256-114.84,256-256S397.16,0,256,0z M423.127,396.636l-30.258-30.258 l-26.49,26.49l30.258,30.258c-33.551,28.279-75.697,46.657-121.905,50.598v-42.896h-37.463v42.896 c-46.207-3.941-88.354-22.319-121.905-50.598l30.258-30.258l-26.49-26.49l-30.258,30.258 c-28.279-33.551-46.657-75.697-50.598-121.905h42.896v-37.463H38.275c3.941-46.207,22.319-88.354,50.598-121.905l30.258,30.258 l26.49-26.49l-30.258-30.258c33.551-28.279,75.697-46.657,121.905-50.598v42.896h37.463V38.275 c46.207,3.941,88.354,22.319,121.905,50.598l-30.258,30.258l26.49,26.49l30.258-30.258 c28.279,33.551,46.657,75.697,50.598,121.905h-42.896v37.463h42.896C469.784,320.939,451.405,363.085,423.127,396.636z"></path> </g> </g> <g> <g> <polygon points="274.732,237.268 274.732,118.634 237.268,118.634 237.268,274.732 355.902,274.732 355.902,237.268 "></polygon> </g> </g> </g></svg>
                    ${publicationDate}</span>
                <div class="category align-items-center d-flex gap-3">
                    <span class="d-flex gap-2 align-items-center">
                    <svg class="no-rotate" fill="#000000" width="16" viewBox="0 0 35 35" data-name="Layer 2" id="a866a81f-2948-4418-8bd5-1a5193c5f74e" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M29.545,34.75H5.455a5.211,5.211,0,0,1-5.2-5.2V8.56a5.21,5.21,0,0,1,5.205-5.2h24.09a5.21,5.21,0,0,1,5.2,5.205V29.545A5.211,5.211,0,0,1,29.545,34.75ZM5.455,5.855A2.708,2.708,0,0,0,2.75,8.56V29.545a2.709,2.709,0,0,0,2.705,2.7h24.09a2.708,2.708,0,0,0,2.7-2.7V8.56a2.707,2.707,0,0,0-2.7-2.7Z"></path><path d="M33.5,17.331H1.541a1.25,1.25,0,0,1,0-2.5H33.5a1.25,1.25,0,0,1,0,2.5Z"></path><path d="M9.459,9.155a1.249,1.249,0,0,1-1.25-1.25V1.5a1.25,1.25,0,0,1,2.5,0V7.905A1.25,1.25,0,0,1,9.459,9.155Z"></path><path d="M25.542,9.155a1.249,1.249,0,0,1-1.25-1.25V1.5a1.25,1.25,0,0,1,2.5,0V7.905A1.25,1.25,0,0,1,25.542,9.155Z"></path></g></svg>
                    ${readTime}</span>
                </div>
                </div>
    `
                description.innerHTML = descriptionContent;

                document.querySelector('title').innerText = title;

            }


            // Popup Share
            function openPopup(url, title) {
                const width = 600;
                const height = 400;
                const left = (screen.width / 2) - (width / 2);
                const top = (screen.height / 2) - (height / 2);

                window.open(url, title, `width=${width},height=${height},top=${top},left=${left}`);
            }

            function openAndCloseSharePopup() {
                document.querySelector('#share').addEventListener('click', () => document.querySelector('#sharePopup').classList
                    .add('active'))
                document.querySelector('#closePopup').addEventListener('click', () => document.querySelector('#sharePopup')
                    .classList.remove('active'))
            }

            function shareOnFacebook() {
                const articleUrl = encodeURIComponent(window.location.href);
                const facebookUrl = `https://www.facebook.com/sharer/sharer.php?u=${articleUrl}`;
                openPopup(facebookUrl, 'Share on Facebook');

            }


            function shareOnTwitter() {
                const articleUrl = encodeURIComponent(window.location.href);
                const text = encodeURIComponent("Check out this amazing article!");
                const twitterUrl = `https://twitter.com/intent/tweet?url=${articleUrl}&text=${text}`;
                openPopup(twitterUrl, 'Share on Twitter');
            };

            function shareOnInstagram() {
                document.getElementById("instagramShareButton").addEventListener("click", function() {
                    const url = window.location.href; // الرابط الحالي
                    const instagramShareUrl = `https://www.instagram.com/?url=${encodeURIComponent(url)}`;
                    openPopup(instagramShareUrl, 'Share on instagram');
                });
            }

            function shareOnLinkedin() {
                document.getElementById("linkedinShareButton").addEventListener("click", function() {
                    const url = window.location.href;
                    const linkedinShareUrl =
                        `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(url)}`;
                    openPopup(linkedinShareUrl, 'Share on linkedin');
                });
            }

            function shareOnWhats() {
                document.getElementById("whatsappShareButton").addEventListener("click", function() {
                    const url = window.location.href;
                    const whatsappShareUrl = `https://wa.me/?text=${encodeURIComponent(url)}`;
                    openPopup(whatsappShareUrl, 'Share on Whatsapp');
                });
            }

            function copyLink() {
                const articleUrl = (window.location.href);
                navigator.clipboard.writeText(articleUrl)
                document.getElementsByClassName('copied')[0].style.display = "block"

                setTimeout(() => {
                    document.getElementsByClassName('copied')[0].style.display = "none"
                }, 2000);

            }
            document.getElementById('link').innerHTML = window.location.href;
            //video

            @if ($blog->video)
                const video = document.getElementById("myVideo");
                const overlay = document.getElementById("overlay");
                const playPauseButton = document.getElementById("playPauseButton");

                playPauseButton.addEventListener("click", function() {
                    if (video.paused) {
                        video.play();
                        overlay.classList.add("hidden"); // إخفاء الـ Overlay
                    }
                });

                video.addEventListener("click", function() {
                    if (!video.paused) {
                        video.pause();
                        overlay.classList.remove("hidden"); // إظهار الـ Overlay
                        playPauseButton.innerHTML =
                            `<svg fill="#ffffff" width="100px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 52 52" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M26,0C11.663,0,0,11.663,0,26s11.663,26,26,26s26-11.663,26-26S40.337,0,26,0z M26,50C12.767,50,2,39.233,2,26 S12.767,2,26,2s24,10.767,24,24S39.233,50,26,50z"></path> <polygon points="32,36.783 32,15.438 14.043,25.806 "></polygon> </g> </g></svg>`;
                    }
                });
            @endif

            function changeToArabic(lang) {
                if (lang === 'ar') {
                    const navBarLinks = document.querySelectorAll('#navBarLinks li a');

                    navBarLinks[0].innerHTML = 'فندق';
                    navBarLinks[1].innerHTML = 'رحلة';
                    navBarLinks[2].innerHTML = 'قطار';
                    navBarLinks[3].innerHTML = 'سفر';
                    navBarLinks[4].innerHTML = 'تأجير سيارات';

                    const registerBtns = document.querySelectorAll("#register button")
                    registerBtns[0].innerHTML = 'تسجيل دخول';
                    registerBtns[1].innerHTML = 'اشتراك';

                    const breadCrumb = document.querySelectorAll('#breadCrumb span a')
                    breadCrumb[1].innerHTML = 'المدونات'
                    const breadCrumbHome = document.querySelector('#home')

                    breadCrumbHome.innerHTML = 'الرئيسية'


                    const share = document.querySelector('#share span');
                    share.innerHTML = 'مشاركة '

                    const shareTitleInPopup = document.getElementById('shareTitle')
                    shareTitleInPopup.innerHTML = 'مشاركة'

                    const pageLink = document.getElementById('pageLink')
                    pageLink.innerHTML = 'انسخ الرابط'
                    const categorateTitles = document.querySelector('#categorateTitle')
                    categorateTitles.innerHTML = 'افضل التصنيفات :';


                    const categorates = document.querySelectorAll('#categorates div button span')
                    categorates.forEach((categorate, i) => {
                        categorate.innerHTML = categorateListAr[i]
                    })

                    const explanTitle = document.querySelector('.explan h2')
                    explanTitle.innerHTML = 'فيديو توضيحي';
                    const latestTitle = document.querySelector('.latest h2')
                    latestTitle.innerHTML = 'آخر المقالات';

                }


            }

            function displayLatestArticles() {
                let ArticlesDiv = document.getElementById('latestArticles');

                ArticlesDiv.innerHTML = `
    <a class="text-black text-decoration-none p-1 col-lg-6 col-md-12">
        <div class="article">
            <div class="img-contaienr">
                <img src="http://127.0.0.1:8000/content/images/pages/home-page/hero-home-page.webp" alt="image">
            </div>
            <div class="content">
                <div class="title text-truncate">
                    technology
                </div>
                <svg width="20" class="go" viewBox="0 0 24 24" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2929 4.29289C12.6834 3.90237 13.3166 3.90237 13.7071 4.29289L20.7071 11.2929C21.0976 11.6834 21.0976 12.3166 20.7071 12.7071L13.7071 19.7071C13.3166 20.0976 12.6834 20.0976 12.2929 19.7071C11.9024 19.3166 11.9024 18.6834 12.2929 18.2929L17.5858 13H4C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11H17.5858L12.2929 5.70711C11.9024 5.31658 11.9024 4.68342 12.2929 4.29289Z" fill="#ffffff"></path>
                    </g>
                </svg>
            </div>
        </div>
    </a>
    <a href="article details.html?id=2" class="text-black text-decoration-none p-1 col-lg-3 col-md-6">
        <div class="article">
            <div class="img-contaienr">
                <img src="http://127.0.0.1:8000/content/images/doc_team.jpg" alt="image">
            </div>
            <div class="content">
                <div class="title text-truncate">
                    hiking
                </div>
                <svg width="20" class="go" viewBox="0 0 24 24" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2929 4.29289C12.6834 3.90237 13.3166 3.90237 13.7071 4.29289L20.7071 11.2929C21.0976 11.6834 21.0976 12.3166 20.7071 12.7071L13.7071 19.7071C13.3166 20.0976 12.6834 20.0976 12.2929 19.7071C11.9024 19.3166 11.9024 18.6834 12.2929 18.2929L17.5858 13H4C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11H17.5858L12.2929 5.70711C11.9024 5.31658 11.9024 4.68342 12.2929 4.29289Z" fill="#ffffff"></path>
                    </g>
                </svg>
            </div>
        </div>
    </a>
    <a href="article details.html?id=3" class="text-black text-decoration-none p-1 col-lg-3 col-md-6">
        <div class="article">
            <div class="img-contaienr">
                <img src="http://127.0.0.1:8000/content/images/about.jpg" alt="image">
            </div>
            <div class="content">
                <div class="title text-truncate">
                    technology
                </div>
                <svg width="20" class="go" viewBox="0 0 24 24" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2929 4.29289C12.6834 3.90237 13.3166 3.90237 13.7071 4.29289L20.7071 11.2929C21.0976 11.6834 21.0976 12.3166 20.7071 12.7071L13.7071 19.7071C13.3166 20.0976 12.6834 20.0976 12.2929 19.7071C11.9024 19.3166 11.9024 18.6834 12.2929 18.2929L17.5858 13H4C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11H17.5858L12.2929 5.70711C11.9024 5.31658 11.9024 4.68342 12.2929 4.29289Z" fill="#ffffff"></path>
                    </g>
                </svg>
            </div>
        </div>
    </a>`;


            }
            document.addEventListener('DOMContentLoaded', () => {



                openAndCloseSharePopup();
                document.getElementById('facebookShareButton').addEventListener('click', shareOnFacebook);
                document.getElementById('twitterShareButton').addEventListener('click', shareOnTwitter);
                document.getElementById('copyLinkBtn').addEventListener('click', copyLink);
                putText();
                displayLatestArticles();
                shareOnInstagram();
                shareOnLinkedin();
                shareOnWhats();


                changeToArabic(lang)
            });
        </script>
    @endsection
