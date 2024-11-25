@extends('frontend.layouts.app')
@section('content')
<div id="main-module-container">
  <div class="slideshow-wrapper main-slideshow wd_wide" style="min-height: 48px;">
    <div class="slideshow-sub-wrapper"></div>
  </div>
  <div class="breadcrumb-title-wrapper">
    <div class="breadcrumb-title">
      <!-- <h1 class="heading-title page-title">বই</h1> -->
    </div>
  </div>
  <div id="container" class="page-template default-template wd_wide">
    <div id="content" class="container" role="main">
      <div id="main">
        <div id="container-main" class="col-sm-24">
          <div class="main-content">
            <article id="post-23109" class="post-23109 page type-page status-publish hentry">
              <div class="entry-content-post">
                <div class="cls_results">
                  <div class="wdm_resultContainer">
                    <div class="wdm_list">
                      <div id="res_facets">
                        <div>
                          <label class="wdm_label"></label>
                          <input type="hidden" name="sel_fac_field" id="sel_fac_field" data-wpsolr-facets-selected="">
                          <div class="wdm_ul" id="wpsolr_section_facets">
                            <div class="select_opt " id="wpsolr_remove_facets"></div>
                            <ul>
                              <ul>

                              @if($filter_type == "product")
                                <li>
                                  <div style="border-bottom: solid 2px;" class="solar-title">
                                    <a style="float:left;font-size:18px;line-height:25px;text-decoration: none;display:block" class="facet-label" href="javascript:void(0);">Category</a>
                                    <a class="facet" href="javascript:void(0);">
                                      <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    </a>
                                  </div>
                                  <ul>
                                    @foreach($lib_category as $key => $name)
                                    <li>
                                      <div onclick="checkedOption(this)" data-name="category" class="select_opt wpsolr_facet_checkbox {{in_array($key,$category) ? 'checked' : ''}} category" id="category_{{$key}}" data-id="{{$key}}">{{$name}}</div>
                                    </li>
                                    @endforeach
                                  </ul>
                                </li>
                                <li>
                                  <div style="border-bottom: solid 2px;" class="solar-title">
                                    <a style="float:left;font-size:18px;line-height:25px;text-decoration: none;display:block" class="facet-label" href="javascript:void(0);">Brand</a>
                                    <a class="facet" href="javascript:void(0);">
                                      <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    </a>
                                  </div>
                                  <ul>
                                    @foreach($lib_brand as $key => $name)
                                    <li>
                                      <div onclick="checkedOption(this)" data-name="brand" class="select_opt wpsolr_facet_checkbox {{in_array($key,$brand) ? 'checked' : ''}} brand" id="brand_{{$key}}" data-id="{{$key}}">{{$name}}</div>
                                    </li>
                                    @endforeach
                                  </ul>
                                </li>
                                @endif

                                @if($filter_type == "book")
                                  <li>
                                    <div style="border-bottom: solid 2px;" class="solar-title">
                                      <a style="float:left;font-size:18px;line-height:25px;text-decoration: none;display:block" class="facet-label" href="javascript:void(0);">Category</a>
                                      <a class="facet" href="javascript:void(0);">
                                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                                      </a>
                                    </div>
                                    <ul>
                                      @foreach($lib_book_category as $key => $name)
                                      <li>
                                        <div onclick="checkedOption(this)" data-name="category" class="select_opt wpsolr_facet_checkbox {{in_array($key,$category) ? 'checked' : ''}} category" id="category_{{$key}}" data-id="{{$key}}">{{$name}}</div>
                                      </li>
                                      @endforeach
                                    </ul>
                                  </li>
                                  <li>
                                    <div style="border-bottom: solid 2px;" class="solar-title">
                                      <a style="float:left;font-size:18px;line-height:25px;text-decoration: none;display:block" class="facet-label" href="javascript:void(0);">Publisher</a>
                                      <a class="facet" href="javascript:void(0);">
                                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                                      </a>
                                    </div>
                                    <ul>
                                      @foreach($lib_publisher as $key => $name)
                                      <li>
                                        <div onclick="checkedOption(this)" data-name="publisher" class="select_opt wpsolr_facet_checkbox {{in_array($key,$publisher) ? 'checked' : ''}} publisher" id="publisher_{{$key}}" data-id="{{$key}}">{{$name}}</div>
                                      </li>
                                      @endforeach
                                    </ul>
                                  </li>

                                  <li>
                                    <div style="border-bottom: solid 2px;" class="solar-title">
                                      <a style="float:left;font-size:18px;line-height:25px;text-decoration: none;display:block" class="facet-label" href="javascript:void(0);">Writer</a>
                                      <a class="facet" href="javascript:void(0);">
                                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                                      </a>
                                    </div>
                                    <ul>
                                      @foreach($lib_writer as $key => $name)
                                      <li>
                                        <div onclick="checkedOption(this)" data-name="writer" class="select_opt wpsolr_facet_checkbox {{in_array($key,$writer) ? 'checked' : ''}} writer" id="writer_{{$key}}" data-id="{{$key}}">{{$name}}</div>
                                      </li>
                                      @endforeach
                                    </ul>
                                  </li>

                                  <li>
                                    <div style="border-bottom: solid 2px;" class="solar-title">
                                      <a style="float:left;font-size:18px;line-height:25px;text-decoration: none;display:block" class="facet-label" href="javascript:void(0);">Subject</a>
                                      <a class="facet" href="javascript:void(0);">
                                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                                      </a>
                                    </div>
                                    <ul>
                                      @foreach($lib_subject as $key => $name)
                                      <li>
                                        <div onclick="checkedOption(this)" data-name="subject" class="select_opt wpsolr_facet_checkbox {{in_array($key,$subject) ? 'checked' : ''}} subject" id="subject_{{$key}}" data-id="{{$key}}">{{$name}}</div>
                                      </li>
                                      @endforeach
                                    </ul>
                                  </li>
                                @endif

                              </ul>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="wdm_results woocommerce" id="filteredProduct">
                      
                    </div>
                  </div>
                  <div style="clear:both;"></div>
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


