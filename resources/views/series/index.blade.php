@extends('layouts.app')
@section('title')
    Series 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Series</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('series.create')}}" class="btn btn-primary form-btn">Series <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('series.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

