<?php
return [
    'menus'=>[
        [
            'label'=>'HOME',
            'id'=>'home',
            'route'=>'admin.home',
            'icon'=>'fa-solid fa-home',
        ],
        [
            'label'=>'회원',
            'id'=>'user',
            'route'=>'admin.users',
            'icon'=>'fa-solid fa-user',
        ],
        [
            'label'=>'회원2',
            'id'=>'test',
            'route'=>'admin.user2',
            'icon'=>'fa-solid fa-user',
        ],
    ],
    
    'role'=>[
        'user','qna'
    ],
    'role_items'=>['view_','view_any_','create_','update_','delete_'],
    
];