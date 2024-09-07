@if (!str_contains(url()->current(), '/contact-us'))
<div class="aside_div">
    @if (isset($VCpages))
    @foreach ($VCpages as $page)
    <a href="{{ route('about.' . $page->slug . '') }}"
        class="ref_styles active_ref {{ Route::is('about.' . $page->slug . '') ? 'active_link active' : '' }}">
        <div class="img_link">
            <img class="@if ($page->slug == 'identity') Identity_icon @endif" alt="{{ $page->name }}" loading="lazy"
                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                src="{{ asset($page->getFirstMediaUrl('icon')) }}" />
            {{ $page->name }}
        </div>
    </a>
    @endforeach
    @elseif (isset($Spages))
    @foreach ($Spages as $page)
    <a href="{{ route('education.' . $page->slug . '', ['page_id' => $page->id]) }}"
        class="ref_styles active_ref {{ Route::is('education.' . $page->slug . '') ? 'active_link active' : '' }}">
        <div class="img_link">
            <img class="@if ($loop->first) Identity_icon @endif" src="{{ asset($page->getFirstMediaUrl('icon')) }}"
                loading="lazy"
                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';" alt="" />
            {{ $page->name }}
        </div>
    </a>
    @endforeach
    @elseif (isset($Tpages))
    @foreach ($Tpages as $page)
    <a href="{{ route('testing.' . $page->slug . '', ['page_id' => $page->id]) }}"
        class="ref_styles active_ref {{ Route::is('testing.' . $page->slug . '') ? 'active_link active' : '' }}">
        <div class="img_link">
            <img class="@if ($loop->first) Identity_icon @endif" src="{{ asset($page->getFirstMediaUrl('icon')) }}"
                loading="lazy"
                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';" alt="" />
            {{ $page->name }}
        </div>
    </a>
    @endforeach
    @elseif (isset($projectPages))
    @foreach ($projectPages as $page)

    <div class="flex_asid_menu">
        <a class="ref_styles dropdown_arrow {{ Route::is('projects.' . $page->slug . '') ? 'active_link active' : '' }}"
            href="javascript:void(0)" onclick="toggleMenu(this)">
            <div class="img_link">
                <img class="Identity_icon" src="content/images/small_icon/card.png" loading="lazy"
                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                    alt="icon-side">
                {{ $page->name }}
            </div>
            <!-- Initially set to right arrow -->
            <i class="bi bi-chevron-right"></i>
        </a>

        <ul class="aside_menu sub-item-menu">
            @foreach (\App\Models\Project::where('pages_id', $page->id)->get() as $solution)
            <li>
                <a class="{{ Route::is('projects.' . $page->slug . '') && $solution->id == Request()->project_id ? 'li_active' : '' }}"
                    href="{{ route('projects.' . $page->slug . '', ['page_id' => $page->id, 'project_id' => $solution->id]) }}">{{ $solution->title }}</a>
            </li>
            @endforeach
        </ul>
    </div>

    @endforeach
    @elseif (isset($technologies))
    @foreach ($technologies as $page)
    <a href="{{ route('technology.' . $page->slug . '', ['page_id' => $page->id]) }}"
        class="ref_styles active_ref {{ Route::is('technology.' . $page->slug . '') ? 'active_link active' : '' }}">
        <div class="img_link">
            <img class="@if ($loop->first) Identity_icon @endif" src="{{ asset($page->getFirstMediaUrl('icon')) }}"
                loading="lazy"
                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';" alt="" />
            {{ $page->name }}
        </div>
    </a>
    @endforeach
    @elseif (isset($docs))
    @foreach ($docs as $page)
    <a href="{{ route('doc-validation.' . $page->slug . '', ['page_id' => $page->id]) }}"
        class="ref_styles active_ref {{ Route::is('doc-validation.' . $page->slug . '') ? 'active_link active' : '' }}">
        <div class="img_link">
            <img class="@if ($loop->first) Identity_icon @endif" src="{{ asset($page->getFirstMediaUrl('icon')) }}"
                loading="lazy"
                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';" alt="" />
            {{ $page->name }}
        </div>
    </a>
    @endforeach
    @elseif (isset($findus))
    @foreach ($findus as $page)
    <a href="{{ route('find-us.' . $page->slug . '', ['page_id' => $page->id]) }}"
        class="ref_styles active_ref {{ Route::is('find-us.' . $page->slug . '') ? 'active_link active' : '' }}">
        <div class="img_link">
            <img class="@if ($loop->first) Identity_icon @endif" src="{{ asset($page->getFirstMediaUrl('icon')) }}"
                loading="lazy"
                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';" alt="" />
            {{ $page->name }}
        </div>
    </a>
    @endforeach
    @else
    @foreach ($ss as $page)

    <div class="flex_asid_menu">
        <a class="ref_styles dropdown_arrow {{ Route::is('solutions.' . $page->slug . '') ? 'active_link active' : '' }}"
            href="javascript:void(0)" onclick="toggleMenu(this)">
            <div class="img_link">
                <img class="Identity_icon" src="content/images/small_icon/card.png" loading="lazy"
                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                    alt="small_icon">
                {{ $page->name }}
            </div>
            <!-- Initially set to right arrow -->
            <i class="bi bi-chevron-right"></i>
        </a>

        <ul class="aside_menu sub-item-menu">
            @foreach (\App\Models\Solution::where('pages_id', $page->id)->get() as $solution)
            <li>
                <a class="{{ Route::is('solutions.' . $page->slug . '') && $solution->id == Request()->solution_id ? 'li_active' : '' }}"
                    href="{{ route('solutions.' . $page->slug . '', ['page_id' => $page->id, 'solution_id' => $solution->id]) }}">{{ $solution->title }}</a>
            </li>
            @endforeach
        </ul>
    </div>

    @endforeach
    @endif
