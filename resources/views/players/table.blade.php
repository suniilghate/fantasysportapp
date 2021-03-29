<div class="table-responsive">
    <table class="table" id="players-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Sport Id</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Type</th>
        <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($players as $player)
            <tr>
                <td>{{ $player->name }}</td>
                <td>{{ $player->sports->name }}</td>
                <td>{{ $player->age }}</td>
                <td>{{ $player->gender->name }}</td>
                <td>{{ $player->playertype->name }}</td>
                <td>{{ Config::get('fsa.status.players')[$player->status] }}</td>
                <td class=" text-center">
                    {!! Form::open(['route' => ['players.destroy', $player->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('players.show', [$player->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                        <a href="{!! route('players.edit', [$player->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>                               
            </tr>
        @endforeach
        </tbody>
    </table>
    {{-- Pagination --}}
    {!! $players->links() !!}
</div>