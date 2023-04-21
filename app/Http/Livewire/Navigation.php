<?php

namespace App\Http\Livewire;

use App\Models\Secondary_Content;
use Livewire\Component;

class Navigation extends Component
{
    public function render()
    {
       $seconds = Secondary_Content::all(); 
        return view('livewire.navigation', compact('seconds'));
    }
}
