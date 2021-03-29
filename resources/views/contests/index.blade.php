@extends('layouts.app')
@section('title')
    Contests 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Contests</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('contests.create')}}" class="btn btn-primary form-btn">Contest <i class="fas fa-plus"></i></a>
            </div>
        </div>
        @if (\Session::has('error'))
            <div class="alert alert-danger">
                <ul>
                    <li>{!! \Session::get('error') !!}</li>
                </ul>
            </div>
        @endif
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('contests.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

