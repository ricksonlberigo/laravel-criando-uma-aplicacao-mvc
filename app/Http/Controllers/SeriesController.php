<?php

namespace App\Http\Controllers;

class SeriesController
{
    public function seriesList()
    {
        $series = [
            'Punisher',
            'Game of Thrones',
            'Loki'
        ];

        $html = '<ul>';
        foreach ($series as $serie) {
            $html .= "<li>$serie</li>";
        }
        $html .= '</ul>';

        echo $html;
    }
}
