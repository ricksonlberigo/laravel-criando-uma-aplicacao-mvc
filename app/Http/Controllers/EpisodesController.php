<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function index(Season $season)
    {
        return view(
            'episodes.index',
            ['episodes' => $season->episodes, 'successMessage' => session('message.success')]
        );
    }

    public function update(Request $request, Season $season)
    {
        $watchedEpisodes = $request->episodes;

        // Atualiza os episódios diretamente no banco de dados
        Episode::whereIn('id', $watchedEpisodes)->update(['watched' => true]);
        Episode::whereNotIn('id', $watchedEpisodes)->update(['watched' => false]);

        return redirect()->route('episodes.index', $season->id)->with('message.success', 'Episódios marcados como assistidos!');
    }
}
