@extends('layouts.app')

@section('title','ADD ITEM')



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
                  <h4 class="card-title ">ITEM</h4>
              
                </div>
                <div class="card-body">
                 <form action="{{route('item.store')}}" method="POST" enctype="multipart/form-data">
                 @csrf
                
                  
                 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group label-floating">
                          <label class="control-label" >Category Name</label>
                         <select  class="form-control" name="category">
                             
                             @foreach($categories as $key=>$category)

                             <option value="{{$category->id}}">{{$category->name}}</option>
                             @endforeach
                             </select>
                        </div>
                      </div>
                </div>
                
                <div class="row">
                      <div class="col-md-6">
                        <div class="form-group label-floating">
                        <label class="control-label" >Name</label>
                          <textarea class="form-control" name="name"></textarea>
                        </div>
                      </div>
                </div>
                    
                <div class="row">
                      <div class="col-md-6">
                        <div class="form-group label-floating">
                        <label class="control-label" >Description</label>
                          <textarea class="form-control" name="description"></textarea>
                        </div>
                      </div>
                </div>
               
                

                <div class="row">
                      <div class="col-md-6">
                        <div class="form-group label-floating">
                        <label class="control-label" >Price</label>
                          <input type="number" class="form-control" name="price">
                        </div>
                      </div>
                </div>

                <div class="row">
                      <div class="col-md-6">
                        
                        <label class="control-label" >Image</label>
                          <input type="file" name="image">
                        
                      </div>
                </div>
               

               
                <a href="{{route('item.index')}}" class="btn btn-danger">Back</a>
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


