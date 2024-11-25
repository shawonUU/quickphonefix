
@extends('frontend.layouts.app')
@section('content')
<div id="container" class="page-template default-template wd_wide">
    <div id="content" class="container" role="main">
      <div id="main">
        <div id="container-main" class="col-sm-24">
          <div class="main-content">
            <article id="post-8" class="post-8 page type-page status-publish hentry">
              <div class="entry-content-post">
                <div class="woocommerce">
                  <p style="margin-top:20px;font-size:20px ">আপনাকে ধন্যবাদ। অর্ডারটি সাবমিট হয়েছে।</p>
                  <p style="margin-top:20px;font-size:1.1em ">অর্ডার নম্বর: <strong>{{$order->order_number}}</strong>
                    <span style="display:none;">
                      <a target="_blank" href="/track?tracking_id=9i498ggs98p8b">(ট্রাক করুন)</a>
                    </span>
                  </p>

                  @if($order->payment_method == '1')
                    <p>পণ্য ডেলিভারির পরে নগদ টাকা দিতে হবে। কখনই চালানে উল্লেখিত মূল্যের চেয়ে বেশি টাকা ডেলিভারি ম্যানকে দিবেন না। আপনার যে কোন প্রশ্ন অথবা অর্ডারে কোন পরিবর্তনের জন্য 096-7877-1365 নাম্বারে কল করুন ।</p>
                  @elseif($order->payment_method == '2')

                    <p>“পার্সোনাল বিকাশ” অ্যাকাউন্ট থেকে “পেমেন্ট” অপশন সিলেক্ট করে 01707072632 নাম্বারে বিকাশ করতে হবে। পেমেন্ট করার সময় রেফারেন্স নাম্বার হিসাবে অর্ডার নাম্বার দিয়ে দিবেন। </p>
                    <p>যদি রেফারেন্স নাম্বার হিসাবে অর্ডার নাম্বার না দিয়ে থাকেন তাহলে পেমেন্ট করার পর 096-7877-1365 নাম্বারে ফোন করে আপনার নাম্বার এবং ট্রানজেকশন নাম্বারটি জানিয়ে দিন।</p>
                    <ul class="order_details mf_account_details">
                      <h3>পার্সোনাল বিকাশ অ্যাকাউন্ট থেকে পেমেন্ট অপশন সেলেক্ট করুন - 01707072632</h3>
                      <li class="account_type">Account Type: <strong>পার্সোনাল বিকাশ অ্যাকাউন্ট থেকে পেমেন্ট অপশন সেলেক্ট করুন</strong>
                      </li>
                      <li class="account_number">Account Number: <strong>01707072632</strong>
                      </li>
                    </ul>
                  @elseif($order->payment_method == '3')
                  <p>“পার্সোনাল রকেট” অ্যাকাউন্ট থেকে “পেমেন্ট” অপশন সিলেক্ট করে 01707072632 নাম্বারে রকেট করতে হবে। পেমেন্ট করার সময় রেফারেন্স নাম্বার হিসাবে অর্ডার নাম্বার দিয়ে দিবেন। </p>
                    <p>যদি রেফারেন্স নাম্বার হিসাবে অর্ডার নাম্বার না দিয়ে থাকেন তাহলে পেমেন্ট করার পর 096-7877-1365 নাম্বারে ফোন করে আপনার নাম্বার এবং ট্রানজেকশন নাম্বারটি জানিয়ে দিন।</p>
                    <ul class="order_details mf_account_details">
                      <h3>পার্সোনাল রকেট অ্যাকাউন্ট থেকে পেমেন্ট অপশন সেলেক্ট করুন - 01707072632</h3>
                      <li class="account_type">Account Type: <strong>পার্সোনাল রকেট অ্যাকাউন্ট থেকে পেমেন্ট অপশন সেলেক্ট করুন</strong>
                      </li>
                      <li class="account_number">Account Number: <strong>01707072632</strong>
                      </li>
                    </ul>
                  @elseif($order->payment_method == '4')
                    <p>“পার্সোনাল নগদ” অ্যাকাউন্ট থেকে “পেমেন্ট” অপশন সিলেক্ট করে 01707072632 নাম্বারে নগদ করতে হবে। পেমেন্ট করার সময় রেফারেন্স নাম্বার হিসাবে অর্ডার নাম্বার দিয়ে দিবেন। </p>
                    <p>যদি রেফারেন্স নাম্বার হিসাবে অর্ডার নাম্বার না দিয়ে থাকেন তাহলে পেমেন্ট করার পর 096-7877-1365 নাম্বারে ফোন করে আপনার নাম্বার এবং ট্রানজেকশন নাম্বারটি জানিয়ে দিন।</p>
                    <ul class="order_details mf_account_details">
                      <h3>পার্সোনাল নগদ অ্যাকাউন্ট থেকে পেমেন্ট অপশন সেলেক্ট করুন - 01707072632</h3>
                      <li class="account_type">Account Type: <strong>পার্সোনাল নগদ অ্যাকাউন্ট থেকে পেমেন্ট অপশন সেলেক্ট করুন</strong>
                      </li>
                      <li class="account_number">Account Number: <strong>01707072632</strong>
                      </li>
                    </ul>
                  @endif

                  <p >পেমেন্ট করার পর, পেমেন্ট ইনফরমেশন সংরক্ষণ করুন।</p>
                  <div style="display:flex; justify-content:center;">

                    <style>
                      .form-container {
                        display: flex;
                        flex-direction: column;
                        max-width: 600px;
                        margin: 20px auto;
                        margin-top: 0px;
                        border: 1px solid #ddd;
                        padding: 15px;
                        border-radius: 8px;
                        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                        background: #f9f9f9;
                        border-bottom: solid 2px #f29434;
                      }

                      .form-row {
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: space-between;
                        margin-bottom: 15px;
                      }

                      .form-col {
                        flex: 1 1 100%; /* Default: full width (col-12) */
                        margin: 5px 0;
                      }

                      .form-col label {
                        font-size: 14px;
                        font-weight: bold;
                        margin-bottom: 5px;
                        color: #333;
                        display: block;
                      }

                      .form-col input {
                        width: 100%;
                        padding: 8px;
                        font-size: 14px;
                        border: 1px solid #ccc;
                        border-radius: 4px;
                      }

                      .form-button {
                        display: flex;
                        justify-content: end;
                        margin-top: 10px;
                      }

                      .form-button button {
                        padding: 10px 20px;
                        background: #f23534;
                        color: #fff;
                        font-size: 16px;
                        border: none;
                        border-radius: 4px;
                        cursor: pointer;
                        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
                        transition: background 0.3s ease;
                      }

                      .form-button button:hover {
                        background: linear-gradient(90deg, #45A049, #3E8E41);
                      }

                      @media (min-width: 768px) {
                        .form-col {
                          flex: 1 1 48%; /* For col-md-6 */
                        }

                        .form-col:first-child {
                          margin-right: 4%; /* Space between two columns */
                        }

                        .form-col:last-child {
                          margin-left: 0; /* No additional margin for the last column */
                        }
                      }
                    </style>


                    <form class="form-container" method="post" action="{{route('save_reference_number')}}">
                      @csrf
                      <!-- Row with Two Columns -->
                       <input type="text" name="order_number" value="{{$order->order_number}}" hidden>
                       <input type="text" name="from_submit" value="1" hidden>
                      <div class="form-row">
                        <div class="form-col">
                          <label for="account_number" >একাউন্ট নাম্বার</label>
                          <input type="text" id="account_number" name="ac_no" value="{{$order->account_number}}">
                        </div>
                        <div class="form-col">
                          <label for="transection_id">ট্রান্সেকশন আইডি</label>
                          <input type="text" id="transection_id" name="ref" value="{{$order->transaction_id}}">
                        </div>
                      </div>

                      <!-- Button -->
                      <div class="form-button">
                        <button type="submit">সাবমিট করুন</button>
                      </div>
                    </form>
                  </div>

                  <div>
                    <i> প্রিয় গ্রাহক,যেহেতু বেদুইনের পণ্যের ধরন ৩০ হাজারেরও অধিক, তাই সব পণ্য বেদুইনর স্টকে রাখা সম্ভব হয় না। যে সব পণ্য বেদুইনের স্টকে থাকে না তা এক বিশেষ পদ্ধতিতে সরবরাহকারীর কাছ থেকে দ্রুত সংগ্রহ করে গ্রাহককে ডেলিভারি করা হয়। তবে কখনো কখনো পণ্য সরবরাহকারীর নিকটেও শেষ হয়ে যায়। এইসব ক্ষেত্রে আপনার কাছ থেকে নিশ্চিত হবার পরেই বাকী পণ্যগুলি ডেলিভারির জন্য পাঠানো হবে। </i>
                  </div>
                  <div class="thank-you-order-details">
                    <table>
                      <thead>
                        <tr>
                          <th class="product-name">পণ্য</th>
                          <th class="product-total">মোট মূল্য</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($orderItems as $item)
                        <tr class="woocommerce-table__line-item order_item">
                          <td class="woocommerce-table__product-name product-name">
                            <a href="{{route('productDetails', $item->product_id)}}">{{$item->product_name}}</a> <strong class="product-quantity">×&nbsp;{{$item->quantity}}</strong>
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
                  <div style="box-shadow: 0px 3px 6px -4px #a2a2a2;padding: 10px 15px;border: solid 1px #ccc;background-color: #eee;color: #333333;font-size: 16px;">
      প্রিয় গ্রাহক, আপনার কষ্টের টাকায় কেনা পণ্যটি সুন্দরভাবে পাঠানোর জন্য আমাদের বেদুইন পরিবারের চেষ্টার কোন ত্রুটি থাকবে না। তবে আমরা কেউ ভুলের ঊর্ধ্বে নই। আপনার পণ্যটি ডেলিভারি ম্যান বা কুরিয়ার থেকে নিশ্চিন্তে বুঝে নিন। প্যাকেট খুলে কোন রকম সমস্যা যেমন : পণ্য মিসিং, পরিবহনে পণ্য ক্ষতিগ্রস্ত বা অন্য যে কোন সমস্যা পেলে ৭ দিনের মধ্যে আমাদেরকে <strong>sales@bedouin.com</strong> এ ইমেইল করে জানিয়ে দিন। দ্রুততম সময়ে আপনার সমস্যাটি অগ্রাধিকার ভিত্তিতে সমাধান করার প্রয়োজনীয় ব্যবস্থা নেয়া হবে ইন শা আল্লাহ। বিচলিত না হয়ে আস্থা রাখুন আপনার প্রিয় বেদুইন </div>
                </div>
              </div>
              <!-- .entry-content -->
              <footer class="entry-meta"></footer>
              <!-- .entry-meta -->
            </article>
            <!-- #post -->
          </div>
        </div>
        <!-- end content -->
      </div>
    </div>
</div>
@endsection