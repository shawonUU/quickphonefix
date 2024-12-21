@extends('frontend.layouts.app') 
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
	.select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b {
  border-color: transparent transparent #888 transparent;
  border-width: 0 !important;
}

.select2-container--default .select2-selection--single .select2-selection__arrow b {
  border-color: #888 transparent transparent transparent;
  border-style: solid;
  border-width: 0 !important;
  height: 0;
  left: 50%;
  margin-left: -4px;
  margin-top: -2px;
  position: absolute;
  top: 50%;
  width: 0;
}
</style>

<div class="content container-fluid">
  <!-- Page Header -->
  <div class="page-header">
    <div class="content-page-header">
      <h5>Products for {{$type=='1' ? 'Service' : 'Sales'}}</h5>
     
      <div class="list-btn">
        <ul class="filter-list">
          <li>
            <a class="btn btn-primary" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#add-payment-modal">
              <i class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add Product </a>
          </li>
        </ul>

        <div id="add-payment-modal" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center mt-2 mb-4">
                            <div class="auth-logo">
                                <a href="{{ route('index') }}" class="logo logo-dark">
                                    <span class="logo-lg">
                                        <img src="{{asset('assets/img/logo.png')}}" alt="Logo" height="42">
                                    </span>
                                </a>
                            </div>
                        </div>

                        <form class="px-3" method="post" action="{{route('products.store')}}">
                            @csrf
                        
                            <input type="text" name="type" value="{{$type}}" hidden>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                <select name="name" id="name" class="form-control js-example-basic-single" required>
                                    @foreach ($products as $product)
                                        <option value="{{$product->id}}" {{ old('name') ==  $product->id ? 'selected' : ''}}>{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

      </div>
    </div>
  </div>
  <!-- /Page Header -->
  <!-- Search Filter -->
  <div class="row">
    <div class="col-sm-12">
      <div class="card-table">
        <div class="card-body">
          <div class="table-responsive">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
              <table class="table table-center table-hover datatable dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                <thead class="thead-light">
                  <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending">#</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Product Name</th>
                    <th class="no-sort sorting_disabled" rowspan="1" colspan="1" aria-label="Actions">Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                  <tr role="row" class="odd">
                    <td class="sorting_1">{{$loop->index+1}}</td>
                    <td>
                      <span>{{$product->name}}</span>
                    </td>
                    <td class="d-flex align-items-center">
                      <div class="dropdown dropdown-action">
                        <a href="#" class=" btn-action-icon " data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <ul>
                            <li>
                              <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#edit-product-modal{{$product->id}}">
                                <i class="far fa-edit me-2"></i>Edit </a>
                            </li>
                            <li>
                              <a onclick="if (confirm('Are you sure to delete the product?')) { document.getElementById('serviceDelete{{$product->id}}').submit(); }" class="dropdown-item" href="javascript:void(0)">
                                <i class="far fa-edit me-2"></i>Delete </a>
                                <form id="serviceDelete{{$product->id}}" action="{{route('products.destroy', $product->id)}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                </form>
                            </li>
                          </ul>
                          
                        </div>
                      </div>
                    </td>
                    <div id="edit-product-modal{{$product->id}}" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-body">
                                      <div class="text-center mt-2 mb-4">
                                          <div class="auth-logo">
                                              <a href="{{ route('index') }}" class="logo logo-dark">
                                                  <span class="logo-lg">
                                                      <img src="{{asset('assets/img/logo.png')}}" alt="Logo" height="42">
                                                  </span>
                                              </a>
                                          </div>
                                      </div>

                                      <form class="px-3" method="post" action="{{route('products.update', $product->id)}}">
                                          @csrf 
                                          @method('PUT')
                                          <input type="text" name="type" value="{{$type}}" hidden>
                                          <div class="mb-3">
                                              <label for="name{{$product->id}}" class="form-label">Product Name <span class="text-danger">*</span></label>
                                              <select name="name" id="name{{$product->id}}" class="form-control js-example-basic-single" required>
                                                    @foreach ($products as $pro)
                                                        <option value="{{$pro->id}}" {{ strpos($product->name, $pro->name) !== false ? 'selected' : ''}}>{{$pro->name}}</option>
                                                    @endforeach
                                                </select>
                                          </div>
                                          <div class="mb-3">
                                              <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                              <select name="status" id="status" class="form-control">
                                                @foreach (getStatus() as $key => $status )
                                                    <option value="{{$key}}" {{$product->status == '1' ? 'selected' : ''}}>{{$status}}</option>
                                                @endforeach
                                              </select>
                                              
                                          </div>
                                          <div class="mb-3">
                                              <button type="submit" class="btn btn-primary">Submit</button>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                            </div>
                          </div>
                  </tr>
                @endforeach
                </tbody>
              </table>
              
              <div class="dataTables_length" id="DataTables_Table_0_length">
                <label>
                  <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select custom-select-sm form-control form-control-sm">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                  </select>
                </label>
              </div>
              <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                <ul class="pagination">
                  <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous">
                    <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">
                      <i class="fa fa-angle-double-left me-2"></i> Previous </a>
                  </li>
                  <li class="paginate_button page-item active">
                    <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                  </li>
                  <li class="paginate_button page-item next disabled" id="DataTables_Table_0_next">
                    <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">Next <i class=" fa fa-angle-double-right ms-2"></i>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 6 of 6 entries</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
	
    $('.js-example-basic-single').select2({
		tags: true,
	});

    $('.js-example-basic-single').each(function() { 
        $(this).select2({ 
          dropdownParent: $(this).parent(),
          tags: true,
        });
    })
  });
</script>

@endsection