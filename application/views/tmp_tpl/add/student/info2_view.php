<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="studen_cart_info studen_cart_info_upd">
    <h1>
        Группы и график занятий
    </h1>
</div>

<div class="add_student_input_block">
    <div class="add_st_input_block_tbl">
        <div class="add_st_input_block_left">
            <input type="radio" name="tmp" value="" class="radio_1" />
        </div>
        <div class="add_st_input_block_right">
            <p>Добавить в группу</p>
            Опция актуаль, если студент согласен на суловия и график работы одной из ныне существующих групп.
        </div>
    </div>
</div>

<div class="add_student_txt_block">
    <select class="greyselect" style="width: 320px" name="tmp[]">
        <option value="1">Crazy Star Pearls</option>
        <option value="1">Crazy Star Pearls</option>
        <option value="1">Crazy Star Pearls</option>
        <option value="1">Crazy Star Pearls</option>
        <option value="1">Crazy Star Pearls</option>
    </select>
    <br />
    или <a href="#">создать новую</a>
</div>

<div class="add_student_txt_block" id="add_st_test_lesson_block">
    пробное занятие 
    <input type="text" name="tmp[]" class="greyinput date_input_all" style="width: 70px;" />
</div>

<div class="add_student_txt_block">
    <div class="confirm_block">
        <a href="#" class="confirm_button" style="margin-top: 0">Добавить студента</a>
        <a href="#">Отмена</a>
    </div>
</div>


<div class="add_student_input_block">
    <div class="add_st_input_block_tbl">
        <div class="add_st_input_block_left">
            <input type="radio" name="tmp" value="" class="radio_1" />
        </div>
        <div class="add_st_input_block_right">
            <p>Студент обучается индивидуально</p>
            Если студенту не подходит ни одна из существующих групп, укажите дни и время занятий удобное для студента для дальнешейго формирования в группу.
        </div>
    </div>
</div>


<div class="add_student_input_block">
    <div class="add_st_input_block_tbl">
        <div class="add_st_input_block_left">
            <input type="radio" name="tmp" value="" class="radio_1" />
        </div>
        <div class="add_st_input_block_right">
            <p>Указать предпочитаемый график работы группы</p>
            Если студенту не подходит ни одна из существующих групп, укажите дни и время занятий удобное для студента для дальнешейго формирования в группу.
        </div>
    </div>
</div>