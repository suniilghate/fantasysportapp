<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSportsRequest;
use App\Http\Requests\UpdateSportsRequest;
use App\Repositories\SportsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Config;
use Response;

class SportsController extends AppBaseController
{
    /** @var  SportsRepository */
    private $sportsRepository;

    public function __construct(SportsRepository $sportsRepo)
    {
        $this->sportsRepository = $sportsRepo;
    }

    /**
     * Display a listing of the Sports.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $perPage = (env('PAGINATION_ROWS')) ? env('PAGINATION_ROWS') : 10;    
        $sports = $this->sportsRepository->paginate($perPage);

        return view('sports.index')
            ->with('sports', $sports);
    }

    /**
     * Show the form for creating a new Sports.
     *
     * @return Response
     */
    public function create()
    {
        return view('sports.create');
    }

    /**
     * Store a newly created Sports in storage.
     *
     * @param CreateSportsRequest $request
     *
     * @return Response
     */
    public function store(CreateSportsRequest $request)
    {
        $input = $request->all();

        $sports = $this->sportsRepository->create($input);

        Flash::success('Sports saved successfully.');

        return redirect(route('sports.index'));
    }

    /**
     * Display the specified Sports.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sports = $this->sportsRepository->find($id);

        if (empty($sports)) {
            Flash::error('Sports not found');

            return redirect(route('sports.index'));
        }

        return view('sports.show')->with('sports', $sports);
    }

    /**
     * Show the form for editing the specified Sports.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sports = $this->sportsRepository->find($id);
        
        if(Config::get('fsa.status.sports')[$sports->status] != 'Active'){
            return redirect()->back()->with('error', 'Cannot edit the Sport. Matches are opened or in progress.'); 
        }
        
        if (empty($sports)) {
            Flash::error('Sports not found');

            return redirect(route('sports.index'));
        }

        return view('sports.edit')->with('sports', $sports);
    }

    /**
     * Update the specified Sports in storage.
     *
     * @param int $id
     * @param UpdateSportsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSportsRequest $request)
    {
        $sports = $this->sportsRepository->find($id);

        if (empty($sports)) {
            Flash::error('Sports not found');

            return redirect(route('sports.index'));
        }

        $sports = $this->sportsRepository->update($request->all(), $id);

        Flash::success('Sports updated successfully.');

        return redirect(route('sports.index'));
    }

    /**
     * Remove the specified Sports from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sports = $this->sportsRepository->find($id);
        if(Config::get('fsa.status.sports')[$sports->status] != 'Active'){
            return redirect()->back()->with('error', 'Cannot edit the Sport. Matches are opened or in progress.'); 
        }

        if (empty($sports)) {
            Flash::error('Sports not found');

            return redirect(route('sports.index'));
        }

        $this->sportsRepository->delete($id);

        Flash::success('Sports deleted successfully.');

        return redirect(route('sports.index'));
    }
}
