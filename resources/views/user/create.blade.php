@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-12">
                {{-- //show message @error('record') --}}
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
                <div class="card">
                    <div class="card-header">{{ __('Tambah User') }}</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form enctype="multipart/form-data" action="{{ route('user.store') }}" method="post">
                                @csrf
                                @method('POST')
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Name</td>
                                        <td><input type="text" class="form-control" name="name"></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><input type="text" class="form-control" name="email"></td>
                                    </tr>
                                    <tr>
                                        <td>Password</td>
                                        <td><input type="password" class="form-control" name="password" data-placeholder="Masukan Password"></td>
                                    </tr>
                                    <tr>
                                        <td>Role</td>
                                        <td><select class="form-select" data-control="select2" data-placeholder="pilih role" name="role">
                                            <option></option>
                                            <option value="user">user</option>
                                            <option value="maskapai">maskapai</option></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><button class="btn btn-outline-success">Save</button></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
