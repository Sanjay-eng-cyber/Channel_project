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
    public function __construct()
    {
        //dynamic data
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $userProfile = auth()->user();
        return view('components.frontend.profile-nav', compact('userProfile'));
    }
}
