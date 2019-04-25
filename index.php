<?php

$arr = ['id'=>1, 'title'=>'Обувь',
    'children' => [
        ['id'=>2, 'title'=>'Ботинки',
        'children' => [
            ['id'=>3, 'title'=>'Кожа'],
            ['id'=>4, 'title'=>'Текстиль']
        ],
        ['id'=>5, 'title'=>'Кроссовки',
        'children' => [
            ['id'=>6, 'title'=>'Дермантин'],
            ['id'=>7, 'title'=>'Полиуретан']
            ]
        ]
    ]
    ]
];



function open($arr, $id) 
{
    foreach($arr as $k=>$v)
    {
        if(is_array($v))
        {
            open($v, $id);
        }
        else
        {
            if($k=='id')
            {
                if($v==$id)
                {
                    echo $arr['title'];
                    return;
                }
            }
        }
    }
}

echo "<pre>";
open($arr,3);
echo "</pre>";
echo "<br>____________";

