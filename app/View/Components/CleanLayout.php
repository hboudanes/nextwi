<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CleanLayout extends Component
{
    public ?string $title;
    public ?string $bodyClass;
    /**
     * Create a new component instance.
     */
    public function __construct(?string $title = null, ?string $bodyClass = null)
    {
        $this->title = $title;
        $this->bodyClass = $bodyClass;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.clean', [
            'title' => $this->title,
            'bodyClass' => $this->bodyClass,
        ]);
    }
}
