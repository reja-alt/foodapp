@extends('layouts.app')

@section('title','Category')



@push('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            <a href="{{route('category.create')}}" class="btn btn-info">ADD NEW</a>
            @if(session('successMsg'))
            <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                    {{ session('successMsg') }}
                      </span>
                  </div>
                
            @endif
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Categories</h4>
              
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table" cellspacing="0" style="width:100%">
                      <thead class=" text-primary">
                      <tr>
                      <th>
                          Id
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                         Slug
                        </th>
                        
                        <th>
                          Created At
                        </th>
                        <th>
                          Updated At
                        </th>
                        <th>
                        Action
                        </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($categories as $key=>$category)
                       <tr> 
                      <td>
                          {{ $key + 1 }}
                        </td>
                        <td>
                          {{$category->name}}
                          </td>
                        <td>
                          {{$category->slug}}
                        </th>
                        
                        <td>
                        {{$category->created_at}}
                        </td>
                        <td>
                        {{$category->updated_at}}
                        </td>
                        <td>
                        <a href="{{  route('category.edit',$category->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>
                          
                       
                        
                         <form id="delete-form{{$category->id}}" action="{{route('category.destroy',$category->id)}}" method="POST" style="display:none;">
                         @csrf
                         @method('DELETE')
                         </form>
                       <button type="submit" class="btn btn-danger btn-sm" 
                       onclick="if(confirm('Are you sure?You want to delete this ?')){
                         event.preventDefault();
                         document.getElementById('delete-form{{$category->id}}').submit();

                       }else{
                          
                          event.preventDefault();
                       
                      }">
                       <i class="material-icons">delete</li>
                       </button>

                       </td>
                        </tr>
                       

                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection


@push('scripts')

<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
    $('#table').DataTable();
} );
</script>
@endpush