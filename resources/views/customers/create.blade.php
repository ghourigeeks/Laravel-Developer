@extends('layouts.app')
@section('content')
@include( '../sweet_script')

            <div id="content">
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{ route('customers.index') }}" class="btn btn-primary" style="float: right;"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                            <h6 class="m-0 font-weight-bold text-primary">Add Customer</h6>
                        </div>
                        <div class="card-body">
                            {!! Form::open(array('id'=>'form','enctype'=>'multipart/form-data')) !!}
                            {{  Form::hidden('action', "store" ) }}
                            <div class="row">
                                <div class="col-md-6">
                                 <div class="form-group">
                                    {!! Html::decode(Form::label('name','Name <span class="text-danger">*</span>')) !!}
                                    {{ Form::text('name', null, array('placeholder' => 'Enter name','class' => 'form-control','autofocus' => '', 'required'=>''   )) }}
                                    @if ($errors->has('name'))  
                                        {!! "<span class='span_danger'>". $errors->first('name')."</span>"!!} 
                                    @endif
                                 </div>
                                </div>
                                <div class="col-md-6">
                                 <div class="form-group">
                                    {!! Html::decode(Form::label('name','Email <span class="text-danger">*</span>')) !!}
                                    {{ Form::text('email', null, array('placeholder' => 'Enter email','class' => 'form-control','autofocus' => '' , 'required'=>''  )) }}
                                     @if ($errors->has('email'))  
                                        {!! "<span class='span_danger'>". $errors->first('email')."</span>"!!} 
                                     @endif
                                 </div>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary add_customer">Submit</button>
                            <button type="reset" class="btn btn-danger">Cancel</button>
                             {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

        <!--- ajax ---->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <script>
        $(document).ready(function () {  

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#form').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('customers.store') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        if(data.success){
                            this.reset();
                            toastr.success(data.success);
                        }
                    },
                    error: function(data) {
                        var txt         = '';
                        // console.log(data.responseJSON.errors)
                        for (var key in data.responseJSON.errors) {
                            txt += data.responseJSON.errors[key];
                            txt +='<br> ';
                        }
                        toastr.error(txt);
                    }
                });
            });
        });
    </script>
    

@endsection



