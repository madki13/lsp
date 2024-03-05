@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card-header">{{ __('Edit  User') }}</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form enctype="multipart/form-data" action="{{ route('user.update', $user->id) }}"
                            method="post">
                            @csrf
                            @method('PUT')
                            <table class="table table-bordered">
                                <tr>
                                    <td>Name</td>
                                    <td><input type="text" class="form-control" name="name"
                                            value="{{ $user->name }}"></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><input type="text" class="form-control" name="email"
                                            value="{{ $user->email }}"></td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td><input type="text" class="form-control" name="role"
                                            value="{{ $user->role }}"></td>
                                </tr>

                                <tr>
                                    <td>&nbsp;</td>
                                    <td><button type="submit" class="btn btn-outline-success">Save</button></td>
                                </tr>
                            </table>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
