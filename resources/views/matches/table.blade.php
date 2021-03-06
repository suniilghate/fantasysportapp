<div class="table-responsive">
    <table class="table" id="matches-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Series</th>
                <th>Team1</th>
                <th>Team2</th>
                <th>Date</th>
                <th>Status</th>
                <th>Result</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($matches as $match)
            <tr>
                <td>{{ $match->name }}</td>
                <td>{{ $match->series->name }}</td>
                <td>{{ $match->team1name }}</td>
                <td>{{ $match->team2name }}</td>
                <td>{{ $match->date }}</td>
                <td>{{ Config::get('fsa.status.matches')[$match->status] }}</td>
                
                <td>{{ $match->result }}</td>
                <td class=" text-center">
                    {!! Form::open(['route' => ['matches.destroy', $match->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('matches.show', [$match->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                        @if(Config::get('fsa.status.matches')[$match->status] == 'Active')
                        <a href="{!! route('matches.open', [$match->id]) !!}" class='btn btn-warning action-btn'><i class="fa fa-unlock-alt"></i></a>
                        @endif
                        @if($match->status == 2)
                        <a href="{!! route('matches.listcontests', [$match->id]) !!}" class='btn btn-warning action-btn'><i class="fa fa-list-ul"></i></a>    
                        @endif
                        <a href="{!! route('matches.edit', [$match->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{-- Pagination --}}
    {!! $matches->links() !!}
</div>
