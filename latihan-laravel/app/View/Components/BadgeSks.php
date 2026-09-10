<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BadgeSks extends Component
{
    public function __construct(public int $sks)
    {
    }

    public function warnaKelas(): string
    {
        return $this->sks < 3 ? 'bg-secondary' : 'bg-success';
    }

    public function render()
    {
        return view('components.badge-sks');
    }
}