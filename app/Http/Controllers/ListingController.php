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
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
            //If we use get() instead of simplePaginate() then we can display all the listings in a single page
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
            'email'=> 'required|email',
            'tags'=>'required',
            'description'=>'required',
        ]);
        //path for the logo to go into the database
        if($request->hasFile('logo')){
            $formField['logo']=$request->file('logo')->store('logos','public'); //folder called 'logos' will be created inside the public folder
        }
        
        //***Add user_id to the formField array 
        $formField['user_id']=auth()->user()->id;
        
        Listing::create($formField);
        return redirect('/')->with('message','Job Posted Successfully');
    } 

    
    //Show edit form
    public function edit(Listing $listing){
        
        return view('listings.edit',['listing'=>$listing]);
    }

    //Update a single Listing
    public function update(Request $request, Listing $listing){
        
        // Make sure that the user is authorized to edit the listing
        if ($listing->user_id !== auth()->id()) {
            abort(403, 'You are not authorized to edit this listing!');
        }
        
        // dd($request->all());
        $formField =$request->validate([
            'title'=>'required',
            //name of the table==>listings
            'company'=>['required'],
            'location'=>'required',
            'website'=>'required',
            'email'=> 'required|email',
            'tags'=>'required',
            'description'=>'required',
        ]);
        //path for the logo to go into the database
        if($request->hasFile('logo')){
            $formField['logo']=$request->file('logo')->store('logos','public'); //folder called 'logos' will be created inside the public folder
        }
        
        $listing->update($formField);
        
        //Redirect to the previous page with a message[back()]
        return back()->with('message','Job Updated Successfully');
    } 

    //Delete a single Listing
    public function destroy(Listing $listing){

        // Make sure that the user is authorized to delete the listing
        if ($listing->user_id !== auth()->id()) {
            abort(403, 'You are not authorized to edit this listing!');
        }
        
        $listing->delete();
        return redirect('/')->with('message','Job Deleted Successfully');
    }

    //Manage Listings
    public function manage(){
        return view('listings.manage',['listings'=>auth()->user()->listings()->get()]);
    }
    
}