<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>


<form action="/action/group/add_students/" method="post" id="add_st_to_gp">
    
    <? foreach($st_id as $id): ?>
    <input type="hidden" name="students_id_ar[]"   value="<?=$id?>" />
    <? endforeach;?>
    
    
    <select name="group_id" class="greyselect" style="width: 250px">
        <? foreach($group_list as $group_ar ): ?>
            <option value="<?=$group_ar['id']?>" >   
                <?=$group_ar['name']?> (<?=$group_ar['lang']?>,<?=$group_ar['level']?>)
            </option>
        <? endforeach; ?>
    </select>
    
</form>

<div class="confirm_block" >
    <a href="javascript:void(0)" class="confirm_button jq_payment_btn" id="payment_add_btn" 
       onclick="send_form('#add_st_to_gp', {title:'Выполняется добавление студентов', content:'loader'} )" >
        Добавить студентов
    </a>
    <a href="javascript:void(0)" onclick="close_modal()">Отмена</a>
</div>


<script type="text/javascript">
//    set_jq_style();
</script>