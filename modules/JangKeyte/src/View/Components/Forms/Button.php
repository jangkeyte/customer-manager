<?php

namespace Modules\JangKeyte\src\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create the component instance.
     */
    public function __construct(
        public ?string $name = null,
        public ?string $type = null,
        public ?string $text = null,
        public ?string $class = null,
        public ?string $icon = null,
        public ?string $disabled = null,
        public ?string $hidden = null
    ) {}
 
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('JangKeyte::components.forms.button');
    }
}
