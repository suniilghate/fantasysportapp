<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $contest->name }}</p>
</div>

<!-- Contest Type Field -->
<div class="form-group">
    {!! Form::label('contest_type', 'Contest Type:') !!}
    <p>{{ $contest->contesttype->name }}</p>
</div>

<!-- Match Id Field -->
<div class="form-group">
    {!! Form::label('match_id', 'Match Id:') !!}
    <p>{{ $contest->match_id }}</p>
</div>

<!-- Wining Amount Field -->
<div class="form-group">
    {!! Form::label('wining_amount', 'Wining Amount:') !!}
    <p>{{ $contest->wining_amount }}</p>
</div>

<!-- Entry Fee Field -->
<div class="form-group">
    {!! Form::label('entry_fee', 'Entry Fee:') !!}
    <p>{{ $contest->entry_fee }}</p>
</div>

<!-- Total Amount Field -->
<div class="form-group">
    {!! Form::label('total_amount', 'Total Amount:') !!}
    <p>{{ $contest->total_amount }}</p>
</div>

<!-- Contest Total Users Field -->
<div class="form-group">
    {!! Form::label('contest_total_users', 'Contest Total Users:') !!}
    <p>{{ $contest->contest_total_users }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $contest->status }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $contest->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $contest->updated_at }}</p>
</div>

