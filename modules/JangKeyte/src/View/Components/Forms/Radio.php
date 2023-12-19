<?php

namespace Modules\JangKeyte\src\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Radio extends Component
{
    /**
     * Create the component instance.
     */
    public function __construct(
        public string $name,
        public array $id,
        public array $choices,
        public ?string $label = null,
        public ?string $default = null,
        public ?string $value = null,
        public ?string $required = null,
        public ?string $disabled = null,
        public ?string $hidden = null
    ) {}
 
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('JangKeyte::components.forms.radio');
    }
}
