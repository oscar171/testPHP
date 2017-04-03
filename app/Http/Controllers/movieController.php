<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatemovieRequest;
use App\Http\Requests\UpdatemovieRequest;
use App\Repositories\movieRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class movieController extends AppBaseController
{
    /** @var  movieRepository */
    private $movieRepository;

    public function __construct(movieRepository $movieRepo)
    {
        $this->movieRepository = $movieRepo;
    }

    /**
     * Display a listing of the movie.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->movieRepository->pushCriteria(new RequestCriteria($request));
        $movies = $this->movieRepository->all();

        return view('movies.index')
            ->with('movies', $movies);
    }

    /**
     * Show the form for creating a new movie.
     *
     * @return Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created movie in storage.
     *
     * @param CreatemovieRequest $request
     *
     * @return Response
     */
    public function store(CreatemovieRequest $request)
    {
        $input = $request->all();
        $movie = $this->movieRepository->create($input);

        Flash::success('Movie creado correctamente.');

        return redirect(route('movies.index'));
    }

    /**
     * Display the specified movie.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $movie = $this->movieRepository->findWithoutFail($id);

        if (empty($movie)) {
            Flash::error('Movie no encontrado');

            return redirect(route('movies.index'));
        }

        return view('movies.show')->with('movie', $movie);
    }

    /**
     * Show the form for editing the specified movie.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $movie = $this->movieRepository->findWithoutFail($id);

        if (empty($movie)) {
            Flash::error('Movie no encontrado');

            return redirect(route('movies.index'));
        }

        return view('movies.edit')->with('movie', $movie);
    }

    /**
     * Update the specified movie in storage.
     *
     * @param  int              $id
     * @param UpdatemovieRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemovieRequest $request)
    {
        $movie = $this->movieRepository->findWithoutFail($id);

        if (empty($movie)) {
            Flash::error('Movie not found');

            return redirect(route('movies.index'));
        }

        $movie = $this->movieRepository->update($request->all(), $id);

        Flash::success('Movie actualizado correctamente.');

        return redirect(route('movies.index'));
    }

    /**
     * Remove the specified movie from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $movie = $this->movieRepository->findWithoutFail($id);

        if (empty($movie)) {
            Flash::error('Movie not found');

            return redirect(route('movies.index'));
        }

        $this->movieRepository->delete($id);

        Flash::success('Movie eliminado correctamente.');

        return redirect(route('movies.index'));
    }
}
