<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="h6 modal-title">New task</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('tasks.save') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="Description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3"
                            name="description"></textarea>
                    </div>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="timeToExecution" class="form-label">time to execution</label>
                        <input type="date" class="form-control @error('timeToExecution') is-invalid @enderror" id="date"
                            name="timeToExecution">
                    </div>
                    @error('timeToExecution')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    {{-- @if (count($users) > 0 && auth()->user()->role == 1) --}}
                    <div class="mb-3">                        
                        <label class="my-1 me-2" for="country">Assign to</label>
                        <select class="form-select" id="country" aria-label="Default select example" name="user_id">
                            <option selected>Select person</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="author" value="{{auth()->id()}}">
                    {{-- @endif --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link text-gray ms-auto" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-secondary animate-up-2">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
