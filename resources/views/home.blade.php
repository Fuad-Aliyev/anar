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
        <div class="card mt-5 "  style="width: 50rem;">
            <div class="card-body">
                <form action="{{URL::to('/save')}}" method="post">
                @csrf <!-- {{ csrf_field() }} -->
                    <div class="col-lg-12">
                        {{-- email recievers list --}}
                        </div>
                        <div class="form-group">
                            <label for="name" for="receivers" class="col-mm-2 col-form-label">to</label>
                            <input type="text" id="receivers" class="form-control" name="receivers" value="">
                        </div>
                        {{-- pick a date --}}
                        <div class="form-group">
                            <label for="name" for="date" class="col-mm-2 col-form-label">pick a date</label>
                            <input type="date" id="date" class="form-control" name="date" value="">
                        </div>
                        {{-- pick time --}}
                        <div class="form-group">
                            <label for="name" for="time" class="col-mm-2 col-form-label">pick a time</label>
                            <input type="time" id="time" class="form-control" name="time" value="">
                        </div>
                        {{-- email body --}}
                        <div class="form-group">
                            <label for="body">body</label>
                            <textarea class="form-control" id="body" name="email_body" rows="3"></textarea>
                        </div>

                        <button type="submit" name="button" class="btn btn-primary btn-lg">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
