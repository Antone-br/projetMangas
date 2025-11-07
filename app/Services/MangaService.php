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
    public function saveManga(Manga $manga)
    {
        try {
            $manga->save();
        } catch (QueryException $exception) {
            if (!$manga->id_genre) {
                $userMessage = "Vous devez sélectionner un genre";
            } elseif (!$manga->id_dessinateur) {
                $userMessage = "Vous devez sélectionner un dessinateur";
            } elseif (!$manga->id_scenariste) {
                $userMessage = "Vous devez sélectionner un scénariste";
            } elseif (!$manga->couverture) {
                $userMessage = "Vous devez sélectionner une image de couverture";
            } else {
                $userMessage = "Impossible de mettre à jour la base de données.";
            }
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
    }
    public function getManga($id) {
        try {
            $manga = Manga::query()->find($id);
            return $manga;
        } catch (QueryException $exception) {
            $userMessage = "Impossible de trouver l'id";
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
    }

    public function deleteManga($id)
    {
        try {
            $manga = Manga::query()->find($id);
            $manga->delete();

        } catch (QueryException $exception) {
            $userMessage = "Impossible de supprimer";
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
    }
    public function getListMangasByGenre($genreId)
    {
        try {
            return Manga::query()
                ->select([
                    'manga.*',
                    'genre.lib_genre',
                    'dessinateur.nom_dessinateur',
                    'scenariste.nom_scenariste'
                ])
                ->join('genre', 'genre.id_genre', '=', 'manga.id_genre')
                ->join('dessinateur', 'dessinateur.id_dessinateur', '=', 'manga.id_dessinateur')
                ->join('scenariste', 'scenariste.id_scenariste', '=', 'manga.id_scenariste')
                ->where('manga.id_genre', $genreId)
                ->get();
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
