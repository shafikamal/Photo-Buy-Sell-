@extends('layouts.userMaster')

@section('slideImage',asset('user/img/about-bg.jpg'))
@section('title','Photo Upload')
@section('titleDetails','This is what I do.')

@section('content')
    @include('error.error')
    <form class="user" method="post" action="" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group ">
            <input style="padding-left: 100px" type="text"  id="exampleFirstName" name="name" placeholder="Image Name" >
        </div>
        <div class="form-group ">
            <input style="padding-left: 100px" type="text"  id="exampleFirstName" name="details" placeholder="Image Details" >
        </div>
        <div class="form-group ">
            <input style="padding-left: 100px" type="number"  id="exampleFirstName" name="rate" placeholder="Image Rate" >
        </div>
        <div class="form-group ">
            <input  type="file"  id="exampleFirstName" name="image" >
        </div>
        <input  class="btn btn-primary " type="submit" name="submit" value="Upload">
    </form>
@endsection
