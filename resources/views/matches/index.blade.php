@extends('layouts.app')
@section('title')
    Matches 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Matches</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('matches.create')}}" class="btn btn-primary form-btn">Match <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('matches.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

