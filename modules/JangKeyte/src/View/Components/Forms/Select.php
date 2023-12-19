<?php

namespace Modules\JangKeyte\src\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Select extends Component
{
    /**
     * Create the component instance.
     */
    public function __construct(
        public string $name,
        public ?string $label,
        public ?Collection $options = new Collection,
        public ?array $jangkeyte = null,
        public ?array $class = null,
        public ?string $default = null,
        public ?string $value = null,
        public ?string $icon = null,
        public ?string $required = null,
        public ?string $disabled = null,
        public ?string $hidden = null
    ) {}
 
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('JangKeyte::components.forms.select');
    }
}
