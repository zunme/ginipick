<?php

namespace App\Livewire\Admin\Users;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\ValidationException;

use Spatie\Permission\Models\Role as SpatieRole;
use Spatie\Permission\Models\Permission as SpatiePermission;

use TallStackUi\Traits\Interactions; 

use App\Models\User;

class Index extends Component
{
    use Interactions;
    use WithPagination;

    protected $pagename = 'usersPage';
    public $search_str='';
    public $search_type='userid';
    public function search()
    {
        $this->resetPage($this->pagename);
    }
    #[On('user-created')] 
    public function updatePostList()
    {
        $this->resetPage($this->pagename);
    }
    protected function userlist(){
        $data = User::select('*')->where('userid','<>','zunme');
        if( $this->search_type && $this->search_str ) $data->where( $this->search_type ,'like','%'.$this->search_str.'%' );
        return $data->paginate(2,['*'], $this->pagename );
    }

    public function render()
    {
        return view('livewire.admin.users.index',
            [
                'users' => $this->userlist(),
                'search_opt'=>[
                    ['label' => '아이디', 'value' => 'userid'],
                    ['label' => '이름', 'value' => 'name'],
                    ['label' => '전화', 'value' => 'tel'],
                ]
            ]
        );
    }
}
