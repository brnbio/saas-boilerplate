<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Controller;
use Inertia\Response;

/**
 * Class HomeController
 *
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * @return Response
     */
    public function __invoke(): Response
    {
        return inertia('home');
    }
}
