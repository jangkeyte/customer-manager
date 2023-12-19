<?php

namespace Modules\Authetication\src\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Role extends Component
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
        public ?string $required = null,
        public ?string $disabled = null,
        public ?string $hidden = null
    ) {}
 
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('JangKeyte::components.role');
    }
}
