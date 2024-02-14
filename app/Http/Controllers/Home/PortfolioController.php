<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\HomeSlide;
use Illuminate\Support\Carbon;

class PortfolioController extends Controller
{
    public function AllPortfolio(){

        $portfolio = Portfolio::latest()->get();
        return view('admin.portfolio.portfolio_all', compact('portfolio'));
    }  // End PortfolioController

    public function AddPortfolio(){
        $portfolio = Portfolio::find(auth()->user()->id);
        return view('admin.portfolio.portfolio_add',compact('portfolio'));

    } // End PortfolioController

    public function StorePortfolio(Request $request){

        $request-> validate([
            'portfolio_name' => 'required',
            'portfolio_title' => 'required',
            'portfolio_image' => 'required'
        ],[

            'portfolio_name.required' => 'portfolio Name is required',
            'portfolio_title.required' => 'portfolio Title is required',
        ]);

        $image = $request->file('portfolio_image');
        $imageName =  hexdec(uniqid()) . '.' . time() . "." . $image->getClientOriginalName();
        $image->move("upload/portfolio/", $imageName);
        $save_url = 'upload/portfolio/' . $imageName;


        Portfolio::insert([
            'portfolio_name' => $request->portfolio_name,
            'portfolio_title' => $request->portfolio_title,
            'portfolio_description' => $request->portfolio_description,
            'portfolio_image' => $save_url,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Portfolio Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.portfolio')->with($notification);
    } // End PortfolioController

    public function EditPortfolio($id){

        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.portfolio_edit', compact('portfolio'));

    } // End PortfolioController

    public function UpdatePortfolio(Request $request)
    {
        $portfolio_id = $request->id;

        $image = $request->file('portfolio_image');
        $hasFile = $request->hasFile('portfolio_image');
        if ($hasFile) {
            $imageName =  hexdec(uniqid()) . '.' . time() . "." . $image->getClientOriginalName();
            $image->move("upload/portfolio/", $imageName);
            $save_url = 'upload/portfolio/' . $imageName;


            Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'portfolio_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Portfolio Updated with Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.portfolio')->with($notification);

        } else {

            Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
            ]);
            $notification = array(
                'message' => 'Portfolio Updated without Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.portfolio')->with($notification);
        }
    } //end Methods

    public function DeletePortfolio($id){

        $portfolio = Portfolio::findOrFail($id);
        $img = $portfolio->portfolio_image;
        unlink($img);

        Portfolio::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Portfolio Image Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    } //end Methods

    public function PortfolioDetails($id){
        $portfolio = Portfolio::findOrFail($id);
        return view('website.portfolio_details', compact('portfolio'));
    } //end Methods

    public function HomePortfolio(){

        $portfolio =Portfolio::latest()->get();
        return view('website.portfolio', compact('portfolio'));
    } //end Methods

}
