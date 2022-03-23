@extends('layouts.app')

@section('content')
    <div class="main py-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h2 class="mb-4 h5">{{ __('Users') }}</h2>        
            <button class="btn btn-primary animate-up-2" type="button" data-bs-toggle="modal"
            data-bs-target="#modal-default-user">New User</button>
        </div>
        
        <div class="card-body border-0 shadow table-wrapper table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="border-gray-200">{{ __('Name') }}</th>
                        <th class="border-gray-200">{{ __('Email') }}</th>
                        {{-- <th class="border-gray-200">{{ __('Actions') }}</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td><span class="fw-normal">{{ $user->name }}</span></td>
                            <td><span class="fw-normal">{{ $user->email }}</span></td>
                            <td class="td-form">
                                <button type="button" class="btn btn-primary animate-up-2" data-bs-toggle="modal" data-bs-target="#modal_edit_user{{$user->id}}">edit</button>
                                <form action="{{route('users.delete',$user)}}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-primary animate-up-2 ">delete</button>
                                </form> 
                            </td>
                        </tr>
                        @include('layouts.modal_edit_user')
                    @endforeach
                </tbody>
            </table>
            </div>
            <div
                class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
@include('layouts.modal_add_user')