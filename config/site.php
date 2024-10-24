<?php
return [
    'use_tel_verify'=>true,
    'check'=>[
        //나이스 본인인증
        'hp'=>[
            'SITECODE'=>env('CHECKPLUS_SITECODE','CB530'),
            'PASSWORD'=>env('CHECKPLUS_PASSWORD','hXVzpZQKbbJj'),
            'returnurl'=>	env('APP_URL','').'/checkplus/success',
            'errorurl'=>	env('APP_URL','').'/checkplus/fail',
        ],
        //계좌인증
        'account'=>[
            'SITECODE'=>env('ACCOUNT_CHECK_SITECODE',''),
            'PASSWORD'=>env('ACCOUNT_PASSWORD',''),
            'req_url'=>'https://secure.nuguya.com/nuguya2/service/realname/sprealnameactconfirm.do',
        ],
        'CPClient'=>env('CPCLIENT_PATH','/workspace/html/shopv2/CPClient_linux_x64'),
    ],
    'disable_userid_str'=>['ginipick', 'admin','test'],
    'disable_username_str'=>['ginipick', 'admin','test', '어드민','유저','테스트'],
];