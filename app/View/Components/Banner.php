<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Banner extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     * 
     */
    public $class;
    public $image;
    public $alt;
    public $title;
    public $description;

    public function __construct($class, $image=null, $alt = '', $title = '', $description = '')
    {
        //
        $this->class = $class;
        $this->image = $image;
        $this->alt = $alt;
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.banner');
    }
}
