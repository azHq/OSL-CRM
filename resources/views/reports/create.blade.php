<div class="modal center fade" id="add_report" tabindex="-1" role="dialog" aria-modal="true" style="margin-top: 2em;">
    <div class="modal-dialog lkb-modal-dialog" role="document">
        <button type="button" class="btn-close md-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title text-center">Add Report</h4>
                <button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('reports.store') }}" method="POST">
                            @csrf
                            <h4>Report Information</h4>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label class="col-form-label">
                                                Title <span class="text-danger">*</span>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <input class="form-control" type="text" name="title" minlength="3" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label">Type <span class="text-danger">*</span></label>
                                            <select class=" form-control form-select" name="type" required>
                                                @foreach(App\Models\Parameter::orderBy('created_at', 'desc')->get() as $param)
                                                    <option value="{{$param->key}}">{{$param->value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label">Description <span class="text-danger">*</span></label>
                                            <textarea type="text" rows="4" class="form-control" name="description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-4 col-sm-12">
                                    <label class="col-form-label">Counsellor <span class="text-danger">*</span></label>
                                    <select class=" form-control form-select" name="counselor_id" id="create-lead-owners" required readonly>
                                        <option value="">Unassigned</option>
                                        @foreach(App\Models\User::admins()->get() as $user)
                                            <option value="{{$user->id}}" {{Auth::user()->id==$user->id?'selected':''}}>{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-4 col-sm-12">
                                    <label class="col-form-label">Lead <span class="text-danger">*</span></label>
                                    <select class=" form-control form-select" name="leads_id" id="create-lead-owners" required readonly>
                                        <option value="">Not Selected</option>
                                        @foreach(App\Models\Lead::all() as $l)
                                            <option value="{{$l->id}}">{{$l->name}}</option>
                                        @endforeach
                                    </select>
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

@if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('main-super-admin'))
    <script>
        $('#add-report').on('click', function() {
            getOwners();
        });

        function getOwners() {
            $.ajax({
                type: 'GET',
                url: "{{ route('leads.create') }}",
                success: function(data) {
                    var options = '<option value="">Unassigned</option>';
                    data.users.forEach(function(user) {
                        options += '<option value="' + user.id + '">' + user.name + '</option>';
                    });
                    $('#create-lead-owners').html(options);
                }
            });
        }
    </script>
@endif
