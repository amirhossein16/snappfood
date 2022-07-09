<?php

namespace App\Http\Livewire\Admin;

use App\Models\foodCategories;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Component
{
    use AuthorizesRequests;

    public $RoleCategory;
    public $confirmingCategoryDeletion = false;
    public $confirmingCategoryUpdate = false;
    public $user;
    public $name;
    public $permissions = [];

    public function mount()
    {
//        if (is_null($this->user) || !$this->user->can('role.create')) {
//            abort(403, 'Sorry !! You are Unauthorized to create any role !');
//        }

    }

    protected $rules = [
        'RoleCategory.name' => 'required|min:3'
    ];

    public function confirmCategoryAdd()
    {
        $this->reset(['RoleCategory']);
        $this->confirmingCategoryUpdate = true;
    }

    public function saveCategory()
    {
        $this->validate([
            'RoleCategory' => 'required|max:100|unique:roles'
        ], [
            'RoleCategory.required' => 'Please give a role name',
            'RoleCategory.max' => 'character can\'t more than 100',
            'RoleCategory.unique' => 'role exist ! ! !'
        ]);
        if (isset($this->RoleCategory->id)) {
            $this->RoleCategory->save();
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success', 'message' => 'دسته بندی با موفقیت بروزرسانی شد :)'
            ]);
        } else {
            $role = Role::create(['name' => $this->name, 'guard_name' => 'admin']);
        }
        $permissions = $this->permissions;


        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success', 'message' => 'دسته بندی با موفقیت بروزرسانی شد :)'
            ]);
            $this->reset(['name', 'permissions']);
        }
        $this->confirmingCategoryUpdate = false;
    }

    public function confirmCategoryEdit(Role $id)
    {
        $this->resetErrorBag();
        $this->RoleCategory = $id;
        $this->confirmingCategoryUpdate = true;
    }

    public function confirmCategoryDeletion($id)
    {
        $this->confirmingCategoryDeletion = $id;
    }

    public function deleteCategory(Role $category)
    {
        $category->delete();
        $this->confirmingCategoryDeletion = false;
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success', 'message' => 'دسته بندی با موفقیت حذف شد'
        ]);
    }

    public function render()
    {
        $all_permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        $roles = Role::all();
        return view('livewire.admin.role-controller', [
            'roles' => $roles,
            'all_permissions' => $all_permissions,
            'permission_groups' => $permission_groups
        ]);
    }
}
