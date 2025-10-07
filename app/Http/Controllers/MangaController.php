<?php

namespace App\Http\Controllers;
use App\Models\Manga;
use App\Services\MangaService;
use App\Exceptions\UserException;

class MangaController  extends Controller
{
    public function listMangas()
    {
        try {
            $service = new MangaService();
            $mangas = $service->getListMangas();

            foreach ($mangas as $manga) {
                if (!file_exists('assets/images/' . $manga->couverture)) {
                    $manga->couverture = 'erreur.png';
                }
            }

            return view('listMangas', compact('mangas'));
        } catch (UserException $exception) {
            return view('error', compact('exception'));
        }
    }
    public function addManga()
    {
        try {
            $manga = new Manga();
            return view('formEquipe', compact('manga'));

        } catch (UserException $exception) {
            return view('error', compact('exception'));
        }
    }

}
