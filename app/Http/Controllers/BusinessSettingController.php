<?php

namespace App\Http\Controllers;
use App\Models\{Business,Link,GCashInfo};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BusinessSettingController extends Controller
{
    public function settingInformation(Request $request)
    {
        $validated = $request->validate([
            'image'         => 'nullable|image|file|max:5000',
        ]);
        $business = Business::count();
        if($business == 1){
            $business_data = Business::findorFail($request->business_id);
            if($request->hasFile('image'))
            {
                $location = 'public/business_logo'.$business_data->image;
                if(File::exists($location))
                {
                    File::delete($location);
                }
                $filenameWithExt = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $path = $request->file('image')->storeAs('public/business_logo',$fileNameToStore);
                $business_data->image = $fileNameToStore;
            }
            $business_data->btitle = $request->btitle;
            $business_data->cpnumber = $request->cpnumber;
            $business_data->email = $request->email;
            $business_data->address = $request->address;
            $business_data->update();
            return back()->with('message', 'Successfully Updated Information!');
        }else{
            if($request->hasFile('image')){
                $filenameWithExt = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $path = $request->file('image')->storeAs('public/business_logo',$fileNameToStore);
            }else{
                $fileNameToStore = 'no-image.png';
            }
            $business_data = Business::create([
                'image' => $fileNameToStore,
                'btitle' => $request->btitle,
                'cpnumber' => $request->cpnumber,
                'email' => $request->email,
                'address' => $request->address,
            ]);
            return back()->with('message', 'Successfully Created Information!');
        }
    }

    public function settingLinks(Request $request)
    {
        $link = Link::count();
        if($link == 1){
            $link_data = Link::findorFail($request->link_id);
            $link_data->facebook = $request->facebook;
            $link_data->twitter = $request->twitter;
            $link_data->instagram = $request->instagram;
            $link_data->youtube = $request->youtube;
            $link_data->update();
            return back()->with('message', 'Successfully Updated Links!');
        }else{
            $link_data = Link::create([
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
            ]);
            return back()->with('message', 'Successfully Created Links!');
        }
    }

    public function settingGCash(Request $request)
    {
        $gcash = GCashInfo::count();
        if($gcash == 1){
            $gcash = GCashInfo::findorFail($request->id);
            $gcash->gname = $request->gname;
            $gcash->gnumber = $request->gnumber;
            $gcash->update();
            return back()->with('message', 'Successfully Updated GCash!');
        }else{
            $gcash = GCashInfo::create([
                'gname' => $request->gname,
                'gnumber' => $request->gnumber,
            ]);
            return back()->with('message', 'Successfully Created GCash!');
        }
    }
}
