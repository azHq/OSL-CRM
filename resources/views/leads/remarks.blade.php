<div class="modal center fade" id="add_remarks" tabindex="-1" role="dialog" aria-modal="true" style="margin-top: 2em;">
    <div class="modal-dialog lkb-modal-dialog" role="document">
        <button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title text-center">Add Remarks</h4>
                <button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- <form action="{{ route('leads.addRemarks') }}" method="POST"> -->
                        @csrf
                        <div class="row">
                            <div class="form-group row">
                                <input name="lead_id" id="lead_id" hidden>
                                <div class="col-sm-12">
                                    <label class="col-form-label">Add Remarks <span class="text-danger">*</span></label>
                                    <textarea style="height: 200px;" id="remarks" class="form-control" name="value" required> </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-center py-3">
                            <button type="submit" class="border-0 btn btn-primary btn-gradient-primary btn-rounded" onclick="addRemarks()" data-bs-dismiss="modal" aria-label="Close">Add</button>&nbsp;&nbsp;
                            <button type="button" class="btn btn-secondary btn-rounded" data-bs-dismiss="modal">Cancel</button>
                        </div>
                        <!-- </form> -->
                    </div>
                </div>

            </div>

        </div><!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>

<script>
    $('body').on('click', '.add_remarks', function() {
        let id = $(this).data('id');
        $('#lead_id').val(id);
    });

    function addRemarks() {
        let id = $("#lead_id").val();
        $.ajax({
            type: 'POST',
            url: "{{ route('leads.addRemarks') }}",
            data: {
                _token: '{{csrf_token()}}',
                value: $("#remarks").val(),
                lead_id: Number(id)
            },
            success: function(data) {
                window.location.reload()
            }
        });
    }
</script>