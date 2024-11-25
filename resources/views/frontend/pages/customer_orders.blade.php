
@extends('frontend.layouts.app') 
@section('content') 

<style>
    nav.woocommerce-MyAccount-navigation ul {
  list-style-type: none;
  padding-left: 0;
  font-size: 17px;
  line-height: 26px;
}
ol, ul {
  margin-bottom: 20px;
  padding-left: 0;
  margin-top: 0;
}

nav.woocommerce-MyAccount-navigation ul li.is-active {
  background-color: rgba(0,0,0,.1);
}
nav.woocommerce-MyAccount-navigation ul li {
  padding: 8px 20px;
  background-color: rgba(0,0,0,.05);
  border-bottom: 1px solid rgba(0,0,0,.05);
  list-style: none;
}
ul li, ol li {
  /* color: #666; */
}
ul li {
  list-style: square inside none;
}
ol li, ul li {
  line-height: 24px;
  list-style-position: inside;
}
nav.woocommerce-MyAccount-navigation ul li:not(.is-active):hover {
  background-color: rgba(0,0,0,.07);
}
nav.woocommerce-MyAccount-navigation ul li {
  padding: 8px 20px;
  background-color: rgba(0,0,0,.05);
  border-bottom: 1px solid rgba(0,0,0,.05);
  list-style: none;
}
ul li, ol li {
  /* color: #666; */
}
</style>

<div id="main-module-container">
  <div class="slideshow-wrapper main-slideshow wd_wide" style="min-height: 48px;">
    <div class="slideshow-sub-wrapper"></div>
  </div>
  <div class="breadcrumb-title-wrapper">
    <div class="breadcrumb-title">
      <h1 class="heading-title page-title">আমার অ্যাকাউন্ট</h1>
    </div>
  </div>
  <div id="container" class="page-template default-template wd_wide">
    <div id="content" class="container" role="main">
      <div id="main">
        <div id="container-main" class="col-sm-24">
          <div class="main-content">
            <article id="post-9" class="post-9 page type-page status-publish hentry">
              <div class="entry-content-post">
                <div class="woocommerce">
                  <div class="row">
                    <div class="col-sm-5">
                      @include('frontend.layouts.my_account_side_nave')
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-18 my-account-dashboard">
                        <div class="woocommerce-notices-wrapper"></div>


                        @foreach ($orders as $order)
                            <div class="wf-card-basic" style="margin:0px 0 30px 0">
                                <span style="font-size:16px;font-weight:600;color:#333333">ORDER #{{$order->order_number}}</span> &nbsp; <span>( <span class="woocommerce-Price-amount amount">{{$order->paid_amount}}&nbsp; <span class="woocommerce-Price-currencySymbol">৳</span>
                                </span> for {{$order->total_item}} item ) </span>
                                <br>
                                <span>
                                <time datetime="2024-11-08T12:19:52+00:00">{{ $order->created_at->format('F j, Y') }}</time>
                                </span>
                                <br>
                                <div style="margin-top:15px;">
                                    <span style="border:solid 1px #F29434;padding: 4px 10px;color:#000;border-radius: 4px;font-size:14px;font-weight:500">{{getArrayData(orderStatuses(),$order->order_status )}}</span>
                                </div>
                                <br>
                                <div style="font-size:15px">{{getArrayData(orderStatusTitle(),$order->order_status)}}</div>
                                <hr style="border-top:solid 1px #ccc!important">
                                <br>
                                <div style="margin-top:10px">
                                    <a href="{{ route('customers_order_view', ['order_number' => $order->order_number]) }}" class="woocommerce-button button view">View</a>
                                    @if($order->is_paid =='0')
                                    <a href="{{ route('order_received', ['order_number' => $order->order_number]) }}" class="woocommerce-button button view" style="background-color: #f23534 !important;">Make Payment</a>
                                    @endif
                                </div>
                            </div>

                        @endforeach



                    </div>
                  </div>
                </div>
              </div>
              <footer class="entry-meta"></footer>
            </article>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>















@endsection