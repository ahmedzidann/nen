@extends('user.layout.blogs.master')

@section('parent_page_name')
    Blogs
@endsection

@section('page_name')
    Blogs
@endsection

@section('websiteStyle')
    <link rel="stylesheet" href="{{ asset('content/styles/pages/blogs-page/blog.css') }}" />
    <link rel="stylesheet" href="{{ asset('content/styles/pages/blogs-page/blog-rtl.css') }}" />
    <link rel="stylesheet" href="{{ asset('toastr/css/toastr.min.css') }}" />

    <style>
        .slider {
            height: 420px;
        }
        .slider .item {
            display: none;
        }
        .slider .item.active {
            display: block;
        }
        .slider-dots {
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
        }
        .slider-dots .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #fff;
            opacity: .5;
            cursor: pointer;
        }
        .slider-dots .dot.active {
            opacity: 1;
        }
    </style>
@endsection

@section('content')

    <!-- ================= Slider ================= -->
    <div class="slider position-relative overflow-hidden">
        <div class="list w-100 h-100"></div>
        <div class="slider-dots position-absolute d-flex gap-2 z-2"></div>
    </div>
    <!-- ================= End Slider ================= -->

    <!-- ================= Blogs ================= -->
    <div class="blogs p-4" id="blogList">

        <div class="title-and-filter d-flex justify-content-between flex-wrap">
            <div class="title mb-5">
                <h2 class="fs-2 fw-semibold">Blogs</h2>
                <p class="my-1 fs-6">
                    Here, we share travel tips, destination guides, and stories that inspire your next adventure.
                </p>
            </div>
        </div>

        <!-- Categories -->
        <div class="swiper d-flex gap-2">
            <div class="categorates d-flex gap-2 overflow-auto"></div>
        </div>

        <!-- Cards -->
        <div class="cards my-5 row"></div>

        <!-- Pagination -->
        <div class="pagination d-flex justify-content-center my-3"></div>
    </div>
    <!-- ================= End Blogs ================= -->
        <!-- Start Ads -->
    <div class="ads m-4 d-grid gap-3">
        @if (isset($advertisements[0]))
            <div class="booking text-black position-relative rounded overflow-hidden">
                <img src="{{ asset('storage') . '/' . $advertisements[0]->image }}" alt="Destination"
                    class="position-absolute w-100 top-0 start-0 object-fit-cover h-100" />
                <div id="booking"
                    class="booking-content d-flex py-3 px-4 w-100 h-100 text-white justify-content-lg-end justify-content-sm-center flex-column">
                    <h2 class="fs-3 z-2"> {{ $advertisements[0]->title }} </h2>
                    <p class="z-2 text-white mt-3 mb-4"> {{ $advertisements[0]->mini_desc }} </p>
                    <button class=" booking  p-2 rounded z-2" name="bookingButton" aria-label="Book now"
                        onclick="window.open('{{ $advertisements[0]->link }}', '_blank');">Booking Now
                    </button>

                </div>
            </div>
        @endif
        @if (isset($advertisements[1]))
            <div class="article
                        position-relative rounded">
                <img src="{{ asset('storage') . '/' . $advertisements[1]->image }}" alt="Clothes"
                    class="w-100 h-100 position-absolute top-0 start-0 object-fit-cover rounded" />
                <div id="article"
                    class="article-content d-flex py-3 px-4 w-100 h-100 text-white justify-content-lg-end justify-content-sm-center flex-column">
                    <p class="fs-4 z-2"> {{ $advertisements[1]->title }}</p>
                    <h3 class="fs-1 z-2">{{ $advertisements[1]->mini_desc }} </h3>
                </div>
            </div>
        @endif
        @if (isset($advertisements[2]))
            <div id="beyond" class="beyond position-relative">
                <img src="{{ asset('storage') . '/' . $advertisements[2]->image }}" alt="Scenic Image"
                    class="w-100 rounded" />
                <h2 class="position-absolute top-50  start-50 translate-middle text-center text-white fs-2">
                    {{ $advertisements[2]->title }}
                </h2>
            </div>
        @endif

    </div>

    <!-- toTop button -->
    <button id="toTop" class="top position-fixed z-2 cursor-pointer rounded-circle border-secondary opacity-0"
        name="scrollToTop" aria-label="Scroll to top">
        <svg xmlns="https://cdn3.pixelcut.app/7/20/uncrop_hero_bdf08a8ca6.jpg" height="30" fill="currentColor"
            class="bi bi-arrow-up-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z">
            </path>
        </svg>
    </button>
    <script></script>

@endsection

@section('websiteScript')
<script>

const lang = localStorage.getItem('lang');

/* =============================
   SLIDER DATA
============================= */

const slidesData = [
@foreach ($categories as $category)
    {
        imageSrc: "{{ $category->image ? asset('storage/'.$category->image) : asset('images/default.jpg') }}",
        destination: @json($category->title),
        title: @json($category->mini_desc),
    },
@endforeach
];

