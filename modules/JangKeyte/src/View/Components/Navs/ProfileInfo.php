<?php

namespace Modules\JangKeyte\src\View\Components\Navs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProfileInfo extends Component
{
    /**
     * Create the component instance.
     */
    public function __construct(
        
    ) {}
 
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('JangKeyte::components.navs.profile-info');
    }
}
