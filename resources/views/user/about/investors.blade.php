@extends('user.layout.master')
@section('parent_page_name')
    About
@endsection
@section('page_name')
    Investors
@endsection
@section('cover_image')
    {{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png') }}
@endsection
@section('content')
    <div class="about_content">
        @if ($fSection = $items->where('item', 'section-one')->first())
            <!-- <div class="investors_flex"> -->

            <!-- Start Investors Hero Section -->
            <div id="investors-section">
                <div class="texts-data d-flex flex-column align-items-start">
                    <h5 class="global-title">
                        {{ $fSection->title }}
                    </h5>
                    <div class="under-title-vector">
                        <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy"
                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                            alt="vector">
                    </div>
                    <p class="global-description">
                        {{ strip_tags($fSection->description) }}
                    </p>
                </div>
                <div class="investors_img">
                    <img src="{{ $fSection->getFirstMediaUrl('StaticTable') }}" loading="lazy"
                        onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';">
                </div>
            </div>
            <!-- End Investors Hero Section -->
        @endif
        @if ($items->where('item', 'section-two')->count())
            <div class="bg_div d-none"
                style="background-image: url({{ $items->where('item', 'section-three')?->first()->getFirstMediaUrl('StaticTable') ?? content / images / women2 . png }});">
                <div class="number_div">
                    @foreach ($items->where('item', 'section-two') as $item)
                        <div class="num_img_div">

                            <img class="w-icons" src="{{ $item->getFirstMediaUrl('StaticTable') }}">
                            <h3>{{ $item->title }} </h3>
                            <p>{{ $item->subtitle }}</p>
                        </div>
                    @endforeach
                </div>

            </div>
            <!-- Start Investors Statisctics Section -->
            <div id="investors-statisctics-section" class="mt-md-5 mt-3 px-md-4 px-3 py-md-5 py-4">
                <div class="statisctic-items d-flex align-items-center justify-content-around gap-3 flex-wrap">
                    @foreach ($items->where('item', 'section-two') as $item)
                        <div class="statisctic-item d-flex flex-column align-items-center justify-content-center gap-3">
                            <img class="image-icons" src="{{ $item->getFirstMediaUrl('StaticTable') }}">
                            <h6 class="title text-secondary-color fs-5 fw-semibold text-uppercase">
                                {{ $item->title }}
                            </h6>
                            <p class="desc text-white-color fs-3">
                                {{ $item->subtitle }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- End Investors Statisctics Section -->

            <div class="investors_img mt-md-5 mt-3 row align-items-center justify-content-between">
                <!-- <img src="{{ asset('content/images/investors-statistics.jpg') }}" loading="lazy"
                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"> -->
                    <div id="chartdiv" class="col-lg-7 col-12" style=" height:280px;"></div>
                    <div id="chartdiv2"class="col-lg-5 col-12" style=" height:300px; max-width:100%;direction:ltr"></div>

                </div>
        @endif
        <!-- Start Partner Section -->
        <div id="partner-section" class="tabs-items mt-md-5 mt-3">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                        type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"
                        data-id="subsidiaries">
                        <svg height="24" width="24" fill="#FFFFFF" viewBox="0 0 24 24" data-name="Layer 1"
                            id="Layer_1" class="sparkle svg-with-gap">
                            <path
                                d="M10,21.236,6.755,14.745.264,11.5,6.755,8.255,10,1.764l3.245,6.491L19.736,11.5l-6.491,3.245ZM18,21l1.5,3L21,21l3-1.5L21,18l-1.5-3L18,18l-3,1.5ZM19.333,4.667,20.5,7l1.167-2.333L24,3.5,21.667,2.333,20.5,0,19.333,2.333,17,3.5Z">
                            </path>
                        </svg>
                        <span>
                            {{ TranslationHelper::translateWeb(ucfirst('subsidiaries') ?? '') }}
                        </span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                        type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"
                        data-id="sister_companies">
                        <svg height="24" width="24" fill="#FFFFFF" viewBox="0 0 24 24" data-name="Layer 1"
                            id="Layer_1" class="sparkle svg-with-gap">
                            <path
                                d="M10,21.236,6.755,14.745.264,11.5,6.755,8.255,10,1.764l3.245,6.491L19.736,11.5l-6.491,3.245ZM18,21l1.5,3L21,21l3-1.5L21,18l-1.5-3L18,18l-3,1.5ZM19.333,4.667,20.5,7l1.167-2.333L24,3.5,21.667,2.333,20.5,0,19.333,2.333,17,3.5Z">
                            </path>
                        </svg>
                        <span>
                            {{ TranslationHelper::translateWeb(ucfirst('Sister Companies') ?? '') }}
                        </span>
                    </button>
                </li>
            </ul>
            <div class="tab-content mt-md-4 mt-3" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                    tabindex="0">
                    <div class="subsidiaries_sec_content">
                        <!-- <div class="subsidiaries__sec"> -->
                        <div class="row g-3">
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
                                                                    <p>{{ TranslationHelper::translateWeb(ucfirst('Scince') ?? '') }}
                                                                        : <span
                                                                            class="mt-0 pt-0">{{ $row->since }}</span>
                                                                    </p>
                                                                </h6>
                                                                <h6>
                                                                    @if ($row->percent && $row->percent > 0)
                                                                        <p>{{ TranslationHelper::translateWeb(ucfirst('Sharing') ?? '') }}
                                                                            : <span
                                                                                class="mt-0 pt-0">{{ $row->percent }}%</span>
                                                                        </p>
                                                                    @endif
                                                                </h6>
                                                            </div>

                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ $sub->url }}"
                                            class="website_link mt-0 p-2 text-center">{{ TranslationHelper::translateWeb(ucfirst('Website') ?? '') }}</a>

                                    </div>
                                </div>
                            @empty
                                @include('user.layout.includes.no-data')
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                    tabindex="0">
                    <div class="subsidiaries_sec_content">
                        <!-- <div class="subsidiaries__sec"> -->
                        <div class="row g-3" id="container">
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
                                                                    <p>{{ TranslationHelper::translateWeb(ucfirst('Since') ?? '') }}
                                                                        : <span
                                                                            class="mt-0 pt-0">{{ $row->since }}</span>
                                                                    </p>
                                                                </h6>
                                                                <h6>
                                                                    @if ($row->percent && $row->percent > 0)
                                                                        <p>{{ TranslationHelper::translateWeb(ucfirst('Sharing') ?? '') }}
                                                                            : <span
                                                                                class="mt-0 pt-0">{{ $row->percent }}%</span>
                                                                        </p>
                                                                    @endif
                                                                </h6>
                                                            </div>

                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ $sub->url }}"
                                            class="website_link mt-0 p-2 text-center">{{ TranslationHelper::translateWeb(ucfirst('Website') ?? '') }}</a>

                                    </div>
                                </div>
                            @empty
                                @include('user.layout.includes.no-data')
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Partner Section -->
    @endsection
    @section('websiteScript')
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.nav-link').forEach(tab => {
                    tab.addEventListener('click', function() {
                        const type = this.getAttribute('data-id');

                        // Dynamically construct the URL
                        let url = '{{ route('get-companies', ['type' => ':id']) }}'.replace(':id',
                            type);
                        console.log(url);

                        // Make the AJAX request using fetch
                        fetch(url)
                            .then(response => response.json()) // Parse the JSON data
                            .then(data => {
                                console.log(data);

                                document.getElementById('container').innerHTML = data.data;
                                // Here, you can use the data to dynamically update the UI
                            })
                            .catch(error => console.error('Error:', error)); // Log any errors

                    });
                });
            });
            am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartdiv");


// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);


// Create chart
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
var chart = root.container.children.push(am5percent.PieChart.new(root, {
  layout: root.verticalLayout
}));


// Create series
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
var series = chart.series.push(am5percent.PieSeries.new(root, {
  valueField: "value",
  categoryField: "category"
}));


// Set data
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
series.data.setAll([
  { value: 10, category: "Education" },
  { value: 9, category: "Technology" },
  { value: 6, category: "Business" },
]);


// Play initial series animation
// https://www.amcharts.com/docs/v5/concepts/animations/#Animation_of_series
series.appear(1000, 100);

}); // end am5.ready()
am5.ready(function() {


// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartdiv2");
// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);


// Create chart
// https://www.amcharts.com/docs/v5/charts/xy-chart/
var chart = root.container.children.push(am5xy.XYChart.new(root, {
  panX: true,
  panY: true,
  wheelX: "panX",
  wheelY: "zoomX",
  pinchZoomX: true,
  paddingLeft: 0
}));


// Add cursor
// https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
cursor.lineX.set("forceHidden", true);
cursor.lineY.set("forceHidden", true);

// Generate random data
var date = new Date();
date.setHours(0, 0, 0, 0);

var value = 20;
function generateData() {
  value = am5.math.round(Math.random() * 10 - 4.8 + value, 1);
  if (value < 0) {
    value = Math.random() * 10;
  }

  if (value > 100) {
    value = 100 - Math.random() * 10;
  }
  am5.time.add(date, "day", 1);
  return {
    date: date.getTime(),
    value: value
  };
}

function generateDatas(count) {
  var data = [];
  for (var i = 0; i < count; ++i) {
    data.push(generateData());
  }
  return data;
}


// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
var xAxis = chart.xAxes.push(am5xy.DateAxis.new(root, {
  baseInterval: {
    timeUnit: "day",
    count: 1
  },
  renderer: am5xy.AxisRendererX.new(root, {
    minorGridEnabled: true,
    minGridDistance: 90
  })
}));

var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
  renderer: am5xy.AxisRendererY.new(root, {})
}));


