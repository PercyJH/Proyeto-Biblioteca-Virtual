@extends('layouts.layout')

@section('title','Dashboard')

@section('css')

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <br><br><br><br>
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as admin!') }}

                <button href="url('admin/posts')">Go to Admin page</button>
                </div>
            </div>
            <br><br><br><br>
        </div>
    </div>
</div>
@endsection
