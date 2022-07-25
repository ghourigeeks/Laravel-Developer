@extends('layouts.app')
@section('content')
@include( '../sweet_script')
            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{ route('customers.create') }}" class="btn btn-primary" style="float: right;"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            <h6 class="m-0 font-weight-bold text-primary">Manage Customers</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Active</th>
                                        <th style="width:20%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customers as $customer)
                                        <tr>
                                            <td>{{((isset($customer->name))   ?  $customer->id : "")}}</td>
                                            <td>{{((isset($customer->name))   ?  $customer->name : "")}}</td>
                                            <td>{{((isset($customer->email))  ?  $customer->email : "")}}</td>
                                            <td>{{((isset($customer->active)) ?  $customer->active : "")}}</td>
                                            <td>
                                                <form action="{{ route('customers.destroy',$customer->id) }}" method="POST">
                                   
                                                    <a class="btn btn-primary btn-sm" href="{{ route('customers.show',$customer->id) }}">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                    
                                                    <a class="btn btn-primary btn-sm" href="{{ route('customers.edit',$customer->id) }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm btn-flat deleteRecord" data-toggle="tooltip" data-id="{{ $customer->id }}" title='Delete'><i class="fa fa-trash-alt" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>        
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
               
               <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
               <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
               <script type="text/javascript">
                  
                   $(".deleteRecord").click(function(){
                    var id = $(this).data("id");
                    var token = $("meta[name='csrf-token']").attr("content");
                    $.ajax(
                    {
                        url: "customers/"+id,
                        type: 'DELETE',
                        data: {
                            "id": id,
                            "_token": token,
                        },
                        success: function (){
                            console.log("it Works");

                        }

                    });
                });
              
            </script>

@endsection