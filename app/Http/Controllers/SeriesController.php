<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Http\Requests\SeriesFormRequest;

class SeriesController extends Controller
{
    public function index()
    {
        // Caso eu queria usar um escopo local, seria assim
        // $series = Serie::active()->get();

        // Pegando os dados e ordenando pelo nome
        $series = Series::all();
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
        $series = Series::create($request->only(['nome']));

        for ($i = 1; $i <= $request->seasonsQty; $i++) {
            $season = $series->seasons()->create([
                'number' => $i,
            ]);

            for ($j = 1; $j <= $request->episodesPerSeason; $j++)
                $season->episodes()->create([
                    'number' => $j
                ]);
        }

        return to_route('series.index')
            ->with('message.success', "Série \"{$series->nome}\" adicionada com sucesso!");
    }

    public function destroy(Series $series)
    {
        $series->delete();

        return to_route('series.index')
            ->with('message.success', "Série \"{$series->nome}\" removida com sucesso!");
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('series', $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        // $series->nome = $request->nome; ou podemos usar assim quando temos a Model como argumento
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
            ->with('message.success',  "Série \"{$series->nome}\" atualizada com sucesso!");
    }
}
