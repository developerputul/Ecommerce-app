<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
 use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function AboutPage()
    {
        $aboutpage = About::find(1);
        return view('admin.about_page.about_page_all', compact('aboutpage'));

    }
    public function UpdateAbout(Request $request)
    {
        $about_id = $request->id;

        $image = $request->file('about_image');
        $hasFile = $request->hasFile('about_image');
        if ($hasFile) {
            $imageName =  hexdec(uniqid()) . '.' . time() . "." . $image->getClientOriginalName();
            $image->move("upadte/about_image/", $imageName);
            $save_url = 'upload/about_image/' . $imageName;


            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                // 'about_image' => $request->save_url,
                'about_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'About Page Updated with Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' => $request->about_image,
                // 'video_url' => $request->video_url,
            ]);

            $notification = array(
                'message' => 'About Page Updated without Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    } //end Methods


}
