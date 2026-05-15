@extends('user.layout.blogs.master')
@section('parent_page_name')
    Contact Us
@endsection
@section('page_name')
    Contact Us
@endsection
@section('cover_image')
    {{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png') }}
@endsection
@section('websiteStyle')
    {{-- start toastr --}}
    <link rel="stylesheet" href="{{ asset('toastr/css/toastr.min.css') }}" />
    {{-- end toastr --}}
    <style>
        /* ===== Map Container ===== */
        #contentChartdiv {
            position: relative;
            background: #c8d8e8;
            padding: 0;
            border-radius: 0;
            box-shadow: none;
            border: none;
            width: 100%;
        }

        #chartdiv {
            height: 520px;
            width: 100%;
            margin-top: 0;
            border-radius: 0;
            position: relative;
            overflow: hidden;
        }

        /* ===== Map Modal ===== */
        #contactModal {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            z-index: 1000;
            width: 380px;
            max-width: 90%;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(153,0,0,0.18);
            border-top: 4px solid #990000;
        }

        .modal-content {
            position: relative;
            padding: 24px;
            background-color: #fff;
            border-radius: 12px;
        }

        .modal-content h3 {
            color: #990000;
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 12px;
            padding-bottom: 10px;
            border-bottom: 1px solid #f0e0e0;
        }

        .modal-content p {
            margin: 8px 0;
            font-size: 0.95rem;
            color: #444;
            display: flex;
            align-items: flex-start;
            gap: 6px;
        }

        .modal-content p strong {
            color: #990000;
            min-width: 65px;
        }

        .close-btn {
            position: absolute;
            top: 12px;
            right: 14px;
            background: #f8f0f0;
            border: none;
            font-size: 18px;
            cursor: pointer;
            color: #990000;
            font-weight: bold;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s;
        }

        .close-btn:hover {
            background: #990000;
            color: #fff;
        }

        #modalTitle {
            margin-top: 0;
            font-size: 1.3rem;
        }

        /* ===== Section Title ===== */
        .contact-section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1d2939;
            margin-bottom: 6px;
        }

        .contact-section-title span {
            color: #990000;
        }

        .contact-title-bar {
            width: 48px;
            height: 4px;
            background: linear-gradient(90deg, #990000, #2ea7db);
            border-radius: 2px;
            margin-bottom: 20px;
        }

        /* ===== Tables ===== */
        .office-table thead tr {
            background: linear-gradient(90deg, #990000, #7a0000);
            color: #fff;
        }

        .office-table thead th {
            color: #fff !important;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 12px 16px;
            border: none;
        }

        .office-table tbody tr:hover {
            background-color: rgba(153,0,0,0.04);
        }

        .office-table tbody td {
            padding: 10px 16px;
            font-size: 0.9rem;
            vertical-align: middle;
            border-bottom: 1px solid #f0f0f0;
        }

        .table-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #1d2939;
        }

        .table-title.line-before::before {
            background-color: #990000 !important;
        }

        /* ===== Contact Form ===== */
        .contact-form-section {
            background: #fff;
            border-radius: 16px;
            border: 1px solid #f0e0e0;
            box-shadow: 0 4px 20px rgba(153,0,0,0.07);
        }

        .form-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #990000;
        }

        .form-description {
            color: #667085;
            font-size: 0.95rem;
            line-height: 1.7;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #990000;
            box-shadow: 0 0 0 0.2rem rgba(153,0,0,0.15);
        }

        .form-label {
            color: #1d2939;
            font-size: 0.9rem;
        }

        .custom-hr {
            border-color: rgba(153,0,0,0.15);
        }

        /* ===== Service Items ===== */
        .service-item {
            border: 1px solid #f0e0e0 !important;
            border-radius: 12px !important;
            transition: box-shadow 0.25s, transform 0.25s;
        }

        .service-item:hover {
            box-shadow: 0 6px 20px rgba(153,0,0,0.12) !important;
            transform: translateY(-2px);
        }

        /* ===== Contact Form Submit Button ===== */
        #contact_form button[type="submit"] {
            background: linear-gradient(135deg, #990000, #cc0000);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 32px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        #contact_form button[type="submit"]:hover {
            opacity: 0.9;
        }

        /* ===== Map section wrapper ===== */
        .contact-us-page-bg {
            background: #f8f9fc;
            min-height: 60vh;
            padding-bottom: 40px;
        }
    </style>
