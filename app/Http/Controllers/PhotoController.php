<?php

namespace App\Http\Controllers;

use App\Models\Financial;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PhotoController extends Controller
{
    public function showPhotoUpload(){
        return view('user.photoUpload');
    }

    public function photoUpload(){
        $imageName=rand().'.'.\request('image')->extension();
        DB::transaction(function () use ($imageName){
            User::find(Auth::id())->photos()->create([
                'name'=>\request('name'),
                'details'=>\request('details'),
                'image'=>$imageName,
                'rate'=>\request('rate')
            ]);
        });

        $this->validate(\request(),[
            'name'=>'required',
            'details'=>'required',
            'image'=>'required|image|mimes:jpg,png,jpeg'
        ]);
        \request('image')->move('Photos',$imageName);
        return redirect(url('gallery'));
    }

    public function showGallery(){
        $photos=Auth::user()->photos()->paginate(10);
        return view('user.gallery',compact('photos'));

    }

//PROCESS FOR SELLING PHOTO
    public function approveImage($image_id,$status){
        $photo=Photo::find($image_id);
        if ($photo != null &&  $photo->status == 'approved' && Auth::id() == $photo->user_id ){
            $photo->update([
                'status'=>$status
            ]);
            return redirect()->back();

        }else{
            return 'Photo Not Approved';
        }
    }

//BALANCE
        public function showBalance(){

            $photos=Auth::user()->photos()->where('status','buyout')->paginate(10);
            $balance=Auth::user()->financial->balance;
            return view('user.balance',compact(['balance','photos']));

        }
}
