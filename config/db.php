<?php
$dbconfig=[
    1=>'chat',
    2=>'club',
    3=>'dev',
    4=>'zp',
    5=>'sc',
    6=>'zx',
    7=>'dc',
    8=>'ud',
    9=>'wx',
    10=>'me'
];
foreach($dbconfig as $k=>$v)
{
    $db['db'.$v]=[
        'class' => 'yii\db\Connection',
        // 配置主服务器
        'dsn' => "mysql:host={$XYWYSRVCONFIG["XYWYSRV_DB{$k}_HOST"]};port={$XYWYSRVCONFIG["XYWYSRV_DB{$k}_PORT"]};dbname={$XYWYSRVCONFIG["XYWYSRV_DB{$k}_NAME"]}",
        'username' => $XYWYSRVCONFIG["XYWYSRV_DB{$k}_USER"],
        'password' => $XYWYSRVCONFIG["XYWYSRV_DB{$k}_PASS"],
        // 配置从服务器
        'slaveConfig' => [
            'username' =>  $XYWYSRVCONFIG["XYWYSRV_DB{$k}_USER_R"],
            'password' =>  $XYWYSRVCONFIG["XYWYSRV_DB{$k}_PASS_R"],
            'attributes' => [
                // use a smaller connection timeout
                PDO::ATTR_TIMEOUT => 10,
            ],
        ],
        // 配置从服务器组
        'slaves' => [
            ['dsn' => "mysql:host={$XYWYSRVCONFIG["XYWYSRV_DB{$k}_HOST_R"]};port={$XYWYSRVCONFIG["XYWYSRV_DB{$k}_PORT_R"]};dbname={$XYWYSRVCONFIG["XYWYSRV_DB{$k}_USER_R"]}"],
        ],
    ];
}
return $db;
