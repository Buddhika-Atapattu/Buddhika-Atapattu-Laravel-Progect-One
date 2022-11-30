@extends('admin.admin_master')
@section('admin')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" href="{{asset('backend/assets/css/blog_category_style.css')}}"/>
 <div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="text-center mb-5 h2 display-3 font-Alumni-Sans-Inline-One">Blog Tag All</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Blog Tag All Data </h4>
                        <table id="datatable" class="dt-responsive nowrap table table-striped table-bordered w-100">
                            <thead>
                                <tr>
                                    <th class="text-center font-Tiro-Gurmukhi">Sl</th>
                                    <th class="text-center font-Tiro-Gurmukhi">Blog Tag Name</th> 
                                    @if(($user->role_id === 1) || ($user->role_id === 2))
                                    <th class="text-center font-Tiro-Gurmukhi">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                        	@php($i = 1)
                        	@foreach($blog_tag  as $item)
                                <tr>
                                    <td> {{ $i++}} </td>
                                    <td> {{ $item->tag_name }} </td> 
                                    @if(($user->role_id === 1) || ($user->role_id === 2))
                                    <td>
                                        <div class="row w-100">
                                            <div class="col-sm-6 d-flex justify-content-center">
                                                <a href="{{ route('edit.blog.tag',$item->id) }}" class="btn btn-info sm" id="edit" title="Edit Data">  <i class="fas fa-edit"></i> </a>
                                            </div>
                                            <div class="col-sm-6 d-flex justify-content-center">
                                                <a href="{{ route('delete.blog.tag',$item->id) }}" id="delete" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>  <i class="fas fa-trash-alt"></i> </a>
                                            </div>
                                        </div>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>

$(document).ready(function(){
    $('#datatable').DataTable();
});

</script>
@endsection