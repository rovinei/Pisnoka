<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Service;

class VisitorPage
{

    protected $service_menus;
    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        $this->service_menus = Service::orderBy('created_at', 'desc')->get();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {

        $view->with([
            'serviceMenus' => $this->service_menus,
        ]);
    }
}
