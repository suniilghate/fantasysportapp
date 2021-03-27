<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $players->name }}</p>
</div>

<!-- Sport Id Field -->
<div class="form-group">
    {!! Form::label('sport_id', 'Sport Id:') !!}
    <p>{{ $players->sports->name }}</p>
</div>

<!-- Age Field -->
<div class="form-group">
    {!! Form::label('age', 'Age:') !!}
    <p>{{ $players->age }}</p>
</div>

<!-- Gender Field -->
<div class="form-group">
    {!! Form::label('gender_id', 'Gender:') !!}
    <p>{{ $players->gender->name }}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    <p>{{ $players->playertype->name }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $players->status }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $players->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $players->updated_at }}</p>
</div>

