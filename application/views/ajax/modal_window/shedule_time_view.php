<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>


<form action="/action/schedule/change_timesize/" method="post" id="lesson_size_form">
    <input type="hidden" name="starttime"   value="<?if(isset($starttime))  echo $starttime?>" />
<!--    <input type="hidden" name="timesize"    value="<?if(isset($timesize))   echo $timesize?>" />-->
    <input type="hidden" name="day"         value="<?if(isset($day))        echo $day?>" />
    <input type="hidden" name="classroom"   value="<?if(isset($classroom))  echo $classroom?>" />
    <input type="hidden" name="teacher_id"  value="<?if(isset($teacher_id)) echo $teacher_id?>" />
    <input type="hidden" name="lesson_id"   value="<?if(isset($lesson_id))  echo $lesson_id?>" />
    <input type="hidden" name="date"        value="<?if(isset($date))       echo $date?>" />
    <input type="hidden" name="new_date"    value="<?if(isset($new_date))   echo $new_date?>" />
    <input type="hidden" name="group_id"    value="<?if(isset($group_id))   echo $group_id?>" />
    
    <table>
        <tr>
            <td style="width: 30px;">
                <input type="radio" name="timesize" value="2" class="radio_1" <?if($timesize == 2) echo 'checked="checked"' ?>  />
            </td>
            <td style="padding: 3px 0px 5px 0px">1 час</td>
        </tr>
        <tr>
            <td style="width: 30px;">
                <input type="radio" name="timesize" value="3" class="radio_1" <?if($timesize == 3) echo 'checked="checked"' ?> />
            </td>
            <td style="padding: 3px 0px 5px 0px">1:30 часа</td>
        </tr>
        <tr>
            <td style="width: 30px;">
                <input type="radio" name="timesize" value="4" class="radio_1" <?if($timesize == 4) echo 'checked="checked"' ?> />
            </td>
            <td style="padding: 3px 0px 5px 0px">2 часа</td>
        </tr>
        <tr>
            <td style="width: 30px;">
                <input type="radio" name="timesize" value="5" class="radio_1" <?if($timesize == 5) echo 'checked="checked"' ?> />
            </td>
            <td style="padding: 3px 0px 5px 0px">2:30 часа</td>
        </tr>
        <tr>
            <td style="width: 30px;">
                <input type="radio" name="timesize" value="6" class="radio_1" <?if($timesize == 6) echo 'checked="checked"' ?> />
            </td>
            <td style="padding: 3px 0px 5px 0px">3 часа</td>
        </tr>
    </table> 
</form>

<div class="confirm_block" >
    <a href="javascript:void(0)" class="confirm_button jq_payment_btn" id="payment_add_btn" 
       onclick="send_form('#lesson_size_form', {title:'Выполняется изменение времени занятия', content:'loader'} )" >
        Изменить длительность
    </a>
    <a href="javascript:void(0)" onclick="close_modal()">Отмена</a>
</div>


<script type="text/javascript">
    set_jq_style();
</script>

