<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextInput extends Component
{
    public ?string $name;
    public ?string $placeholder;
    public ?string $value;
    public ?string $type;

    /**
     * Create a new component instance.
     */
    public function __construct(?string $type, ?string $name = null, ?string $placeholder = null, ?string $value = null)
    {
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.text-input');
    }
}
