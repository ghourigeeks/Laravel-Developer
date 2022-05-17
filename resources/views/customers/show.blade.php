@extends('layouts.app')
@section('content')               
    @include( '../sweet_script')

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{ route('customers.index') }}" class="btn btn-primary" style="float: right;"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                            <h6 class="m-0 font-weight-bold text-primary">View Customer</h6>
                        </div>
                        <div class="card-body">

                             <strong># :</strong>
                             <label style="font-size: 15px;" class="element">{{ $customers->id }}</label>
                             <br>
                             <hr>

                             <strong>Name :</strong>
                             <label style="font-size: 15px;" class="element">{{ $customers->name }}</label>
                             <br>
                             <hr>
                             
                             <strong>Email :</strong>
                             <label style="font-size: 15px;" class="element">{{ $customers->email }}</label>
                             <br>
                             <hr>
                             
                             <strong>Status :</strong>
                             <label style="font-size: 15px;" class="element">{{ $customers->active }}</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

@endsection