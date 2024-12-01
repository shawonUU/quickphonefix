@extends('frontend.layouts.app') 
@section('content')

<div class="content container-fluid">
					<div class="card mb-0">
						<div class="card-body">
							<!-- Page Header -->
							<div class="page-header">
								<div class="content-page-header">
									<h5>Update Service</h5>
								</div>	
							</div>
							<!-- /Page Header -->				
							<div class="row">
								<div class="col-md-12">
									<form action="{{route('service.update', $service->id)}}" method="post">
                                        @method('PUT')
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
														<input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ $service->name }}" required>
													</div>
												</div>
												<div class="col-lg-4 col-md-6 col-sm-12">
													<div class="input-block mb-3">
														<label>Phone<span class="text-danger">*</span> </label>
														<input type="text"  class="form-control" placeholder="Phone Number" name="phone" value="{{ $service->phone }}" required>
													</div>
												</div>
												<div class="col-lg-4 col-md-6 col-sm-12">
													<div class="input-block mb-3 " >
														<label>Email </label>
														<input type="email" name="email" class="form-control" placeholder="Enter Email Address" value="{{ $service->email }}">
													</div>											
												</div>

                                                <div class="col-lg-4 col-md-6 col-sm-12">
													<div class="input-block mb-3">
														<label>Address <span class="text-danger">*</span></label>
														<textarea type="text"  class="form-control" placeholder="Address" name="address" required>{{ $service->address }}</textarea>
													</div>
												</div>

                                                <div class="col-lg-4 col-md-6 col-sm-12">
													<div class="input-block mb-3">
														<label>Product Name <span class="text-danger">*</span></label>
														<input type="text"  class="form-control" placeholder="Product Name" name="product_name" value="{{ $service->product_name }}" required>
													</div>
												</div>

                                                <div class="col-lg-4 col-md-6 col-sm-12">
													<div class="input-block mb-3">
														<label>Product EMEI or Serial number <span class="text-danger">*</span></label>
														<input type="text"  class="form-control" placeholder="Product EMEI or Serial number" name="product_number" value="{{ $service->product_number }}" required>
													</div>
												</div>

                                                <div class="col-lg-4 col-md-6 col-sm-12">
													<div class="input-block mb-3">
														<label>Service Details </label>
														<textarea type="text"  class="form-control" placeholder="Service Details" name="details" >{{ $service->details }}</textarea>
													</div>
												</div>

                                                <div class="col-lg-4 col-md-6 col-sm-12">
													<div class="input-block mb-3">
														<label>Bill <span class="text-danger">*</span></label>
                                                        <input type="text"  class="form-control" placeholder="Bill" name="bill" value="{{ $service->bill }}" required>
													</div>
												</div>

                                                <div class="col-lg-4 col-md-6 col-sm-12">
													<div class="input-block mb-3">
														<label>Warranty Duration (In days) <span class="text-danger">*</span></label>
                                                        <input type="number"  class="form-control" placeholder="Warranty Duration" name="warranty_duration" value="{{ $service->warranty_duration }}">
													</div>
												</div>

                                                <div class="col-lg-4 col-md-6 col-sm-12">
													<div class="input-block mb-3">
														<label>Repaired By <span class="text-danger">*</span></label>
                                                        <Select class="form-select" name="repaired_by" required>
                                                            <option value="">--Select--</option>
                                                            @foreach ($serviceMans as $key =>  $user)
															<option value="{{$key}}" {{ $service->repaired_by == $key ? 'selected' : '' }}>{{$user}}</option>
                                                            @endforeach
                                                        </Select>
													</div>
												</div>
												
												
											</div>
										</div>
																	
										<div class="add-customer-btns text-end">
											<button type="submit" class="btn customer-btn-save">Update</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

@endsection