<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Series;
use App\Models\Episode;
use Illuminate\Support\Facades\DB;
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
        $series = DB::transaction(function () use ($request) {
            $series = Series::create($request->only(['nome']));

            $seasons = [];
            for ($i = 1; $i <= $request->seasonsQty; $i++) {
                $seasons[] = [
                    'series_id' => $series->id,
                    'number' => $i,
                ];
            }
            Season::insert($seasons);

            $episodes = [];
            foreach ($series->seasons as $season) {
                for ($j = 1; $j <= $request->episodesPerSeason; $j++) {
                    $episodes[] = [
                        'season_id' => $season->id,
                        'number' => $j
                    ];
                }
            }
            Episode::insert($episodes);

            return $series;
        });

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
