<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = [
            'Punisher',
            'Game of Thrones',
            'Loki'
        ];

        // Ambos fazem a mesma coisa, a função compact faz, ela pega o argumento que você passou como string e pegar a variável com esse nome e ter um array com a chave e a variável com esse nome
        return view('series-list')
            ->with('series', $series);
        /*
        return view('series-list', [
            'series' => $series,
        ]);
        */
    }
}
