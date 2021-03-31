<div class="table-responsive">
    <table class="table" id="matches-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Progress</th>
                <th>Wining Amount</th>
                <th>Entry Fee</th>
                <th>Contest Type</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                //print_r($usercontests);
            @endphp
            @foreach($usercontests as $k => $contests)
            <tr>
                <td>{{ $contests[0]->name }}</td>
                <td>{{ $contests['userjoincount'] }} / {{ $contests[0]->contest_total_users }}</td>
                <td>{{ $contests[0]->wining_amount }}</td>
                <td>{{ $contests[0]->entry_fee }}</td>
                <td>{{ Config::get('fsa.contests-type')[$contests[0]->contest_type] }}</td>
                <td>
                <a href="#" class='btn btn-warning action-btn player-lobby' data-id="{{ $contests[0]->match_id }}" data-id-1="{{ $contests[0]->id }}" data-id-2="{{ $contests[0]->entry_fee }}"><i class="fa fa-plus"></i></a>    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
