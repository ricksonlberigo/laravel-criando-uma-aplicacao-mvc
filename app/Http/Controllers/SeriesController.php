<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        // Pegando os dados e ordenando pelo nome
        $series = Serie::query()->orderBy('nome')->get();
        $successMessage = session('message.success');

        return view('series.index')
            ->with('series', $series)->with('successMessage', $successMessage);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $serie = Serie::create($request->only(['nome']));
        $request->session()->flash('message.success', "Série \"{$serie->nome}\" adicionada com sucesso!");

        return to_route('series.index');
    }

    public function destroy(Request $request, Serie $series)
    {
        $series->delete();
        $request->session()->flash('message.success', "Série \"{$series->nome}\" removida com sucesso!");

        return to_route('series.index');
    }
}
