@extends('layouts.app')

@section('title','Slider')



@push('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            <a href="{{route('slider.create')}}" class="btn btn-info">ADD NEW</a>
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
                  <h4 class="card-title ">Data Table</h4>
              
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
                          Title
                        </th>
                        <th>
                          Sub-title
                        </th>
                        <th>
                          Image
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
                        @foreach($sliders as $key=>$slider)
                       <tr> 
                      <td>
                          {{ $key + 1 }}
                        </td>
                        <td>
                          {{$slider->title}}
                          </td>
                        <td>
                          {{$slider->sub_title}}
                        </th>
                        <td>
                        {{$slider->image}}
                        </td>
                        <td>
                        {{$slider->created_at}}
                        </td>
                        <td>
                        {{$slider->updated_at}}
                        </td>
                        <td>
                        <a href="{{  route('slider.edit',$slider->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>
                          
                       
                        
                         <form id="delete-form{{$slider->id}}" action="{{route('slider.destroy',$slider->id)}}" method="POST" style="display:none;">
                         @csrf
                         @method('DELETE')
                         </form>
                       <button type="submit" class="btn btn-danger btn-sm" 
                       onclick="if(confirm('Are you sure?You want to delete this ?')){
                         event.preventDefault();
                         document.getElementById('delete-form{{$slider->id}}').submit();

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