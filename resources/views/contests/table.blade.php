<div class="table-responsive">
    <table class="table" id="contests-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Contest Type</th>
                <th>Match Id</th>
                <th>Wining Amount</th>
                <th>Entry Fee</th>
                <th>Total Amount</th>
                <th>Contest Total Users</th>
                <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contests as $contest)
            <tr>
                <td>{{ $contest->name }}</td>
                <td>{{ $contest->contesttype->name }}</td>
                <td>{{ $contest->match->name }}</td>
                <td>{{ $contest->wining_amount }}</td>
                <td>{{ $contest->entry_fee }}</td>
                <td>{{ $contest->total_amount }}</td>
                <td>{{ $contest->contest_total_users }}</td>
                <td>{{ Config::get('fsa.status.contest')[$contest->status] }}</td>
                <td class=" text-center">
                    {!! Form::open(['route' => ['contests.destroy', $contest->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('contests.show', [$contest->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                        <a href="{!! route('contests.edit', [$contest->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{-- Pagination --}}
    {!! $contests->links() !!}
</div>
