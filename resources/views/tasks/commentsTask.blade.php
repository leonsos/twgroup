@extends('layouts.app')

@section('content')
    <div class="card py-4">
        <div class="card-header  d-flex justify-content-between align-items-center">

            <h2 class="mb-4 h5">{{ $tasks->description }}</h2>
            {{-- <a href="{{route('tasks.index')}}" class="btn btn-primary animate-up-2" type="button">Back</a>  --}}
            <button class="btn btn-primary animate-up-2" type="button" data-bs-toggle="modal"
                                data-bs-target="#modal-assign">New Comment</button>
        </div>
        {{-- <form action="{{ route('tasks.assigTask') }}" method="post">
            @csrf --}}
            <div class="card card-body border-0 shadow table-wrapper table-responsive">
                @isset($myTask)
                    @foreach ($myTask as $t)
                        <div class="alert alert-gray-800 d-flex justify-content-between" role="alert">
                            <p>

                                {{ $t->content }}
                            </p>
                            <p>

                                {{ $t->created_at }}
                            </p>
                        </div>
                    @endforeach
                @endisset
                {{-- <input type="hidden" name="idTask" value="{{ $id }}">
                <div class="mb-3">
                    <label for="comment" class="form-label">New comment</label>
                    <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" rows="3" name="comment"></textarea>
                </div>
                @error('comment')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror --}}


            </div>
            {{-- <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
               <button type="button" class="btn btn-link text-gray ms-auto" data-bs-dismiss="modal">Close</button> 
                <button type="submit" class="btn btn-secondary animate-up-2">Save</button>
            </div> --}}
        {{-- </form> --}}
    </div>
@endsection
@include('layouts.modal_assign_task')