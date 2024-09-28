@extends('user.layout.blogs.master')
@section('parent_page_name')
Blogs
@endsection
@section('page_name')
Blogs
@endsection
@section('websiteStyle')
{{-- start toastr --}}
<link rel="stylesheet" href="{{ asset('toastr/css/toastr.min.css') }}" />
{{-- end toastr --}}
<style>

</style>
@endsection
@section('content')
    <a href="{{route('blogs.details')}}" target="__blannk">details</a>
@endsection