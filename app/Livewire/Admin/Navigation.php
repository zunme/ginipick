<?php

namespace App\Livewire\Admin;

use App\Livewire\Actions\Logout;
use Livewire\Component;

class Navigation extends Component
{
    public function render()
    {
        return view('livewire.admin.navigation');
    }
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}