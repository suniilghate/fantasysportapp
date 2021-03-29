<div class="table-responsive">
    <table class="table" id="series-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Sports</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($series as $s)
            <tr>
                <td>{{ $s->name }}</td>
                <td>{{ $s->sports->name }}</td>
                <td>{{ $s->start_date }}</td>
                <td>{{ $s->end_date }}</td>
                <td>{{ $s->status }}</td>
                <td class=" text-center">
                    {!! Form::open(['route' => ['series.destroy', $s->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('series.show', [$s->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                        <a href="{!! route('series.edit', [$s->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{-- Pagination --}}
    {!! $series->links() !!}
</div>
