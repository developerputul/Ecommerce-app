<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function AllBlog(){

        $blogs = Blog::latest()->get();
        return view('admin.blogs.blogs_all', compact('blogs'));
    } //end method

    public function AddBlog(){
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('admin.blogs.blogs_add',  compact('categories'));
    } //end Method

    public function StoreBlog(Request $request){

        $request->validate([
            'blog_category_id' => 'required',
            'blog_title' => 'required',
            'blog_tags' => 'required',
            'blog_desc' => 'required',
            'blog_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for the image field
        ]);

        $image = $request->file('blog_image');
        $imageName =  hexdec(uniqid()) . '.' . time() . "." . $image->getClientOriginalExtension();
        $image->move("upload/blog/", $imageName);
        $save_url = 'upload/blog/' . $imageName;

        Blog::create([
            'blog_category_id' => $request->blog_category_id,
            'blog_title' => $request->blog_title,
            'blog_tags' => $request->blog_tags,
            'blog_desc' => $request->blog_desc,
            'blog_image' => $save_url,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Blog Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.blog')->with($notification);
    } //end Method

    public function EditBlog($id){

        $blogs = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blogs.blogs_edit', compact('blogs','categories'));

    } //end Method

    public function UpdateBlog(Request $request){

        $blog_id = $request->id;
        $image = $request->file('blog_image');
        $hasFile = $request->hasFile('blog_image');
        if ($hasFile) {

            $imageName =  hexdec(uniqid()) . '.' . time() . "." . $image->getClientOriginalName();
            $image->move("upload/blog/", $imageName);
            $save_url = 'upload/blog/' . $imageName;


        Blog::findOrFail($blog_id)->update([
            'blog_category_id' => $request->blog_category_id,
            'blog_title' => $request->blog_title,
            'blog_tags' => $request->blog_tags,
            'blog_desc' => $request->blog_desc,
            'blog_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Blog Updated with Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.blog')->with($notification);

        } else {


        Blog::findOrFail($blog_id)->update([
            'blog_category_id' => $request->blog_category_id,
            'blog_title' => $request->blog_title,
            'blog_tags' => $request->blog_tags,
            'blog_desc' => $request->blog_desc,

            ]);
            $notification = array(
                'message' => 'Blog Updated without Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.blog')->with($notification);

    } // end else
} //end Method

public function DeleteBlog($id){


    $blogs = Blog::findOrFail($id);
    $img = $blogs->blog_image;
    unlink($img);

    Blog::findOrFail($id)->delete();

    $notification = array(
        'message' => 'Blog Image Deleted Successfully',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);
 } // end Method

public function BlogDetails($id){

    $allblogs = Blog::latest()->limit(5)->get();
    $blogs = Blog::findOrFail($id);
    $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
    return view('website.blog_details', compact('blogs', 'allblogs', 'categories'));

     } // end Method

     public function CategoryBlog($id){
        $blogpost = Blog::where('blog_category_id', $id)->orderBy('id', 'DESC')->get();
        return view('website.cat_blog_details', compact('blogpost'));
     } // end Method


 }


