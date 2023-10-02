<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticator;
use App\Models\Series;
use App\Http\Requests\SeriesFormRequest;
use App\Repositories\SeriesRepository;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $repository)
    {
        $this->middleware(Authenticator::class)->except('index');
    }

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
        $series = $this->repository->add($request);

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
