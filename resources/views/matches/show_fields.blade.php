<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $match->name }}</p>
</div>

<!-- Series Id Field -->
<div class="form-group">
    {!! Form::label('series_id', 'Series Id:') !!}
    <p>{{ $match->series_id }}</p>
</div>

<!-- Team1 Field -->
<div class="form-group">
    {!! Form::label('team1', 'Team1:') !!}
    <p>{{ $match->team1 }}</p>
</div>

<!-- Team2 Field -->
<div class="form-group">
    {!! Form::label('team2', 'Team2:') !!}
    <p>{{ $match->team2 }}</p>
</div>

<!-- Date Field -->
<div class="form-group">
    {!! Form::label('date', 'Date:') !!}
    <p>{{ $match->date }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $match->status }}</p>
</div>

<!-- Result Field -->
<div class="form-group">
    {!! Form::label('result', 'Result:') !!}
    <p>{{ $match->result }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $match->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $match->updated_at }}</p>
</div>

