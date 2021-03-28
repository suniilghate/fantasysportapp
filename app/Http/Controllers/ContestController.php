<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContestRequest;
use App\Http\Requests\UpdateContestRequest;
use App\Repositories\ContestRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Match;
use App\Models\ContestType;
use Flash;
use Response;

class ContestController extends AppBaseController
{
    /** @var  ContestRepository */
    private $contestRepository;

    public function __construct(ContestRepository $contestRepo)
    {
        $this->contestRepository = $contestRepo;
    }

    /**
     * Display a listing of the Contest.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $contests = $this->contestRepository->all();

        return view('contests.index')
            ->with('contests', $contests);
    }

    /**
     * Show the form for creating a new Contest.
     *
     * @return Response
     */
    public function create()
    {
        $match = Match::pluck('name','id')->all(); //match_id
        $contesttype = ContestType::pluck('name','id')->all(); //contest_type
        
        return view('contests.create', compact('match','contesttype'));
    }

    /**
     * Store a newly created Contest in storage.
     *
     * @param CreateContestRequest $request
     *
     * @return Response
     */
    public function store(CreateContestRequest $request)
    {
        $input = $request->all();
        $contestData = $this->contestRepository->checkData($input);
        if(!$contestData['flag']){
            return back()->withInput()->with('error',$contestData['message']);
        }

        $contest = $this->contestRepository->create($input);

        Flash::success('Contest saved successfully.');

        return redirect(route('contests.index'));
    }

    /**
     * Display the specified Contest.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contest = $this->contestRepository->find($id);

        if (empty($contest)) {
            Flash::error('Contest not found');

            return redirect(route('contests.index'));
        }

        return view('contests.show')->with('contest', $contest);
    }

    /**
     * Show the form for editing the specified Contest.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contest = $this->contestRepository->find($id);

        if (empty($contest)) {
            Flash::error('Contest not found');

            return redirect(route('contests.index'));
        }
        $match = Match::pluck('name','id')->all(); //match_id
        $contesttype = ContestType::pluck('name','id')->all(); //contest_type

        return view('contests.edit', compact('contest','match','contesttype'));
    }

    /**
     * Update the specified Contest in storage.
     *
     * @param int $id
     * @param UpdateContestRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContestRequest $request)
    {
        $contest = $this->contestRepository->find($id);

        if (empty($contest)) {
            Flash::error('Contest not found');

            return redirect(route('contests.index'));
        }
        $contestData = $this->contestRepository->checkData($request->all());
        if(!$contestData['flag']){
            return back()->withInput()->with('error',$contestData['message']);
        }
        $contest = $this->contestRepository->update($request->all(), $id);

        Flash::success('Contest updated successfully.');

        return redirect(route('contests.index'));
    }

    /**
     * Remove the specified Contest from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contest = $this->contestRepository->find($id);

        if (empty($contest)) {
            Flash::error('Contest not found');

            return redirect(route('contests.index'));
        }

        $this->contestRepository->delete($id);

        Flash::success('Contest deleted successfully.');

        return redirect(route('contests.index'));
    }
}
