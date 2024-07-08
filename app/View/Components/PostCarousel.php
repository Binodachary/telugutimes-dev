<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PostCarousel extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $class;
    public $img;
    public $alt;
    public $name;
    Public $link;
    public function __construct($class, $img=null, $alt = '', $name = '', $link = '')
    {
        //
        $this->class = $class;
        $this->img = $img;
        $this->alt = $alt;
        $this->name = $name;
        $this->link = $link;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post-carousel');
    }
}
