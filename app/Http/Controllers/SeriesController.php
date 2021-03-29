<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSeriesRequest;
use App\Http\Requests\UpdateSeriesRequest;
use App\Repositories\SeriesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Sports;
use Flash;
use Response;

class SeriesController extends AppBaseController
{
    /** @var  SeriesRepository */
    private $seriesRepository;

    public function __construct(SeriesRepository $seriesRepo)
    {
        $this->seriesRepository = $seriesRepo;
    }

    /**
     * Display a listing of the Series.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $perPage = (env('PAGINATION_ROWS')) ? env('PAGINATION_ROWS') : 10;    
        $series = $this->seriesRepository->paginate($perPage);
        
        return view('series.index')
            ->with('series', $series);
    }

    /**
     * Show the form for creating a new Series.
     *
     * @return Response
     */
    public function create()
    {
        $sports = Sports::pluck('name','id')->all(); //Sports Id

        return view('series.create', compact('sports'));
    }

    /**
     * Store a newly created Series in storage.
     *
     * @param CreateSeriesRequest $request
     *
     * @return Response
     */
    public function store(CreateSeriesRequest $request)
    {
        $input = $request->all();
        $series = $this->seriesRepository->create($input);
        Flash::success('Series saved successfully.');

        return redirect(route('series.index'));
    }

    /**
     * Display the specified Series.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $series = $this->seriesRepository->find($id);
        if (empty($series)) {
            Flash::error('Series not found');
            return redirect(route('series.index'));
        }

        return view('series.show')->with('series', $series);
    }

    /**
     * Show the form for editing the specified Series.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $series = $this->seriesRepository->find($id);
        if (empty($series)) {
            Flash::error('Series not found');
            return redirect(route('series.index'));
        }
        $sports = Sports::pluck('name','id')->all(); //Sports Id
        $sport_id = $series->sports->id;
        $start_date = $series->start_date;
        $end_date = $series->end_date;

        return view('series.edit', compact('series', 'sports', 'start_date', 'end_date'));
    }

    /**
     * Update the specified Series in storage.
     *
     * @param int $id
     * @param UpdateSeriesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSeriesRequest $request)
    {
        $series = $this->seriesRepository->find($id);
        if (empty($series)) {
            Flash::error('Series not found');
            return redirect(route('series.index'));
        }
        $series = $this->seriesRepository->update($request->all(), $id);
        Flash::success('Series updated successfully.');

        return redirect(route('series.index'));
    }

    /**
     * Remove the specified Series from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $series = $this->seriesRepository->find($id);
        if (empty($series)) {
            Flash::error('Series not found');
            return redirect(route('series.index'));
        }
        $this->seriesRepository->delete($id);
        Flash::success('Series deleted successfully.');

        return redirect(route('series.index'));
    }
}