<script>
  filterProduct();

  function checkedOption(ele){
    var name = ele.dataset.name;
    var eles = document.getElementsByClassName(name);
    if(ele.classList.contains('checked')){ele.classList.remove('checked'); filterProduct(); return;}
    for(var i=0; i<eles.length; i++){
      eles[i].classList.remove('checked');
    }
    ele.classList.add('checked');

    filterProduct();
  }


  function filterProduct(page = 1){

    var category = [];
    var brand = [];
    var publisher = [];
    var writer = [];
    var subject = [];
    var sort_by = 1;

    var eles = document.getElementsByClassName('category');
    for(var i=0; i<eles.length; i++){
      if(eles[i].classList.contains('checked')){
        category.push(eles[i].dataset.id);
      }
    }

    var eles = document.getElementsByClassName('brand');
    for(var i=0; i<eles.length; i++){
      if(eles[i].classList.contains('checked')){
        brand.push(eles[i].dataset.id);
      }
    }

    var eles = document.getElementsByClassName('publisher');
    for(var i=0; i<eles.length; i++){
      if(eles[i].classList.contains('checked')){
        publisher.push(eles[i].dataset.id);
      }
    }

    var eles = document.getElementsByClassName('writer');
    for(var i=0; i<eles.length; i++){
      if(eles[i].classList.contains('checked')){
        writer.push(eles[i].dataset.id);
      }
    }

    var eles = document.getElementsByClassName('subject');
    for(var i=0; i<eles.length; i++){
      if(eles[i].classList.contains('checked')){
        subject.push(eles[i].dataset.id);
      }
    }

    if(document.getElementById('sort_by')){
      sort_by = document.getElementById('sort_by').value;
    }

    fetch('{{ route('filter') }}'+`?page=${page}`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      body: JSON.stringify({ category, brand, publisher, writer, subject, sort_by })
    })
    .then(response => {
      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }
      return response.json();
    })
    .then(data => {
      // console.log(data);
      document.getElementById('filteredProduct').innerHTML = data.html;
    })
    .catch(error => {
      console.error('Fetch Error:', error);
    });

    changUrl(category,brand,publisher,writer,subject,sort_by);

  }

  function unchecked(id){
    if(document.getElementById(id)){
      document.getElementById(id).classList.remove('checked');
    }
    filterProduct();
  }

  function changUrl(category,brand,publisher,writer,subject,sort_by) {
      const url = new URL(window.location);

      if(category.length)url.searchParams.set('category', implode(',', category));
      if(brand.length)url.searchParams.set('brand', implode(',', brand));
      if(publisher.length)url.searchParams.set('publisher', implode(',', publisher));
      if(writer.length)url.searchParams.set('writer', implode(',', writer));
      if(subject.length)url.searchParams.set('subject', implode(',', subject));
      if(sort_by)url.searchParams.set('sort_by', sort_by);

      if(!category.length)url.searchParams.delete('category');
      if(!brand.length)url.searchParams.delete('brand');
      if(!publisher.length)url.searchParams.delete('publisher');
      if(!writer.length)url.searchParams.delete('writer');
      if(!subject.length)url.searchParams.delete('subject');

      history.pushState(null, "", url);
  }
</script>

@endsection