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
					<div class="card mb-0">
						<div class="card-body">
							<!-- Page Header -->
							<div class="page-header">
								<div class="content-page-header">
									<h5>Add Sales</h5>
								</div>	
							</div>
							<!-- /Page Header -->				
							<div class="row">
								<div class="col-md-12">
									<form action="{{route('sales.store')}}" method="post">
                                        @csrf
										<div class="form-group-item">
											<h5 class="form-title d-none">Basic Details</h5>
											<div class="profile-picture d-none">
												<div class="upload-profile">
													<div class="profile-img">
														<img id="blah" class="avatar" src="" alt="profile-img">
													</div>
													<div class="add-profile">
														<h5>Upload a New Photo</h5>
														<span id="imageName"></span>
													</div>
												</div>
												<div class="img-upload">
													<label class="btn btn-upload">
														Upload <input type="file">
													</label>
													<a class="btn btn-remove d-none">Remove</a>
												</div>										
											</div>
											<div class="row">
												<div class="col-lg-4 col-md-6 col-sm-12">
													<div class="input-block mb-3">
														<label>Name <span class="text-danger">*</span></label> 
														<input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name') }}" required>
													</div>
												</div>
												<div class="col-lg-4 col-md-6 col-sm-12">
													<div class="input-block mb-3">
														<label>Phone<span class="text-danger">*</span> </label>
														<input type="text"  class="form-control" placeholder="Phone Number" name="phone" value="{{ old('phone') }}" required>
													</div>
												</div>
												<div class="col-lg-4 col-md-6 col-sm-12">
													<div class="input-block mb-3 " >
														<label>Email </label>
														<input type="email" name="email" class="form-control" placeholder="Enter Email Address" value="{{ old('email') }}">
													</div>											
												</div>

                                                <div class="col-lg-4 col-md-6 col-sm-12">
													<div class="input-block mb-3">
														<label>Address </label>
														<textarea type="text"  class="form-control" placeholder="Address" name="address">{{ old('address') }}</textarea>
													</div>
												</div>

                                                <div class="col-lg-4 col-md-6 col-sm-12">
													<div class="input-block mb-3">
														<label>Product Name <span class="text-danger">*</span></label>
														<!-- <input type="text"  class="form-control" placeholder="Product Name" name="product_name" value="{{ old('product_name') }}" required> -->
														 <select name="product_name" id="" class="form-control js-example-basic-single" required>
															@foreach ($products as $product)
																<option value="{{$product->id}}" {{ old('product_name') ==  $product->id ? 'selected' : ''}}>{{$product->name}}</option>
															@endforeach
														 </select>
													</div>
												</div>

                                            
                                                <div class="col-lg-4 col-md-6 col-sm-12">
													<div class="input-block mb-3">
														<label>Price <span class="text-danger">*</span></label>
                                                        <input onchange="getTotal()"  type="number"  class="form-control" placeholder="Price" id="price" name="price" value="{{ old('price') }}" required>
													</div>
												</div>

                                                <div class="col-lg-4 col-md-6 col-sm-12">
													<div class="input-block mb-3">
														<label>Qty <span class="text-danger">*</span></label>
                                                        <input onchange="getTotal()" type="number"  class="form-control" placeholder="Qty" id="qty" name="qty" value="{{ old('qty') }}" required>
													</div>
												</div>

                                                <div class="col-lg-4 col-md-6 col-sm-12">
													<div class="input-block mb-3">
														<label>Total </label>
                                                        <input id="total" type="number"  class="form-control" readonly>
													</div>
												</div>

												<div class="col-lg-4 col-md-6 col-sm-12">
													<div class="input-block mb-3">
														<label>Paid Amount</label>
                                                        <input onchange="calculateDue()" type="number"  class="form-control" placeholder="Paid Amount" id="paid_amount" name="paid_amount" value="{{ old('paid_amount') }}" >
													</div>
												</div>

												<div class="col-lg-4 col-md-6 col-sm-12">
													<div class="input-block mb-3">
														<label>Due Amount</label>
                                                        <input type="number"  class="form-control" placeholder="Due Amount" id="due_amount" name="due_amount" value="{{ old('due_amount') }}" readonly>
													</div>
												</div>


												<div class="col-lg-4 col-md-6 col-sm-12">
													<div class="input-block mb-3">
														<label>Payment Method <span class="text-danger">*</span></label>
                                                        <Select class="form-select" name="payment_method_id">
                                                            <option value="">--Select--</option>
                                                            @foreach (paymentMethods() as $key => $name)
															<option value="{{$key}}" {{ old('payment_method_id') == $key ? 'selected' : '' }}>{{$name}}</option>
                                                            @endforeach
                                                        </Select>
													</div>
												</div>

											</div>
										</div>
																	
										<div class="add-customer-btns text-left">
											<button type="submit" class="btn customer-btn-save">Submit</button>
										</div>
									</form>
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
  });

  function getTotal(){
    var price = document.getElementById("price").value.trim();
    var qty = document.getElementById("qty").value.trim();
    if(price<0){
        document.getElementById("price").value = 0;
        price = 0;
    }
    if(qty<0){
        document.getElementById("qty").value = 0;
        qty = 0;
    }
    document.getElementById("total").value = price * qty;
	calculateDue();
  }

  function calculateDue(){
	var bill = (document.getElementById("total").value.trim() * 1)??0;
	var paid_amount = (document.getElementById("paid_amount").value.trim() * 1)??0;
	document.getElementById("due_amount").value = Math.max(0, bill-paid_amount);
  }

</script>

@endsection