<div class="tab-pane fade show active" id="{{str_replace(' ', '-', strtolower($management->translate('title', 'en')))}}" role="tabpanel" aria-labelledby="member-board-tab">
    <div class="team-list d-flex justify-content-center justify-content-md-start flex-wrap gap-1 mt-3">
        @foreach ($items as $item)
            <div class="our-team p-3 rounded-3">
                <div class="pic shadow-sm">
                    <img src="{{ $item->getFirstMediaUrl('OurTeam') }}" loading="lazy"
                        onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                        alt="Team Member">
                    <ul class="social">
                        @if ($item->facebook != "")
                                                        <li><a target="_blank" href="{{ $item->facebook }}"
                                                            class="bi bi-facebook"></a></li>
                                                    @endif
                                                    @if ( $item->whatsapp)
                                                        <li><a target="_blank" href="https://wa.me/{{ $item->whatsapp }}"
                                                                class="bi bi-whatsapp"></a></li>
                                                    @endif
                                                    @if ($item->instagram)
                                                        <li><a target="_blank" href="{{ $item->instagram }}"
                                                                class="bi bi-instagram"></a>
                                                        </li>
                                                    @endif
                    </ul>
                </div>
                <div class="team-content">
                    <div class="team-info">
                        <h3 class="title">{{$item->name}}</h3>
                        <span class="post text-center">{{$item->jop}}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
