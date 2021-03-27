@extends('layouts.app')
@section('title')
    Sports 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Sports</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('sports.create')}}" class="btn btn-primary form-btn">Sports <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('sports.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

