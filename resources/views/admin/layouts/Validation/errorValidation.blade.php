{{-- toastr success add --}}
@if(Session::has('add'))
<script>
    toastr.success("{{ Session::get('add') }}",'Success!',{timeOut:11000});
</script>
@endif

{{-- toastr success edit --}}
@if(Session::has('edit'))
<script>
    toastr.success("{{ Session::get('edit') }}",'Success!',{timeOut:11000});
</script>
@endif

{{-- toastr success delete --}}
@if(Session::has('delete'))
<script>
    toastr.success("{!! Session::get('delete') !!}",'Success!',{timeOut:11000});
</script>
@endif

{{-- toastr validation js --}}
@if ($errors->any())
@foreach ($errors->all() as $error)
<script>
    toastr.options.positionClass = 'toast-bottom-left';
        toastr.error("{{ $error }}",'Error!',{timeOut:11000});
</script>
@endforeach
@endif

{{-- toastr validation blade --}}
{{-- <x-admin.validation-error></x-admin.validation-error> --}}