<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm text-center" role="document">
        <div class="modal-content">
            <h4 class="modal-title mt-2">Are you sure?</h4>
            <hr class="mb-0 mt-2">
            <form id="deleteModalForm" action="" method="POST">
                <div class="modal-body pt-0">
                    @csrf
                    @method('DELETE')
                    {{ $body ?? 'Do you really want to delete these records? This process cannot be undone.'}}
                </div>
                <div class="modal-footer d-inline-block">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel Delete</button>
                    <button type="submit" class="btn btn-danger">{{ $delete ?? 'Delete Data'}}</button>
                </div>
            </form>
        </div>
    </div>
</div>