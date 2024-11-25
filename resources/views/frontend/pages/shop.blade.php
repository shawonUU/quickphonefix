@extends('frontend.layouts.app')
@section('content')
<style>
    svg.w-5 {
        width: 20px;
    }
</style>
   <!-- Bread-Crumb style two -->
    <!-- rts breadcrumba area start -->
    <div class="rts-bread-crumb-area ptb--150 ptb_sm--100 bg-breadcrumb bg_image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- bread crumb inner wrapper -->
                    <div class="breadcrumb-inner text-center">
                        <h1 class="title">Shop</h1>
                        <div class="meta">
                            <a href="#" class="prev">Home /</a>
                            <a href="#" class="next">Shop</a>
                        </div>
                    </div>
                    <!-- bread crumb inner wrapper end -->
                </div>
            </div>
        </div>
    </div>
    <!-- rts breadcrumba area end -->
    <!-- Bread-Crumb style two End -->


    <div class="rts-blog-grid-area rts-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="row align-items-center rs-vertical-middle shorting mb-50 md-mb-30">
                        <div class="col-lg-6 col-12">
                            <p class="woocommerce-result-count">Showing 1-9 of 12 results</p>
                        </div>
                        <div class="col-lg-6 col-12 sm-mt-20">
                            <select class="from-control">
                                <option>Default sorting</option>
                                <option>Sort by popularity</option>
                                <option>Sort by average rating</option>
                                <option>Sort by lates</option>
                                <option>Sort by price: low to high</option>
                                <option>Sort by price: high to low</option>
                            </select>
                        </div>
                    </div>
                    <div class="row g-24">
                        @foreach($products as $product)
                        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                            <!-- single blog two -->
                            <div class="blog-single-two-wrapper shop">
                                <div class="image-area">
                                    <a href="" class="thumbnail">
                                        <img src="{{ asset('frontend/product_images/'.$product->image) }}" alt="blog-image">
                                    </a>
                                </div>
                                <div class="inner">
                                    <span class="pre-tag ">
                                    {{$product->price}}
                                    </span>
                                    <a href="">
                                        <h5 class="title"> {{$product->name}}</h5>
                                    </a>
                                    <a href="{{route('add_to_cart', $product->id)}}" class="btn-read-more-blog">Add To Cart <i class="fa-regular fa-cart-shopping"></i></a>
                                </div>
                            </div>
                            <!-- single blog two end -->
                        </div>
                        @endforeach
                    </div>
                </div>                
            </div>
            <div class="row mt--30">
                <div class="col-lg-12">
                    <div class="rts-elevate-pagination">
                        <ul class="d-none">
                            <li><button class="active">01</button></li>
                            <li><button>02</button></li>
                            <li><button>03</button></li>
                            <li><button>04</button></li>
                            <li><button><i class="fa-solid fa-chevrons-right"></i></button></li>
                        </ul>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

  
@endsection