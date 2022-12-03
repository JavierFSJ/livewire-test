<?php

namespace App\Http\Livewire\Dashboard\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{   
    use WithPagination;

    public $confirmingUserDeletion = false;
    public $categoryDelete;

    public function delete()
    {
        if($this->categoryDelete !== null){
            $this->categoryDelete->delete();
            $this->emit('deleted');
        }

        $this->confirmingUserDeletion = false;
    }

    public function showDialog(Category $category){
        $this->confirmingUserDeletion = true;
        $this->categoryDelete = $category;
    }

    public function render()
    {   
        return view('livewire.dashboard.category.index' , [
            'categories' => Category::paginate(5),
        ]);
    }
}
