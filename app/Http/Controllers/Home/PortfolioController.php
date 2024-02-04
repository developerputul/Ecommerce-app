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
}
