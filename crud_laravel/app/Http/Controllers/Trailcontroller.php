<?php

namespace App\Http\Controllers;


use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\DataTables\TrailsDataTable;
use Illuminate\Support\Facades\File;
class TrailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Student::all();
    
        return view('trails.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trails.add');

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
                        'image' => 'required|image|max:2048',
                         'gender'=>['required'],
                         'address'=>['required', 'min:5'],
                    ]);
                
                
                    //store new room 
                try {
                    //  after make validation 
                $inputss=$request->input();

                if($request->hasfile('image'))
                { 
                    $imges=[];
                    //store img
                
                   
            
                        $file=$request->file('image');
                        $name = time().rand(1,100).'.'.$file->extension();
                        $file->storeAs('public/images', $name); 
                    $imges[]= $name;
                    
                    $str=  implode(",",$imges);
                    $inputss = Arr::add($inputss, 'image', $str);
                }
            //create new room in table 

                $room= Student::create($inputss);

            

                if ($room)
                return redirect(route('trails.index'))->with('success','Product updated successfully');    
            
            } 
            catch (Throwable $e)
            {
            report($e);
            // if any errors
            return redirect()->back()->with('error','call the support an problem  exists ');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trail  $Trail
     * @return \Illuminate\Http\Response
     */
    public function show(Student $Trail)
    {
        
    
        return view('trails.show',['student'=>$Trail]);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trail  $Trail
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $Trail)
    {
        
        return view('trails.edit',['student'=>$Trail]);
  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trail  $Trail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $Trail)
    {
         
       
    
    
       
    
    try {
        //  after make validation 
    $inputss=$request->input();

    if($request->hasfile('image'))
    { 
        $imges=[];
        //store img
     
      
 
            $file=$request->file('image');
            $name = time().rand(1,100).'.'.$file->extension();
            $file->storeAs('public/images', $name); 
           $imges[]= $name;
        
         $str=  implode(",",$imges);
        $inputss = Arr::add($inputss, 'image', $str);
    }
//create new room in table 

    
        $room=$Trail->update($inputss);
   

    if ($room)
    return redirect(route('trails.index'))->with('success','Product updated successfully');    
 
} 
catch (Throwable $e)
{
report($e);
// if any errors
return redirect()->back()->with('error','call the support an problem  exists ');
}
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trail  $Trail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $Trail)
    {
        if (File::exists(public_path('storage/images/'.$Trail->image ))) {
            File::delete(public_path('storage/images/'.$Trail->image ));
 
           
      }


        $Trail->delete();
    
        return redirect()->route('trails.index')
                        ->with('success','Product deleted successfully');
    }
       
       
     
     
     
       
         
}
