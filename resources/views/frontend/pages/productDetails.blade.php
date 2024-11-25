@extends('frontend.layouts.app')
@section('content')
<style>
  .modal-backdrop {
    z-index: 1040 !important;
  }
  <style>
    /* General styling for star containers */
    .star-rating {
      display: inline-block;
      font-size:30px;
      color: #ffc600;
      position: relative;
    }

    /* Full empty star display (5 empty stars) */
    .star-rating::before {
      content: '★★★★★';
      font-size: 30px;
      color: #ffc600; /* Gray color for empty stars */
    }

    /* Filled stars based on rating */
    .star-rating.rating-1::before { content: '★☆☆☆☆'; color: #ffc600;}
    .star-rating.rating-2::before { content: '★★☆☆☆'; color: #ffc600;}
    .star-rating.rating-3::before { content: '★★★☆☆'; color: #ffc600;}
    .star-rating.rating-4::before { content: '★★★★☆'; color: #ffc600;}
    .star-rating.rating-5::before { content: '★★★★★'; color: #ffc600;}
  </style>
</style>
<div id="main-module-container">
  <div class="breadcrumb-title-wrapper">
    <div class="breadcrumb-title">
      <div class="top-page ">
        <div class="container" style="display:none;">
          <nav class="woocommerce-breadcrumb d-none" aria-label="Breadcrumb">
            <a href="{{ asset('frontend') }}/index.html">হোম</a>&nbsp;&#47;&nbsp; <a href="{{ asset('frontend') }}/cat/books.html">বই</a>&nbsp;&#47;&nbsp; <a href="{{ asset('frontend') }}/cat/books/subject.html">বিষয় সমূহ</a>&nbsp;&#47;&nbsp; <a href="{{ asset('frontend') }}/cat/books/subject/%e0%a6%ae%e0%a7%81%e0%a6%b8%e0%a6%b2%e0%a6%bf%e0%a6%ae-%e0%a6%ac%e0%a7%8d%e0%a6%af%e0%a6%95%e0%a7%8d%e0%a6%a4%e0%a6%bf%e0%a6%a4%e0%a7%8d%e0%a6%ac.html">মুসলিম ব্যক্তিত্ব</a>&nbsp;&#47;&nbsp;আউলিয়া আল্লাহ
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div id="wd_container" class="page-template default-template">
    <div id="content" class="container" role="main">
      <div id="main">
        <div id="main_content" class="col-sm-18">
          <div class>
            <div class="content" role="main">
              <div class="woocommerce-notices-wrapper"></div>
              <div itemscope itemtype="http://schema.org/Product" id="product-1099604" class="without_related post-1099604 product type-product status-publish has-post-thumbnail product_cat--ilham product_cat-1272 product_cat-22144 product_cat-4045 product_shipping_class-default-class first instock sale featured shipping-taxable purchasable product-type-simple">
                <div class="images">
                  <a href="{{ asset('frontend/product_images/'.$product->image) }}" itemprop="image" class="woocommerce-main-image zoom" title="a9bd9608" rel="prettyPhoto">
                    <img width="250" height="395" src="{{ asset('frontend/product_images/'.$product->image) }}" class="attachment-woocommerce_single size-woocommerce_single wp-post-image" alt="auliya allah" decoding="async" title="a9bd9608" srcset=" " fetchpriority="high" />
                  </a>
                  <br />
                  <br />
                </div>
                <div class="summary entry-summary">
                  <h1 itemprop="name" class="product_title entry-title">{{$product->name}}</h1>
                  @if($product->is_book_or_product == '1')
                    <div class="wd_product_categories">
                      
                        <span>লেখক : </span>
                        @php
                            $writerIds = explode(',', $product->writer_id);
                        @endphp

                        @foreach ($writerIds as $index => $writerId)
                            <a href="{{route('filterProduct',['type' => 'book', 'writer' => $writerId])}}">{{ getArrayData($libWriters, $writerId) }}</a>
                            @if($index < count($writerIds) - 1)
                                ,
                            @endif
                        @endforeach
                      
                    </div>
                    <div class="wd_product_categories">
                      <span>প্রকাশনী : </span>
                        @php
                          $publisherIds = explode(',', $product->publisher_id);
                        @endphp

                        @foreach ($publisherIds as $index => $publisherId)
                          <a href="{{route('filterProduct',['type' => 'book', 'publisher' => $publisherId])}}">{{ getArrayData($libPublishers, $publisherId) }}</a>
                          @if($index < count($publisherIds) - 1)
                              ,
                          @endif
                        @endforeach
                    </div>
                    <div class="wd_product_categories">
                      <span>বিষয় : </span>
                      @php
                          $subjectIds = explode(',', $product->subject_id);
                      @endphp

                        @foreach ($subjectIds as $index => $subjectId)
                          <a href="{{route('filterProduct',['type' => 'book', 'subject' => $subjectId])}}">{{ getArrayData($libSubjets, $subjectId) }}</a>
                          @if($index < count($subjectIds) - 1)
                              ,
                          @endif
                        @endforeach
                    </div>
                  @endif

                  @if($product->is_book_or_product == '2')
                    <div class="wd_product_categories">
                      
                        <span>Brand : </span>
                        @php
                            $brandIds = explode(',', $product->brand_id);
                        @endphp

                        @foreach ($brandIds as $index => $brandId)
                            <a href="{{route('filterProduct',['type' => 'product', 'brand' => $brandId])}}">{{ getArrayData($libBrands, $brandId) }}</a>
                            @if($index < count($brandIds) - 1)
                                ,
                            @endif
                        @endforeach
                      
                    </div>
                    <div class="wd_product_categories">
                      <span>Category : </span>
                        @php
                          $caregoryIds = explode(',', $product->category_id);
                        @endphp

                        @foreach ($caregoryIds as $index => $caregoryId)
                          <a href="{{route('filterProduct',['type' => 'product', 'category' => $caregoryId])}}">{{ getArrayData($libCategories, $caregoryId) }}</a>
                          @if($index < count($caregoryIds) - 1)
                              ,
                          @endif
                        @endforeach
                    </div>
                  @endif

                  <div class="wd_product_categories"></div>

                  <div class="short-description" itemprop="description">
                    <div class="std">
                      @php
                        $words = countWords($product->description);
                        $showWords = 30;
                      @endphp
                      <div style="{{$words > $showWords ? 'display:none;' : ''}}" class="full_hidden_story">
                        <p>{!!$product->description!!}</p>
                      </div>
                      @if($words >  $showWords)
                        <div class="short_story">
                          {!! limitWords($product->description,  $showWords) !!}... 
                          <a style="font-size:15px" onclick="show_full_story()" class="read_more_full_story">আরো পড়ুন</a>
                        </div>
                      @endif
                    </div>
                  </div>
                  <form class="cart product_detail" method="post" enctype="multipart/form-data">
                    <table class="variations" cellspacing="0">
                      <tbody>
                        <tr>
                          <th>
                            <span for="pa_%e0%a6%aa%e0%a6%b0%e0%a6%bf%e0%a6%ae%e0%a6%be%e0%a6%a3">পরিমাণ</span>
                          </th>
                          <td style="width: 80px !important;">
                            <div class="">
                              <input type="number" step="1" min="1" id="product_quantity" name="quantity" value="1" title="পরিমাণ" class="input-text qty text" style="height: 28px;" />
                            </div>
                          </td>
                          @if($product->is_size == '1')
                            <td>
                              <select onchange="setProductSize(this)" id="sizes" class="" name="product_size" data-attribute_name="" data-show_option_none="yes" data-gtm-form-interact-field-id="0">
                                <option value="">Choose an option</option>
                                  @foreach ($productSizes as $size)
                                    <option value="{{$size->id}}">{{$size->name}}</option>
                                  @endforeach
                              </select>
                              <a onclick="clearSize()" id="cler_size_btn" class="reset_variations" href="javascript:void(0)" style="visibility: visible; display:none;" >Clear</a>
                            </td>
                          @endif
                        </tr>
                      </tbody>
                    </table>
                    <div class="clear"></div>
                    <div class="single_add_to_cart_wrapper">
                      <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        @if($product->is_size_wise_price == '0')
                          <p class="price">
                                <span class="price">
                                  @if(isOffer($product))
                                    <del aria-hidden="true">
                                      <span class="woocommerce-Price-amount amount">
                                        <bdi>{{$product->price}}&nbsp; <span class="woocommerce-Price-currencySymbol">৳</span></bdi>
                                      </span>
                                    </del>
                                  @endif
                                  <ins>
                                    <span class="woocommerce-Price-amount amount">
                                      <bdi>{{isOffer($product) ? $product->offer_price : $product->price}}<span class="woocommerce-Price-currencySymbol">৳</span></bdi>
                                    </span>
                                  </ins>
                                </span>
                                @if(isOffer($product))
                                <span class="single-product-margin">({{getOfferParcent($product)}}% ছাড়ে)</span>
                                @endif
                          </p>
                        @endif
                        @if($product->is_size_wise_price == '1')
                          @foreach($productSizes as $size)
                            <p class="price sizeWisePrice" id="sizeWisePrice_{{$size->id}}" style="display:none;">
                                  <span class="price">
                                    @if(isOffer($size))
                                      <del aria-hidden="true">
                                        <span class="woocommerce-Price-amount amount">
                                          <bdi>{{$size->price}}&nbsp; <span class="woocommerce-Price-currencySymbol">৳</span></bdi>
                                        </span>
                                      </del>
                                    @endif
                                    <ins>
                                      <span class="woocommerce-Price-amount amount">
                                        <bdi>{{isOffer($size) ? $size->offer_price : $size->price}}<span class="woocommerce-Price-currencySymbol">৳</span></bdi>
                                      </span>
                                    </ins>
                                  </span>
                                  @if(isOffer($size))
                                  <span class="single-product-margin">({{getOfferParcent($size)}}% ছাড়ে)</span>
                                  @endif
                            </p>
                          @endforeach
                        @endif

                        <meta itemprop="price" content="161" />
                        <meta itemprop="priceCurrency" content="BDT" />
                        <link itemprop="availability" href="https://schema.org/InStock" />
                      </div>
                      <input type="hidden" name="add-to-cart" value="1099604" />
                      <button onclick="addTocart()" id="add_to_cart_btn" type="submit" class="single_add_to_cart_button button alt " {{$product->is_size == '1' ? 'disabled' : ''}} >অর্ডার করুন</button>
                      @if ($product->is_book_or_product == '1') 
                        <button type="button" class="button alt woocommerce-main-image look-inside-button-after lookInside look-inside-btn" data-pdf-url="{{ asset('frontend/product_pdf/' . $product->pdf) }}" data-toggle="modal" data-target="#pdfModal">
                          একটু পড়ে দেখুন
                        </button>
                      @endif
                    <!-- Modal Structure -->
                     <!-- Modal Structure -->
                        <div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="pdfModalLabel">PDF Preview</h4>
                              </div>
                              <div class="modal-body">
                                <iframe id="pdfViewer" src="" style="width: 100%; height: 500px;" frameborder="0"></iframe>
                              </div>
                            </div>
                          </div>
                        </div>
                        <script>
                          document.querySelectorAll('.look-inside-btn').forEach(function(button) {
                                button.addEventListener('click', function() {
                                    var pdfUrl = button.getAttribute('data-pdf-url'); // Get the dynamic PDF URL from data attribute
                                    document.getElementById('pdfViewer').src = pdfUrl;
                                });
                            });
                        </script>
                      @if($product->is_book_or_product)
                        @if($product->is_package)
                          <table class="package-table">
                            <thead>
                              <tr>
                                <td>প্যাকেজে যা যা থাকছে -</td>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($packageItems as $bookid => $book)
                                <tr>
                                  <td>
                                    <a href="{{ route('productDetails', $bookid) }}">{{$book}}</a>
                                  </td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                        @endif
                      @endif

                      <div class="tinv-wraper woocommerce tinv-wishlist tinvwl-after-add-to-cart tinvwl-woocommerce_after_add_to_cart_button" data-tinvwl_product_id="1099604" style="display:none;">
                        <div class="tinv-wishlist-clear"></div>
                        <a role="button" tabindex="0" name="%e0%a6%aa%e0%a6%9b%e0%a6%a8%e0%a7%8d%e0%a6%a6%e0%a7%87%e0%a6%b0-%e0%a6%a4%e0%a6%be%e0%a6%b2%e0%a6%bf%e0%a6%95%e0%a6%be%e0%a6%af%e0%a6%bc-%e0%a6%af%e0%a7%81%e0%a6%95%e0%a7%8d%e0%a6%a4-%e0%a6%95" aria-label="পছন্দের তালিকায় যুক্ত করুন" class="tinvwl_add_to_wishlist_button tinvwl-icon-heart  tinvwl-position-after" data-tinv-wl-list="[]" data-tinv-wl-product="1099604" data-tinv-wl-productvariation="0" data-tinv-wl-productvariations="[]" data-tinv-wl-producttype="simple" data-tinv-wl-action="add">
                          <span class="tinvwl_add_to_wishlist-text">পছন্দের তালিকায় যুক্ত করুন</span>
                        </a>
                        <div class="tinv-wishlist-clear"></div>
                        <div class="tinvwl-tooltip">পছন্দের তালিকায় যুক্ত করুন</div>
                      </div>
                    </div>
                    <div class="clear"></div>
                  </form>
                  <div class="row" style="display:none;">
                    <div class="col-xs-12">
                      <a href="https://play.google.com/store/apps/details?id=com.Bedouin.app&amp;utm_source=website&amp;utm_campaign=app_install&amp;pcampaignid=pcampaignidMKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1">
                        <img alt="Get it on Google Play" src="">
                      </a>
                    </div>
                  </div>
                </div>
                <div class="woocommerce-tabs wc-tabs-wrapper" style="">
                  <ul style="display:none" class="tabs wc-tabs">
                    <li class="reviews_tab">
                      <a href="#tab-reviews">রিভিউ</a>
                    </li>
                  </ul>
                  <div class="panel entry-content wc-tab" id="tab-reviews">
                    <div id="reviews" class="woocommerce-Reviews">
                      <div id="comments">
                        <h2 class="woocommerce-Reviews-title"> {{$totalReviews}} review for <span>{{$product->name}}</span>
                        </h2>
                        <div class="cr-summaryBox-wrap">
                          <div class="cr-overall-rating-wrap">
                            <div class="cr-average-rating">
                              <span>{{_numFormate($totalRatingPoint/isDivisor($totalReviews))}}</span>
                            </div>
                            <div class="cr-average-rating-stars">
                              <div class="crstar-rating">
                                <span style="width:0%;"></span>
                              </div>
                            </div>
                            <div class="cr-total-rating-count">Based on {{$totalReviews}} review</div>
                          </div>
                          <div class="ivole-summaryBox">
                            <table id="ivole-histogramTable">
                              <tbody>
                                @for($i=5; $i>=1; $i--)
                                <tr class="ivole-histogramRow">
                                  <td class="ivole-histogramCell1">{{$i}} star</td>
                                  <td class="ivole-histogramCell2">
                                    <div class="ivole-meter">
                                      <div class="ivole-meter-bar" style="width: {{_numFormate(($ratings[$i] / isDivisor($totalReviews)) * 100)}}%"></div>
                                    </div>
                                  </td>
                                  <td class="ivole-histogramCell3">{{_numFormate(($ratings[$i] / isDivisor($totalReviews)) * 100)}}%</td>
                                </tr>
                                @endfor
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <a class="submit-review submit-review-btn">
                          <i class="fa fa-edit"></i>&nbsp;আপনার রিভিউটি লিখুন </a>
                        <div id="review_form_wrapper" style="display:none">
                          <div id="review_form" class="cr-single-product-review">
                            <div id="respond" class="comment-respond">
                              <span id="reply-title" class="comment-reply-title">আপনার মন্তব্য লিখুন</span>

                              <form action="{{route('store_ratings_reviews')}}" method="post" id="commentform" class="comment-form">
                                @csrf
                                <input type="text" name="product_id" value="{{$product->id}}" hidden>
                                <p class="comment-notes">
                                @guest()
                                  <span id="email-notes">Your email address will not be published.</span>
                                  <span class="required-field-message">Required fields are marked <span class="required">*</span>
                                  </span>
                                  @endguest
                                </p>
                                <div class="comment-form-rating">
                                  <label for="rating">Your rating</label>
                                  <p class="stars selected" style="display:none;">
                                    <span>
                                      <a class="star-1" href="javascript:void(0)">1</a>
                                      <a class="star-2" href="javascript:void(0)">2</a>
                                      <a class="star-3 active" href="javascript:void(0)">3</a>
                                      <a class="star-4" href="javascript:void(0)">4</a>
                                      <a class="star-5" href="javascript:void(0)">5</a>
                                    </span>
                                  </p>
                                  <select name="rating" id="rating" required>
                                    <option > মন্তব্য </option>
                                    <option value="5">Perfect</option>
                                    <option value="4">Good</option>
                                    <option value="3">Average</option>
                                    <option value="2">Not that bad</option>
                                    <option value="1">Very poor</option>
                                  </select>
                                </div>
                                <p class="comment-form-comment">
                                  <label for="review">Your review&nbsp; <span class="required">*</span>
                                  </label>
                                  <textarea id="review" name="review" cols="45" rows="8" required class="cr-review-form-textbox"></textarea>
                                </p>
                                @guest()
                                  <p class="comment-form-author">
                                    <label for="author">Name&nbsp; <span class="required">*</span>
                                    </label>
                                    <input id="author" name="author" type="text" value size="30" required />
                                  </p>
                                  <p class="comment-form-email">
                                    <label for="email">Email&nbsp; <span class="required">*</span>
                                    </label>
                                    <input id="email" name="email" type="email" value size="30" required />
                                  </p>
                                @endguest
                                <p class="form-submit">
                                  <input name="submit" type="submit" id="submit" class="submit cr-single-product-rev-submit" value="সাবমিট" />
                                  <input type="hidden" name="comment_post_ID" value="1099604" id="comment_post_ID" />
                                  <input type="hidden" name="comment_parent" id="comment_parent" value="0" />
                                </p>
                              </form>
                            </div>
                          </div>
                        </div>
                        <ol class="commentlist">
                          @foreach ($ratingReviews  as $ratingReview)
                            <li class="review even thread-even depth-1" id="li-comment-3236153">
                              <div id="comment-3236153" class="comment_container">
                                <img alt src="https://secure.gravatar.com/avatar/?s=60&amp;d=mm&amp;r=g" srcset="https://secure.gravatar.com/avatar/?s=120&#038;d=mm&#038;r=g 2x" class="avatar avatar-60 photo avatar-default" height="60" width="60" loading="lazy" decoding="async" />
                                <div class="comment-text">
                                  <div class="star-rating rating-{{$ratingReview->rating}}"></div>
                                  <p class="meta">
                                    <strong>{{$ratingReview->name}}</strong>&comma; <time datetime="2024-08-11T09:52:02+06:00">{{ $ratingReview->created_at->format('F d, Y') }}</time>
                                  </p>
                                  <div class="description">
                                    <div class="show-read-more">{{$ratingReview->review}}</div>
                                  </div>
                                  <div class="cr-voting-cont cr-voting-cont-uni" style="display:none;">
                                    <span class="cr-voting-upvote cr-voting-a" data-vote="3236153" data-upvote="1">
                                      <svg width="1000" height="1227" viewBox="0 0 1000 1227" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="cr-voting-svg-int" d="M644.626 317.445C649.154 317.445 652.363 317.445 655.572 317.445C723.597 317.449 791.624 317.158 859.648 317.572C898.609 317.808 933.112 330.638 960.638 358.82C995.241 394.246 1006.17 436.789 996.788 485.136C990.243 518.839 984.39 552.677 978.124 586.435C972.353 617.536 966.435 648.611 960.597 679.7C953.013 720.085 946.573 760.728 937.577 800.796C926.489 850.175 895.987 884.112 848.079 900.497C832.798 905.724 815.765 907.905 799.527 907.935C549.65 908.388 299.771 908.259 49.8947 908.247C25.2463 908.245 10.0803 898.71 2.61154 877.687C0.677947 872.241 0.300995 866.015 0.297088 860.148C0.175995 710.546 0.422088 560.945 0.000213738 411.345C-0.075958 384.09 20.215 362.994 48.6134 363.302C113.65 364.009 178.699 363.433 243.742 363.648C250.986 363.672 256.344 361.898 261.676 356.627C300.166 318.564 338.904 280.75 377.791 243.088C390.217 231.053 394.06 215.312 397.885 199.588C410.045 149.59 413.808 98.6035 414.676 47.3575C414.918 33.1016 417.97 19.961 429.484 11.1564C436.297 5.94738 445.088 0.58606 453.191 0.257936C503.865 -1.7948 551.841 8.18175 593.892 38.2071C628.316 62.7872 644.705 96.9199 644.634 139.162C644.541 194.99 644.621 250.818 644.625 306.646C644.626 309.849 644.626 313.051 644.626 317.445Z" fill="#00A382" fill-opacity="0.4" />
                                        <path class="cr-voting-svg-ext" d="M644.626 317.445C649.154 317.445 652.363 317.445 655.572 317.445C723.597 317.449 791.624 317.158 859.648 317.572C898.609 317.808 933.112 330.638 960.638 358.82C995.241 394.246 1006.17 436.789 996.788 485.136C990.243 518.839 984.39 552.677 978.124 586.435C972.353 617.536 966.435 648.611 960.597 679.7C953.013 720.085 946.573 760.728 937.577 800.796C926.489 850.175 895.987 884.112 848.079 900.497C832.798 905.724 815.765 907.905 799.527 907.935C549.65 908.388 299.771 908.259 49.8947 908.247C25.2463 908.245 10.0803 898.71 2.61154 877.687C0.677947 872.241 0.300995 866.015 0.297088 860.147C0.175995 710.546 0.422088 560.945 0.000213738 411.345C-0.075958 384.09 20.215 362.994 48.6134 363.302C113.65 364.009 178.699 363.433 243.742 363.648C250.986 363.672 256.344 361.898 261.676 356.627C300.166 318.564 338.904 280.75 377.791 243.088C390.217 231.053 394.06 215.312 397.884 199.588C410.045 149.59 413.808 98.6035 414.675 47.3575C414.918 33.1016 417.97 19.961 429.484 11.1564C436.297 5.94738 445.088 0.58606 453.191 0.257936C503.865 -1.7948 551.841 8.18175 593.892 38.2071C628.316 62.7872 644.705 96.9199 644.634 139.162C644.54 194.99 644.621 250.818 644.624 306.646C644.626 309.849 644.626 313.051 644.626 317.445ZM565.625 819.015C565.625 819.036 565.625 819.058 565.625 819.081C643.392 819.081 721.159 819.091 798.925 819.075C828.847 819.069 847.042 803.902 852.509 774.366C861.169 727.589 869.743 680.798 878.411 634.023C888.853 577.675 899.495 521.365 909.747 464.984C913.148 446.285 908.323 430.019 892.739 417.99C882.896 410.392 871.601 407.894 859.249 407.918C774.708 408.082 690.167 407.929 605.626 408.064C588.71 408.091 574.158 403.558 563.621 389.513C556.435 379.935 554.595 368.881 554.597 357.283C554.609 285.207 554.316 213.127 554.812 141.055C554.927 124.215 547.863 113.125 533.511 106.08C526.277 102.527 518.486 100.119 511.005 97.0488C504.636 94.4355 502.461 96.4629 502.093 103.281C499.685 147.967 493.855 192.172 480.816 235.115C473.15 260.361 463.355 284.873 444.131 303.847C404.035 343.418 363.549 382.591 323.033 421.73C318.933 425.691 317.385 429.689 317.389 435.23C317.48 559.603 317.431 683.976 317.433 808.349C317.433 818.991 317.513 819.013 328.258 819.013C407.381 819.017 486.502 819.015 565.625 819.015ZM226.81 818.503C226.81 696.718 226.81 575.511 226.81 454.082C181.205 454.082 136.127 454.082 90.797 454.082C90.797 575.755 90.797 696.941 90.797 818.503C136.418 818.503 181.504 818.503 226.81 818.503Z" fill="#00A382" />
                                      </svg>
                                    </span>
                                    <span class="cr-voting-upvote-count">(0)</span>
                                    <span class="cr-voting-downvote cr-voting-a" data-vote="3236153" data-upvote="0">
                                      <svg width="1000" height="1227" viewBox="0 0 1000 1227" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="cr-voting-svg-int" d="M355.375 909.828C350.847 909.828 347.638 909.828 344.429 909.828C276.404 909.824 208.377 910.115 140.353 909.701C101.392 909.465 66.8886 896.635 39.3632 868.453C4.75973 833.028 -6.17383 790.485 3.21288 742.137C9.7578 708.434 15.6113 674.596 21.8769 640.838C27.6484 609.737 33.5664 578.663 39.4042 547.573C46.9882 507.188 53.4277 466.546 62.4238 426.477C73.5117 377.099 104.014 343.161 151.922 326.776C167.203 321.55 184.236 319.368 200.474 319.339C450.351 318.886 700.23 319.015 950.106 319.026C974.755 319.028 989.921 328.564 997.39 349.587C999.323 355.032 999.7 361.259 999.704 367.126C999.825 516.727 999.579 666.329 1000 815.928C1000.08 843.184 979.786 864.28 951.388 863.971C886.351 863.264 821.302 863.84 756.259 863.625C749.015 863.602 743.657 865.375 738.325 870.647C699.835 908.709 661.097 946.524 622.21 984.186C609.784 996.221 605.941 1011.96 602.116 1027.69C589.956 1077.68 586.193 1128.67 585.325 1179.92C585.083 1194.17 582.031 1207.31 570.517 1216.12C563.704 1221.33 554.913 1226.69 546.81 1227.02C496.136 1229.07 448.16 1219.09 406.109 1189.07C371.685 1164.49 355.296 1130.35 355.367 1088.11C355.46 1032.28 355.38 976.455 355.376 920.627C355.375 917.424 355.375 914.223 355.375 909.828Z" fill="#CA2430" fill-opacity="0.4" />
                                        <path class="cr-voting-svg-ext" d="M355.374 909.828C350.847 909.828 347.638 909.828 344.429 909.828C276.403 909.824 208.376 910.115 140.353 909.701C101.392 909.464 66.8882 896.634 39.3628 868.453C4.75934 833.027 -6.17424 790.484 3.21247 742.137C9.75739 708.433 15.6109 674.596 21.8765 640.838C27.648 609.736 33.566 578.662 39.4038 547.572C46.9878 507.188 53.4272 466.545 62.4233 426.477C73.5112 377.098 104.013 343.161 151.921 326.776C167.202 321.549 184.236 319.368 200.474 319.338C450.351 318.885 700.229 319.014 950.106 319.026C974.754 319.028 989.92 328.563 997.389 349.586C999.323 355.032 999.7 361.258 999.703 367.125C999.825 516.727 999.578 666.328 1000 815.928C1000.08 843.183 979.785 864.279 951.387 863.97C886.35 863.263 821.301 863.84 756.258 863.625C749.014 863.601 743.657 865.375 738.325 870.646C699.835 908.709 661.096 946.523 622.21 984.185C609.784 996.22 605.94 1011.96 602.116 1027.69C589.956 1077.68 586.192 1128.67 585.325 1179.92C585.083 1194.17 582.03 1207.31 570.516 1216.12C563.704 1221.33 554.913 1226.69 546.809 1227.01C496.136 1229.07 448.159 1219.09 406.108 1189.07C371.685 1164.49 355.296 1130.35 355.366 1088.11C355.46 1032.28 355.38 976.455 355.376 920.627C355.374 917.423 355.374 914.222 355.374 909.828ZM434.376 408.258C434.376 408.237 434.376 408.215 434.376 408.192C356.609 408.192 278.841 408.182 201.076 408.198C171.154 408.203 152.958 423.371 147.492 452.906C138.831 499.684 130.257 546.475 121.589 593.25C111.148 649.598 100.505 705.908 90.2534 762.289C86.853 780.988 91.6772 797.254 107.261 809.283C117.105 816.881 128.4 819.379 140.751 819.355C225.292 819.191 309.833 819.344 394.374 819.209C411.29 819.181 425.843 823.715 436.38 837.76C443.565 847.338 445.405 858.392 445.403 869.99C445.392 942.066 445.685 1014.15 445.188 1086.22C445.073 1103.06 452.138 1114.15 466.489 1121.19C473.724 1124.75 481.515 1127.15 488.995 1130.22C495.364 1132.84 497.54 1130.81 497.907 1123.99C500.315 1079.31 506.145 1035.1 519.184 992.158C526.851 966.912 536.645 942.4 555.87 923.425C595.966 883.855 636.452 844.681 676.967 805.543C681.067 801.582 682.616 797.584 682.612 792.043C682.52 667.67 682.569 543.297 682.567 418.924C682.567 408.282 682.487 408.26 671.743 408.26C592.62 408.256 513.499 408.258 434.376 408.258ZM773.19 408.77C773.19 530.555 773.19 651.762 773.19 773.191C818.795 773.191 863.874 773.191 909.204 773.191C909.204 651.518 909.204 530.332 909.204 408.77C863.583 408.77 818.497 408.77 773.19 408.77Z" fill="#CA2430" />
                                      </svg>
                                    </span>
                                    <span class="cr-voting-downvote-count">(0)</span>
                                  </div>
                                </div>
                              </div>
                            </li>
                          @endforeach
                        </ol>
                      </div>
                      <div class="clear"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="right-sidebar" class="col-sm-6">
          <div class="right-sidebar-content">
            <ul class="xoxo">
              <li id="custom_html-5" class="widget_text widget-container widget_custom_html">
                <div class="textwidget custom-html-widget"></div>
              </li>
              <li id="wd_related_upsell_book-2" class="widget-container wd_widget_related_upsell_product woocommerce">
                <div class="widget_title_wrapper">
                  <a class="block-control" href="javascript:void(0)"></a>
                  <h3 class="widget-title heading-title">আরো দেখুন&#8230;</h3>
                </div>
                <div class="wd_widget_related_upsell_wrapper woocommerce  " id="wd_widget_related_upsell_wrapper_184611884">
                  <div class="widget_product_list_inner">
                    @foreach ($relatedProduct as $item)
                      
                      @if($item->is_book_or_product=='1')
                        <div class="product_per_slide">
                          <ul class="products">
                            <li class="product">
                              <div class="product_item_wrapper">
                                <div class="product_thumbnail_wrapper col-md-6">
                                  <a class="thumbnail" href="{{ route('productDetails', $item->id) }}">
                                    <div class="product_label">
                                      <span class="onsale show_off product_label">Save off <span class="off_number">-৳64</span>
                                      </span>
                                      <span class="featured product_label">Feature</span>
                                    </div>
                                    <img width="192" height="254" src="{{ asset('frontend/product_images/'.$item->image) }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="billion dollar muslim" decoding="async" loading="lazy" />
                                  </a>
                                </div>
                                <div class="product-meta-wrapper col-md-18">
                                  <h3 class="heading-title product-title">
                                    <span class="lb_hot label_title">hot</span>
                                    <a href="{{ route('productDetails', $item->id) }}">{{$item->name}}</a>
                                  </h3>
                                  <div class="wd_product_categories">
                                    <span>লেখক : </span>
                                      @php
                                          $writerIds = explode(',', $item->writer_id);
                                      @endphp

                                      @foreach ($writerIds as $index => $writerId)
                                          <a href="{{route('filterProduct',['type' => 'book', 'writer' => $writerId])}}">{{ getArrayData($libWriters, $writerId) }}</a>
                                          @if($index < count($writerIds) - 1)
                                              ,
                                          @endif
                                      @endforeach
                                  </div>
                                  <div class="wd_product_categories">
                                    <span>প্রকাশনী : </span>
                                    @php
                                      $publisherIds = explode(',', $product->publisher_id);
                                    @endphp

                                    @foreach ($publisherIds as $index => $publisherId)
                                      <a href="{{route('filterProduct',['type' => 'book', 'publisher' => $publisherId])}}">{{ getArrayData($libPublishers, $publisherId) }}</a>
                                      @if($index < count($publisherIds) - 1)
                                          ,
                                      @endif
                                    @endforeach
                                  </div>


                                  @if($item->is_size_wise_price == '0')
                                    <span class="price">
                                      @if(isOffer($item))
                                        <del aria-hidden="true">
                                          <span class="woocommerce-Price-amount amount">
                                            <bdi>{{$item->price}}&nbsp; <span class="woocommerce-Price-currencySymbol">৳</span></bdi>
                                          </span>
                                        </del>
                                      @endif
                                      <ins>
                                        <span class="woocommerce-Price-amount amount">
                                          <bdi>{{isOffer($item) ? $item->offer_price : $item->price}}<span class="woocommerce-Price-currencySymbol">৳</span></bdi>
                                        </span>
                                      </ins>
                                    </span>
                                  @endif


                                  @if($item->is_size_wise_price == '1')
                                    @php
                                      $minSize = getMinAmountSize($item->id);
                                      $maxSize = getMaxAmountSize($item->id);
                                    @endphp
                                    <span class="price">
                                      <span class="woocommerce-Price-amount amount">
                                        @if($minSize)
                                          @if(isOffer($minSize))
                                            <del aria-hidden="true">
                                              <span class="woocommerce-Price-amount amount">
                                                <bdi>{{$minSize->price}}&nbsp; <span class="woocommerce-Price-currencySymbol">৳</span></bdi>
                                              </span>
                                            </del>
                                          @endif
                                          <bdi>{{isOffer($minSize) ? $minSize->offer_price : $minSize->price}}&nbsp;
                                            <span class="woocommerce-Price-currencySymbol">৳</span>
                                          </bdi>
                                        @endif
                                      </span> 
                                      – 
                                      <span class="woocommerce-Price-amount amount">
                                        @if($maxSize)
                                          @if(isOffer($maxSize))
                                            <del aria-hidden="true">
                                              <span class="woocommerce-Price-amount amount">
                                                <bdi>{{$maxSize->price}}&nbsp; <span class="woocommerce-Price-currencySymbol">৳</span></bdi>
                                              </span>
                                            </del>
                                          @endif
                                          <bdi>{{isOffer($maxSize) ? $maxSize->offer_price : $maxSize->price}}&nbsp;
                                            <span class="woocommerce-Price-currencySymbol">৳</span>
                                          </bdi>
                                        @endif
                                      </span>
                                    </span>
                                  @endif





                                  <div class="loop-short-description"> হালাল পন্থায় অঢেল সম্পদ গড়ে তোলার ... </div>
                                  <div class="list_add_to_cart_wrapper">
                                    <div class="list_add_to_cart">
                                      <a rel="nofollow" href="1099604221d.html?add-to-cart=388111" data-quantity="1" data-product_id="388111" data-product_sku class="button product_type_simple add_to_cart_button ajax_add_to_cart">অর্ডার করুন</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      @elseif($item->is_book_or_product=='2')
                        <div class="product_per_slide">
                          <ul class="products">
                            <li class="product">
                              <div class="product_item_wrapper">
                                <div class="product_thumbnail_wrapper col-md-6">
                                  <a class="thumbnail" href="javascript:void(0)">
                                    <div class="product_label">
                                      <span class="featured product_label">Feature</span>
                                    </div>
                                    <img width="192" height="254" src="{{ asset('frontend/product_images/'.$item->image) }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="attar polo blue" decoding="async" loading="lazy">
                                  </a>
                                </div>
                                <div class="product-meta-wrapper col-md-18">
                                  <h3 class="heading-title product-title">
                                    <span class="lb_feature label_title">feature</span>
                                    <a href="{{ route('productDetails', $item->id) }}">{{$item->name}}</a>
                                  </h3>
                                  <div class="wd_product_categories"></div>
                                  <div class="wd_product_categories"></div>




                                  @if($item->is_size_wise_price == '0')
                                    <span class="price">
                                      @if(isOffer($item))
                                        <del aria-hidden="true">
                                          <span class="woocommerce-Price-amount amount">
                                            <bdi>{{$item->price}}&nbsp; <span class="woocommerce-Price-currencySymbol">৳</span></bdi>
                                          </span>
                                        </del>
                                      @endif
                                      <ins>
                                        <span class="woocommerce-Price-amount amount">
                                          <bdi>{{isOffer($item) ? $item->offer_price : $item->price}}<span class="woocommerce-Price-currencySymbol">৳</span></bdi>
                                        </span>
                                      </ins>
                                    </span>
                                  @endif


                                  @if($item->is_size_wise_price == '1')
                                    @php
                                      $minSize = getMinAmountSize($item->id);
                                      $maxSize = getMaxAmountSize($item->id);
                                    @endphp
                                    <span class="price">
                                      <span class="woocommerce-Price-amount amount">
                                        @if($minSize)
                                          @if(isOffer($minSize))
                                            <del aria-hidden="true">
                                              <span class="woocommerce-Price-amount amount">
                                                <bdi>{{$minSize->price}}&nbsp; <span class="woocommerce-Price-currencySymbol">৳</span></bdi>
                                              </span>
                                            </del>
                                          @endif
                                          <bdi>{{isOffer($minSize) ? $minSize->offer_price : $minSize->price}}&nbsp;
                                            <span class="woocommerce-Price-currencySymbol">৳</span>
                                          </bdi>
                                        @endif
                                      </span> 
                                      – 
                                      <span class="woocommerce-Price-amount amount">
                                        @if($maxSize)
                                          @if(isOffer($maxSize))
                                            <del aria-hidden="true">
                                              <span class="woocommerce-Price-amount amount">
                                                <bdi>{{$maxSize->price}}&nbsp; <span class="woocommerce-Price-currencySymbol">৳</span></bdi>
                                              </span>
                                            </del>
                                          @endif
                                          <bdi>{{isOffer($maxSize) ? $maxSize->offer_price : $maxSize->price}}&nbsp;
                                            <span class="woocommerce-Price-currencySymbol">৳</span>
                                          </bdi>
                                        @endif
                                      </span>
                                    </span>
                                  @endif




                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      @endif

                    @endforeach
                  </div>
                </div>
                <div class="clear"></div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>













<div id="extra-add-product-popup" class="modal fade" tabindex="-1" role="dialog" style="display: none;" aria-hidden="false">
  <div class="modal-dialog body-wrapper" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <img src="{{asset('frontend/images/cart.png')}}">
        <span class="title">আপনি শপিং কার্টে একটি নতুন পণ্য যুক্ত করেছেন</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="add_to_cart_popup_upper" style="opacity: 1;">
          <div class="add_to_cart_popup_upper_header">
            <div id="added_product">পণ্যের নাম: <span id="added_product_name"></span>
            </div>
          </div>
          <div class="add_to_cart_popup_upper_body">
            <div class="row">
              <div id="popup_cart_info" class="col-sm-10">
                <div class="cart_info">
                  <span id="cart_total_item"></span>
                  <br>
                  <span>
                    <small class="total_label" id="is_discount_on_cart">
                      <span class="woocommerce-Price-amount amount" id="cart_normal_price"></span> <span class="woocommerce-Price-currencySymbol">৳</span>
                    </small>
                    <span class="woocommerce-Price-amount amount" id="cart_currect_price"></span> <span class="woocommerce-Price-currencySymbol">৳</span>
                  </span>
                </div>
              </div>
              <div id="proceed_to_checkout" class="col-sm-14 text-center">
                <a style="width:180px" href="{{route('checkout')}}" title="checkout" class="button checkout-link">
                  <span>অর্ডার সম্পন্ন করুন</span>
                </a>
                <a style="width:156px" data-dismiss="modal" href="/cart/" class="button buy-more">
                  <span>আরো কিনুন</span>
                </a>
                <br>
                <br>
                <a style="font-weight:bold;font-size:14px;text-decoration:underline" href="/cart/">
                  <span>শপিং ব্যাগ</span>
                </a>
              </div>
            </div>
          </div>
          <div style="color:#2D3047;margin-top:10px;text-align:center;font-weight:600" id="cart_discount_show"></div>
        </div>
        <div class="cross-sell">
          <div>
            <div class="woocommerce columns-3 ">
              <ul class="products owl-carousel owl-theme owl-loaded">
                <div class="owl-stage-outer">
                  <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all; width: 1276px;">
                    
                  @foreach ($relatedProduct as $item)
                    @if($loop->index > 3 ) @break @endif
                    <div class="owl-item" style="width: 159.5px; margin-right: 0px;">
                      <li class="last col-sm-8 product post-606706 type-product status-publish has-post-thumbnail product_cat-flash-sale product_cat-winter-fest product_cat-1024 product_cat-wafi-publication product_cat-newly-published-ebooks product_cat-1272 product_cat-best-selling-books product_cat-boishakhi-offer product_cat-morsheda-qaiyumi product_cat-boimela-bestseller product_cat-shawwal-special product_shipping_class-default-class first instock sale featured shipping-taxable purchasable product-type-simple">
                        <a href="javascript:void(0)" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"></a>
                        <div class="product_item_wrapper">
                          <a href="javascript:void(0)" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"></a>
                          <div class="product_thumbnail_wrapper">
                            <a href="javascript:void(0)" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"></a>
                            <a href="{{ route('productDetails', $item->id) }}">
                            @if(isOffer($item))
                              <div class="product_label" style="display: block !important;">
                                <span class="onsale show_off product_label" style="display: block !important; text-transform: unset; "> {{getOfferParcent($product)}}% <br>ছাড় </span>
                              </div>
                            @endif
                              <div class="product_label">
                                <span class="onsale show_off product_label">Save off <span class="off_number">-৳57</span>
                                </span>
                                <span class="featured product_label">Feature</span>
                              </div>
                              <div class="product-image-front">
                                <img width="192" height="254" src="{{asset('frontend/product_images/'.$item->image)}}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="মেঘলা মেয়ে" decoding="async" loading="lazy">
                              </div>
                            </a>
                            <!--<h3></h3>-->
                          </div>
                          <div class="product-meta-wrapper">
                            <div class="wd_product_categories">
                              <span>Categories : </span>
                             
                            </div>
                            <h3 class="heading-title product-title">
                              <span class="lb_hot label_title">hot</span>
                              <a href="javascript:void(0)">মেঘলা মেয়ে</a>
                            </h3>
                            <div class="wd_product_categories">
                              <span>লেখক : </span>
                              <a href="javascript:void(0)">মোরশেদা কাইয়ুমী</a>
                            </div>
                            <span class="price">
                              <del aria-hidden="true">
                                <span class="woocommerce-Price-amount amount">
                                  <bdi>212&nbsp; <span class="woocommerce-Price-currencySymbol">৳</span>
                                  </bdi>
                                </span>
                              </del>
                              <ins>
                                <span class="woocommerce-Price-amount amount">
                                  <bdi>155&nbsp; <span class="woocommerce-Price-currencySymbol">৳</span>
                                  </bdi>
                                </span>
                              </ins>
                            </span>
                            <span class="product_sku"></span>
                            <div class="loop-short-description"> ছোটবেলা থেকেই দাদা-দাদুর আদর পায়নি আদ্রি—সে ... </div>
                            <div class="list_add_to_cart_wrapper">
                              <div class="list_add_to_cart">
                                <a rel="nofollow" href="?add-to-cart=606706" data-quantity="1" data-product_id="606706" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart">অর্ডার করুন</a>
                              </div>
                              <span class="review_count">
                                <span>17</span> পাঠক অথবা ক্রেতাদের মন্তব্য </span>
                              <div class="star-rating" title="Rated 4.47 out of 5">
                                <span style="height:89.4%">
                                  <strong class="rating">4.47</strong> out of 5 </span>
                              </div>
                            </div>
                          </div>
                          <input type="hidden" value="606706" class="hidden_product_id product_hidden_606706">
                        </div>
                      </li>
                    </div>
                  @endforeach
                  </div>
                </div>
                <div class="owl-controls" style="display: none;">
                  <div class="owl-nav">
                    <div class="owl-prev disabled" style="">&lt;</div>
                    <div class="owl-next" style="">&gt;</div>
                  </div>
                  <div style="display: none;" class="owl-dots"></div>
                </div>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
      function setProductSize(ele){
        var size = ele.value;
        var eles = document.getElementsByClassName("sizeWisePrice");
        for(var i=0; i<eles.length; i++){
          eles[i].style.display = "none";
        }
        if(document.getElementById("sizeWisePrice_"+size)){
          document.getElementById("sizeWisePrice_"+size).style.display = "";
        }
        if(size >=1 ){
          document.getElementById("add_to_cart_btn").disabled = false;
          document.getElementById("cler_size_btn").style.display = "";
        }else{
          document.getElementById("add_to_cart_btn").disabled = true;
          document.getElementById("cler_size_btn").style.display = "none";
        }
      }

      function clearSize(){
        document.getElementById("sizes").value = "";
        setProductSize(document.getElementById("sizes"));
      }

      function addTocart(){
        var product_id = {{$product->id}};
        var quantity = document.getElementById("product_quantity").value;
        var size_id = null;
        if(document.getElementById("sizes")){
          size_id = document.getElementById("sizes").value;
        }
        fetch('{{ route('add_to_cart') }}', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: JSON.stringify({ product_id, size_id, quantity })
        }).then(res => res.json())
        .then(data => {
          if(data.result == 'success'){
              $('#extra-add-product-popup').modal('show');
              document.getElementById("added_product_name").innerHTML = data.cart_data.product_name;
              document.getElementById("cart_total_item").innerHTML = data.cart_data.totalItem+" items";
              document.getElementById("cart_normal_price").innerHTML = data.cart_data.normalPrice;
              document.getElementById("cart_currect_price").innerHTML = data.cart_data.currectPrice;
              document.getElementById("cart_discount_show").innerHTML = `আপনি ইতিমধ্যে ডিসকাউন্ট পেয়েছেন ${data.cart_data.discount} টাকা`;
              if(data.cart_data.is_discount == true){
                document.getElementById("is_discount_on_cart").style.display = "";
                document.getElementById("cart_discount_show").style.display = "";
              }
                
              else{
                document.getElementById("is_discount_on_cart").style.display = "none";
                document.getElementById("cart_discount_show").style.display = "none";
              }

              document.getElementById("mini_cart_value").innerHTML = `${ data.cart_data.currectPrice} ৳`;
              document.getElementById("mini_cart_view").innerHTML = data.cart_data.cart;

            }
        })
      }
  </script>

@endsection


