<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', old('name'), ['type' => 'text', 'class' => 'form-control']) !!}
</div>

<!-- Contest Type Field -->
<div class="form-group col-sm-12">
    {!! Form::label('contest_type', 'Contest Type:') !!}
    {!! Form::select('contest_type', $contesttype, old('contest_type'), ['class' => 'form-control']) !!}
</div>

<!-- Match Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('match_id', 'Match Id:') !!}
    {!! Form::select('match_id', $match, old('match_id'), ['class' => 'form-control']) !!}
</div>

<!-- Wining Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('wining_amount', 'Wining Amount:') !!}
    {!! Form::text('wining_amount', old('wining_amount'), ['class' => 'form-control']) !!}
</div>

<!-- Entry Fee Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entry_fee', 'Entry Fee:') !!}
    {!! Form::text('entry_fee', old('entry_fee'), ['class' => 'form-control']) !!}
</div>

<!-- Total Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_amount', 'Total Amount:') !!}
    {!! Form::text('total_amount', old('total_amount'), ['class' => 'form-control']) !!}
</div>

<!-- Contest Total Users Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contest_total_users', 'Contest Total Users:') !!}
    {!! Form::text('contest_total_users', old('contest_total_users'), ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contests.index') }}" class="btn btn-light">Cancel</a>
</div>
