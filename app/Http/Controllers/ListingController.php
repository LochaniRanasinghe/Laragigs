<?php

namespace App\Http\Controllers;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //Show All Listings
    public function index()
    {
        return view('listings.index',[
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->simplePaginate(6)

        ]);
    }
    
    //Create a Listing
    public function create(){
        return view('listings.create');
    }
    
    //Store a single Listing(Dependency injection method)
    public function store(Request $request){
        // dd($request->all());
        $formField =$request->validate([
            'title'=>'required',
            //name of the table==>listings
            'company'=>['required',Rule::unique('listings','company'),],
            'location'=>'required',
            'website'=>'required',
            'email'=> ['required|email'],
            'tags'=>'required',
            'description'=>'required',
        ]);
        return redirect('/');
    } 

    
    
}