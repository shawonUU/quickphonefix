@extends('frontend.layouts.app')

@section('content')
<div class="content container-fluid">

           <!-- Page Header -->
					<div class="page-header">
						<div class="content-page-header">
							<h5>Role List</h5>
						</div>	
					</div>
					<!-- /Page Header -->

            <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    @if(session('sweet_alert'))
                        <script>
                            Swal.fire({
                                icon: '{{ session('sweet_alert.type') }}',
                                title: '{{ session('sweet_alert.title') }}',
                                text: '{{ session('sweet_alert.text') }}',
                            });
                        </script>
                    @endif

                    <div class="card-header align-items-center d-flex">
                      <h4 class="card-title mb-0 flex-grow-1"></h4>
                      <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <a href="{{ route('role.create') }}" class="btn btn-info">Create Role</a>
                        </div>
                      </div>
                    </div>
                    <!-- end card header -->
                    <div class="card-body">
                      <div class="live-preview">
                        <div class="row gy-4">
                            <table class="table" id="dataTbl">
                                <thead>
                                  <tr>
                                    <th>SL</th>                                                                      
                                    <th>Name</th>                                    
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>                                    
                                    <td>{{ $item->name }}</td>                     
                                      <td><button type="button" class="btn btn-sm btn-primary waves-effect waves-light"><a href="{{ route('role.edit',$item->id) }}"><i class="fe fe-edit" style="color: #fff"></i></a></button>| <button type="button" data-bs-toggle="modal" data-bs-target="#myModal{{ $item->id }}" class="btn btn-sm btn-danger waves-effect waves-light"><i class="fe fe-trash-2"></i></button>                                      
                                    </td>
                                    <!-- Default Modals -->
                                    <div id="myModal{{ $item->id }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                </div>
                                                <div class="modal-body">
                                                  Are you sure you want to delete this Role:
                                                  <strong
                                                      style="color: darkorange">{{ $item->name }}</strong>
                                                  ?
                                                </div>
                                                <div class="modal-footer">

                                                    <form
                                                        action="{{ route('role.destroy',$item->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-default">Delete</button>

                                                    </form>
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                </div>

                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                  </tr>
                                @endforeach
                                </tbody>
                              </table>
                        </div>
                        <!--end row-->
                      </div>
                    </div>
                  </div>
                </div>
                <!--end col-->
              </div>

        <!-- container-fluid -->
    </div>

@section('script')

@endsection
@endsection
