<?php

namespace App\Http\Livewire\Dashboard\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class Save extends Component
{
    use WithFileUploads;

    public $title;
    public $text;
    public $category;
    public $image;

    protected $rules = [
        'title' => 'required|min:2|max:255',
        'text' => 'required|min:2|max:255',
        'image' => 'required|image'
    ];

    public function submit()
    {
        $this->validate($this->rules);

        if ($this->category === null) {
            $this->category = Category::create([
                'title' => $this->title,
                'text' => $this->text,
                'image' => 'Hola.jpg',
                'slug' => str($this->title)->slug(),
            ]);
            $this->clearFields();
        } else {
            $this->category->update([
                'title' => $this->title,
                'text' => $this->text,
                'image' => 'Hola.jpg',
                'slug' => str($this->title)->slug(),
            ]);

        }
        $this->emit('created');

        //upload
        if($this->image){
            $imageName = $this->category->slug . '.' .$this->image->getClientOriginalExtension();
            $this->image->storeAs('imagenes' , $imageName , 'public');
            $this->category->update([
                'image' => $imageName,
            ]);
        }
    }

    public function mount($id = null)
    {
        if ($id !== null) {
            $this->category = Category::findOrFail($id);
            $this->title = $this->category->title;
            $this->text = $this->category->text;
        }
    }

    public function clearFields()
    {
        $this->title = '';
        $this->text = '';
    }

    public function render()
    {
        return view('livewire.dashboard.category.save');
    }
}