</div>
@else
<div class="aside_div">
    <a href="{{ route('contact-us', ['contact_offices' => 'regional-offices']) }}" class="ref_styles active_ref">
        <div class="img_link">
            <img class="Identity_icon" src="" loading="lazy"
                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';" alt="" />
            Regional offices
        </div>
    </a>
    <a href="{{ route('contact-us', ['contact_offices' => 'authorized-offices']) }}" class="ref_styles active_ref ">
        <div class="img_link">
            <img class=" Identity_icon" src="" loading="lazy"
                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';" alt="" />
            Authorized Offices
        </div>
    </a>
    <a href="{{route('contact-us', ['contact_offices' => 'regional-representatives'])}}" class="ref_styles active_ref ">
        <div class="img_link">
            <img class=" Identity_icon" src="" loading="lazy"
                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';" alt="" />
            Regional Representatives
        </div>
    </a>
</div>
@endif

<script>
function toggleMenu(element) {
    const menu = element.nextElementSibling; // Get the corresponding submenu
    const icon = element.querySelector('i'); // Get the icon inside the clicked link

    // Toggle the menu's visibility
    menu.classList.toggle('show');

    // Toggle between right and down icons
    if (icon.classList.contains('bi-chevron-right')) {
        icon.classList.remove('bi-chevron-right');
        icon.classList.add('bi-chevron-down');
    } else {
        icon.classList.remove('bi-chevron-down');
        icon.classList.add('bi-chevron-right');
    }
}

// Check for active child elements and adjust the menu state
document.querySelectorAll('.flex_asid_menu').forEach(menu => {
    const activeChild = menu.querySelector('ul.sub-item-menu li a.li_active');
    const icon = menu.querySelector('a.dropdown_arrow i');

    if (activeChild) {
        // If there is an active child, show the submenu and toggle the icon down
        menu.querySelector('ul.sub-item-menu').classList.add('show');
        icon.classList.remove('bi-chevron-right');
        icon.classList.add('bi-chevron-down');
    }
});
</script>