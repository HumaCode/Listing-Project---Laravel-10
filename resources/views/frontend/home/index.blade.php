@extends('frontend.layouts.master')


@section('contents')
    {{-- BANNER PART START --}}
    @include('frontend.home.sections.banner_section')
    {{-- BANNER PART END --}}


    {{-- CATEGORY SLIDER START --}}
    @include('frontend.home.sections.category_section')
    {{-- CATEGORY SLIDER End --}}



    {{-- FEATURES PART START --}}
    @include('frontend.home.sections.features_section')
    {{-- FEATURES PART END --}}



    {{-- COUNTER PART START --}}
    @include('frontend.home.sections.counter_section')
    {{-- COUNTER PART END --}}



    {{-- FEARURE OUR CATEGORY START --}}
    @include('frontend.home.sections.feature_category_section')
    {{-- FEARURE OUR CATEGORY END --}}




    {{-- OUR LOCATION START --}}
    @include('frontend.home.sections.feature_location_section')
    {{-- OUR LOCATION END --}}



    {{-- FEATURED LISTING START --}}
    @include('frontend.home.sections.feature_listing_section')
    {{-- FEATURED LISTING END --}}



    {{-- OUR PACKAGE START --}}
    @include('frontend.home.sections.feature_package_section')
    {{-- OUR PACKAGE END --}}



    {{-- TESTIMONIAL PART START --}}
    @include('frontend.home.sections.feature_testimonial_section')
    {{-- TESTIMONIAL PART END --}}



    {{-- BLOG PART START --}}
    @include('frontend.home.sections.feature_blog_section')
    {{-- BLOG PART END --}}
@endsection
