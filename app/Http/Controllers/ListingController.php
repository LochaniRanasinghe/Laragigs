<?php

namespace App\Http\Controllers;
use App\Models\Listing;

use Illuminate\Http\Request;

class ListingController extends Controller
{
    //Show All Listings
    public function index()
    {
        // return view('listings.index',[
        //     'listings'=>Listing::all()
        // ]);
        return view('listings.index',[
            // 'listings'=>Listing::filter(request(['search','tag']))->get()
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->simplePaginate(6)

        ]);
    }
    
    //Create a Listing
    public function create(){
        return view('listings.create');
    }
    
    //Show Single Listing
    // public function show(Listing $listing)
    // {
    //     return view('listings.show',[
    //         'listingSS'=>$listing
    //     ]);
    // }    

    
    
}