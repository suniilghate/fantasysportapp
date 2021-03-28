<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMatchRequest;
use App\Http\Requests\UpdateMatchRequest;
use App\Repositories\MatchRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Series;
use App\Models\Team;
use Flash;
use Response;

class MatchController extends AppBaseController
{
    /** @var  MatchRepository */
    private $matchRepository;

    public function __construct(MatchRepository $matchRepo)
    {
        $this->matchRepository = $matchRepo;
    }

    /**
     * Display a listing of the Match.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $matches = $this->matchRepository->getAll();
        
        return view('matches.index')
            ->with('matches', $matches);
    }

    /**
     * Show the form for creating a new Match.
     *
     * @return Response
     */
    public function create()
    {
        $series = Series::pluck('name','id')->all(); //Series Id
        $teams = Team::pluck('name','id')->all(); //Team1 Id | Team2 Id
        
        return view('matches.create', compact('series','teams'));
    }

    /**
     * Store a newly created Match in storage.
     *
     * @param CreateMatchRequest $request
     *
     * @return Response
     */
    public function store(CreateMatchRequest $request)
    {
        $input = $request->all();

        $matchData = $this->matchRepository->checkData($input);
        if(!$matchData['flag']){
            return back()->withInput()->with('error',$matchData['message']);
        }

        $match = $this->matchRepository->create($input);
        Flash::success('Match saved successfully.');

        return redirect(route('matches.index'));
    }

    /**
     * Display the specified Match.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $match = $this->matchRepository->getAll($id);
        
        if (empty($match)) {
            Flash::error('Match not found');
            return redirect(route('matches.index'));
        }

        return view('matches.show')->with('match', $match);
    }

    /**
     * Show the form for editing the specified Match.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $match = $this->matchRepository->find($id);
        if (empty($match)) {
            Flash::error('Match not found');
            return redirect(route('matches.index'));
        }

        $series_id = $match->series_id;
        $team1 = $match->team1;
        $team2 = $match->team2;
        $date = $match->date;
        
        $series = Series::pluck('name','id')->all(); //Series Id
        $teams = Team::pluck('name','id')->all(); //Team1 Id | Team2 Id

        return view('matches.edit', compact('match', 'series', 'teams', 'series_id', 'team1', 'team2', 'date'));
    }

    /**
     * Update the specified Match in storage.
     *
     * @param int $id
     * @param UpdateMatchRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMatchRequest $request)
    {
        $match = $this->matchRepository->find($id);

        if (empty($match)) {
            Flash::error('Match not found');

            return redirect(route('matches.index'));
        }
        $matchData = $this->matchRepository->checkData($request->all());
        if(!$matchData['flag']){
            return back()->withInput()->with('error',$matchData['message']);
        }
        
        $match = $this->matchRepository->update($request->all(), $id);

        Flash::success('Match updated successfully.');

        return redirect(route('matches.index'));
    }

    /**
     * Remove the specified Match from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $match = $this->matchRepository->find($id);

        if (empty($match)) {
            Flash::error('Match not found');

            return redirect(route('matches.index'));
        }

        $this->matchRepository->delete($id);

        Flash::success('Match deleted successfully.');

        return redirect(route('matches.index'));
    }
}
