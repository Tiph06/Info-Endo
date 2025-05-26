<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ScrollReveal extends Component
{
    public $title;
    public $subtitle;


    public function __construct($title, $subtitle = null)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
    }

    public function render()
    {
        return view('components.scroll-reveal');
    }
}
