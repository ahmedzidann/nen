<script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
{{-- <script src="{{ asset('admin/assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script> --}}
<script src="{{ asset('admin/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
{{-- <script src="{{ asset('admin/assets/js/index.js') }}"></script> --}}
<!--app JS-->
<script src="{{ asset('admin/assets/js/app.js') }}"></script>

{{-- start datatables --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.all.min.js"
	integrity="sha256-iSkyJ41luwYhZX4JnDUop92wix0y8SBGAW5tCnnCfZ4=" crossorigin="anonymous"></script>
{{-- end datatables --}}
{{-- start phone --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"></script>
{{-- end phone --}}
{{-- start dropify --}}
<script src="{{ asset('dropify/js/dropify.min.js') }}"></script>
<script>
    $(function () {
        $('.dropify').dropify();
    });
</script>
{{-- end dropify --}}
{{-- start intlTelInput --}}
<script src="{{ asset('phone/intlTelInput.js') }}"></script>
{{-- start toastr --}}
<script src="{{ asset('toastr/js/toastr.min.js') }}"></script>
{{-- end toastr --}}
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

@include('admin.layouts.Validation.errorValidation')
@yield('jsadmin')