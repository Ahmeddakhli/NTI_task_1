@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <div class="card">
                <div class="card-header   text-center" >new </div>

                <div class="card-body">
                      <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('trails.index') }}">back >>></a>
            </div>
            <form action="{{ route('trails.store') }}" method="POST"  enctype="multipart/form-data" >
                @csrf
                 
                        
                

                              <div class="form-group row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>


                <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>email:</strong>
                <input type="email" name="email"  value="{{ old('email') }}" class="form-control" placeholder="email">
            </div>
        </div>
       
      <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>password:</strong>
                <input type="password" name="password"   class="form-control" placeholder="password">
            </div>
        </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>password-confirm:</strong>
                <input type="password" name="password_confirmation"   class="form-control" placeholder="password-confirm">
            </div>
        </div>

                

                 
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>address :</strong>
                <textarea class="form-control" style="height:150px" name="address" placeholder="address "></textarea>
            </div>
        </div>
     <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>linked in url:</strong>
                <input type="url" name="url"  value="{{ old('url') }}" class="form-control" placeholder="url">
            </div>
        </div>
        <div class="form-check">
  <input class="form-check-input" type="radio"   value="male"name="gender" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    male
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" value="famale" name="gender" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    femaile
  </label>
</div>
        
                 
  
                  
                       <div class="form-group row">
                              <strong>Image:</strong>
                            <div class="col-md-12">
                            <input type="file" name="image"   multiple   class="myfrm form-control  @error('image') is-invalid @enderror">

                                @error('filenames')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>
       
                   
                        <div class="form-group row mb-0 text-center">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   حفظ
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