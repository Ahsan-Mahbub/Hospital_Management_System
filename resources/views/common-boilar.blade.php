@extends('backend.layouts.app')
@section('content')
<div class="content">
    <section class="section">
        <div class="row">
            <div class="col-sm-4">
                <div class="block">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title text-white">
                            <i class="fa fa-plus-circle"></i> &nbsp;Add Floor
                        </h3>
                    </div>
                    <form role="form" method="POST" class=" p-3">
                        <div class="block">
                            <div class="form-group">
                                <label class="control-label" for="name">Name<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control" id="name" name="floor_name">
                                <span></span>
                            </div>

                            <div class="form-group ">
                                <label class="control-label" for="control">Description</label>
                                <textarea name="description" id="description" class="form-control " cols="30" rows="5"></textarea>
                                <span></span>
                            </div>
                        </div>
                        <div class="form-group"> 
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="fa fa-check opacity-50 me-1"></i> Submit
                              </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="block">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title text-white">
                            <i class="fa fa-plus-circle"></i> &nbsp;List
                        </h3>
                    </div>
                    <div class="pt-4 p-2">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-vcenter ">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection