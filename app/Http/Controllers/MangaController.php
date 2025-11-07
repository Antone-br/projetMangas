<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use App\Models\Scenariste;
use App\Services\MangaService;
use App\Services\GenreService;
use App\Services\DessinateurService;
use App\Services\ScenaristeService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class MangaController extends Controller
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
            $manga = new Manga();
            return $this->showManga($manga);
        } catch (Exception $exception) {
            return view('error', compact('exception'));
        }
    }

    public function validManga(Request $request)
    {
        try {


            $service = new MangaService();

            $id = $request->input('id');
            if ($id) {
                $manga = $service->getManga($id);
            } else {
                $manga = new Manga();
            }

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
            try {
                $request->validate([
                    'titre' => ['required', 'max:250'],
                    'genre' => ['required', 'exists:genre,id_genre'],
                    'dess' => ['required', 'exists:dessinateur,id_dessinateur'],
                    'scen' => ['required', 'exists:scenariste,id_scenariste'],
                    'prix' => ['required', 'numeric', 'between:0,1000'],
                ]);
                if (!$manga->couverture) {
                    throw ValidationException::withMessages(['couv' => 'Vous devez choisir une couverture']);
                }
            } catch (ValidationException $exception) {
                return $this->showManga($manga)->withErrors($exception->validator);
            }

            $service->saveManga($manga);
            return redirect(route('listMangas'));
        } catch (Exception $exception) {
            return view('error', compact('exception'));
        }
    }

    public function editManga($id)
    {
        try {
            $service = new MangaService();
            $manga = $service->getManga($id);
            return $this->showManga($manga);
        } catch (Exception $exception) {
            return view('error', compact('exception'));
        }
    }

    public function removeManga($id)
    {
        try {
            $service = new MangaService();
            $service->deleteManga($id);
            return redirect(route('listMangas'));
        } catch (Exception $exception) {
            return view('error', compact('exception'));
        }
    }

    private function showManga(Manga $manga)
    {

        $serviceGenre = new GenreService();
        $serviceDessi = new DessinateurService();
        $serviceScena = new ScenaristeService();
        $genres = $serviceGenre->getListGenres();
        $dessinateurs = $serviceDessi->getListDessinateurs();
        $scenaristes = $serviceScena->getListScenaristes();
        return view('formManga', compact('manga', 'genres', 'dessinateurs', 'scenaristes'));

    }

    public function selectGenre()
    {
        try {
            $serviceGenre = new GenreService();
            $genres = $serviceGenre->getListGenres();
            $manga = new Manga();

            return view('selectGenre', compact('manga', 'genres'));
        } catch (Exception $exception) {
            return view('error', compact('exception'));
        }

    }
    public function validGenre(Request $request)
    {
        try {
            $genre_id = $request->input('genre');
            $request->validate([
                'genre' => ['required', 'exists:genre,id_genre'],
            ]);

            $serviceManga = new MangaService();
            $mangas = $serviceManga->getListMangasByGenre($genre_id);

            $serviceGenre = new GenreService();
            $genre = $serviceGenre->getListGenres()->where('id_genre', $genre_id)->first();
            $titre = "Liste des mangas du genre " . ($genre ? $genre->lib_genre : '');

            return view('listMangas', compact('mangas', 'titre'));
        } catch (ValidationException $exception) {
            return redirect(route('selectGenre'))->withErrors($exception->validator);
        } catch (Exception $exception) {
            return view('error', compact('exception'));
        }
    }







}
