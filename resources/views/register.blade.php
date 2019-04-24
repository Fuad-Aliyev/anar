@extends('layouts.app')

@section('content')
        <div class="container box">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    <div class="row justify-content-center">
        <div class="card mt-5" style="width: 30rem;">
            {{-- Register form --}}
            <div class="card-body">
                <h1 class="card-title">Qeydiyyat</h1>
                <form action="{{URL::to('/store')}}" method="post">
                @csrf <!-- {{ csrf_field() }} -->
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="name" for="firstame" class="col-mm-2 col-form-label">Name</label>
                            <input type="text" id="firstame" class="form-control" name="name" value="">
                        </div>
                        <div class="form-group">
                            <label for="name" for="lastame" class="col-mm-2 col-form-label">Surname</label>
                            <input type="text" id="lastname" class="form-control" name="surname" value="">
                        </div>
                        <div class="form-group">
                            <label for="name" for="email" class="col-mm-2 col-form-label">Email</label>
                            <input type="text" id="email" class="form-control" name="email" value="">
                        </div>    
                        <div class="form-group">
                            <label for="name" for="password" class="col-mm-2 col-form-label">Password</label>
                            <input type="password" id="password" class="form-control"  name="password" value="">
                        </div>    
                        <button type="submit" name="button" class="btn btn-primary btn-lg">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
@endsection
