<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index()
    {
        // Pegando os dados e ordenando pelo nome
        $series = Serie::query()->orderBy('nome')->get();

        return view('series.index')
            ->with('series', $series);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        Serie::create($request->only(['nome']));

        return to_route('series.index');
    }

    public function destroy(Request $request)
    {
        $idSerie = $request->series;
        Serie::destroy($idSerie);

        return to_route('series.index');
    }
}
