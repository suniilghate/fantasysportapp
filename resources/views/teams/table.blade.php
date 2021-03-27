<div class="table-responsive">
    <table class="table" id="teams-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Sport Id</th>
                <th>Country</th>
                <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($teams as $team)
            <tr>
                <td>{{ $team->name }}</td>
                <td>{{ $team->description }}</td>
                <td>{{ $team->sports->name }}</td>
                <td>{{ $team->country }}</td>
                <td>{{ $team->status }}</td>
                <td class=" text-center">
                    {!! Form::open(['route' => ['teams.destroy', $team->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('teams.show', [$team->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                        <a href="{!! route('teams.teamplayers', [$team->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                        <!--<a href="{!! route('teams.fetchteamplayers', [$team->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>-->
                        <a href="{!! route('teams.edit', [$team->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
