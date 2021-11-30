@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header   text-center" >تعديل </div>

                <div class="card-body">
                      <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('trails.index') }}"> رجوع >>></a>
            </div>
            <form action="{{ route('trails.update' ,$student->id) }}" method="POST"  enctype="multipart/form-data" >
                @csrf
                  @method("PUT")
               
                              <div class="form-group row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name"  value="{{ $student->name }}" class="form-control" placeholder="Name">
            </div>
        </div>


                <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>email:</strong>
                <input type="email" name="email"  value="{{ $student->email }}" class="form-control" placeholder="email">
            </div>
        </div>
       
     

       

                

                 
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>address :</strong>
                <textarea class="form-control" style="height:150px"   name="address" placeholder="address ">{{ $student->address }}</textarea>
            </div>
        </div>
     <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>linked in url:</strong>
                <input type="url" name="url"   value="{{ $student->url }}" class="form-control" placeholder="url">
            </div>
        </div>
        <div class="form-check">
  <input class="form-check-input" type="radio"   value="male"name="gender" id="flexRadioDefault1"@if(  $student->gender =="male" )
checked
  @endif>
  <label class="form-check-label" for="flexRadioDefault1">
    male
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" value="famale" name="gender" id="flexRadioDefault2" @if(  $student->gender =="famale" )
checked
  @endif >
  <label class="form-check-label" for="flexRadioDefault2">
    femaile
  </label>
</div>
        
  
                  
                       <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-right">اضف صور جديده </label>

                            <div class="col-md-12">
                            <input type="file" name="image"   multiple   class="myfrm form-control">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>
       
                   
                        <div class="form-group row mb-0 text-center">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                  save updates
                                </button>
                            </div>
                        </div>
    </div>
   
</form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection