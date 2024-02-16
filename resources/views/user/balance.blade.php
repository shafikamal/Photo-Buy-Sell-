@extends('layouts.userMaster')

@section('content')
    <!-- DataTales Example -->
    <div class="card-header py-3">
        <h2 class="text-justify">Balance : {{ $balance }}$</h2 class="text-justify">
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Photo Gallery History</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Buy-Out Date</th>
                        <th>Image Name</th>
                        <th>Image</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    @foreach($photos as $key=> $photo)
                    <tbody>
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ \Carbon\Carbon::parse($photo->buyOut_date)->diffForHumans() }}</td>
                        <td>{{ $photo->name }}</td>
                        <td> <img height="70px" width="70px" src="{{asset('Photos'.'/'.$photo->image )}}"></td>
                        <td>{{$photo->rate}}</td>
                    </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
