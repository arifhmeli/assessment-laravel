<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $type;
    public $text;

    public function __construct($type = 'button', $text = 'Submit')
    {
        $this->type = $type;
        $this->text = $text;
    }

    public function render()
    {
        return view('components.button');
    }
}