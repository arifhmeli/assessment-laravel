<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormInput extends Component
{
    public $name;
    public $label;
    public $value;
    public $type;
    public $required;

    public function __construct($name, $label, $value = null, $type = 'text', $required = true)
    {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->type = $type;
        $this->required = $required;
    }

    public function render()
    {
        return view('components.form-input');
    }
}
