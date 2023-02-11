<div class="modal center fade" id="mail_lead" tabindex="-1" role="dialog" aria-modal="true" style="margin-top: 5em;">
    <div class="modal-dialog lkb-modal-dialog" role="document">
        <button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title text-center">Send Mail to Lead</h4>
                <button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('leads.sendMail') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label">To <span class="text-danger">*</span></label>
                                            <input id="mail-lead-email" type="text" class="form-control" name="email" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label">Subject <span class="text-danger">*</span></label>
                                            <input id="lead-email-subject" type="text" class="form-control" name="subject" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <div class="row">
                               <div class="form-group row">
                                   <div class="col-sm-12">
                                       <label class="col-form-label">Body <span class="text-danger">*</span></label>
                                       <textarea style="height: 200px;" id="lead-email-body" class="form-control" name="email_body" required> </textarea>
                                   </div>
                               </div>
                           </div>
                            <div class="text-center py-3">
                                <button type="submit" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Send</button>&nbsp;&nbsp;
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

<script>
    $('body').on('click', '.mail-lead', function() {
        var id = $(this).data('id');
        var url = "{{ route('leads.mail', 'id') }}";
        url = url.replace('id', id);
        $.ajax({
            type: 'GET',
            url: url,
            success: function(data) {
                var lead = data.lead;
                $('#mail-lead-email').val(lead.email);
                $('#lead-email-subject').val("Email subject goes here");
                $('#lead-email-body').val("Mail body goes here: This is the body of this email.");
            }
        });
    });

</script>
