<div class="table-responsive">
    <table class="table" id="sports-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($sports as $sport)
            <tr>
                <td>{{ $sport->name }}</td>
                <td>{{ $sport->description }}</td>
                <td class=" text-center">
                    {!! Form::open(['route' => ['sports.destroy', $sport->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('sports.show', [$sport->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                        <a href="{!! route('sports.edit', [$sport->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{-- Pagination --}}
    {!! $sports->links() !!}
</div>
