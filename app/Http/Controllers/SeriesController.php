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
        Serie::create($request->only(['nome']));
        $request->session()->flash('message.success', 'Série adicionada com sucesso!');

        return to_route('series.index');
    }

    public function destroy(Request $request)
    {
        $idSerie = $request->series;
        Serie::destroy($idSerie);
        $request->session()->flash('message.success', 'Série removida com sucesso!');

        return to_route('series.index');
    }
}
