<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;

class SeriesController extends Controller
{
    public function index()
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

    public function store(SeriesFormRequest $request)
    {
        $series = Serie::create($request->only(['nome']));

        return to_route('series.index')
            ->with('message.success', "Série \"{$series->nome}\" adicionada com sucesso!");
    }

    public function destroy(Serie $series)
    {
        $series->delete();

        return to_route('series.index')
            ->with('message.success', "Série \"{$series->nome}\" removida com sucesso!");
    }

    public function edit(Serie $series)
    {
        return view('series.edit')->with('series', $series);
    }

    public function update(Serie $series, SeriesFormRequest $request)
    {
        // $series->nome = $request->nome; ou podemos usar assim quando temos a Model como argumento
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
            ->with('message.success',  "Série \"{$series->nome}\" atualizada com sucesso!");
    }
}