/* =============================
   BLOG DATA
============================= */

const articlesData = [
@foreach ($categories as $category)
    @foreach ($category->blogs as $blog)
    {
        id: {{ $blog->id }},
        title: @json($blog->title),
        description: @json($blog->mini_desc),
        category: @json($category->title),
        imgSrc: "{{ asset('storage/'.$blog->banner) }}",
        date: "{{ $blog->created_at->format('j F Y') }}",
        readTime: "{{ $blog->created_at->diffForHumans() }}"
    },
    @endforeach
@endforeach
];

const categoryList = [
    'All',
    @foreach ($categories as $category)
        @json($category->title),
    @endforeach
];

/* =============================
   SLIDER FUNCTIONS
============================= */

let currentSlide = 0;

function displaycontent(data) {
    const list = document.querySelector('.slider .list');
    const dots = document.querySelector('.slider-dots');

    if (!list || !dots || data.length === 0) return;

    list.innerHTML = '';
    dots.innerHTML = '';

    data.forEach((slide, index) => {
        list.innerHTML += `
            <div class="item ${index === 0 ? 'active' : ''}">
                <img src="${slide.imageSrc}" class="w-100 h-100 object-fit-cover">
                <div class="position-absolute bottom-0 start-0 p-4 text-white">
                    <p>${slide.destination}</p>
                    <h2>${slide.title}</h2>
                </div>
            </div>
        `;

        dots.innerHTML += `
            <span class="dot ${index === 0 ? 'active' : ''}" data-index="${index}"></span>
        `;
    });
}

function showSlide(index) {
    const items = document.querySelectorAll('.slider .item');
    const dots = document.querySelectorAll('.slider-dots .dot');

    items.forEach(i => i.classList.remove('active'));
    dots.forEach(d => d.classList.remove('active'));

    items[index].classList.add('active');
    dots[index].classList.add('active');

    currentSlide = index;
}

function getIndex() {
    document.querySelectorAll('.slider-dots .dot').forEach(dot => {
        dot.addEventListener('click', () => {
            showSlide(+dot.dataset.index);
        });
    });
}

function autoSlide() {
    setInterval(() => {
        if (!slidesData.length) return;
        currentSlide = (currentSlide + 1) % slidesData.length;
        showSlide(currentSlide);
    }, 5000);
}

/* =============================
   BLOG FUNCTIONS
============================= */

let currentPage = 1;
let itemsPerPage = 9;
let filteredData = articlesData;

function displayCategories() {
    const container = document.querySelector('.categorates');
    container.innerHTML = '';

    categoryList.forEach((cat, index) => {
        const btn = document.createElement('button');
        btn.className = 'btn btn-outline-dark px-3';
        btn.textContent = cat;
        if (index === 0) btn.classList.add('active');

        btn.onclick = () => {
            document.querySelectorAll('.categorates button')
                .forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            filterData(cat);
        };

        container.appendChild(btn);
    });
}

function filterData(category) {
    filteredData = category === 'All'
        ? articlesData
        : articlesData.filter(i => i.category === category);

    currentPage = 1;
    displayArticles();
    displayPagination();
}

function displayArticles() {
    const cards = document.querySelector('.cards');
    cards.innerHTML = '';

    const start = (currentPage - 1) * itemsPerPage;
    const end = start + itemsPerPage;

    filteredData.slice(start, end).forEach(article => {
        cards.innerHTML += `
            <div class="col-12 col-md-6 col-lg-4">
                <a href="/blogs/details/${article.id}" class="text-decoration-none text-dark">
                    <div class="card h-100">
                        <img src="${article.imgSrc}" class="card-img-top">
                        <div class="card-body">
                            <span class="badge bg-secondary mb-2">${article.category}</span>
                            <h5>${article.title}</h5>
                            <p>${article.description ?? ''}</p>
                        </div>
                        <div class="card-footer small text-muted d-flex justify-content-between">
                            <span>${article.date}</span>
                            <span>${article.readTime}</span>
                        </div>
                    </div>
                </a>
            </div>
        `;
    });
}

function displayPagination() {
    const pagination = document.querySelector('.pagination');
    pagination.innerHTML = '';

    const pages = Math.ceil(filteredData.length / itemsPerPage);
    if (pages <= 1) return;

    for (let i = 1; i <= pages; i++) {
        const btn = document.createElement('button');
        btn.className = `btn btn-sm mx-1 ${i === currentPage ? 'btn-dark' : 'btn-outline-dark'}`;
        btn.textContent = i;
        btn.onclick = () => {
            currentPage = i;
            displayArticles();
            displayPagination();
        };
        pagination.appendChild(btn);
    }
}

/* =============================
   INIT
============================= */

document.addEventListener('DOMContentLoaded', () => {

    // Slider
    displaycontent(slidesData);
    showSlide(0);
    getIndex();
    autoSlide();

    // Blogs
    displayCategories();
    displayArticles();
    displayPagination();

});
</script>
@endsection
