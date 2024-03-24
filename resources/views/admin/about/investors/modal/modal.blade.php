<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.about.investors.manypost',$StaticTable->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="modal-body">
                    <div class="col-md-12 mb-4">
                        <x-admin.form.label-first star="*" class="form-label" name="since">
                        </x-admin.form.label-first>
                        <x-admin.form.input required="required" old="{{ 'since' }}" name="{{ 'since' }}" type="number" 
                            placeholder="since" class="form-control valid">
                        </x-admin.form.input>
                        <x-admin.form.label-end star="*" name="please enter since">
                        </x-admin.form.label-end>
                    </div>
                    <div class="col-md-12 mb-4">
                        <x-admin.form.label-first star="*" class="form-label" name="sharing">
                        </x-admin.form.label-first>
                        <x-admin.form.input required="required" old="{{ 'sharing' }}" name="{{ 'sharing' }}" type="number" 
                            placeholder="sharing" class="form-control valid">
                        </x-admin.form.input>
                        <x-admin.form.label-end star="*" name="please enter sharing">
                        </x-admin.form.label-end>
                    </div>
                    <div class="col-md-12 mb-4">
                        <x-admin.form.label-first  class="form-label" name="sort">
                        </x-admin.form.label-first>
                        <x-admin.form.input required="" old="{{ 'sort' }}" name="{{ 'sort' }}" type="number" 
                            placeholder="sort" class="form-control valid">
                        </x-admin.form.input>
                        <x-admin.form.label-end  name="please enter sort">
                        </x-admin.form.label-end>
                    </div>
                    {{-- ----------first image--}}
                    <div class="col-md-12 mb-4">
                        <x-admin.form.label-first star="*" class="col-sm-3 col-form-label" name="File Upload Country">
                        </x-admin.form.label-first>
                        <div class="col-sm-9">
                            <x-admin.form.input required="required"  nameImage="country" old="image2" name="image2"
                                type="file" readonly="" placeholder="Please Enter Image" id="image" class="dropify"
                                DataHeight="300" accept=".jpg, .png, image/jpeg, image/png">
                            </x-admin.form.input>
                        </div>
                    </div>
                    {{-- ----------end image--}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            
        </div>
    </div>
</div>