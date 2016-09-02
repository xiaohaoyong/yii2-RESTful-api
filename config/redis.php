<?php
$dbconfig=[
    1=>'mp',
    2=>'chat',
    3=>'liver',
    4=>'task',
];
foreach($dbconfig as $k=>$v)
{
    $redis['rd'.$v]=[
        'class' => 'yii\redis\Connection',
        'hostname' => $XYWYSRVCONFIG["XYWYSRV_REDIS{$k}_HOST"],
        'port' => $XYWYSRVCONFIG["XYWYSRV_REDIS{$k}_PORT"],
        'database' => 0,
    ];
}
return $redis;
