@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card mt-5" style="width: 30rem;">
            {{-- Register form --}}
            <div class="card-body">
                <h1 class="card-title">Qeydiyyat</h1>
                <form action="{{URL::to('/logs')}}" method="post">
                @csrf <!-- {{ csrf_field() }} -->
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="name" for="email" class="col-mm-2 col-form-label">Email</label>
                            <input type="text" id="email" class="form-control" name="email" value="">
                            <label for="name" for="password" class="col-mm-2 col-form-label">Password</label>
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" class="form-control"  name="password" value="">
                        </div>
                        <button type="submit" name="button" class="btn btn-primary btn-lg">Giriş et</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
