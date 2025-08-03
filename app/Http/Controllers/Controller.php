<?php

namespace App\Http\Controllers;
use App\Models\Novedad; // Importa el modelo Novedad
use App\Models\Area;    // Importa el modelo Area
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
