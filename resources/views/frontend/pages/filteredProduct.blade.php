

    <ul id="remove_filtering_options">
        @foreach ($category as $id)
            <li>
                <div style="float: left; line-height:18px; margin-right: 4px;">{{getArrayData($lib_all_category,$id)}}</div>
                <button onclick="unchecked('category_'+'{{$id}}')" type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </li>
        @endforeach
        @foreach ($brand as $id)
            <li>
                <div style="float: left; line-height:18px; margin-right: 4px;">{{getArrayData($lib_brand,$id)}}</div>
                <button onclick="unchecked('brand_'+'{{$id}}')" type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </li>
        @endforeach

        @foreach ($publisher as $id)
            <li>
                <div style="float: left; line-height:18px; margin-right: 4px;">{{getArrayData($lib_publisher,$id)}}</div>
                <button onclick="unchecked('publisher_'+'{{$id}}')" type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </li>
        @endforeach

        @foreach ($writer as $id)
            <li>
                <div style="float: left; line-height:18px; margin-right: 4px;">{{getArrayData($lib_writer,$id)}}</div>
                <button onclick="unchecked('writer_'+'{{$id}}')" type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </li>
        @endforeach

        @foreach ($subject as $id)
            <li>
                <div style="float: left; line-height:18px; margin-right: 4px;">{{getArrayData($lib_subject,$id)}}</div>
                <button onclick="unchecked('subject_'+'{{$id}}')" type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </li>
        @endforeach
    </ul>

    
        <div class="solr_sorting">
            @if(count($products))
                <div class="res_info">
                    <span class="infor">{{($products->currentPage() - 1) * $products->perPage() + 1}} থেকে {{min($products->currentPage() * $products->perPage(), $products->total())}} দেখাচ্ছে। মোট {{$products->total()}} টি আইটেম পাওয়া গিয়েছে</span>
                </div>
            @else
                <div class="res_info">
                    <span class="infor">কোনো আইটেম পাওয়া যায়নি</span>
                </div>
            @endif
            <div class="sort_products " style="display:none;">
                <div>
                <label class="wdm_label">সর্ট করুন</label>
                <select id="sort_by" onchange="filterProduct()" class="select_field">
                    @foreach (getSortType() as $key => $value)
                    <option value="{{$key}}" {{$sort_by == $key ? 'selected' : ''}}>{{$value}}</option>
                    @endforeach
                </select>
                </div>
            </div>
        </div>
        <div class="loading_res" style="display: none;">
            <img src="">
        </div>
        <div class="results-by-facets" style="display: block;">
            <ul class="products">
                @foreach ($products as $product)
                    <li class="first col-sm-6 product post-1109163 type-product status-publish has-post-thumbnail product_cat-books product_cat-peace-publication product_cat-quran-bishoyok-alochona product_shipping_class-default-class  instock shipping-taxable purchasable product-type-simple">
                        <div class="product_item_wrapper">
                            <div class="product_thumbnail_wrapper">
                            <a href="{{route('productDetails',$product->id)}}">
                                <div class="product_label" style="display: block !important;"></div>
                                <div class="product-image-front">
                                <img src="{{asset('frontend/product_images/'.$product->image)}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="{{$product->name}}" title="{{$product->name}}" srcset="" width="192" height="254">
                                </div>
                            </a>
                            <!--<h3></h3>-->
                            </div>
                            <div class="product-meta-wrapper">
                            <h3 class="heading-title product-title">
                                <a href="{{route('productDetails',$product->id)}}">{{$product->name}}</a>
                            </h3>
                            <div class="wd_product_categories"></div>
                            <span class="price">
                                <span class="woocommerce-Price-amount amount">190৳</span>
                            </span>
                            <div class="list_add_to_cart_wrapper"></div>
                            </div>
                            <input type="hidden" value="1109163" class="hidden_product_id product_hidden_1109163">
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @if(count($products))
        @if($products->lastPage()>1)
        <div class="paginate_div">
            <ul id="pagination-flickr" class="wdm_ul">
                    <li>
                        <a onclick="filterProduct({{$products->currentPage() > 1 ? $products->currentPage()-1  : 1}})" class="paginate" id="2" href="javascript:void(0)">←</a>
                    </li>
                @for($pag=1; $pag <= $products->lastPage(); $pag++)
                    <li class="can-hide">
                        <a onclick="filterProduct({{$pag}})" class="paginate {{$products->currentPage() == $pag ? 'current' : '' }}" href="javascript:void(0)" id="{{$pag}}">{{$pag}}</a>
                    </li>
                @endfor
                    <li>
                        <a onclick="filterProduct({{$products->currentPage() < $products->lastPage() ? $products->currentPage()+1  : $products->lastPage()}})" class="paginate" id="4" href="javascript:void(0)">→</a>
                    </li>
            </ul>
        </div>
        @endif
    @endif