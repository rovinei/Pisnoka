<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Service;
use App\Models\Recognition;

class VisitorPage
{

    protected $service_menus;
    protected $certifications;
    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        $this->service_menus = Service::orderBy('created_at', 'desc')->get();
        $this->certifications = Recognition::where('is_featured', 1)->get();
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
            'certifications' => $this->certifications
        ]);
    }
}
