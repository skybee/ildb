<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="studen_cart_info">
    <h1>Выходные дни</h1>
    
    <div class="upd_dayoff_addblock">
        <input type="text" class="greyinput date_input_all" name="tmp[]"  />
        &nbsp;&mdash;&nbsp;
        <input type="text" class="greyinput date_input_all" name="tmp[]"  />
        
        <div class="upd_dayoff_addblock_right">
            <a class="del_payment" href="#">Удалить</a>
            <a href="#">Отменить выходные дни</a>
        </div>
    </div>
    
    <div class="confirm_block">
        <a href="#" class="confirm_button" style="width: 68px">Сохранить</a>
        <a href="#" >Отмена</a>
    </div>
    
</div>


<div class="st_cart_upd_group_border"><!--линия--></div>


<div class="studen_cart_info">
    <h1>Добавление выходных дней</h1>
    
    <table class="add_dayoff_tbl">
        <tr>
            <td>Выходные с</td>
            <td><input type="text" class="greyinput date_input_all" name="tmp[]"  /></td>
        </tr>
        <tr>
            <td>по</td>
            <td><input type="text" class="greyinput date_input_all" name="tmp[]"  /></td>
        </tr>
    </table>
    
    <div class="confirm_block">
        <a href="#" class="confirm_button" style="width: 68px">Сохранить</a>
        <a href="#" >Отмена</a>
    </div>
    
</div>