<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\MainContent;
use App\Models\Secondary_Content;
use Livewire\Component;

class Showcontent extends Component
{
   

    public function render()
    {
        $maincontents = MainContent::all();
        $categories = Category::all(); 

        return view('livewire.showcontent', compact('maincontents', 'categories'));
    }
}
