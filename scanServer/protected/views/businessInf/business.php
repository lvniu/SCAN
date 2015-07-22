<?php 
    $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        array('label'=>'Home', 'url'=>'#', 'active'=>true),
        array('label'=>'设置', 'url'=>'#'),
        array('label'=>'创建活动', 'url'=>array(
            'activity', 'usr' => $register_data["username"],
        )),
        ),
    )); 
?>
<?php 
    //var_dump($_GET['post']);
    //var_dump($activity_data);
?>
<h1>个人信息</h1>    
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'data'=>array('username'=>$register_data["username"], 
                'email'=>$register_data["email"]),
    'attributes'=>array(
        array('name'=>'username', 'label'=>'用户名'),
        array('name'=>'email', 'label'=>'邮箱'),
        ),
    )); 
?>

<h1>活动信息</h1>    
<?php 
    $activity_id = 0;
    foreach ($activity_data as $value) {
        $activity_id++;
?>
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'data'=>array('activity_id'=>$activity_id,
                'company_name'=>$value['company_name'], 
                'activity_name'=>$value['activity_name'], 
                'telephone'=>$value['telephone'],
                'start_time'=>$value['start_time'],
                'end_time'=>$value['end_time'],
                'location'=>$value['location'],
                'goods'=>$value['goods'],
                'time_remaining'=>$value['time_remaining'],
                'relative_distance'=>$value['relative_distance'],
),
    'attributes'=>array(
        array('name'=>'activity_id', 'label'=>'活动序号'),
        array('name'=>'company_name', 'label'=>'公司名称'),
        array('name'=>'activity_name', 'label'=>'活动名称'),
        array('name'=>'telephone', 'label'=>'预留电话'),
        array('name'=>'start_time', 'label'=>'活动开始时间'),
        array('name'=>'end_time', 'label'=>'活动结束时间'),
        array('name'=>'location', 'label'=>'活动地点'),
        array('name'=>'goods', 'label'=>'赠送商品'),
        array('name'=>'time_remaining', 'label'=>'距离活动开始时间'),
        array('name'=>'relative_distance', 'label'=>'相对距离'),
        
        ),
    )); 
?>
</br>
<?php }?>