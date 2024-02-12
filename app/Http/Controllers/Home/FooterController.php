<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function FooterAll(){
         $allfooter = Footer::find(1);
         return view('admin.footer.footer_all', compact('allfooter'));
    } // end method

    public function UpdateFooter(Request $request){

        $footer_id = $request->id;
        Footer::findOrFail($footer_id)->updated([
            'number' => $request->number,
            'short_desc' => $request->short_desc,
            'address' => $request->address,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,

        ]);

        $notification = array(
            'message' => 'Footer Page Updated Successfully' ,
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);

    } // end method
}
