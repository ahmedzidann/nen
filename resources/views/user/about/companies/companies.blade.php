@forelse ($rows as $sister)

    <div class="subsidiaries_content">
        <div class="flg_div">
            <img src="{{ $sister->getFirstMediaUrl('StaticTable') }}">
        </div>
        <div class="subsidiaries_details">
            <h5>{{ $sister->translate('title', app()->getLocale()) }}</h5>
            <div class="flags_sec">
                @foreach ($sister->investorAttributes as $attr)
                    <div class="flag_icon_titel">
                        <div class="sub_contennt">
                            <h6><img
                                    src="{{ App\Models\Country::where('id', $attr->country_id)->first()->getFirstMediaUrl('flag') }}">
                                <p>Since : <span>{{ $attr->since }}</span></p>
                            </h6>
                            <h6>
                                <p>Sharing : <span>{{ $attr->percent }}%</span></p>
                            </h6>
                        </div>

                    </div>
                @endforeach
            </div>
            <a href="{{ $sister->url }}" class="website_link">Website</a>
        </div>
    </div>
@empty
    @include('user.layout.includes.no-data')
@endforelse
