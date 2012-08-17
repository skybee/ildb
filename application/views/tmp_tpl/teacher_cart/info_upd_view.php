<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="studen_cart_info studen_cart_info_upd">
    <h1>
        Информация о преподавателе 
        <span style=" display: inline-block; width: 20px;"></span>
        <a href="#">Архив</a>
    </h1>
    
    <table class="student_cart_info_tbl group_cart_info_tbl">
        <tr>
            <td style="width: 130px;">ФИО</td>
            <td>
                <input type="text" name="tmp" value="Черныгина Наталья Викторовна" class="greyinput" style="width: 210px;" />
            </td>
        </tr>
        <tr>
            <td>Адрес</td>
            <td>
                <input type="text" name="tmp" value="ул. Дружбы Народов, 18" class="greyinput" style="width: 210px;" />
            </td>
        </tr>
        <tr>
            <td>Телефон</td>
            <td>
                <input type="text" name="tmp" value="(099) 759 69 82" class="greyinput" style="width: 210px;" />
            </td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td>
                <input type="text" name="tmp" value="123@mail.ru" class="greyinput" style="width: 210px;" />
            </td>
        </tr>
        <tr>
            <td colspan="2" class="info_space"></td>
        </tr>
        <tr>
            <td style="vertical-align: middle;" >Язык</td>
            <td>
                <select name="tmp[]" class="greyselect" style="width:170px" multiple="multiple">
                    <option value="1" selected="selected" >De</option>
                    <option value="1">En</option>
                    <option value="1">Fr</option>
                    <option value="1" selected="selected" >Es</option>
                    <option value="1">Pl</option>
                </select>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: middle;" >Статус</td>
            <td>
                <select name="tmp[]" class="greyselect" style="width:170px">
                    <option value="1">Распределен</option>
                    <option value="1">Уволен</option>
                    <option value="1">В отпуске</option>
                    <option value="1">Распределен</option>
                    <option value="1">Расстрелян</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Пробное занятие</td>
            <td><input type="text" name="tmp[]" value="10.06.2011" class="greyinput date_input_all" style="width:75px" /></td>
        </tr>
        <tr>
            <td>Начало работы</td>
            <td><input type="text" name="tmp[]" value="14.08.2011" class="greyinput date_input_all" style="width:75px" /></td>
        </tr>
        <tr>
            <td colspan="2" class="info_space"></td>
        </tr>
        <tr>
            <td  style="vertical-align: top;"  >Доп. информация</td>
            <td style="padding-right: 40px;">
                <textarea name="comment" style="width: 400px; height: 80px;">Сначала производит впечатление строгого преподавателя, 
                требующего знания всего предмета «Теория лопаточных машин 
                и механизмов», но когда начинаешь общаться с ним непосредственно 
                на консультациях, то становится ясно, что это милейший человек!
                </textarea>    
            </td>
        </tr>
    </table>
    
    <div class="confirm_block">
        <a href="#" class="confirm_button" style="width: 76px;" >Сохранить</a>
        <a href="#">Отмена</a>
    </div>
</div>
