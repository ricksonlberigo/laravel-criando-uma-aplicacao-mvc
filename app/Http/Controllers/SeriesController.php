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
        $serieName = $request->input('name');

        $serie = new Serie();
        $serie->nome = $serieName;
        $serieSaved = $serie->save();

        if (!$serieSaved) {
            return redirect('/series/save');
        }

        return redirect('/series');
    }
}
