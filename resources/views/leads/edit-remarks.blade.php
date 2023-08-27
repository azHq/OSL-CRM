<div class="modal center fade" id="edit_remarks" tabindex="-1" role="dialog" aria-modal="true" style="margin-top: 2em;">
    <div class="modal-dialog lkb-modal-dialog" role="document">
        <button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title text-center">Edit Remarks</h4>
                <button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- <form action="{{ route('leads.addRemarks') }}" method="POST"> -->
                        @csrf
                        <div class="row">
                            <div class="form-group row">
                                <input name="remarks_id" id="remarks_id" hidden>
                                <div class="col-sm-12">
                                    <label class="col-form-label">Edit Remarks <span class="text-danger">*</span></label>
                                    <textarea style="height: 200px;" id="edit-remarks-value" class="form-control" name="value" required> </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-center py-3">
                            <button type="submit" class="border-0 btn btn-primary btn-gradient-primary btn-rounded" onclick="updateRemarks()">Update</button>&nbsp;&nbsp;
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
    $('body').on('click', '.edit_remarks', async function() {
        let id = $(this).data('id');
        await $('#remarks_id').val(id);
        var url = "{{ route('leads.getRemarksById', 'id') }}";
        url = url.replace('id', id);
        await $.ajax({
            type: 'GET',
            url: url,
            success: async function(data) {
                await $('#edit-remarks-value').val(data.value);
            }
        });
    });

    async function updateRemarks() {
        let id = await $("#remarks_id").val();
        console.log({
            id
        })
        await $.ajax({
            type: 'POST',
            url: "{{ route('leads.updateRemarks') }}",
            data: {
                _token: '{{csrf_token()}}',
                value: await $("#edit-remarks-value").val(),
                remarks_id: Number(id)
            },
            success: function(data) {
                window.location.reload()
            }
        });
    }
</script>