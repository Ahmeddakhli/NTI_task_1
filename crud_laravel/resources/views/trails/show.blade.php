@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">students</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show students</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('trails.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $student->name }}
            </div>
        </div>
   
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>address:</strong>
                {{ $student->address }}
            </div>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>url:</strong>
                  <span>
                    {{ $student->url }}
                         </span>
            </div>
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>gender</strong>
          {{ $student->gender}}
            </div>
        </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>img</strong>
         <img src="/storage/images/{{ $student->image }}" width="100px">
            </div>
        </div>
    </div>
          </div>
            </div>
        </div>
    </div>
</div>
@endsection
