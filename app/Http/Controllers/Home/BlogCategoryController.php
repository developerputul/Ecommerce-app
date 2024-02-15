<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    public function AllBlogCategory(){
        $blogcategory =  BlogCategory::latest()->get();
        return view('admin.blog_category.blog_category_all', compact('blogcategory'));
    } //End method AllBlogCategory

    public function AddBlogCategory(){
        return view('admin.blog_category.blog_category_add');

    }  //End method AllBlogCategory

    public function StoreBlogCategory(Request $request){
        $request->validate([

            'blog_category' => 'required'
        ],[
            'blog_category.required' => 'Blog Category Name is Required'
        ]);

        BlogCategory::insert([
            'blog_category' =>$request->blog_category,
        ]);
        $notification = array(
            'message' => 'Blog Category Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.blog.category')->with($notification);

    }   //End method AllBlogCategory

    public function EditBlogCategory($id){

        $blogcategory = BlogCategory::findOrfail($id);
        return view('admin.blog_category.blog_category_edit', compact('blogcategory'));
    }  //End method AllBlogCategory

    public function UpdateBlogCategory(Request $request, $id){

        BlogCategory::findOrFail($id)->update([
            'blog_category' => $request->blog_category,
        ]);
        $notification = array(
            'message' => 'Blog category updated Successfully',
            'alert' => 'Success'
        );
        return redirect()->route('all.blog.category')->with($notification);

    } //End method AllBlogCategory
    public function DeleteBlogCategory($id){

        BlogCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Blog category deleted Successfully',
            'alert' => 'Success'
        );
        return redirect()->back()->with($notification);

    } //End method AllBlogCategory
}
