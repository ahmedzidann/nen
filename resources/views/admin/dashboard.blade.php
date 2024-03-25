@extends('admin.layouts.master')

@section('titleadmin')
{{ str_replace("-"," ",ucfirst(TranslationHelper::translate($nameView??''))) }}
@endsection
@section('cssadmin')
@endsection

@section('contentadmin')
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--end row-->
				<div class="row row-cols-1 row-cols-xl-2">
					<div class="col d-flex">
						<div class="card radius-10 w-100">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
									
										<h5 class="mb-1">Welcome to Dashboard : {{ ucfirst((Auth::guard('admin')->name??''))??'' }}</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
	
			</div>
		</div>
		<!--end page wrapper -->
@endsection


@section('jsadmin')
@endsection