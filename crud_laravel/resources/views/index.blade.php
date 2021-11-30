 
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
                <h2>Laravel </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('create') }}"> Create New post</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
           
           
            <th>title</th>
            <th>content</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $product)
        <tr>
            
            <td>{{ $product->title }}</td>
            <td>{{ $product->content }}</td>
            <td>
                <form action="{{ route('delete',$product->id) }}" method="POST">
     
      
     
                    @csrf
                   
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
   

    </div>
  
</body>
</html>