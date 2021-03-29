<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Repositories\TeamRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Sports;
use App\Models\Players;
use Flash;
use Response;

class TeamController extends AppBaseController
{
    /** @var  TeamRepository */
    private $teamRepository;

    public function __construct(TeamRepository $teamRepo)
    {
        $this->teamRepository = $teamRepo;
    }

    /**
     * Display a listing of the Team.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $perPage = (env('PAGINATION_ROWS')) ? env('PAGINATION_ROWS') : 20;
        $teams = $this->teamRepository->paginate($perPage);

        return view('teams.index')
            ->with('teams', $teams);
    }

    /**
     * Show the form for creating a new Team.
     *
     * @return Response
     */
    public function create()
    {
        $sports = Sports::pluck('name','id')->all(); //Sports Id
        
        return view('teams.create', compact('sports'));
    }

    /**
     * Store a newly created Team in storage.
     *
     * @param CreateTeamRequest $request
     *
     * @return Response
     */
    public function store(CreateTeamRequest $request)
    {
        $input = $request->all();
        $team = $this->teamRepository->create($input);
        Flash::success('Team saved successfully.');

        return redirect(route('teams.index'));
    }

    /**
     * Store a newly created Team in storage.
     *
     * @param CreateTeamRequest $request
     *
     * @return Response
     */
    public function store_team_players(Request $request)
    {
        $input = $request->all();
        $team = $this->teamRepository->find($input['team_id']);
        $teamPlayers = $team->Players()->attach($input['player_id']);
        
        Flash::success('Team Players saved successfully.');

        return redirect(route('teams.index'));
    }
    

    /**
     * Store a newly created Team in storage.
     *
     * @param CreateTeamRequest $request
     *
     * @return Response
     */
    public function add_team_players($id)
    {
        $players = Players::pluck('name','id')->all(); //Players Id
        return view('teams.addplayers', compact('players','id'));
    }

    /**
     * Display the specified Team.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $team = $this->teamRepository->find($id);
        if (empty($team)) {
            Flash::error('Team not found');
            return redirect(route('teams.index'));
        }

        return view('teams.show')->with('team', $team);
    }

    /**
     * Show the form for editing the specified Team.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $team = $this->teamRepository->find($id);
        if (empty($team)) {
            Flash::error('Team not found');
            return redirect(route('teams.index'));
        }
        $sports = Sports::pluck('name','id')->all(); //Sports Id
        $sport_id = $team->sports->id;

        return view('teams.edit', compact('team', 'sports'));
    }

    /**
     * Update the specified Team in storage.
     *
     * @param int $id
     * @param UpdateTeamRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTeamRequest $request)
    {
        $team = $this->teamRepository->find($id);
        if (empty($team)) {
            Flash::error('Team not found');
            return redirect(route('teams.index'));
        }
        $team = $this->teamRepository->update($request->all(), $id);
        Flash::success('Team updated successfully.');

        return redirect(route('teams.index'));
    }

    /**
     * Remove the specified Team from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $team = $this->teamRepository->find($id);
        if (empty($team)) {
            Flash::error('Team not found');
            return redirect(route('teams.index'));
        }
        $this->teamRepository->delete($id);
        Flash::success('Team deleted successfully.');

        return redirect(route('teams.index'));
    }
}
