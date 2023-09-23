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

        return view('series.index')
            ->with('series', $series);
    }
}
