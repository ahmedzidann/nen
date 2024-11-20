@forelse ($rows as $sub)
    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="subsidiaries_content">
            <div class="first">
                <h5 class="title" style="text-align: center !important;">
                    {{ $sub->translate('title', app()->getLocale()) }}</h5>
                <div class="d-flex align-items-center justify-content-center">
                    <div class="flg_div">
                        <img src="{{ $sub->getFirstMediaUrl('StaticTable') }}" loading="lazy"
                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                            alt="vector">
                    </div>
                </div>
                <div class="subsidiaries_details">
                    <div class="flags_sec align-items-start">
                        @foreach ($sub->investorAttributes as $row)
                            <div class="flag_icon_titel">
                                <div class="sub_contennt">
                                    <h6>
                                        <img src="{{ App\Models\Country::where('id', $row->country_id)->first()->getFirstMediaUrl('flag') }}"
                                            loading="lazy"
                                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                            alt="vector">
                                        <p>{{ TranslationHelper::translateWeb(ucfirst('Since')??'') }} : <span
                                                class="mt-0 pt-0">{{ $row->since }}</span>
                                        </p>
                                    </h6>
                                    <h6>
                                        <p>{{ TranslationHelper::translateWeb(ucfirst('Sharing')??'') }} : <span
                                                class="mt-0 pt-0">{{ $row->percent }}%</span>
                                        </p>
                                    </h6>
                                </div>

                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <a href="{{ $sub->url }}"
                class="website_link mt-0 p-2 text-center">{{ TranslationHelper::translateWeb(ucfirst('Website')??'') }}</a>

        </div>
    </div>
@empty
    @include('user.layout.includes.no-data')
@endforelse
