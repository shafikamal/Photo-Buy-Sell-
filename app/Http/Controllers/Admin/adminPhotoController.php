<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminPhotoController extends Controller
{
//PHOTO APPROVE PROCESSING
    public function  showPhotoApprove(){
        $photos=Photo::with('user')->where('status','pending')->get();
        return view('admin/photoApprove',compact('photos'));
    }

    public function PhotoApprove($image_id,$status){

        if ($image_id !=null && $status != null){
            $photo=Photo::find($image_id);
            if ($photo != null){
                $photo->update([
                    'status'=>$status,
                    'approve_by'=>$status == 'approved'? Auth::guard('admin')->id():null,
                    'approve_date'=>$status == 'approved'? date('y/m/d H:i:s'):null
                ]);
                return redirect()->back();
            }else{
                return 'Dose not match';
            }
        }else{
            return 'Dose not match';
        }
    }

//PHOTO BUYOUT
    public function showPhotoBuyout(){
        $photos=Photo::with('user')->where('status','selling')->get();
        return view('admin.photoBuyout',compact('photos'));
    }

    public function photoBuyout($image_id){

       $photos= Photo::find($image_id);


       if (\request('selling_status') != null && \request('price') != null){

           $photos->update([
           'status'=>\request('selling_status'),
           'rate'=>\request('selling_status') == 'buyout'? \request('price'):null,
           'buyout_by'=>\request('selling_status') == 'buyout'? Auth::guard('admin')->id():null,
           'buyOut_date'=>\request('selling_status') == 'buyout'? date('y/m/d H:i:s'):null

       ]);

        $user=User::find($photos->user_id) ;
        $userBalance = $user->financial->balance + request('price');

        $user->financial()->update([
            'balance'=>$userBalance

        ]);

        return redirect()->back();
       }else{
           return 'Please Insert All Field';
       }

    }



}
