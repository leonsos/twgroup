<div class="modal fade" id="modal-default-user" tabindex="-1" role="dialog" aria-labelledby="modal-default"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="h6 modal-title">Update user</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('users.save') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" id="name" type="text"                             name="name"></input>
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="Email" class="form-label">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" 
                            name="email"></input>
                    </div>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="password" class="form-label">Passowrd</label>
                        <input class="form-control @error('password') is-invalid @enderror" id="password" type="password"
                            name="password"></input>
                    </div>
                    @error('password')
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
