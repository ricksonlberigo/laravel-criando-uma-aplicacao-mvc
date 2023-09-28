<?php

namespace App\Http\Controllers;

use App\Models\Season;

class EpisodesController extends Controller
{
    public function index(Season $season)
    {
        return view('episodes.index')->with('episodes', $season->episodes);
    }
}
