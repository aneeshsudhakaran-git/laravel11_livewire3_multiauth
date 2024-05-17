<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Livewire\Form;

class PostForm extends Form
{
    public ?Post $postModel;
    

    public function rules(): array
    {
        return [
        ];
    }

    public function setPostModel(Post $postModel): void
    {
        $this->postModel = $postModel;
        
    }

    public function store(): void
    {
        $this->postModel->create($this->validate());

        $this->reset();
    }

    public function update(): void
    {
        $this->postModel->update($this->validate());

        $this->reset();
    }
}
