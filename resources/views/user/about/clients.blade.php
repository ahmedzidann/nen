@extends('user.layout.master')
@section('parent_page_name')About @endsection
@section('page_name')Clients @endsection
@section('content')

<div class="about_content">
    <div class="Awards_flex">
        <div class="Awards_titel">
            <h1>Our Clients</h1>

            <p>N.E.N is an international organization specializing in educational solutions and
                integrated ICT systems, with offices in (London, Dubai, Amman, Cairo, and Tashkent)
                since 2008.Most recently, when we successfully made our IPO transforming into a
                multi-national corporation listed on stock exchanges, we secured the resources needed to
                initiate Stage II within which we will be expanding our scope of service.</p>
        </div>

        <div class="Awards_img">
            <img src="content/images/team3.png">
        </div>


    </div>

    <div class="Awards_head_titel">
        <h1>Our Clients</h1>
        <div class="tabs_div">
            <ul class="nav nav-pills mb-3 clients_bttn " id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active proj_bttn" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">TAMKEEN COMPETITION</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link proj_bttn" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false" tabindex="-1">CISCO ACADEMY</button>
                </li>

            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                    <div class="tabs_content">
                        <div class="client_sec">
                            <div class="client_content">
                                <img src="content/images/small_icon/Image (6).png">
                                <h2>Arab Medical</h2>
                            </div>

                            <div class="client_content">
                                <img src="content/images/small_icon/Image (7).png">
                                <h2>Egypt Trade</h2>
                            </div>

                            <div class="client_content">
                                <img src="content/images/small_icon/Image (8).png">
                                <h2>EGES</h2>
                            </div>

                            <div class="client_content">
                                <img src="content/images/small_icon/Image (9).png">
                                <h2>Global Building</h2>
                            </div>

                            <div class="client_content">
                                <img src="content/images/small_icon/Image (10).png">
                                <h2>Garhy Steel</h2>
                            </div>

                            <div class="client_content">
                                <img src="content/images/small_icon/Image (11).png">
                                <h2>Arab Medical</h2>
                            </div>

                            <div class="client_content">
                                <img src="content/images/small_icon/Image (12).png">
                                <h2>SEIF</h2>
                            </div>

                            <div class="client_content">
                                <img src="content/images/small_icon/Image (13).png">
                                <h2>OASIS University</h2>
                            </div>

                            <div class="client_content">
                                <img src="content/images/small_icon/Image (14).png">
                                <h2>NEN</h2>
                            </div>

                            <div class="client_content">
                                <img src="content/images/small_icon/Image (15).png">
                                <h2>Garhy Steel</h2>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">...</div>

        </div>
    </div>
</div>
@endsection
