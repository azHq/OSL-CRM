<div class="content container-fluid">
    @component('components.custombreadcrumb')
    @slot('icon') <i class="fa fa-user" aria-hidden="true"></i> @endslot
    @slot('title') Meta Credential @endslot
    @push('list') <li class="breadcrumb-item"><a href="{{route('leads.meta')}}">Meta Credential</a></li> @endpush
    @endcomponent
    @include('components.flash')

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-0">
                <div class="card-header">
                    <h4 class="card-title mb-0">Credentials</h4>
                </div>
                <div class="card-body">
                    <form action="#">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>APP ID:</label>
                                    <input type="text" class="form-control" name="app_id" id="app_id">
                                </div>
                                <div class="form-group">
                                    <label>APP Secret:</label>
                                    <input type="text" class="form-control" name="app_secret" id="app_secret">
                                </div>
                                <div class="form-group">
                                    <label>Page ID:</label>
                                    <input type="text" class="form-control" name="page_id" id="page_id">

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>PAGE Access Token:</label>
                                    <textarea rows="9" cols="5" class="form-control" placeholder="Enter Token"name="page_token" id="page_token"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>