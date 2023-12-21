<?php

namespace Modules\JangKeyte\src\View\Components\Navs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class QuickItem extends Component
{
    /**
     * Create the component instance.
     */
    public function __construct(
        public ?string $name = null,
        public ?string $url = null,  
        public ?string $label = null,   
        public ?string $icon = null,
        public ?string $active = null,      
        public ?array $submenus = null,
    ) {}
 
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('JangKeyte::components.navs.quick-item');
    }
}
