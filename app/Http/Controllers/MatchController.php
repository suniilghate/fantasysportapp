<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMatchRequest;
use App\Http\Requests\UpdateMatchRequest;
use App\Repositories\MatchRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Series;
use App\Models\Sports;
use App\Models\Team;
use Flash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
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
        //dd($matches);
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

    public function open_match($matchId) {
        //update the match status| pool status | series status | sports status | team status | players status
        $matchObj = $this->matchRepository->getAll($matchId);
        try {
            // Begin a transaction
            DB::beginTransaction();
            //update sports status
            $matchObj->Series->Sports()->update(['status' => 2]);
            
            //update series status
            $matchObj->Series->update(['status' => 2]);

            //update match status
            $matchObj->update(['status' => 2]);

            //update contests status
            $matchObj->Contests()->update(['status' => 2]);

            //update team status
            Team::where('id', $matchObj->team1)->update(['status' => 2]);    
            Team::where('id', $matchObj->team2)->update(['status' => 2]);

            Team::find($matchObj->team1)->Players()->update(['status' => 2]);
            Team::find($matchObj->team2)->Players()->update(['status' => 2]);

            // Commit the transaction
            DB::commit();

            return redirect()->back()->with('success', 'Match opened.'); 
        } catch (\Exception $e) {
            // An error occured; cancel the transaction...
            DB::rollback();
            // and throw the error again.
            //throw $e;
            return redirect()->back()->with('error', 'Cannot opened matches.' . $e); 
        }
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
        if(Config::get('fsa.status.matches')[$match->status] != 'Active'){
            return redirect()->back()->with('error', 'Cannot edit the Match. Matches are opened or in progress.'); 
        }

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
        if(Config::get('fsa.status.matches')[$match->status] != 'Active'){
            return redirect()->back()->with('error', 'Cannot edit the Match. Matches are opened or in progress.'); 
        }

        if (empty($match)) {
            Flash::error('Match not found');

            return redirect(route('matches.index'));
        }

        $this->matchRepository->delete($id);

        Flash::success('Match deleted successfully.');

        return redirect(route('matches.index'));
    }
}
