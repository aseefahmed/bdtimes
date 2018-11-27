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
    <script src="{{ asset('public/plugins/ckeditor/ckeditor.js')}}"></script>
    <script src="{{ asset('public/plugins/bootstrap-fileinput/js/fileinput.min.js') }}" type="text/javascript"></script>

@endsection

@section('content')
    <form class="form-horizontal form-stripe" id="addNewsForm" action="addpicture" method="POST" enctype="multipart/form-data">
        <div class="row animated fadeInUp" ng-controller="NewsController">

            <input type="hidden" name="flag" id="flag">
            {{ csrf_field() }}
            <div class="col-sm-12 col-md-8">
                <h4 class="section-subtitle"><b>ADD</b>Picture</h4>
                <div class="panel">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">News Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="news_title" id="news_title" placeholder="News Title" required>
                                    </div>
                                </div>

                                <?php
                                $my_categories = findMyCategories(Auth::user()->id);
                                ?>
                                <div class="form-group">
                                    <label for="username" class="col-sm-3 control-label">Category</label>
                                    <div class="col-sm-9">
                                        <select  class="form-control select2js" id="main_category" style="width: 100%" name="categories" id="categories" required>
                                            <option value="0">Choose Category</option>

                                            <option value="15">ছবি </option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" style="display: none" id="sub_cat"></div>



                                <div class="form-group">
                                    <label for="email3" class="col-sm-3 control-label">Thumbnail Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control fileinput" name="featured_image" id="featured_image" placeholder="Image" required>
                                    </div>
                                </div>

                                {{--<div class="form-group">--}}
                                    {{--<label for="email3" class="col-sm-3 control-label">Vedio Link</label>--}}
                                    {{--<div class="col-sm-9">--}}
                                        {{--<input type="text" class="form-control" id="video_link" name="video_link" placeholder="Video Link">--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                <label for="righticon" style="margin-left: 6%" class="col-sm-2 control-label"><code>Language</code></label>
                                <div class="col-sm-12" style="margin-left: 10%">
                                    <div class="radio radio-custom radio-inline radio-primary">
                                        <input type="radio" id="ln_bn" name="language" value="bangla" checked>
                                        <label for="ln_bn">Bangla</label>
                                    </div>
                                    <div class="radio radio-custom radio-inline radio-primary">
                                        <input type="radio" id="ln_us" name="language" value="english">
                                        <label for="ln_us">English</label>
                                    </div>
                                </div>

                                <div class="form-group" style="float:right; margin-right: 0%;">
                                    <input type="submit" value="Publish" class="btn btn-success">
                                    <img src="{{ asset('public/images/pie.gif') }}" height="30px" id="ajax_loading" style="display: none;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="warning_modal" tabindex="-1" role="dialog" aria-labelledby="modal-success-label" data-keyboard="false" data-backdrop="static">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header state modal-success">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modal-success-label"><i class="fa fa-user"></i>Add Video</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group-attached">
                                <div class="row">
                                    <div class="col-sm-6" style="margin: 10px;">
                                        <div class="form-group form-group-default">
                                            Following fields are mendatory:<br>
                                            <code>News Title</code><br>
                                            <code>Category</code><br>
                                            <code>Thumbnail Image</code><br>
                                            <code>Video Link</code><br>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer"> <a type="button" class="btn btn-default" data-dismiss="modal">Close</a> </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
    <script>

    </script>
@endsection