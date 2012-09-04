<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>


<form action="/action/schedule/cancel_lesson/" method="post" id="cancel_less_form">
    <input type="hidden" name="starttime"   value="<?if(isset($starttime))  echo $starttime?>" />
    <input type="hidden" name="timesize"    value="<?if(isset($timesize))   echo $timesize?>" />
    <input type="hidden" name="day"         value="<?if(isset($day))        echo $day?>" />
    <input type="hidden" name="classroom"   value="<?if(isset($classroom))  echo $classroom?>" />
    <input type="hidden" name="teacher_id"  value="<?if(isset($teacher_id)) echo $teacher_id?>" />
    <input type="hidden" name="lesson_id"   value="<?if(isset($lesson_id))  echo $lesson_id?>" />
    <input type="hidden" name="date"        value="<?if(isset($date))       echo $date?>" />
    <input type="hidden" name="new_date"    value="<?if(isset($new_date))   echo $new_date?>" />
    <input type="hidden" name="group_id"    value="<?if(isset($group_id))   echo $group_id?>" />
    
    <div>
        Вы собираетесь отменить занятие группы/студента <br />
        <? if( $group_ar['group_format_id'] == 1):?>
            <a href="/student_cart/<?=$individual_ar[$group_id]['student_id']?>/"> <?=$individual_ar[$group_id]['name']?> </a>
        <? else: ?>
        <a href="/group_cart/<?=$group_ar['id']?>/"> <?=$group_ar['name']?> </a>
        <? endif;?>
        <br />
        <?=timestamp_to_date($date)?>
        в
        <?= rtrim(rtrim($starttime, '0'), ':')?>
    </div>
    

<div class="confirm_block" >
    <a href="javascript:void(0)" class="confirm_button jq_payment_btn" id="payment_add_btn" 
       onclick="send_form('#cancel_less_form', {title:'Выполняется отмена занятия', content:'loader'} )" >
        Отменить занятие
    </a>
    <a href="javascript:void(0)" onclick="close_modal()">оставить без изменений</a>
</div>


<script type="text/javascript">
    set_jq_style();
</script>

