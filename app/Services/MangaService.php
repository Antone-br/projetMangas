<?php

namespace App\Services;

use App\Models\Manga;
use App\Exceptions\UserException;
use Illuminate\Database\QueryException;

class MangaService
{
    public function getListMangas()
    {
        try {
            $liste = Manga::query()
                ->select([
                    'manga.*',
                    'genre.lib_genre',
                    'dessinateur.nom_dessinateur',
                    'scenariste.nom_scenariste'
                ])
                ->join('genre', 'genre.id_genre', '=', 'manga.id_genre')
                ->join('dessinateur', 'dessinateur.id_dessinateur', '=', 'manga.id_dessinateur')
                ->join('scenariste', 'scenariste.id_scenariste', '=', 'manga.id_scenariste')
                ->get();

            return $liste;
        } catch (QueryException $exception) {
            $userMessage = "Impossible d'accéder à la base de données.";
            throw new UserException(
                $userMessage,
                $exception->getMessage(),
                $exception->getCode()
            );
        }
    }

}