// Add series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
var series = chart.series.push(am5xy.LineSeries.new(root, {
  name: "Series",
  xAxis: xAxis,
  yAxis: yAxis,
  valueYField: "value",
  valueXField: "date",
  tooltip: am5.Tooltip.new(root, {
    labelText: "{valueY}"
  })
}));

series.fills.template.setAll({
  fillOpacity: 0.2,
  visible: true
});


// Add scrollbar
// https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
chart.set("scrollbarX", am5.Scrollbar.new(root, {
  orientation: "horizontal"
}));

// DRAGGABLE RANGE
// add series range
var rangeDataItem = yAxis.makeDataItem({});
yAxis.createAxisRange(rangeDataItem);

// create container for all elements, you can put anything you want top it
var container = am5.Container.new(root, {
  centerY: am5.p50,
  draggable: true,
  layout: root.horizontalLayout
})

// restrict from being dragged vertically
container.adapters.add("x", function() {
  return 0;
});

// restrict from being dragged outside of plot
container.adapters.add("y", function(y) {
  return Math.max(0, Math.min(chart.plotContainer.height(), y));
});

// change range when y changes
container.events.on("dragged", function() {
  updateLabel();
});

// this is needed for the bullets to be interactive, above the plot
yAxis.topGridContainer.children.push(container);

// create bullet and set container as a bullets sprite
rangeDataItem.set("bullet", am5xy.AxisBullet.new(root, {
  sprite: container
}));

// decorate grid of a range
rangeDataItem.get("grid").setAll({
  strokeOpacity: 1,
  visible: true,
  stroke: am5.color(0x000000),
  strokeDasharray: [2, 2]
})

// create background for the container
var background = am5.RoundedRectangle.new(root, {
  fill: am5.color(0xffffff),
  fillOpacity: 1,
  strokeOpacity: 0.5,
  cornerRadiusTL: 0,
  cornerRadiusBL: 0,
  cursorOverStyle: "ns-resize",
  stroke: am5.color(0xff0000)
})

container.set("background", background);

// add label to container, this one will show value and text
var label = container.children.push(am5.Label.new(root, {
  paddingTop: 5,
  paddingBottom: 5
}))

// add x button 
var xButton = container.children.push(am5.Button.new(root, {
  cursorOverStyle: "pointer",
  paddingTop: 5,
  paddingBottom: 5,
  paddingLeft: 2,
  paddingRight: 8
}))

// add label to the button (you can add icon instead of a label)
xButton.set("label", am5.Label.new(root, {
  text: "X",
  paddingBottom: 0,
  paddingTop: 0,
  paddingRight: 0,
  paddingLeft: 0,
  fill: am5.color(0xff0000)
}))

// modify background of x button
xButton.get("background").setAll({
  strokeOpacity: 0,
  fillOpacity: 0
})

// dispose item when x button is clicked
xButton.events.on("click", function() {
  yAxis.disposeDataItem(rangeDataItem);
})

function updateLabel(value) {
  var y = container.y();
  var position = yAxis.toAxisPosition(y / chart.plotContainer.height());

  if(value == null){
    value = yAxis.positionToValue(position);
  }

  label.set("text", root.numberFormatter.format(value, "#.00") + ">Stop loss");

  rangeDataItem.set("value", value);
}

// when data is validated, set range value to the middle
series.events.on("datavalidated", () => {
  var max = yAxis.getPrivate("max", 1);
  var min = yAxis.getPrivate("min", 0);

  var value = min + (max - min) / 2;
  rangeDataItem.set("value", value);
  updateLabel(value);
})

// Set data
var data = generateDatas(300);
series.data.setAll(data);

// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
series.appear(1000);
chart.appear(1000, 100);


}); // end am5.ready()
</script>

        </script>
    @endsection
