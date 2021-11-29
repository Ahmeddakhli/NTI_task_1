<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('welcome');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'url' => ['required', 'url'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'gender'=>['required'],
             'address'=>['required', 'max:10', 'min:10'],



         
        ]);



        
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        return view('show') ->with(['data'=>$input]);
      
   
    }
}
