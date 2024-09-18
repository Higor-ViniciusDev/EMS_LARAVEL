<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
   /**
     * Create the component instance.
     */
    public function __construct(
        public string $type,
        public string $message
    ) {}
 
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('login',['type' => $this->type, 'message' => $this->message]);
    }
}
