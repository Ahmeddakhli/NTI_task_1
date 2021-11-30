  @extends('layouts.app')

@section('content')

     <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('trails.create') }}"> Create New student</a>
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
           
            
            <th>Name</th>
            <th>address</th>
            <th>url</th>
            <th>gender</th>
            <th>Image</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
 
            <td>{{ $product->name }}</td>
            <td>{{ $product->address }}</td>
            <td>{{ $product->url }}</td>
            <td>{{ $product->gender }}</td>
            <td><img src="/storage/images/{{ $product->image }}" width="100px"></td>

            <td>
                <form action="{{ route('trails.destroy',$product->id) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ route('trails.show',$product->id) }}">Show</a>
      
                    <a class="btn btn-primary" href="{{ route('trails.edit',$product->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
@endsection