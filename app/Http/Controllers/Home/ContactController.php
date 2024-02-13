<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon\Carbon;


class ContactController extends Controller
{
     public function Contact(){
      return view('website.contact');

     } // end method

     public function StoreMessage(Request $request){
        Contact::insert([
            'name' => $request->name,
            'email' => $request->name,
            'subject' => $request->name,
            'phone' => $request->name,
            'message' => $request->name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Your Message Submited Successfully',
            'alret-type' => 'success',
        );

        return redirect()->back()->with($notification);
     } // end method

     public function ContactAll(){
        $contacts = Contact::latest()->get();
        return view('admin.contact.contactall', compact('contacts'));
     } // end method

     public function DeleteContact($id){
        Contact::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Your Message Deleted Successfully',
            'alret-type' => 'success',
        );
        return redirect()->back()->with($notification);
     } // end method
}
