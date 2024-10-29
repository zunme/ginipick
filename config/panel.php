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
    'menus_a'=>[
        [
            'label'=>'HOME',
            'id'=>'home',
            'route'=>'admin.home',
            'icon'=>'fa-solid fa-home',
        ],
        [
            'label'=>'회원',
            'id'=>'user',
            'route'=>'admin.user2',
            'icon'=>'fa-solid fa-user',
        ],
        [
            'label' =>'Qna, Contact',
            'icon'=>'fa-solid fa-q',
            'items'=>[
                [
                    'label'=>'QnA',
                    'id'=>'qna',
                    'route'=>'admin.qna',
                    'icon'=>'fa-solid fa-q',
                ],
                [
                    'label'=>'Contact',
                    'id'=>'contact',
                    'route'=>'admin.contact',
                    'icon'=>'fa-solid fa-handshake',
                ],
            ]
        ],
    ],
    'role'=>[
        'user','qna','contact'
    ],
    'role_items'=>['view_','view_any_','create_','update_','delete_'],
    
];