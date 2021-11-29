<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body>
  
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right">
          
        </div>
    </div>
</div>
   
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
   
<form action="{{ route('products.store') }}" method="POST"  enctype="multipart/form-data">
    @csrf
  
     <div class="row">
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
           <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control" placeholder="image">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
</div>
   
</body>
</html>