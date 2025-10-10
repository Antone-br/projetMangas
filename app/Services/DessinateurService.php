<?php

namespace App\Services;

use App\Models\Dessinateur;
use App\Exceptions\UserException;
use Illuminate\Database\QueryException;

class DessinateurService
{
    public function getListDessinateurs()
    {
        try {
            $liste = Dessinateur::all();
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
