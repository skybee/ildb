<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="studen_cart_info studen_cart_info_upd">
    <h1>
        Информация о группе 
    </h1>
    
    <table class="student_cart_info_tbl group_cart_info_tbl" style="width: 100%" >
        <tr>
            <td style="width: 130px;">Названи</td>
            <td><input type="text" name="tmp[]" class="greyinput" style="width: 220px;" /></td>
        </tr>
        <tr>
            <td style="vertical-align: middle;" >Язык</td>
            <td>
                <select name="tmp[]" class="greyselect" style="width: 190px" >
                    <option value="1">Немецкий, De</option>
                    <option value="1">Французкий, Fr</option>
                    <option value="1">Испанский, Es</option>
                    <option value="1">Английский, En</option>
                    <option value="1">Итальянский, It</option>
                </select>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: middle;" >Начальный уровень</td>
            <td>
                <select name="tmp[]" class="greyselect" style="width: 55px" >
                    <option value="1">B1</option>
                    <option value="1">B2</option>
                    <option value="1">H1</option>
                    <option value="1">H2</option>
                    <option value="1">H2/1</option>
                </select>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: middle;">Формат</td>
            <td>
                <select name="tmp[]" class="greyselect" style="width: 190px" >
                    <option value="1">Индивидуальная</option>
                    <option value="1">Малая</option>
                    <option value="1">Средняяя</option>
                    <option value="1">Большая</option>
                    <option value="1">Общяя</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="info_space"></td>
        </tr>
        <tr>
            <td>Начало занятий</td>
            <td><input type="text" name="tmp[]" class="greyinput date_input_all" style="width: 70px;" /></td>
        </tr>
        
        <tr>
            <td colspan="2" class="info_space"></td>
        </tr>
        
        <tr>
            <td>Преподаватель</td>
            <td>
                <table class="student_cart_info_tbl width_auto" style="width: 100%; margin-top: 0" >
                    <tr>
                        <td style="width: 210px" ><a href="#">Куринова Юлия</a></td>
                        <td><a class="del_payment" href="#">Удалить</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">Стародубцева Елизавета</a></td>
                        <td><a class="del_payment" href="#">Удалить</a></td>
                    </tr>
                    <tr>
                        <td>
                            <select name="tmp[]" class="greyselect" style="width: 190px" >
                                <option value="1">добавьте преподавателя</option>
                                <option value="1">Малая</option>
                                <option value="1">Средняяя</option>
                                <option value="1">Большая</option>
                                <option value="1">Общяя</option>
                            </select>
                        </td>
                        <td style="vertical-align: top; line-height: 20px"> или или &nbsp;&nbsp; <a href="#">добавьте нового преподавателя</a></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="info_space"></td>
        </tr>
    </table>
    
    <div class="confirm_block">
        <a href="#" class="confirm_button" style="width: 68px">Далее</a>
        <a href="#" >Отмена</a>
    </div>
    
    
</div>
