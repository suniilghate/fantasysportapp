@extends('layouts.app')
@section('title')
    List Contests 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>List Contests</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('matches.index')}}" class="btn btn-primary form-btn">Match <i class="fas fa-plus"></i></a>
            </div>
        </div>
        @if (\Session::has('error'))
            <div class="alert alert-danger">
                <ul>
                    <li>{!! \Session::get('error') !!}</li>
                </ul>
            </div>
        @endif
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif    
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('matches.contests_table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

