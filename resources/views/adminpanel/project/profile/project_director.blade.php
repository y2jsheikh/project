@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Project Details</h4>
                    </div>
                    <div class="card-body">
                        <!-- Project Forms Tabs -->
                        @include('adminpanel.project.profile_tabs')
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" style="margin: 6px; padding: 10px" role="alert">{{ $error }}</div>
                            @endforeach
                        @endif
                        @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif


                        <form name="" method="post" action="{{url('update_project_director', $pd->id)}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{$pd->name}}" placeholder="Name" required>
                                        <input type="hidden" id="project_id" name="project_id" value="{{$pd->project_id}}" />
                                        <input type="hidden" id="project_name" name="project_name" value="{{$pd->project_name}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea type="text" name="address"  id="address"  class="form-control"
                                                  placeholder="Address" required>{{$pd->address}} </textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" id="email" class="form-control"
                                               placeholder="Email" value="{{$pd->email}}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fiscal_year">Designation</label>
                                        {!! $designation_select !!}
                                        <input type="hidden" name="designation" id="designation" value="{{$pd->designation}}" />
                                        <a href="../add_designation" type="button" class="btn btn-info btn-sm float-right m-1"><i class="feather icon-plus"></i>Add</a>
                                        @if ($errors->has('designation'))
                                            <span class="text-danger">{{ $errors->first('designation') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Office Phone No</label>
                                        <input type="text" name="phone_no" id="phone_no" value="{{$pd->phone_no}}" class="form-control mobile_no"
                                               placeholder="Office Phone No">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="text" name="wef_date" id="wef_date" value="{{$pd->wef_date}}" class="form-control datepicker" placeholder="MM/DD/YYYY" readonly required>
                                        @if ($errors->has('wef_date'))
                                            <span class="text-danger">{{ $errors->first('wef_date') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="designation">Organization</label>
                                        {!! $organization_select !!}
                                        <input type="hidden" name="organization" id="organization" value="{{$pd->organization}}"required/>
                                        <a href="../add_organization" type="button" class="btn btn-info btn-sm float-right m-1"><i class="feather icon-plus"></i>Add</a>
                                        @if ($errors->has('organization'))
                                            <span class="text-danger">{{ $errors->first('organization') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cell Number</label>
                                        <input type="text"name="cell_number" id="cell_number" value="{{$pd->cell_number}}" class="form-control mobile_no"
                                               placeholder="Cell Number" required>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><br/>
                                        <button type="submit" class="btn btn-info pull-right">
                                            <i class="fa fa-check"> Enter</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr/>

                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function () {
            $(document).on("change", "#designation_id", function () {
                var designation = $("#designation_id option:selected").text();
                $("#designation").val(designation);
            });
            $(document).on("change", "#organization_id", function () {
                var organization = $("#organization_id option:selected").text();
                $("#organization").val(organization);
            });
        });


    </script>

@endsection
