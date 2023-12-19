<?php

namespace Modules\Customer\src\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Action extends Component
{
    /**
     * Create the component instance.
     */
    public function __construct(
        public string $name,
        public Collection $options = new Collection,
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
        return view('Customer::components.action');
    }
}
