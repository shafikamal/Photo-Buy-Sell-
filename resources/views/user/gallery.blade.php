@extends('layouts.userMaster')

@section('content')

    <div class="row">
        @foreach($photos as $photo)
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" height="250px" width="150px" src="{{ asset('photos').'/'.$photo->image }}" alt="Card image cap">
        <div class="card-body">
            <p class="card-text">{{ $photo->name }}</p>
            <span> Status: {{ucfirst($photo->status)  }}</span>
            @if($photo->status == 'approved')
                <a class="btn btn-primary" href="{{ url('image/approve',[$photo->id,'selling']) }}">Submit for Sell</a>
            @endif
        </div>
    </div>
        @endforeach
    </div>
@endsection
