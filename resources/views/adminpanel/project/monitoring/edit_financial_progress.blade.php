@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Financial Progress</h4>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" style="margin: 6px; padding: 10px" role="alert">{{ $error }}</div>
                            @endforeach
                        @endif
                        @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif

                        <form name="" method="post" action="{{url('update_financial_progress', $financial_progress->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="hidden" name="physical_target_id" value="{{$financial_progress->physical_target_id}}" />
                                        <input type="hidden" name="project_id" value="{{$financial_progress->project_id}}" />
                                        <input type="hidden" name="project" value="{{$financial_progress->project}}"/>
                                        <label for="fiscal_year">Fiscal Year <span class="text-danger">*</span></label>
                                        {!! $fiscal_year_select !!}
                                        @if ($errors->has('fiscal_year'))
                                            <span class="text-danger">{{ $errors->first('fiscal_year') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="component_id">Component <span class="text-danger">*</span></label>
                                        {!! $component_select !!}
                                        <input type="hidden" name="component" id="component" value="{{$financial_progress->component}}"/>
                                        @if ($errors->has('component'))
                                            <span class="text-danger">{{ $errors->first('component') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="amount">Amount <span class="text-danger">*</span></label>
                                        <input type="number" name="amount" class="form-control" value="{{$financial_progress->amount}}" placeholder="Amount" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="date">Date <span class="text-danger">*</span></label>
                                        <input type="text" name="date" class="form-control datepicker" value="{{$financial_progress->date}}" placeholder="MM/DD/YYYY" readonly />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inspect_date">Inspection Date <span class="text-danger">*</span></label>
                                        <input type="text" name="inspect_date" class="form-control datepicker" value="{{$financial_progress->inspect_date}}" placeholder="MM/DD/YYYY" readonly />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="physical_description">Physical Target Description <span class="text-danger">*</span></label>
                                        <textarea name="physical_description" class="form-control"  placeholder="Description">{{$financial_progress->physical_description}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="instrument_detail">Instrument Detial <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="instrument_detail" id="instrument_detail">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="multimedia">Instrument Annex <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="multimedia" id="images">
                                    </div>
                                    <!--
                                    <div id="my_camera"></div>
                                    <input type=button value="Take Snapshot" onClick="take_snapshot()">
                                    <div id="results" ></div>
                                    -->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><br/>
                                        <button type="submit" class="btn btn-info pull-right">
                                            <i class="fa fa-check"> Update</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--<script src="{{ asset('js/webcam.min.js') }}"></script>--}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.js"></script>
    <script>
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach( '#my_camera' );
        <!-- Code to handle taking the snapshot and displaying it locally -->
        function take_snapshot() {
            // take snapshot and get image datao
            Webcam.snap( function(data_uri) {
                // display results in page
                document.getElementById('results').innerHTML =
                    '<img src="'+data_uri+'"/>';
            } );
        }

        $(document).ready(function () {
            $(document).on("change", "#component_id", function () {
                var val = $(this).val();
                if (val > 0) {
                    var component = $("#component_id option:selected").text();
                    $("#component").val(component);
                }else{
                    $("#component").val('');
                }
            });
        });
    </script>
@endsection
