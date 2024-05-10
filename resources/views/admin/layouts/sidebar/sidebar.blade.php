		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<a href="{{ route('admin.dashboard') }}">
						<img src="{{ asset('admin/assets/images/logo-icon.png') }}" class="logo-icon" style="width: 59%;" alt="logo icon">
					</a>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
				</div>
			 </div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
			@can('dashboard_view')
				<li>
					<a href="{{ route('admin.dashboard') }}">
						<div class="parent-icon"><i class='bx bx-home-alt'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
			@endcan
				<li>
					<a href="{{ url('translations') }}" target="_blank">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Translations</div>
					</a>
				</li>
				{{-- item --}}
				<li class="menu-label">Items</li>
				{{-- about --}}
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-user-circle"></i>
						</div>
						<div class="menu-title">About</div>
					</a>
					<ul>
					@php
					$route = Request::segment(3) ;
					$route_two = Request::segment(4) ;
					@endphp
					{{-- mm-active --}}
						<li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Identity</a>
							<ul>
								<li class="{{ $route=='about' && $route_two=='identity' && Request()->item=='section-one' ?'mm-active':'' }}"><a href="{{ route('admin.about.identity.index',['category=about','subcategory=identity','item=section-one']) }}" ><i class='bx bx-radio-circle'></i>Section one</a></li>
								<li class="{{ $route=='about' && $route_two=='identity' && Request()->item=='section-two' ?'mm-active':'' }}"><a href="{{ route('admin.about.identity.index',['category=about','subcategory=identity','item=section-two']) }}" ><i class='bx bx-radio-circle'></i>Section two</a></li>
								<li class="{{ $route=='about' && $route_two=='identity' && Request()->item=='section-three' ?'mm-active':'' }}"><a href="{{ route('admin.about.identity.index',['category=about','subcategory=identity','item=section-three']) }}" ><i class='bx bx-radio-circle'></i>Section three</a></li>
							</ul>
						</li>
						<li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Investors</a>
							<ul>
								<li class="{{ $route=='about' && $route_two=='investors' && Request()->item=='section-one' ?'mm-active':'' }}"><a href="{{ route('admin.about.investors.index',['category=about','subcategory=investors','item=section-one']) }}" ><i class='bx bx-radio-circle'></i>Section one</a></li>
								<li class="{{ $route=='about' && $route_two=='investors' && Request()->item=='section-two' ?'mm-active':'' }}"><a href="{{ route('admin.about.investors.index',['category=about','subcategory=investors','item=section-two']) }}" ><i class='bx bx-radio-circle'></i>Section two</a></li>
								<li class="{{ $route=='about' && $route_two=='investors' && Request()->item=='section-three' ?'mm-active':'' }}"><a href="{{ route('admin.about.investors.index',['category=about','subcategory=investors','item=section-three']) }}" ><i class='bx bx-radio-circle'></i>Section three</a></li>
								<li class="{{ $route=='about' && $route_two=='investors' && Request()->item=='section-foure' ?'mm-active':'' }}"><a href="{{ route('admin.about.investors.index',['category=about','subcategory=investors','item=section-foure']) }}" ><i class='bx bx-radio-circle'></i>Section foure</a></li>
								<li class="{{ $route=='about' && $route_two=='investors' && Request()->item=='section-five' ?'mm-active':'' }}"><a href="{{ route('admin.about.investors.index',['category=about','subcategory=investors','item=section-five']) }}" ><i class='bx bx-radio-circle'></i>Section five</a></li>
							</ul>
						</li>
						<li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Achievements</a>
							<ul>
								<li class="{{ $route=='about' && $route_two=='achievements' && Request()->item=='section-one' ?'mm-active':'' }}"><a href="{{ route('admin.about.achievements.index',['category=about','subcategory=achievements','item=section-one']) }}" ><i class='bx bx-radio-circle'></i>Section one</a></li>
								<li class="{{ $route=='about' && $route_two=='achievements' && Request()->item=='section-two' ?'mm-active':'' }}"><a href="{{ route('admin.about.achievements.index',['category=about','subcategory=achievements','item=section-two']) }}" ><i class='bx bx-radio-circle'></i>Section two</a></li>
							</ul>
						</li>
						<li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Awards</a>
							<ul>

								<li class="{{ $route=='about' && $route_two=='awards' && Request()->item=='section-one' ?'mm-active':'' }}"><a href="{{ route('admin.about.awards.index',['category=about','subcategory=awards','item=section-one']) }}" ><i class='bx bx-radio-circle'></i>Section one</a></li>
								<li class="{{ $route=='about' && $route_two=='awards' && Request()->item=='section-two' ?'mm-active':'' }}"><a href="{{ route('admin.about.awards.index',['category=about','subcategory=awards','item=section-two']) }}" ><i class='bx bx-radio-circle'></i>Section two</a></li>
							</ul>
						</li>
						<li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Certificates</a>
							<ul>
								<li class="{{ $route=='about' && $route_two=='certificates' && Request()->item=='section-one' ?'mm-active':'' }}"><a href="{{ route('admin.about.certificates.index',['category=about','subcategory=certificates','item=section-one']) }}" ><i class='bx bx-radio-circle'></i>Section one</a></li>
								<li class="{{ $route=='about' && $route_two=='certificates' && Request()->item=='section-two' ?'mm-active':'' }}"><a href="{{ route('admin.about.certificates.index',['category=about','subcategory=certificates','item=section-two']) }}" ><i class='bx bx-radio-circle'></i>Section two</a></li>
							</ul>
						</li>

						<li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Partners</a>
							<ul>
								@foreach (App\Models\Page::where('slug','partners')->get() as $partner)
								@foreach ($partner->childe as $item)
								<li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>{{ $item->name }}</a>
									<ul>
										<li class="{{ $route=='about' && $route_two=='partners' && Request()->item=='section-one' ?'mm-active':'' }}"><a href="{{ route('admin.about.partners.index',['category=about','subcategory=partners','subsubcategory='.$item->slug.'','item=section-one']) }}" ><i class='bx bx-radio-circle'></i>Section one</a></li>
										<li class="{{ $route=='about' && $route_two=='partners' && Request()->item=='section-two' ?'mm-active':'' }}"><a href="{{ route('admin.about.partners.index',['category=about','subcategory=partners','subsubcategory='.$item->slug.'','item=section-two']) }}" ><i class='bx bx-radio-circle'></i>Section two</a></li>
									</ul>
								@endforeach
								@endforeach
							</ul>
						</li>
						<li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Clients</a>
							<ul>
								@foreach (App\Models\Page::where('slug','clients')->get() as $partner)
								@foreach ($partner->childe as $item)
								<li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>{{ $item->name }}</a>
									<ul>
										<li class="{{ $route=='about' && $route_two=='clients' && Request()->item=='section-one' ?'mm-active':'' }}"><a href="{{ route('admin.about.clients.index',['category=about','subcategory=clients','subsubcategory='.$item->slug.'','item=section-one']) }}" ><i class='bx bx-radio-circle'></i>Section one</a></li>
										<li class="{{ $route=='about' && $route_two=='clients' && Request()->item=='section-two' ?'mm-active':'' }}"><a href="{{ route('admin.about.clients.index',['category=about','subcategory=clients','subsubcategory='.$item->slug.'','item=section-two']) }}" ><i class='bx bx-radio-circle'></i>Section two</a></li>
									</ul>
								@endforeach
								@endforeach
							</ul>
						</li>
						<li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Our Team</a>
							<ul>
								<li class="{{ $route=='about' && $route_two=='our-team' && Request()->item=='section-one' ?'mm-active':'' }}"><a href="{{ route('admin.about.our-team.index',['category=about','subcategory=our-team','item=section-one']) }}" ><i class='bx bx-radio-circle'></i>Section one</a></li>
								<li class="{{ $route=='about' && $route_two=='our-team' && Request()->item=='member-board' ?'mm-active':'' }}"><a href="{{ route('admin.about.our-team.index',['category=about','subcategory=our-team','item=member-board']) }}" ><i class='bx bx-radio-circle'></i>Member Board </a></li>
								<li class="{{ $route=='about' && $route_two=='our-team' && Request()->item=='financial-department' ?'mm-active':'' }}"><a href="{{ route('admin.about.our-team.index',['category=about','subcategory=our-team','item=financial-department']) }}" ><i class='bx bx-radio-circle'></i>Financial Department</a></li>
								<li class="{{ $route=='about' && $route_two=='our-team' && Request()->item=='marketing-department' ?'mm-active':'' }}"><a href="{{ route('admin.about.our-team.index',['category=about','subcategory=our-team','item=marketing-department']) }}" ><i class='bx bx-radio-circle'></i>Marketing Department</a></li>
								<li class="{{ $route=='about' && $route_two=='our-team' && Request()->item=='it-department' ?'mm-active':'' }}"><a href="{{ route('admin.about.our-team.index',['category=about','subcategory=our-team','item=it-department']) }}" ><i class='bx bx-radio-circle'></i>It Department</a></li>
							</ul>
						</li>
						<li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Careers</a>
							<ul>
								<li class="{{ $route=='about' && $route_two=='careers' && Request()->item=='section-one' ?'mm-active':'' }}"><a href="{{ route('admin.about.careers.index',['category=about','subcategory=careers','item=section-one']) }}" ><i class='bx bx-radio-circle'></i>Section one</a></li>
								<li class="{{ $route=='about' && $route_two=='careers' && Request()->item=='section-two' ?'mm-active':'' }}"><a href="{{ route('admin.about.careers.index',['category=about','subcategory=careers','item=section-two']) }}" ><i class='bx bx-radio-circle'></i>Section two</a></li>
							</ul>
						</li>
					</ul>
				</li>
				{{-- about --}}
				{{-- project --}}
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-user-circle"></i>
						</div>
						<div class="menu-title">{{ App\Models\Page::find(3)->name }}</div>
					</a>
					<ul>
						<li class=""><a href="{{ route('admin.project.index',['category='.App\Models\Page::find(3)->slug]) }}" ><i class='bx bx-radio-circle'></i>Section</a></li>
					</ul>
				</li>
				{{-- project --}}
					{{-- settings --}}
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-user-circle"></i>
						</div>
						<div class="menu-title">Settings</div>
					</a>
					<ul>
						<li class=""><a href="{{ route('admin.slider.index') }}" ><i class='bx bx-radio-circle'></i>Slider</a></li>
					</ul>
				</li>
				{{-- settings --}}
				{{-- Education --}}
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-user-circle"></i>
						</div>
						<div class="menu-title">{{ App\Models\Page::find(6)->name }}</div>
					</a>
					<ul>
						<li class=""><a href="{{ route('admin.solution.index',['category='.App\Models\Page::find(6)->slug]) }}" ><i class='bx bx-radio-circle'></i>Section</a></li>
					</ul>
				</li>
				{{-- Education --}}

                {{-- Education --}}
				@php
                        $education = App\Models\Page::find(4);
                @endphp
                <li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-user-circle"></i>
						</div>
						<div class="menu-title">{{$education->name}}</div>
					</a>
					<ul>
                        @foreach ($education->childe as $ch)
						{{-- <li class="">

                            <a href="{{ route('admin.solution.index',['category='.$ch->slug]) }}" >
                            <i class='bx bx-radio-circle'></i>{{$ch->name}}</a>
                        </li> --}}
                        {{--
                        <li>
                            <a class="has-arrow" href="javascript:;">
                                <div class="parent-icon"><i class="bx bx-user-circle"></i>
                                </div>
                                <div class="menu-title">{{$ch->name}}</div>
                            </a>
                            <ul> --}}

                                <li class="">

                                    <a href="{{ route('admin.education.index',['category='.$education->slug
                                        ,"subcategory=".$ch->slug]) }}" >
                                    <i class='bx bx-radio-circle'></i>{{$ch->name}}</a>
                                </li>


                                {{-- <li class=""><a href="{{ route('admin.solution.index',['category='.App\Models\Page::find(4)->slug]) }}" ><i class='bx bx-radio-circle'></i>Section</a></li> --}}
                            {{-- </ul> --}}
                        </li>
                        @endforeach
						{{-- <li class=""><a href="{{ route('admin.solution.index',['category='.App\Models\Page::find(4)->slug]) }}" ><i class='bx bx-radio-circle'></i>Section</a></li> --}}
					</ul>
				</li>
				{{-- Education --}}
                @php
                        $testing = App\Models\Page::find(5);
                @endphp
                {{-- Testing --}}
                <li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-user-circle"></i>
						</div>
						<div class="menu-title">{{$testing->name}}</div>
					</a>
					<ul>
                        @foreach ($testing->childe as $ch)
						{{-- <li class="">

                            <a href="{{ route('admin.solution.index',['category='.$ch->slug]) }}" >
                            <i class='bx bx-radio-circle'></i>{{$ch->name}}</a>
                        </li> --}}
                        {{--
                        <li>
                            <a class="has-arrow" href="javascript:;">
                                <div class="parent-icon"><i class="bx bx-user-circle"></i>
                                </div>
                                <div class="menu-title">{{$ch->name}}</div>
                            </a>
                            <ul> --}}

                                <li class="">

                                    <a href="{{ route('admin.testing.index',['category='.$testing->slug
                                        ,"subcategory=".$ch->slug]) }}" >
                                    <i class='bx bx-radio-circle'></i>{{$ch->name}}</a>
                                </li>


                                {{-- <li class=""><a href="{{ route('admin.solution.index',['category='.App\Models\Page::find(4)->slug]) }}" ><i class='bx bx-radio-circle'></i>Section</a></li> --}}
                            {{-- </ul> --}}
                        </li>
                        @endforeach
						{{-- <li class=""><a href="{{ route('admin.solution.index',['category='.App\Models\Page::find(4)->slug]) }}" ><i class='bx bx-radio-circle'></i>Section</a></li> --}}
					</ul>
				</li>
                {{-- end Testing  --}}
				{{-- item --}}
				<li class="menu-label">Forms & Tables</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-message-square-edit'></i>
						</div>
						<div class="menu-title">Forms</div>
					</a>
					<ul>
						<li> <a href="form-elements.html"><i class='bx bx-radio-circle'></i>Form Elements</a>
						</li>
						<li> <a href="form-input-group.html"><i class='bx bx-radio-circle'></i>Input Groups</a>
						</li>
						<li> <a href="form-radios-and-checkboxes.html"><i class='bx bx-radio-circle'></i>Radios & Checkboxes</a>
						</li>
						<li> <a href="form-layouts.html"><i class='bx bx-radio-circle'></i>Forms Layouts</a>
						</li>
						<li> <a href="form-validations.html"><i class='bx bx-radio-circle'></i>Form Validation</a>
						</li>
						<li> <a href="form-wizard.html"><i class='bx bx-radio-circle'></i>Form Wizard</a>
						</li>
						<li> <a href="form-text-editor.html"><i class='bx bx-radio-circle'></i>Text Editor</a>
						</li>
						<li> <a href="form-file-upload.html"><i class='bx bx-radio-circle'></i>File Upload</a>
						</li>
						<li> <a href="form-date-time-pickes.html"><i class='bx bx-radio-circle'></i>Date Pickers</a>
						</li>
						<li> <a href="form-select2.html"><i class='bx bx-radio-circle'></i>Select2</a>
						</li>
						<li> <a href="form-repeater.html"><i class='bx bx-radio-circle'></i>Form Repeater</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-grid-alt"></i>
						</div>
						<div class="menu-title">Tables</div>
					</a>
					<ul>
						<li> <a href="table-basic-table.html"><i class='bx bx-radio-circle'></i>Basic Table</a>
						</li>
						<li> <a href="table-datatable.html"><i class='bx bx-radio-circle'></i>Data Table</a>
						</li>
					</ul>
				</li>
				<li class="menu-label">Pages</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-user-circle"></i>
						</div>
						<div class="menu-title">HR</div>
					</a>
					<ul>
						<li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Admins</a>
							<ul>
								<li><a href="{{ route('admin.admins.index') }}" ><i class='bx bx-radio-circle'></i>View</a></li>
								<li><a href="{{ route('admin.admins.create') }}" ><i class='bx bx-radio-circle'></i>Create</a></li>
							</ul>
						</li>

						<li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Users</a>
							<ul>
								<li><a href="{{ route('admin.users.index') }}" ><i class='bx bx-radio-circle'></i>View</a></li>
								<li><a href="{{ route('admin.users.create') }}" ><i class='bx bx-radio-circle'></i>Create</a></li>
							</ul>
						</li>
						<li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Roles</a>
							<ul>
								<li><a href="{{ route('admin.roles.index') }}" ><i class='bx bx-radio-circle'></i>View</a></li>
								<li><a href="{{ route('admin.roles.create') }}" ><i class='bx bx-radio-circle'></i>Create</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-error"></i>
						</div>
						<div class="menu-title">Pages</div>
					</a>
					<ul>
						<li> <a href="{{ route('admin.pages.index') }}" ><i class='bx bx-radio-circle'></i>View</a>
						</li>
						<li> <a href="{{ route('admin.pages.create') }}" ><i class='bx bx-radio-circle'></i>Create</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="faq.html">
						<div class="parent-icon"><i class="bx bx-help-circle"></i>
						</div>
						<div class="menu-title">FAQ</div>
					</a>
				</li>
				<li>
					<a href="pricing-table.html">
						<div class="parent-icon"><i class="bx bx-diamond"></i>
						</div>
						<div class="menu-title">Pricing</div>
					</a>
				</li>
				<li class="menu-label">Charts & Maps</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-line-chart"></i>
						</div>
						<div class="menu-title">Charts</div>
					</a>
					<ul>
						<li> <a href="charts-apex-chart.html"><i class='bx bx-radio-circle'></i>Apex</a>
						</li>
						<li> <a href="charts-chartjs.html"><i class='bx bx-radio-circle'></i>Chartjs</a>
						</li>
						<li> <a href="charts-highcharts.html"><i class='bx bx-radio-circle'></i>Highcharts</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-map-alt"></i>
						</div>
						<div class="menu-title">Maps</div>
					</a>
					<ul>
						<li> <a href="map-google-maps.html"><i class='bx bx-radio-circle'></i>Google Maps</a>
						</li>
						<li> <a href="map-vector-maps.html"><i class='bx bx-radio-circle'></i>Vector Maps</a>
						</li>
					</ul>
				</li>
				<li class="menu-label">Others</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-menu"></i>
						</div>
						<div class="menu-title">Menu Levels</div>
					</a>
					<ul>
						<li> <a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Level One</a>
							<ul>
								<li> <a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Level Two</a>
									<ul>
										<li> <a href="javascript:;"><i class='bx bx-radio-circle'></i>Level Three</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
						<div class="parent-icon"><i class="bx bx-folder"></i>
						</div>
						<div class="menu-title">Documentation</div>
					</a>
				</li>
				<li>
					<a href="https://themeforest.net/user/codervent" target="_blank">
						<div class="parent-icon"><i class="bx bx-support"></i>
						</div>
						<div class="menu-title">Support</div>
					</a>
				</li>
			</ul>
			<!--end navigation-->
		</div>
