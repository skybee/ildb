<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="studen_cart_info studen_cart_payment">
    <h1>
        Сертификаты 
        <span style=" display: inline-block; width: 20px;"></span>
        <a href="#">Архив</a>
    </h1>
    
    <div id="tabs" class="student_cart_tabs" >
	<ul>
		<li>
                    <a href="#tabs-1">Crazy Star Pearls En A1 (5)</a>
                    <div class="tabs_right_img"></div>
                </li>
		<li>
                    <a href="#tabs-2">Nachos En A3 (10)</a>
                    <div class="tabs_right_img"></div>
                </li>
		<li>
                    <a href="#tabs-3">Crazy Star Pearls En A1 (5)</a>
                    <div class="tabs_right_img"></div>
                </li>
	</ul>
        <div id="tabs-1" class="certificate_tab_block">
            <table class="certificates_list_tbl">
                
                <? for($i=1; $i<=4; $i++): ?>
                
                <tr>
                    <td><a href="#">Zertifikat A<?=$i?></a></td>
                    <td>06.0<?=$i?>.2011</td>
                    <td><a class="del_payment" href="#">Удалить</a></td>
                </tr>
                
                <? endfor;?>
                
            </table>
	</div>
	<div id="tabs-2" class="certificate_tab_block">
            <table class="certificates_list_tbl">
                
                <? for($i=1; $i<=4; $i++): ?>
                
                <tr>
                    <td><a href="#">Zertifikat A<?=$i?></a></td>
                    <td>06.0<?=$i?>.2011</td>
                    <td><a class="del_payment" href="#">Удалить</a></td>
                </tr>
                
                <? endfor;?>
                
            </table>
	</div>
	<div id="tabs-3" class="certificate_tab_block">
            <table class="certificates_list_tbl">
                
                <? for($i=1; $i<=4; $i++): ?>
                
                <tr>
                    <td><a href="#">Zertifikat A<?=$i?></a></td>
                    <td>06.0<?=$i?>.2011</td>
                    <td><a class="del_payment" href="#">Удалить</a></td>
                </tr>
                
                <? endfor;?>
                
            </table>
	</div>
        
        <table class="add_payment_btn_tbl" style="margin-top: 24px !important;">
            <tr>
                <td>
                    <a href="#" class="btn_add_payment btn_add_certificate">Добавить сертификат</a>
                </td>
                <td></td>
            </tr>
        </table>
        
        
    </div>
</div>
