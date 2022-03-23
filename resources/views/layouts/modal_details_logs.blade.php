<div class="modal fade" id="modal-default-details{{ $log->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="h6 modal-title">Details of data</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               {{$log->data}}
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary">Accept</button>
                <button type="button" class="btn btn-link text-gray ms-auto" data-bs-dismiss="modal">Close</button>
            </div> --}}
        </div>
    </div>
</div>