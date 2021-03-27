<!-- Player Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('player_id', 'Player Id:') !!}
    {!! Form::select('player_id[]', $players, null, ['class' => 'form-control', 'multiple'=>'multiple']) !!}
</div>

{!! Form::hidden('team_id', $id, ['class' => 'form-control']) !!}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('teams.index') }}" class="btn btn-light">Cancel</a>
</div>
