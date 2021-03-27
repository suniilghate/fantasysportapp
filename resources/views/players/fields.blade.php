<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Sport Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sport_id', 'Sport Id:') !!}
    @php
        $val = isset($sport_id) ? $sport_id : null;
    @endphp
    {!! Form::select('sport_id', $sports, $val, ['class' => 'form-control']) !!}
</div>

<!-- Age Field -->
<div class="form-group col-sm-6">
    {!! Form::label('age', 'Age:') !!}
    {!! Form::text('age', null, ['class' => 'form-control']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender_id', 'Gender:') !!}
    @php
        $val = isset($gender_id) ? $gender_id : null;
    @endphp
    {!! Form::select('gender_id', $gender, $val, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    @php
        $val = isset($type_id) ? $type_id : null;
    @endphp
    {!! Form::select('type', $type, $val, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('players.index') }}" class="btn btn-light">Cancel</a>
</div>
