<div class="modal fade" id="modal-assign" tabindex="-1" role="dialog"
    aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="h6 modal-title">Add Coment</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('tasks.assigTask') }}" method="post">
                @csrf
                <input type="hidden" name="idTask" value="{{ $id }}">
                <div class="modal-body">                  
                    <div class="mb-3">
                        <label for="comment" class="form-label">comment</label>
                        <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" rows="3" name="comment" required></textarea>
                    </div>
                    @error('comment')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link text-gray ms-auto" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-secondary animate-up-2">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