@endsection

@section('content')
    <!-- Start Contact Us Page Section -->
    <div class="contact-us-page-bg">
        <div id="contact-us-page">
            {{-- Start Hero Section --}}
            {{-- <div class="container-fluid mt-md-5 mt-3">
                <section id="hero-section" aria-labelledby="hero-title">
                    <div class="col-lg-9 col-md-11 col-sm-12 col-12">
                        <div class="content d-flex align-items-center justify-content-center flex-column">
                            <h1 id="hero-title" class="title text-center text-capitalize fw-bold">
                                {{ TranslationHelper::translateWeb(ucfirst('Contacts')??'') }}
                            </h1>
                            <div class="col-lg-9 col-md-11 col-sm-12 col-12">
                                <p class="description text-center mt-3">
                                    {{ TranslationHelper::translateWeb(ucfirst('Reach out to us for any inquiries or support.')??'') }}<br>
                                    {{ TranslationHelper::translateWeb(ucfirst('Our team is here to assist you with all your needs.')??'') }}
                                </p>
                            </div>
                            <div id="social" class="mt-md-5 mt-3">
                                <ul class="d-flex gap-3 flex-wrap p-0" role="list" aria-label="Social Media Links">
                                    <li
                                        class="social-icon scaleX-rtl rounded-circle d-flex justify-content-center align-items-center">
                                        <a href="" target="_blank" title="Facebook" aria-label="Facebook">
                                            <svg width="8" height="16" viewBox="0 0 8 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1_13484)">
                                                    <path
                                                        d="M2.19714 15.1667V8.60677H0V6H2.19714V3.94609C2.19714 1.71458 3.56068 0.5 5.55156 0.5C6.50547 0.5 7.32474 0.571615 7.5625 0.603125V2.9349H6.18177C5.09896 2.9349 4.88984 3.45052 4.88984 4.20391V6H7.33333L6.99818 8.60677H4.88984V15.1667"
                                                        fill="white" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1_13484">
                                                        <rect width="8" height="15" fill="white"
                                                            transform="translate(0 0.5)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a>
                                    </li>
                                    <li
                                        class="social-icon scaleX-rtl rounded-circle d-flex justify-content-center align-items-center">
                                        <a href="" target="_blank" title="Instagram" aria-label="Instagram">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1_13512)">
                                                    <path
                                                        d="M11.7501 0.5C13.8124 0.5 15.5001 2.1877 15.5001 4.25004V11.7505C15.5001 13.8123 13.8124 15.5005 11.7501 15.5005H4.25004C2.1877 15.5005 0.5 13.8123 0.5 11.7505V4.25004C0.5 2.1877 2.1877 0.5 4.25004 0.5H11.7501ZM11.7501 1.75007H4.25004C2.87171 1.75007 1.75007 2.87152 1.75007 4.25004V11.7505C1.75007 13.1286 2.87171 14.2504 4.25004 14.2504H11.7501C13.129 14.2504 14.2501 13.1286 14.2501 11.7505V4.25004C14.2501 2.87152 13.129 1.75007 11.7501 1.75007ZM8.00007 4.25004C10.071 4.25004 11.7501 5.92874 11.7501 8.00007C11.7501 10.0707 10.071 11.7505 8.00007 11.7505C5.92855 11.7505 4.25004 10.0707 4.25004 8.00007C4.25004 5.92874 5.92855 4.25004 8.00007 4.25004ZM8.00007 5.50011C6.61949 5.50011 5.50011 6.61912 5.50011 8.00007C5.50011 9.38102 6.61949 10.5004 8.00007 10.5004C9.38064 10.5004 10.5 9.38102 10.5 8.00007C10.5 6.61912 9.38064 5.50011 8.00007 5.50011ZM12.0627 2.99996C12.5804 2.99996 13.0002 3.4197 13.0002 3.93746C13.0002 4.45524 12.5804 4.87498 12.0627 4.87498C11.5449 4.87498 11.1252 4.45524 11.1252 3.93746C11.1252 3.4197 11.5449 2.99996 12.0627 2.99996Z"
                                                        fill="white" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1_13512">
                                                        <rect width="15" height="15" fill="white"
                                                            transform="translate(0.5 0.5)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a>
                                    </li>
                                    <li
                                        class="social-icon scaleX-rtl rounded-circle d-flex justify-content-center align-items-center">
                                        <a href="" target="_blank" title="Twitter" aria-label="Twitter">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="text-white-color bi bi-twitter-x"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                                            </svg>
                                        </a>
                                    </li>
                                    <li
                                        class="social-icon scaleX-rtl rounded-circle d-flex justify-content-center align-items-center">
                                        <a href="" target="_blank" title="youtube" aria-label="youtube">
                                            <i class="text-white-color bi bi-youtube"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            --}} {{-- End Hero Section --}}

            <div id="contentChartdiv">
                    <div id="chartdiv"></div>
                    <!-- Modal HTML -->
                    <div id="contactModal" style="display: none;">
                        <div class="modal-content">
                            <button class="close-btn" onclick="closeModal()">×</button>
                            <h3 id="modalTitle"></h3>
                            <p><strong>{{ TranslationHelper::translateWeb(ucfirst('Country')??'') }}:</strong> <span id="modalCountry"></span></p>
                            <p><strong>{{ TranslationHelper::translateWeb(ucfirst('Address')??'') }}:</Address>:</strong> <span id="modalEmail"></span></p>
                            <p><strong>{{ TranslationHelper::translateWeb(ucfirst('Phone')??'') }}:</strong> <span id="modalPhone"></span></p>
                        </div>
                    </div>
                </div>

            <div class="container">

                <div class="services-items-container mt-md-4 mt-3">
                    <div class="services-items">
                        @forelse ($services as $service)
                            <div class="service-item">
                                <div class="service-item-box">
                                    <img src="{{ $service->getFirstMediaUrl('image') }}" loading="lazy"
                                        onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                        alt="Customer Service">
                                </div>
                                <div class="texts-data">
                                    <p class="fs-5-2 text-gray500">
                                        {{ $service->title }}
                                    </p>
                                    <a href="mailto:{{ $service->email }}" target="_blank"
                                        class="fs-6 text-decoration-underline text-warning">
                                        {{ $service->email }}
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="py-4" style="display: flex; justify-content: center;">
                                <p style="color:#999;">{{ TranslationHelper::translateWeb(ucfirst('There is No Data Of Service Available')??'') }}</p>
                            </div>
                        @endforelse

                    </div>
                </div>

                @forelse ($contacts as $key=>$contact)
                    @if ($key == App\Enums\OfficeType::REGIONAL_REPRESENTATIVES)
                        <div id="representatives-table-section" class="mt-md-5 mt-3">
                            <h3 class="table-title line-before text-gray500 fs-5 mb-3">
                                Regional Representatives
                            </h3>
                            <div class="table-container">
                                <div class="table-responsive office-table-container">
                                    <table class="table office-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">
                                                    <div class="table-header-icon"><i
                                                            class="bi bi-globe-asia-australia"></i>
                                                        Country
                                                    </div>
                                                </th>
                                                <th scope="col">
                                                    <div class="table-header-icon"><i class="bi bi-person"></i> {{ TranslationHelper::translateWeb(ucfirst('Name')??'') }}</div>
                                                </th>
                                                <th scope="col">
                                                    <div class="table-header-icon"><i class="bi bi-telephone"></i> {{ TranslationHelper::translateWeb(ucfirst('Phone')??'') }}
                                                    </div>
                                                </th>
                                                <th scope="col">
                                                    <div class="table-header-icon"><i class="bi bi-geo-alt"></i>{{ TranslationHelper::translateWeb(ucfirst('Location')??'') }}
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contact as $office)
                                                <tr>
                                                    <td>
                                                        <div class="country-info">
                                                            <img src="{{ $office->country?->getFirstMediaUrl('flag') }}"
                                                                loading="lazy"
                                                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                                                alt="Flag of {{ $office->country?->translate('title', app()->getLocale()) }}"
                                                                class="country-flag">
                                                            <span>{{ $office->country?->translate('title', app()->getLocale()) }}</span>
                                                        </div>
                                                    </td>
                                                    <td>{{ $office->name }}</td>
                                                    <td>
                                                        <a style="color: #333;"
                                                            href="tel:{{ $office->phone }}">{{ $office->phone }}</a>
                                                    </td>
                                                    <td class="map-link-td">
                                                        @if ($office->lat && $office->lng)
                                                            <a href="{{ 'https://www.google.com/maps/@' . trim($office->lat) . ',' . trim($office->lng) . ',16z' }}"
                                                                class="google-map-link d-flex flex-nowrap gap-2 justify-content-around align-items-center"
                                                                target="_blank">
                                                                <span class="gradient-text">
                                                                    Google Map
                                                                </span>
                                                                <img class="map-icon"
                                                                    src="{{ asset('content/images/small_icon/google-map-icon.webp') }}"
                                                                    loading="lazy"
                                                                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                                                    alt="map icon">
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($key == App\Enums\OfficeType::REGIONAL_OFFICES)
                        <div id="office-table-section" class="mt-md-5 mt-3">
                            <h3 class="table-title line-before text-gray500 fs-5 mb-3">
                                {{ TranslationHelper::translateWeb(ucfirst('Regional Offices')??'') }}
                            </h3>
                            <div class="table-container">
                                <div class="table-responsive office-table-container">
                                    <table class="table office-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">
                                                    <div class="table-header-icon"><i
                                                            class="bi bi-globe-asia-australia"></i>
                                                        {{ TranslationHelper::translateWeb(ucfirst('Country')??'') }}
                                                    </div>
                                                </th>
                                                <th scope="col">
                                                    <div class="table-header-icon"><i class="bi bi-telephone"></i> {{ TranslationHelper::translateWeb(ucfirst('Phone')??'') }}
                                                    </div>
                                                </th>
                                                <th scope="col">
                                                    <div class="table-header-icon"><i class="bi bi-clock"></i> {{ TranslationHelper::translateWeb(ucfirst('Times of work')??'') }}</div>
                                                </th>
                                                <th scope="col">
                                                    <div class="table-header-icon"><i class="bi bi-geo-alt"></i> {{ TranslationHelper::translateWeb(ucfirst('Address')??'') }}
                                                    </div>
                                                </th>
                                                <th scope="col">
                                                    <div class="table-header-icon"><i class="bi bi-geo-alt"></i>{{ TranslationHelper::translateWeb(ucfirst('Location')??'') }}
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contact as $office)
                                                <tr>
                                                    <td>
                                                        <div class="country-info">
                                                            <img src="{{ $office->country?->getFirstMediaUrl('flag') }}"
                                                                loading="lazy"
                                                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                                                alt="Flag" class="country-flag">
                                                            <span>{{ $office->country?->translate('title', app()->getLocale()) }}</span>
                                                        </div>
                                                    </td>
                                                    <td>{{ $office->phone }}</td>
                                                    <td>
                                                        {{ Carbon\Carbon::parse($office->from_at)->format('l h:i A') . ' - ' . Carbon\Carbon::parse($office->to_at)->format('l h:i A') }}
                                                    </td>
                                                    <td>{{ $office->address }}</td>
                                                    <td class="map-link-td">
                                                        @if ($office->lat && $office->lng)
                                                            <a href="{{ 'https://www.google.com/maps/@' . trim($office->lat) . ',' . trim($office->lng) . ',16z' }}"
                                                                class="google-map-link d-flex flex-nowrap gap-2 justify-content-around align-items-center"
                                                                target="_blank">
                                                                <span class="gradient-text">
                                                                    Google Map
                                                                </span>
                                                                <img class="map-icon"
                                                                    src="{{ asset('content/images/small_icon/google-map-icon.webp') }}"
                                                                    loading="lazy"
                                                                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                                                    alt="map icon">
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($key == App\Enums\OfficeType::AUTHORIZED_OFFICES)
                        <div id="authorized-offices-table-section" class="mt-md-5 mt-3">
                            <h3 class="table-title line-before text-gray500 fs-5 mb-3">
                                Authorized Offices
                            </h3>
                            <div class="table-container">
                                <div class="table-responsive office-table-container">
                                    <table class="table office-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">
                                                    <div class="table-header-icon"><i
                                                            class="bi bi-globe-asia-australia"></i>
                                                        Country
                                                    </div>
                                                </th>
                                                <th scope="col">
                                                    <div class="table-header-icon"><i class="bi bi-telephone"></i> {{ TranslationHelper::translateWeb(ucfirst('Phone')??'') }}
                                                    </div>
                                                </th>
                                                <th scope="col">
                                                    <div class="table-header-icon"><i class="bi bi-clock"></i> {{ TranslationHelper::translateWeb(ucfirst('Times of Work')??'') }}</div>
                                                </th>
                                                <th scope="col">
                                                    <div class="table-header-icon"><i class="bi bi-geo-alt"></i> {{ TranslationHelper::translateWeb(ucfirst('Address')??'') }}
                                                    </div>
                                                </th>
                                                <th scope="col">
                                                    <div class="table-header-icon"><i class="bi bi-geo-alt"></i>{{ TranslationHelper::translateWeb(ucfirst('Location')??'') }}
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contact as $office)
                                                <tr>
                                                    <td>
                                                        <div class="country-info">
                                                            <img src="{{ $office->country?->getFirstMediaUrl('flag') }}"
                                                                loading="lazy"
                                                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                                                alt="Flag" class="country-flag">
                                                            <span>{{ $office->country?->translate('title', app()->getLocale()) }}</span>
                                                        </div>
                                                    </td>
                                                    <td>{{ $office->phone }}</td>
                                                    <td>
                                                        {{ Carbon\Carbon::parse($office->from_at)->format('l h:i A') . ' - ' . Carbon\Carbon::parse($office->to_at)->format('l h:i A') }}
                                                    </td>
                                                    <td>{{ $office->address }}</td>
                                                    <td class="map-link-td">
                                                        @if ($office->lat && $office->lng)
                                                            <a href="{{ 'https://www.google.com/maps/@' . trim($office->lat) . ',' . trim($office->lng) . ',16z' }}"
                                                                class="google-map-link d-flex flex-nowrap gap-2 justify-content-around align-items-center"
                                                                target="_blank">
                                                                <span class="gradient-text">
                                                                    Google Map
                                                                </span>
                                                                <img class="map-icon"
                                                                    src="{{ asset('content/images/small_icon/google-map-icon.webp') }}"
                                                                    loading="lazy"
                                                                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                                                    alt="map icon">
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif

                @empty
                    <div class="py-4" style="display: flex; justify-content: center;">
                        <p style="color:#999;">There is No Data Of Service Available</p>
                    </div>
                @endforelse

                <hr class="custom-hr">
                <div class="contact-form-section p-4 rounded shadow">
                    <h3 class="form-title mb-4">
                        Let's Chat, Reach Out to Us
                    </h3>
                    <p class="form-description mb-4">
                        Enjoy the Arabic language, live with the splendor of the language of the Great Qur’an, and the
                        beauty of
                        the Prophet’s Sunnah, learn about Arab culture, and benefit from the great Arab-Islamic heritage.
                        Just
                        contact us.
                    </p>
                    <hr class="custom-hr">
                    <form id="contact_form" action="{{ route('contacts.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <!-- Department -->
                            <div class="col-md-6 mb-3">
                                <label for="department_input" class="form-label fw-bold">
                                    Select Department <span class="text-danger">*</span>
                                </label>
                                <select class="form-select form-control" id="department_input" name="department"
                                    required>
                                    <option disabled="" hidden="" selected="">Department</option>
                                    <option value="0">Customer Service</option>
                                    <option value="1">Technical Support</option>
                                    <option value="2">Sales and Marketing</option>
                                    <option value="3">Operation and Quality</option>
                                    <option value="4">Purchase and Finance</option>
                                    <option value="5">International Testing</option>
                                    <option value="6">Education and Training</option>
                                </select>
                            </div>
                            <!-- Name -->
                            <div class="col-md-6 mb-3">
                                <label for="name_input" class="form-label fw-bold">
                                    Enter Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="name_input" name="name"
                                    placeholder="Your Name" required>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6 mb-3">
                                <label for="email_input" class="form-label fw-bold">
                                    Enter Email <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control" id="email_input" name="email"
                                    placeholder="Your Email" required>
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6 mb-3">
                                <label for="telephone_input" class="form-label fw-bold">
                                    Enter Phone Number <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="telephone_input" name="phone"
                                    placeholder="Your Phone Number" required>
                            </div>

                            <!-- Reference -->
                            <div class="col-md-6 mb-3">
                                <label for="reference_input" class="form-label fw-bold">
                                    Enter Reference <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="reference_input" name="reference"
                                    placeholder="Reference" required>
                            </div>

                            <!-- Subject -->
                            <div class="col-md-6 mb-3">
                                <label for="subject_input" class="form-label fw-bold">
                                    Enter Subject <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="subject_input" name="subject"
                                    placeholder="Subject" required>
                            </div>

                            <!-- Message -->
                            <div class="col-12 mb-4">
                                <label for="message_input" class="form-label fw-bold">
                                    Enter Message <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control" id="message_input" name="message" placeholder="Leave us a message" rows="5"
                                    required></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 text-center mt-md-4 mt-3">
                                <button type="submit"
                                    class="btn submit-button d-flex gap-3 align-items-center justify-content-center">
                                    <span>
                                        Send Message
                                    </span>
                                    <i class="bi bi-send icon_shp sumb_icon"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Us Page Section -->

