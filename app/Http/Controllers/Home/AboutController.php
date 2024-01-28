<?php

namespace App\Http\Controllers\Home;

 use App\Http\Controllers\Controller;
 use App\Models\About;
 use App\Models\MultiImage;
use Carbon\Carbon;
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
        if ($hasFile)
         {
            $imageName =  hexdec(uniqid()) . '.' . time() . "." . $image->getClientOriginalName();
            $image->move("upload/about_image/", $imageName);
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
        }else{

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


    public function HomeAbout()
    {
        $aboutpage = About::find(1);
        return view('website.about_page', compact('aboutpage'));

    } //end Methods

    public function AboutMultiImage()
    {
        $multiimage = About::find(1);
        return view('admin.about_page.multiimage',compact('multiimage'));
    } //end Methods

    public function StoreMultiImage(Request $request){

        $multiimage  = $request->file('multi_image');
        if($multiimage){
            $temp = 0;
            foreach ($multiimage  as $multi_image)
            {
                $make_name = hexdec(uniqid()) . '-' . $temp . "." . $multi_image->getClientOriginalExtension();
                $multi_image->move("upload/multi_image/", $make_name);
                $multi_image = 'upload/multi_image/' . $make_name;

                MultiImage::insert([
                    'multi_image' => $multi_image,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
            $notification = array(
                'message' => 'Multi Image Updated Successfully',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => "Didn't find any images",
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        return redirect()->route("about.multi.image")->with($notification);
    }

}




