@extends('user.layout.blogs.master')
@section('parent_page_name')
Blog Details
@endsection
@section('page_name')
Blog Details
@endsection
@section('websiteStyle')
{{-- start toastr --}}
<link rel="stylesheet" href="{{ asset('toastr/css/toastr.min.css') }}" />
{{-- end toastr --}}
<style>

</style>
@endsection
@section('content')
    <h1>Blog Details</h1>
@endsection