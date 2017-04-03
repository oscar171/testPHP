<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateratingRequest;
use App\Http\Requests\UpdateratingRequest;
use App\Repositories\ratingRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\movie;

class ratingController extends AppBaseController
{
    /** @var  ratingRepository */
    private $ratingRepository;

    public function __construct(ratingRepository $ratingRepo)
    {
        $this->ratingRepository = $ratingRepo;
    }

    /**
     * Display a listing of the rating.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ratingRepository->pushCriteria(new RequestCriteria($request));
        $ratings = $this->ratingRepository->all();

        return view('ratings.index')
            ->with('ratings', $ratings);
    }

    /**
     * Show the form for creating a new rating.
     *
     * @return Response
     */
    public function create(Request $request)
    {       
        $movie = movie::find($request->movie_id);
        return view('ratings.create')->with('movie',$movie);
    }

    /**
     * Store a newly created rating in storage.
     *
     * @param CreateratingRequest $request
     *
     * @return Response
     */
    public function store(CreateratingRequest $request)
    {
        $input = $request->all();

        $input['movie_id'] = $request->movie_id;
        $input['user_id'] = Auth::id();

        $rating = $this->ratingRepository->create($input);

        Flash::success('Creado correctamente.');

        return redirect(route('movies.index'));
    }

    /**
     * Display the specified rating.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rating = $this->ratingRepository->findWithoutFail($id);

        if (empty($rating)) {
            Flash::error('Rating no encontrado');

            return redirect(route('ratings.index'));
        }

        return view('ratings.show')->with('rating', $rating);
    }

    /**
     * Show the form for editing the specified rating.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rating = $this->ratingRepository->findWithoutFail($id);

        if (empty($rating)) {
            Flash::error('Rating no encontrado');

            return redirect(route('ratings.index'));
        }

        return view('ratings.edit')->with('rating', $rating);
    }

    /**
     * Update the specified rating in storage.
     *
     * @param  int              $id
     * @param UpdateratingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateratingRequest $request)
    {
        $rating = $this->ratingRepository->findWithoutFail($id);

        if (empty($rating)) {
            Flash::error('Valoracion no encontrada');

            return redirect(route('ratings.index'));
        }

        $rating = $this->ratingRepository->update($request->all(), $id);

        Flash::success('Valoracion actualizada correctamente.');

        return redirect(route('movies.index'));
    }

    /**
     * Remove the specified rating from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rating = $this->ratingRepository->findWithoutFail($id);

        if (empty($rating)) {
            Flash::error('Rating not found');

            return redirect(route('ratings.index'));
        }

        $this->ratingRepository->delete($id);

        Flash::success('Valoracion eliminada correctamente.');

        return redirect(route('movies.index'));
    }
}
