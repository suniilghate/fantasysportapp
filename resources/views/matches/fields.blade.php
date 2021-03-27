<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Series Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('series_id', 'Series Id:') !!}
    @php
        $val = isset($series_id) ? $series_id : null;
    @endphp
    {!! Form::select('series_id', $series, $val, ['class' => 'form-control']) !!}
</div>

<!-- Team1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('team1', 'Team1:') !!}
    @php
        $val = isset($team1) ? $team1 : null;
    @endphp
    {!! Form::select('team1', $teams, $val, ['class' => 'form-control']) !!}
</div>

<!-- Team2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('team2', 'Team2:') !!}
    @php
        $val = isset($team2) ? $team2 : null;
    @endphp
    {!! Form::select('team2', $teams, $val, ['class' => 'form-control']) !!}
</div>

<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    @php
        $val = isset($date) ? $date : null;
    @endphp
    {!! Form::date('date', $val, ['class' => 'form-control','id'=>'date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('matches.index') }}" class="btn btn-light">Cancel</a>
</div>
