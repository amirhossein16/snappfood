<?php

namespace App\Http\Livewire;

use App\Models\RestaurantDetail;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class DeleteModal extends Component
{
    public $CategoryDeletion;
    public $confirmingCategoryDeletion = false;
    public $modalMessage = '';
    public $modalHeading = '';
    public $model;
    protected $listeners = ['DeleteModals'];

    public function DeleteModals($modelType, $id, $modalHeading, $modalMessage)
    {
        $this->model = $modelType::findOrFail($id);
        $this->CategoryDeletion = $id;
        $this->modalHeading = $modalHeading;
        $this->modalMessage = $modalMessage;
        $this->confirmingCategoryDeletion = true;
    }

    public function deleteCategory()
    {
        $name = $this->model->name;
        if ($this->model->path != null) {
            Storage::disk('public')->delete("photos/banners/$name");
            $this->model->delete();
        } else {
            $this->model->delete();
        }
        $this->confirmingCategoryDeletion = false;
        $this->emit('RefreshTable');
        $this->emitTo('livewire-toast', 'showError', " با موفقیت حذف شد :) ");
    }

    public function render()
    {
        return view('livewire.delete-modal');
    }
}
