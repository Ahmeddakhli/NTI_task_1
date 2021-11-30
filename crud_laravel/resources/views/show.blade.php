 
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
                <strong>title:</strong>
                {{ $data['title'] }}
            </div>
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>content:</strong>
                {{ $data['content'] }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>code</strong>
                {{ $data['code'] }}
            </div>
        </div>
      
    </div>
    </div>
          <form action="{{ route('delete',$data['id']) }}" method="POST">
     
                 
                    @csrf
                  
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
</body>
</html>