<div class="modal center fade" id="add_parameters" tabindex="-1" role="dialog" aria-modal="true" style="margin-top: 5em;">
    <div class="modal-dialog lkb-modal-dialog" role="document">
        <button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title text-center">Add Parameter</h4>
                <button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('parameters.store') }}" method="POST">
                            @csrf
                            <h4>Parameter Information</h4>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label class="col-form-label">
                                                Key <span class="text-danger">*</span>
                                            </label>
                                            <input class="form-control" type="text" name="key" minlength="3" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label">Type <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="type" minlength="3" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label">Value <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="value"></input>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label">Component <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="component"></input>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center py-3">
                                <button type="submit" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Save</button>&nbsp;&nbsp;
                                <button type="button" class="btn btn-secondary btn-rounded" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div><!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>

