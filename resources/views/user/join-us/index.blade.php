@extends('user.layout.master')
@section('parent_page_name')
About
@endsection
@section('page_name')
Join Us
@endsection
@section('cover_image')
{{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png') }}
@endsection
@section('content')
<div class="modern-tabs">
    @if(isset($tabs) && !empty($tabs) && $tabs->count() > 0)
    <div class="tabs-header">

        @php $x= 0 ; @endphp
        @foreach($tabs as $row)

        <button class="tab-btn {{ $x == 0 ? 'active' : '' }}" data-tab="tab_{{$row->id }}">{{ strip_tags($row->translate('title', app()->getLocale()))  }} </button>
        @php $x++ ; @endphp
        @endforeach

    </div>

    <div class="tabs-body">
        @if($tabs->count() >= 1)
        <div id="tab_{{$tabs[0]->id }}" class="tab-pane active">
            <h2><span class="icon-titel"><i class="fa-solid fa-user-plus"></i></span> {{ strip_tags($tabs[0]->translate('title', app()->getLocale()))  }}</h2>
            <div class="rounded-4  overflow-hidden my-2"
                style="background-image: url('{{ asset('storage/join_us/' . $tabs[0]->image) }}'); height: 40vh;width: 100%; background-size: cover; background-repeat: no-repeat;">

            </div>
            {!! $tabs[0]->translate('description', app()->getLocale()) !!}

            <div class="row mt-5 gap-y-3">

                @php


                $tabs_1= \App\Models\Joinus::where('parent_id',$tabs[0]->id)->where('status','Active')->get();

                @endphp


                @if(isset($tabs_1) && !empty($tabs_1))
                @foreach($tabs_1 as $row1)
                <div class="col-lg-6 col-md-6 col-sm-12">

                    <div class="item-join">
                        <span class="icon-item"><img src="{{ asset('storage/join_us/' . $row1->image) }}" style="object-fit: contain;" width="60" height="60" /></span>
                        <h3> {{ strip_tags($row1->translate('title', app()->getLocale())) }}</h3>
                        <p class="dec-item">
                            {{ strip_tags($row1->translate('description', app()->getLocale())) }}
                        </p>
                    </div>
                </div>
                @endforeach
                @endif



            </div>
        </div>
        @endif
        @if($tabs->count() >= 2)
        <div id="tab_{{$tabs[1]->id }}" class="tab-pane">
            <h2><span class="icon-titel"><i class="fa-solid fa-gift"></i></span> {{ strip_tags($tabs[1]->translate('title', app()->getLocale()))  }}
            </h2>

            <div class="rounded-4  overflow-hidden my-2"
                style="background-image: url(' {{ asset('storage/join_us/' . $tabs[1]->image)  }}'); height: 40vh;width: 100%; background-size: cover; background-repeat: no-repeat;">

            </div>

            <div>

                @php

                $tabs_2= \App\Models\Joinus::where('parent_id',$tabs[1]->id)->where('status','Active')->where('type','main')->get();
                @endphp

                @if(isset($tabs_2) && !empty($tabs_2))
                @foreach($tabs_2 as $row2)

                <div class="box-certificate my-4">
                    <h4>{{ strip_tags($row2->translate('title', app()->getLocale()))  }}</h4>
                </div>
                <div class="row gap-y-4">
                    @php
                    $items=\App\Models\Joinus::where('main_title_id',$row2->id)->where('type','sub_main')->get();
                    @endphp
                    @if(isset($items) && !empty($items))
                    @foreach($items as $item)

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="item-join-2">
                            <span class="icon-item static">{{ strip_tags($item->translate('title', app()->getLocale()))  }}</span>
                            <p class="dec-item">
                                {{ strip_tags($item->translate('description', app()->getLocale()))  }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                    @endif

                </div>

                @endforeach
                @endif
            </div>








        </div>
        @endif
        @if($tabs->count() >= 3)

        <div id="tab_{{$tabs[2]->id }}" class="tab-pane">

            <h2><span class="icon-titel"><i class="fa-solid fa-clipboard-list icon"></i></span>
                {{ strip_tags($tabs[2]->translate('title', app()->getLocale()))  }}
            </h2>
            <div class="rounded-4  overflow-hidden my-2"
                style="background-image: url('{{ asset('storage/join_us/' . $tabs[2]->image) }}'); height: 40vh;width: 100%; background-size: cover; background-repeat: no-repeat;">


            </div>
            <p>
                {!! $tabs[2]->translate('description', app()->getLocale()) !!}

            </p>
        </div>
        @endif
        @if($tabs->count() >= 4)
        <div id="tab_{{$tabs[3]->id }}" class="tab-pane">
            <h2><span class="icon-titel"><i class="fa-solid fa-pen-to-square icon"></i></span>
                {{ strip_tags($tabs[3]->translate('title', app()->getLocale()))  }}
            </h2>
            <p>{{ strip_tags($tabs[3]->translate('description', app()->getLocale()))  }}</p>

            <div class="inner-container">
                @php

                $tabs_4= \App\Models\Joinus::where('parent_id',$tabs[3]->id)->where('status','Active')->get();

                @endphp
                @if(isset($tabs_4)&& !empty($tabs_4))
                @foreach( $tabs_4 as $tab4)
                <div class="processing-block-one">
                    <div class="arrow-shape"
                        style="background-image: url('{{ asset('content/images/shape-12.png') }}'); width: 80px; height: 50px; background-size: contain; background-repeat: no-repeat;">
                    </div>
                    <div class="inner-box-Subscription ">
                        <span class="count-text">{{ strip_tags($tab4->translate('title', app()->getLocale()))  }} <br>Step</span>
                        <p>
                            {{ strip_tags($tab4->translate('description', app()->getLocale()))  }}
                        </p>
                    </div>
                </div>
                @endforeach
                @endif

            </div>
        </div>
        @endif

        @if($tabs->count() >= 5)
        <div id="tab_{{$tabs[4]->id }}" class="tab-pane">
            <h2><span class="icon-titel"><i class="fas fa-question-circle"></i>
                </span>{{ strip_tags($tabs[4]->translate('title', app()->getLocale()))  }} </h2>
            <p>
                {{ strip_tags($tabs[4]->translate('description', app()->getLocale()))  }}
            </p>
            <div class="rounded-4  overflow-hidden my-2"
                style="background-image: url('{{ asset('storage/join_us/' . $tabs[4]->image) }}'); height: 40vh;width: 100%; background-size: cover; background-repeat: no-repeat;">
            </div>
            <div>
                <div class="faq-container">
                    @php

                    $tabs_5= \App\Models\Joinus::where('parent_id',$tabs[4]->id)->where('status','Active')->get();
                    $x=0 ;
                    @endphp
                    @if(isset($tabs_5)&& !empty($tabs_5))
                    @foreach( $tabs_5 as $tab5)
                    <div class="faq-item">
                        <div class="faq-question {{ $x== 0 ? 'active' : '' }}  "> <span class="number">0{{ $x+1 }} </span> {{ strip_tags($tab5->translate('title', app()->getLocale()))  }}</div>
                        <div class="faq-answer">
                            {!! $tab5->translate('description', app()->getLocale()) !!}
                        </div>
                    </div>
                    @php $x++ ; @endphp
                    @endforeach
                    @endif


                </div>
            </div>

        </div>
        @endif
    </div>
    @else
    @include('user.layout.includes.no-data')
    @endif

</div>
@endsection
@section('websiteScript')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // كود التعامل مع nav-link (لينكات القائمة الجانبية أو العادية)
        document.querySelectorAll('.nav-link').forEach(tab => {
            tab.addEventListener('click', function() {
                document.querySelectorAll('.nav-link.active').forEach(activeTab => {
                    activeTab.classList.remove('active');
                });
                const managementId = this.getAttribute('data-id');
                this.classList.add('active');

                // بناء رابط URL بطريقة صحيحة
                let url = "{{ route('get-team-members', ['id' => ':id']) }}".replace(':id',
                    managementId);

                // طلب AJAX لجلب البيانات
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('teamTabContent').innerHTML = data.data;
                    })
                    .catch(error => console.error('Error:', error));
            });
        });

        // تهيئة Swiper بعد تحميل الصفحة
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
            }
        });

        // كود التبويبات tabs
        const tabButtons = document.querySelectorAll(".tab-btn");
        const tabContents = document.querySelectorAll(".tab-pane");

        tabButtons.forEach(button => {
            button.addEventListener("click", () => {
                // إزالة التفعيل من الكل
                tabButtons.forEach(btn => btn.classList.remove("active"));
                tabContents.forEach(content => content.classList.remove("active"));

                // تفعيل الزر الحالي والمحتوى الخاص به
                button.classList.add("active");
                document.getElementById(button.dataset.tab).classList.add("active");
            });
        });

        // FAQ
        const faqQuestions = document.querySelectorAll('.faq-question');

        faqQuestions.forEach(question => {
            question.addEventListener('click', () => {
                faqQuestions.forEach(q => {
                    if (q !== question) q.classList.remove('active');
                });
                question.classList.toggle('active');
            });
        });
    });
</script>
@endsection