@extends('layouts.app')

@section('title','ADD SLIDER')



@push('css')



@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            @if ($errors->any())
  
            @foreach ($errors->all() as $error)
                
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                    {{ $error }}
                      </span>
                  </div>
                
            @endforeach
       
@endif
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Data Table</h4>
              
                </div>
                <div class="card-body">
                 <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
                 @csrf
                
                <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title</label>
                          <input type="text" class="form-control" name="title">
                        </div>
                      </div>
                </div>
                    

                <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sub Title</label>
                          <input type="text" class="form-control" name="subtitle">
                        </div>
                      </div>
                </div>

                <div class="row">
                      <div class="col-md-6">
                        
                          <label class="bmd-label-floating">Image</label>
                          <input type="file" name="image">
                        
                      </div>
                </div>
                <a href="{{route('slider.index')}}" class="btn btn-danger">Back</a>
                <button type="submit" class="btn btn-primary" >Save</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection


@push('scripts')

@endpush