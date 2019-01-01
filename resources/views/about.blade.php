@extends('layouts.blog.app')

@section('content')
    <!-- Hero Section-->
<section style="background: url({{ asset('assets/blog/img/divider-bg.jpg') }}); background-size: cover; background-position: center center" class="hero">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
            @foreach ($abouts as $item)
        <h1>About Us</h1>
        <h2>{{ $item->about}}</h2><a href="" class="hero-link">Discover More</a>
        </div>
      </div><a href=".intro" class="continue link-scroll"><i class="fa fa-long-arrow-down"></i> Scroll Down</a>
    </div>
</section>
<!-- Intro Section-->
<section class="intro">
    <div class="container">
        <div class="row">
        <div class="col-lg-4">
            <h2 class="h3">Vision</h2>
            <p class="text-big">{{ $item->vision }}</p>
        </div>
        <div class="col-lg-8">
                <h2 class="h3">Mission</h2>
                <p class="text-big">{{ $item->mission }}</p>
            </div>
        </div>
    </div>
</section>
@endforeach


<section class="featured-posts no-padding-top">
    <div class="container">
       
    </div>
</section>
@endsection