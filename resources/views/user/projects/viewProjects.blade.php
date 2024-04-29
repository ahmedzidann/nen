@extends('user.layout.master')
@section('parent_page_name',"Projects")
@section('page_name', ucwords($slug))
@section('websiteStyle')

@endsection
@section('content')
<x-frontend.projects.view-projects :slug="$slug" :id="$id"/>
@endsection  
@section('websiteStyle')
@endsection
