            {{-- <div class="nav-item">
                <i class="bi bi-telephone-fill"></i>
                <span>CONTACTS</span>
            </div>
            <div class="nav-item">
                <i class="bi bi-award"></i>
                <span>INTERNATIONAL CERTIFICATES</span>
            </div>
            <div class="nav-item active">
                <i class="bi bi-journal-check"></i>
                <span>BOOK YOUR EXAM</span>
            </div>
            <div class="nav-item">
                <i class="bi bi-patch-check-fill"></i>
                <span>VERIFY YOUR CERTIFICATE</span>
            </div>
            <div class="nav-item">
                <i class="bi bi-mortarboard-fill"></i>
                <span>VIRTUAL ACADEMY</span>
            </div>
            <div class="nav-item">
                <i class="bi bi-calendar-event-fill"></i>
                <span>LIVE EVENTS</span>
            </div> --}}
            @if (count($rows) > 0)
                @foreach ($rows as $row)
                    <a href="{{ $row->url }}" target="_blank">
                        <div class="nav-item">
                            <img src="{{ asset('/storage') . '/' . $row->resource }}" loading="lazy"
                                onerror="this.onerror=null;this.src='{{ asset('/storage') . '/' . $row->resource }}';"
                                alt="icon" style="width: 25px; height: 25px; border-radius: 4px;" />
                            <span>{{ $row->title }}</span>
                        </div>
                    </a>
                @endforeach
            @endif
