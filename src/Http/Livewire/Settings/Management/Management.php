<?php

namespace Shopper\Framework\Http\Livewire\Settings\Management;

use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;
use Shopper\Framework\Models\User\Role;
use Shopper\Framework\Repositories\UserRepository;

class Management extends Component
{
    use WithPagination;

    protected $listeners = ['onRoleAdded' => 'render'];

    public function removeUser(int $id)
    {
        (new UserRepository())->getById($id)->delete();

        $this->dispatchBrowserEvent('user-removed');
        $this->notify([
            'title' => __('Deleted'),
            'message' => __('Admin deleted successfully!'),
        ]);
    }

    public function render()
    {
        return view('shopper::livewire.settings.management.index', [
            'roles' => Role::query()
                ->with('users')
                ->where('name', '<>', config('shopper.system.users.default_role'))
                ->limit(3)
                ->orderBy('created_at')
                ->get(),
            'users' => (new UserRepository())
                ->makeModel()
                ->whereHas('roles', function (Builder $query) {
                    $query->where('name', '<>', config('shopper.system.users.default_role'));
                })
                ->orderBy('created_at', 'desc')
                ->paginate(3),
        ]);
    }
}
