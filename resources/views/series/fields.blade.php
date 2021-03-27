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

<!-- Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date', 'Start Date:') !!}
    @php
        $val = isset($start_date) ? $start_date : null;
    @endphp
    {!! Form::date('start_date', $val, ['class' => 'form-control','id'=>'start_date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#start_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- End Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_date', 'End Date:') !!}
    @php
        $val = isset($end_date) ? $end_date : null;
    @endphp
    {!! Form::date('end_date', $val, ['class' => 'form-control','id'=>'end_date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#end_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('series.index') }}" class="btn btn-light">Cancel</a>
</div>