@endsection

@section('websiteScript')
    <!-- Load amCharts scripts in correct order -->
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/maps.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

    <script>
        // Initialize the amCharts World Map with clustering
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof am4core === 'undefined') {
                console.error('am4core is not loaded');
                return;
            }

            // Apply amCharts animated theme
            am4core.useTheme(am4themes_animated);

            // Create the chart object
            var chart = am4core.create("chartdiv", am4maps.MapChart);
            chart.background.fill = am4core.color("#c8d8e8");
            chart.background.fillOpacity = 1;

            // Set the projection type
            chart.projection = new am4maps.projections.Miller();

            // Load world map data
            chart.geodata = am4geodata_worldLow;

            // Create a polygon series (countries)
            var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());
            polygonSeries.useGeodata = true;

            // Configure country polygons
            var polygonTemplate = polygonSeries.mapPolygons.template;
            polygonTemplate.tooltipText = "{name}";
            polygonTemplate.fill = am4core.color("#7a9ec4"); // Default color for countries
            polygonTemplate.stroke = am4core.color("#ffffff");
            polygonTemplate.strokeWidth = 0.4;

            // Hover state for polygons
            var hs = polygonTemplate.states.create("hover");
            hs.properties.fill = am4core.color("#cc2200"); // Hover color

            // Create an image series for points (clustered)
            var imageSeries = chart.series.push(new am4maps.MapImageSeries());
            var imageSeriesTemplate = imageSeries.mapImages.template;

            // Create circle for points
            var circle = imageSeriesTemplate.createChild(am4core.Circle);
            circle.radius = 8;
            circle.stroke = am4core.color("#FFFFFF");
            circle.strokeWidth = 2;

            // Assign latitude, longitude, and color fields
            imageSeriesTemplate.propertyFields.latitude = "latitude";
            imageSeriesTemplate.propertyFields.longitude = "longitude";
            imageSeriesTemplate.propertyFields.fill = "color"; // Assign color from data

            // Get the dynamic data from the backend
            let locations = @json($locations);

            // Map over the locations to apply the am4core.color function
            console.log(locations);

            locations = locations.map(function(location) {
                return {
                    ...location,
                    color: am4core.color(location.color) // Wrap color value with am4core.color
                };
            });


            // Data points with specific colors and contact info for each location
            imageSeries.data = locations;

            // Add tooltips for points
            imageSeriesTemplate.tooltipText = "{title}";
            imageSeriesTemplate.nonScaling = true; // Points remain the same size on zoom

            // Add click event to show modal with contact info
            imageSeriesTemplate.events.on("hit", function(ev) {
                var data = ev.target.dataItem.dataContext;
                showModal(data.country, data.address, data.phone);
            });

            // Add zoom control
            chart.zoomControl = new am4maps.ZoomControl();

            // Disable mouse wheel zoom
            chart.chartContainer.wheelable = false;
        });
        // Add click event to show modal with contact info
        imageSeriesTemplate.events.on("hit", function(ev) {
            var data = ev.target.dataItem.dataContext;
            showModal(data.country, data.address, data.phone);
        });
        // Function to show modal with contact details, now centered in the #chartdiv
        function showModal(country, address, phone) {
            var modal = document.getElementById('contactModal');
            // Set modal content
            document.getElementById('modalCountry').textContent = country;
            document.getElementById('modalEmail').textContent = address;
            document.getElementById('modalPhone').textContent = phone;

            // Display the modal
            modal.style.display = 'block';

            // Center the modal in #chartdiv
            var chartDiv = document.getElementById('chartdiv');
            var modalHeight = modal.offsetHeight;
            var modalWidth = modal.offsetWidth;
            var chartHeight = chartDiv.offsetHeight;
            var chartWidth = chartDiv.offsetWidth;

            // Calculate the centered position for the modal
            modal.style.top = (chartHeight / 2 - modalHeight / 2) + 'px';
            modal.style.left = (chartWidth / 2 - modalWidth / 2) + 'px';
        }
        // Function to close the modal
        function closeModal() {
            document.getElementById('contactModal').style.display = 'none';
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const swiper = new Swiper('.swiper-container', {
                slidesPerView: 'auto',
                spaceBetween: 20,
                freeMode: true,
                navigation: {
                    nextEl: '.slider-next',
                    prevEl: '.slider-prev',
                },
                keyboard: {
                    enabled: true,
                    onlyInViewport: true,
                },
                mousewheel: {
                    forceToAxis: true,
                },
            });
        });
    </script>

    <script>
        function toggleDescription(button) {
            var description = button.previousElementSibling;
            if (description.classList.contains('p_clamp_2')) {
                description.classList.remove('p_clamp_2');
                button.innerHTML = 'Show Less <i class="bi bi-chevron-up"></i>';
            } else {
                description.classList.add('p_clamp_2');
                button.innerHTML = 'Show More <i class="bi bi-chevron-down"></i>';
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            // Get the current URL
            var currentUrl = window.location.href;

            // Select all elements with the class 'contact_offices'
            var offices = document.querySelectorAll('.contact_offices');

            if (currentUrl.includes('contact_offices')) {
                // Loop through each 'contact_offices' div
                offices.forEach(function(office) {
                    // Check if the class name exists in the URL
                    if (currentUrl.includes(office.classList[2])) {
                        office.style.display = 'block'; // Show the matching office
                    } else {
                        office.style.display = 'none'; // Hide non-matching offices
                    }
                });
            }
        });
    </script>

    {{-- start toastr --}}
    <script src="{{ asset('toastr/js/toastr.min.js') }}"></script>
    {{-- end toastr --}}
    <script>
        $(document).ready(function() {
            $('#contact_form').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission

                var form = $(this)[0]; // Get the DOM element for FormData
                var formData = new FormData(form); // Create a new FormData object

                var url = $(this).attr('action');

                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData, // Send the FormData object
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        toastr.success(response.message, 'Success!', {
                            timeOut: 11000
                        });
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(index, error) {
                            toastr.error(error, 'Error!', {
                                timeOut: 11000
                            });
                        });
                    }
                });
            });
        });
    </script>
@endsection
