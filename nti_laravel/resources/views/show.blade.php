 
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
                <h2> Show </h2>
            </div>
            <div class="pull-right">
            </div>
        </div>
    </div>
     
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $data['name'] }}
            </div>
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>email:</strong>
                {{ $data['email'] }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>address</strong>
                {{ $data['address'] }}
            </div>
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>linked in:</strong>
                {{ $data['url'] }}
            </div>
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>gender:</strong>
                {{ $data['gender'] }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <img src="/image/{{ $data['image'] }}" width="500px">
            </div>
        </div>
    </div>
    </div>
   
</body>
</html>