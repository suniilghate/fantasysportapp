<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePlayersRequest;
use App\Http\Requests\UpdatePlayersRequest;
use App\Repositories\PlayersRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Players;
use App\Models\Sports;
use App\Models\Gender;
use App\Models\PlayerType;
use Illuminate\Http\Request;
use Flash;
use Response;

class PlayersController extends AppBaseController
{
    /** @var  PlayersRepository */
    private $playersRepository;

    public function __construct(PlayersRepository $playersRepo)
    {
        $this->playersRepository = $playersRepo;
    }

    /**
     * Display a listing of the Players.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $perPage = (env('PAGINATION_ROWS')) ? env('PAGINATION_ROWS') : 20;
        $players = $this->playersRepository->paginate($perPage);
        //dd($players);
        return view('players.index')
                ->with('players', $players);
    }

    /**
     * Show the form for creating a new Players.
     *
     * @return Response
     */
    public function create()
    {
        $sports = Sports::pluck('name','id')->all(); //Sports Id
        $gender = Gender::pluck('name','id')->all(); //Gender Id
        $type = PlayerType::pluck('description', 'id')->all(); //PlayerType

        return view('players.create', compact('sports','gender','type'));
    }

    /**
     * Store a newly created Players in storage.
     *
     * @param CreatePlayersRequest $request
     *
     * @return Response
     */
    public function store(CreatePlayersRequest $request)
    {
        $input = $request->all();
        $players = $this->playersRepository->create($input);
        Flash::success('Players saved successfully.');

        return redirect(route('players.index'));
    }

    /**
     * Display the specified Players.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $players = $this->playersRepository->find($id);
        if (empty($players)) {
            Flash::error('Players not found');
            return redirect(route('players.index'));
        }

        return view('players.show')->with('players', $players);
    }

    /**
     * Show the form for editing the specified Players.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $players = $this->playersRepository->find($id);
        if (empty($players)) {
            Flash::error('Players not found');
            return redirect(route('players.index'));
        }
        $sports = Sports::pluck('name','id')->all(); //Sports Id
        $gender = Gender::pluck('name','id')->all(); //Gender Id
        $type = PlayerType::pluck('description', 'id')->all(); //PlayerType
        
        $sport_id = $players->sports->id;
        $gender_id = $players->gender->id;
        $type_id = $players->playertype->id;
        
        return view('players.edit', compact('players', 'sports', 'gender', 'type', 'sport_id', 'gender_id', 'type_id'));
    }

    /**
     * Update the specified Players in storage.
     *
     * @param int $id
     * @param UpdatePlayersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePlayersRequest $request)
    {
        $players = $this->playersRepository->find($id);
        if (empty($players)) {
            Flash::error('Players not found');
            return redirect(route('players.index'));
        }
        $players = $this->playersRepository->update($request->all(), $id);
        Flash::success('Players updated successfully.');

        return redirect(route('players.index'));
    }

    /**
     * Remove the specified Players from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $players = $this->playersRepository->find($id);
        if (empty($players)) {
            Flash::error('Players not found');
            return redirect(route('players.index'));
        }
        $this->playersRepository->delete($id);
        Flash::success('Players deleted successfully.');

        return redirect(route('players.index'));
    }
}
