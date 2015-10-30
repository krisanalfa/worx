<?php

namespace App\Http;

use Anu\Hooman;

class SiteController extends Controller
{
    public function map()
    {
        $app = $this->app;

        $app->get($this->baseRoute, [$this, 'index']);
    }

    public function index()
    {
        $app = $this->app;

        $human = Hooman::model('Edo');

        dump(isset($human->hands));

        // dd($human->methodYangGaAda(1,2,3,'xxx','yyy'));

        // Statically
        // Hooman::methodYangGaAda(1,2,3,'xxx','yyy');
    }
}
