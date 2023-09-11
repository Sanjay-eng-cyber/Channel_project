<?php

namespace App\View\Components\frontend;

use Illuminate\View\Component;

class ProfileNav extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $user;
    public function __construct()
    {
        //dynamic data
        $this->user = auth()->user();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.profile-nav');
    }
}
