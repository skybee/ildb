<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>


<form action="/action/schedule/change_teacher/" method="post" id="change_teacher_form">
    <input type="hidden" name="starttime"   value="<?if(isset($starttime))  echo $starttime?>" />
    <input type="hidden" name="timesize"    value="<?if(isset($timesize))   echo $timesize?>" />
    <input type="hidden" name="day"         value="<?if(isset($day))        echo $day?>" />
    <input type="hidden" name="classroom"   value="<?if(isset($classroom))  echo $classroom?>" />
    <input type="hidden" name="teacher_id"  value="<?if(isset($teacher_id)) echo $teacher_id?>" />
    <input type="hidden" name="lesson_id"   value="<?if(isset($lesson_id))  echo $lesson_id?>" />
    <input type="hidden" name="date"        value="<?if(isset($date))       echo $date?>" />
    <input type="hidden" name="new_date"    value="<?if(isset($new_date))   echo $new_date?>" />
    <input type="hidden" name="group_id"    value="<?if(isset($group_id))   echo $group_id?>" />
    
        <select name="new_teacher_id" class="greyselect" style="width: 235px">
        <? foreach($teachers_list as $teacher_ar ): ?>
            <option value="<?=$teacher_ar['id']?>"  <?if($teacher_ar['id'] == $teacher_id) echo 'selected="selected"'?> >   
                <?=$teacher_ar['fio_sname']." ".$teacher_ar['fio_name']?>
            </option>
        <? endforeach; ?>
    </select>

<div class="confirm_block" >
    <a href="javascript:void(0)" class="confirm_button jq_payment_btn" id="payment_add_btn" 
       onclick="send_form('#change_teacher_form', {title:'Выполняется замена преподавателя', content:'loader'} )" >
        Назначить препадавателя
    </a>
    <a href="javascript:void(0)" onclick="close_modal()">Отмена</a>
</div>


<script type="text/javascript">
    set_jq_style();
</script>

