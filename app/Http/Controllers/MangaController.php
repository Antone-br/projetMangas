<?php

namespace App\Http\Controllers;
use App\Models\Manga;
use App\Models\Scenariste;
use App\Services\MangaService;
use App\Services\GenreService;
use App\Services\DessinateurService;
use App\Services\ScenaristeService;
use Exception;

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
        } catch (Exception $exception) {
            return view('error', compact('exception'));
        }
    }
    public function addManga()
    {
        try {
            $serviceGenre = new GenreService();
            $serviceDessi = new DessinateurService();
            $serviceScena = new ScenaristeService();
            $genres = $serviceGenre->getListGenres();
            $dessinateurs = $serviceDessi->getListDessinateurs();
            $scenaristes = $serviceScena->getListScenaristes();
            $manga = new Manga();
            return view('formManga', compact('manga', 'genres', 'dessinateurs', 'scenaristes'));

        } catch (Exception $exception) {
            return view('error', compact('exception'));
        }
    }
    public function validManga(Request $request)
    {
        try {
            $service = new MangaService();
            $manga = new Manga();

            $manga->titre = $request->input('titre');
            $manga->id_genre = $request->input('genre');
            $manga->id_dessinateur = $request->input('dess');
            $manga->id_scenariste = $request->input('scen');
            $manga->prix = $request->input('prix');

            $couv = $request->file('couv');
            if ($couv) {
                $manga->couverture = $couv->getClientOriginalName();
                $couv->move(public_path('assets/images'), $manga->couverture);
            }

            $service->saveManga($manga);
            return redirect(route('listMangas'));
        } catch (Exception $exception) {
            return view('error', compact('exception'));
        }
    }


}
