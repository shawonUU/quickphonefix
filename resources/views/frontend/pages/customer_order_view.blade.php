
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
                        <span style="font-size:16px;font-weight:600;color:#333333">ORDER #{{$order->order_number}}</span>
                        <br>
                        <span>
                            <time datetime="2021-04-20T16:46:36+00:00">{{ $order->created_at->format('F j, Y') }}</time>
                        </span>
                        <div style="display:flex;">
                          <div style="margin-top:15px; margin-right:2px;">
                              <span style="border:solid 1px #F29434;padding: 4px 10px;color:#000;border-radius: 4px;font-size:14px;font-weight:500">{{getArrayData(orderStatuses(),$order->order_status )}}</span>
                          </div>
                          <div style="margin-top:15px; margin-left:2px;">
                              <span style="border:solid 1px #F29434;padding: 4px 10px;color:#000;border-radius: 4px;font-size:14px;font-weight:500">{{$order->is_paid == '1' ? 'Paid' : 'Not Paid' }}</span>
                          </div>
                        </div>
                        <br>

                       
                        <div style="font-size:15px">{{getArrayData(orderStatusTitle(),$order->order_status)}}</div>
                        <table>
                            <thead>
                            <tr>
                                <th class="product-name">পণ্য</th>
                                <th class="product-total">মোট মূল্য</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr class="woocommerce-table__line-item order_item">
                                    <td class="woocommerce-table__product-name product-name">
                                    <a href="{{route('productDetails', $item->product_id)}}">{{$item->product_name}}</a>  <strong class="product-quantity">×&nbsp;{{$item->quantity}}</strong>
                                    </td>
                                    <td class="woocommerce-table__product-total product-total">
                                    <span class="woocommerce-Price-amount amount">
                                        <bdi>{{$item->sale_price}}&nbsp; <span class="woocommerce-Price-currencySymbol">৳</span>
                                        </bdi>
                                    </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th scope="row">মোট মূল্য</th>
                                <td>
                                <span class="woocommerce-Price-amount amount">
                                    <bdi>{{$order->total_amount}}&nbsp; <span class="woocommerce-Price-currencySymbol">৳</span>
                                    </bdi>
                                </span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">শিপিং</th>
                                <td>
                                <span class="woocommerce-Price-amount amount">
                                    <bdi>{{$order->delivery_charge}}&nbsp; <span class="woocommerce-Price-currencySymbol">৳</span>
                                    </bdi>
                                </span>&nbsp; <small class="shipped_via">via {{ getArrayData(lib_deliveryCharge(), $order->delivery_method)}}</small>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">পেমেন্ট মেথড</th>
                                <td>{{isset(getPaymentMethods()[$order->payment_method]['name']) ? getPaymentMethods()[$order->payment_method]['name'] : ''}}</td>
                            </tr>
                            <tr>
                                <th scope="row">সর্বমোট</th>
                                <td>
                                <span class="woocommerce-Price-amount amount">
                                    <bdi>{{$order->paid_amount}}&nbsp; <span class="woocommerce-Price-currencySymbol">৳</span>
                                    </bdi>
                                </span>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                        <section class="woocommerce-customer-details">
                            <section class="woocommerce-columns woocommerce-columns--2 woocommerce-columns--addresses col2-set addresses">
                            <div class="woocommerce-column woocommerce-column--1 woocommerce-column--billing-address col-1">
                                <h2 class="woocommerce-column__title">বিলিং ঠিকানা</h2>
                                <address> {{$billing->name}} <br>{{$billing->address_details}} <br>{{ getArrayData($lib_areas, $billing->area)}} , {{getArrayData($lib_districts, $billing->state)}} <p class="woocommerce-customer-details--phone">{{$billing->phone}}</p>
                                  <p class="woocommerce-customer-details--email">{{$billing->email}}</p>
                              </address>
                            </div>
                            <!-- /.col-1 -->
                            <div class="woocommerce-column woocommerce-column--2 woocommerce-column--shipping-address col-2">
                                <h2 class="woocommerce-column__title">শিপিং ঠিকানা</h2>
                                <address> {{$shipping->name}} <br>{{$shipping->address_details}} <br>{{ getArrayData($lib_areas, $shipping->area)}} , {{getArrayData($lib_districts, $shipping->state)}} <p class="woocommerce-customer-details--phone">{{$shipping->phone}}</p>
                                  <p class="woocommerce-customer-details--email">{{$shipping->email}}</p>
                                </address>
                            </div>
                            <!-- /.col-2 -->
                            </section>
                            <!-- /.col2-set -->
                        </section>
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