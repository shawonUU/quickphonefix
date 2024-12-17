@extends('frontend.layouts.app') 
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<style>
.select2-container--default .select2-selection--single {
    outline: none;
}

.select2-container .select2-search--inline .select2-search__field {
    outline: none !important;
    border: none;
    box-shadow: none;
    width: 100% !important;
}

</style>

<div class="content container-fluid">
  <!-- Page Header -->
  <div class="page-header">
    <div class="content-page-header">
      <h5>Bookings</h5>
      <div class="list-btn">
        <ul class="filter-list">
          <li class="d-none">
            <a class="btn btn-filters w-auto popup-toggle" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Filter">
              <span class="me-2">
                <img src="assets/img/icons/filter-icon.svg" alt="filter">
              </span>Filter </a>
          </li>
          <li class="d-none">
            <div class="dropdown dropdown-action" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Download">
              <a href="#" class="btn-filters" data-bs-toggle="dropdown" aria-expanded="false">
                <span>
                  <i class="fe fe-download"></i>
                </span>
              </a>
              <div class="dropdown-menu dropdown-menu-end">
                <ul class="d-block">
                  <li>
                    <a class="d-flex align-items-center download-item" href="javascript:void(0);" download="">
                      <i class="far fa-file-pdf me-2"></i>PDF </a>
                  </li>
                  <li>
                    <a class="d-flex align-items-center download-item" href="javascript:void(0);" download="">
                      <i class="far fa-file-text me-2"></i>CVS </a>
                  </li>
                </ul>
              </div>
            </div>
          </li>
          <li class="d-none">
            <a class="btn-filters" href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Print" data-bs-original-title="Print">
              <span>
                <i class="fe fe-printer"></i>
              </span>
            </a>
          </li>
          <li class="d-none">
            <a class="btn btn-import" href="javascript:void(0);">
              <span>
                <i class="fe fe-check-square me-2"></i>Import Customer </span>
            </a>
          </li>
          <li>
            <a class="btn btn-primary d-none" href="{{route('service.create')}}">
              <i class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add Service </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- /Page Header -->
  <!-- Search Filter -->
  <div id="filter_inputs" class="card filter-card">
    <div class="card-body pb-0">
      <div class="row">
        <div class="col-sm-6 col-md-3">
          <div class="input-block mb-3">
            <label>Name</label>
            <input type="text" class="form-control">
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="input-block mb-3">
            <label>Email</label>
            <input type="text" class="form-control">
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="input-block mb-3">
            <label>Phone</label>
            <input type="text" class="form-control">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Search Filter -->
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
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Full Name: activate to sort column ascending">Full Name</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Phone Number: activate to sort column ascending">Phone Number</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Message: activate to sort column ascending">Message</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Message: activate to sort column ascending">Device name</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="EMI/Serial Number: activate to sort column ascending">EMI/Serial Number</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending">Address</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($bookingData as $index => $entry)
                        <tr role="row" class="{{ $loop->odd ? 'odd' : 'even' }}">
                          <td class="sorting_1">{{ $index + 1 }}</td> <!-- Dynamically generating row number -->
                          <td>{{ $entry['full_name'] }}</td>
                          <td>{{ $entry['phone_number'] }}</td>
                          <td>{{ \Illuminate\Support\Str::limit($entry['message'], 20, '...') }}</td>
                          <td>{{ $entry['details'] }}</td>
                          <td>{{ $entry['emi_number_or_serial_number'] }}</td>
                          <td>{{ $entry['address'] }}</td>
                          <td class="d-flex align-items-center">
                            <div class="dropdown dropdown-action">
                              <a href="#" class="btn-action-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-end">
                                <ul>
                                  <li>
                                    <a class="dropdown-item " href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#signup-modal{{ $entry['_ID'] }}">
                                      <i class="far fa-eye me-2"></i>View Details
                                    </a>
                                  </li>
                                  <!-- Add more actions if needed -->
                                </ul>
                              </div>
                            </div>



                            <div id="signup-modal{{ $entry['_ID'] }}" class="modal fade" style="display: none;" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
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

                                          <div class="text-left mt-2 mb-4">
                                              <h4>Add to Service</h4>
                                          </div>

                                          <form class="px-3" action="{{route('service.store')}}" method="post">
                                              @csrf

                                              <div class="row">
                                                <div class="mb-3 col-12 col-md-4">
                                                    <label for="modalFullName" class="form-label">Name<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" id="modalFullName" name="name" placeholder="Enter Name" value="{{ $entry['full_name'] }}" required>
                                                </div>

                                                <div class="mb-3 col-12 col-md-4">
                                                    <label for="modalPhoneNumber" class="form-label">Phone <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" id="modalPhoneNumber" placeholder="Phone Number" name="phone" value="{{ $entry['phone_number'] }}" required>
                                                </div>

                                                <div class="mb-3 col-12 col-md-4">
                                                  <label>Email </label>
                                                  <input type="email" name="email" class="form-control" placeholder="Enter Email Address" value="">
                                                </div>

                                                <div class="mb-3 col-12 col-md-4">
                                                    <label for="modalAddress" class="form-label">Address</label>
                                                    <textarea type="text"  class="form-control" placeholder="Address" id="modalAddress" name="address">{{ $entry['address'] }}</textarea>

                                                </div>

                                                <div class="mb-3 col-12 col-md-4">
                                                  <label>Product Name <span class="text-danger">*</span></label><br>
                                                  <select name="product_name" id="" class="form-control js-example-basic-single" tabindex="0" required>
                                                    <option value="">--select--</option>
                                                    @php
                                                    $entry['details'] = "xyz";
                                                    @endphp
                                                    @foreach ($products as $product)
                                                      <option value="{{$product->id}}" {{ $entry['details'] ==  $product->name ? 'selected' : ''}}>{{$product->name}}</option>
                                                    @endforeach
                                                    

                                                    @if ($entry['details'] != "" && $entry['details'] != null && !in_array($entry['details'], $products->pluck('name')->toArray()))
                                                        <option value="{{ $entry['details'] }}" class="add-new-option" selected>{{ $entry['details'] }}</option>
                                                    @endif
                                                  </select>
                                                </div>

                                                <div class="mb-3 col-12 col-md-4">
                                                    <label for="modalEmiNumber" class="form-label">EMI/Serial Number</label>
                                                    <input type="text"  class="form-control" placeholder="Product EMEI or Serial number" name="product_number" value="{{ $entry['emi_number_or_serial_number'] }}" >
                                                </div>

                                                <div class="mb-3 col-12 col-md-4">
                                                    <label for="modalMessage" class="form-label">Service Details</label>
                                                    <textarea class="form-control" id="modalMessage" name="details" >{{ $entry['message'] }}</textarea>
                                                </div>

                                                <div class="mb-3 col-12 col-md-4">
                                                  <label>Warranty Duration (In days) <span class="text-danger">*</span></label>
                                                  <input type="number"  class="form-control" placeholder="Warranty Duration" name="warranty_duration" value="{{ old('warranty_duration') }}">
                                                </div>

                                                <div class="mb-3 col-12 col-md-4">
                                                  <label>Repaired By <span class="text-danger">*</span></label>
                                                  <Select class="form-select" name="repaired_by" required>
                                                      <option value="">--Select--</option>
                                                      @foreach ($users as $key => $user)
                                                        <option value="{{$key}}" {{ old('repaired_by') == $key ? 'selected' : '' }}>{{$user}}</option>
                                                      @endforeach
                                                  </Select>
                                                </div>

                                                <div class="mb-3 col-12 col-md-4">
                                                  <label>Price <span class="text-danger">*</span></label>
                                                  <input onchange="calculateDue()" type="number"  class="form-control" placeholder="Price" id="bill" name="bill" value="{{ old('bill') }}" required>
                                                </div>

                                                <div class="mb-3 col-12 col-md-4">
                                                  <label>Paid Amount</label>
                                                  <input onchange="calculateDue()" type="number"  class="form-control" placeholder="Paid Amount" id="paid_amount" name="paid_amount" value="{{ old('paid_amount') }}" >
                                                </div>

                                                <div class="mb-3 col-12 col-md-4">
                                                  <label>Due Amount</label>
                                                  <input type="number"  class="form-control" placeholder="Due Amount" id="due_amount" name="due_amount" value="{{ old('due_amount') }}" readonly>
                                                </div>

                                                <div class="mb-3 col-12 col-md-4">
                                                  <label>Payment Method </label>
                                                  <Select class="form-select" name="payment_method_id">
                                                      <option value="">--Select--</option>
                                                      @foreach (paymentMethods() as $key => $name)
                                                      <option value="{{$key}}" {{ old('payment_method_id') == $key ? 'selected' : '' }}>{{$name}}</option>
                                                      @endforeach
                                                  </Select>
                                                </div>

                                                <div class="mb-3 col-12 justify-content-left">
                                                  <button class="btn btn-primary" type="submit">Submit</button>
                                                </div>
                                              </div>
                                             
                                          </form>
                                      </div>
                                  </div>
                              </div>
                            </div>


                          </td>
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

<!-- jQuery (make sure it's loaded before Select2 JS) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
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

  function calculateDue(){
    var bill = (document.getElementById("bill").value.trim() * 1)??0;
    var paid_amount = (document.getElementById("paid_amount").value.trim() * 1)??0;
    
    document.getElementById("due_amount").value = Math.max(0, bill-paid_amount);
  }
</script>

@endsection