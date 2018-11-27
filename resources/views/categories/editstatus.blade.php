@extends('layouts.admin.dashboard')

@section('css_block')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/plugins/bootstrap-fileinput/css/fileinput.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('js_block')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/js/froala_editor.pkgd.min.js"></script>
    <script src="{{ asset('public/plugins/bootstrap-fileinput/js/fileinput.min.js') }}" type="text/javascript"></script>
@endsection

@section('content')
    <form class="form-horizontal form-stripe" id="editCatForm">
        <div class="row animated fadeInUp" ng-controller="NewsController">

            <input type="hidden" name="cat_id" value="{{ $category[0]->id }}">
            {{ csrf_field() }}
            <div class="col-sm-12 col-md-8">
                <h4 class="section-subtitle"><b>Change</b> Status</h4>
                <div class="panel">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Category Name (Bangla)</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control" name="category_name" value="{{$category[0]->category_name}}" placeholder="Category">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" style="margin-top:10px;">
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Status</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2js" style="width: 100%" name="status" id="status">
                                            <option value="{{$category[0]->status}}">Select status</option>
                                                <option value="0" >Don't Show in menu(0)</option>
                                                <option value="1" >Show in menu(1)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">&nbsp;</label>
                                    <div class="col-sm-9">
                                        <div class="col-sm-12" style="margin-top:15px">
                                            <a class="btn btn-success" id="updateStatusBtn" cat_id="{{ $category[0]->id }}">Update</a>
                                            <img src="{{ asset('public/images/pie.gif') }}" height="30px" id="ajax_loading" style="display: none;">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>

    </script>
@endsection