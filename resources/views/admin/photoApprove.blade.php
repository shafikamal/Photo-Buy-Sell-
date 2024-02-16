@extends('layouts.adminMaster')

@push('css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pending Photo Gallery</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Sl No.</th>
                        <th>Upload Date</th>
                        <th>User name</th>
                        <th>Image Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    @foreach($photos as $key=>$photo)
                    <tbody>
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ \Carbon\Carbon::parse($photo->created_at)->diffForHumans() }}</td>
                        <td>{{ $photo->user->username }}</td>
                        <td> {{ $photo->name }} </td>
                        <td> <img height="50px" width="50px" src="{{ asset('Photos'.'/'.$photo->image) }}"> </td>
                        <td><a class="btn btn-success" href="{{ url('approve/status',[$photo->id,'approved']) }}">Approve</a> |
                            <a class="btn btn-danger" href="{{ route('admin.updateStatus',[$photo->id,'rejected']) }}">Decline</a>
                        </td>

                    </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <!-- Page level plugins -->
    <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>
@endpush
