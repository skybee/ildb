<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>



<div id="right_content">
    <div id="content_top_block">
        <div id="group_top_block">
            <a href="#" class="top_left_btn top_left_btn_left top_left_btn_del"         style="left:20px;"
               onclick="send_post(  {   id: <?= $student_info_ar['id'] ?>,
                   action: 'del'
           }, 
           '/action/student/del_student/', 
           {title:'Выполняется удаление студента', content:'loader'} )">
                <div></div>
            </a>
            <a href="#" class="top_left_btn top_left_btn_right top_left_btn_catalog"   style="left:60px;" 
               onclick="send_post(  {   id: <?= $student_info_ar['id'] ?>,
           action: 'arhive'
       }, 
       '/action/student/del_student/', 
       {title:'Выполняется архивирование студента', content:'loader'} )">
                <div></div>
            </a>

            <a href="#" class="top_left_btn top_left_btn_list" style="left:150px; width: 115px;">
                <div>Скопировать</div>
            </a>

            <!--                            <div class="student_copy_top_btn"></div>-->
            <div class="student_del_top_btn" onclick="window.location.href='/students/'"></div>
        </div>
    </div>

    <div class="student_cart_block" id="page_tabs">

        <div class="student_cart_left_block">
            <ul id="tab_links_list">
                <li><a href="#st_tbs1">Информация</a></li>
                <li><a href="#st_tbs2">Оплата</a></li>
                <li><a href="#st_tbs3">Группы <span>(<?=count($student_groups_list)?>)</span></a></li>
                <? if ($individual): ?>
                    <li><a href="#st_tbs7">График</a></li>
                    <li><a href="#st_tbs6">Выходные дни</a></li>
                <? endif; ?>
                <li><a href="#st_tbs4">Сертификаты <span>(<?=count($certificate_list)?>)</span></a></li>
                <li style="display:none;"><a href="#st_tbs5">Редактировать</a></li>
            </ul>
            <? if ($last_payment): ?>
                <div class="last_payment_block">
                    <div class="left_info_block_title" onclick="$('#page_tabs').tabs('select',1)">Последняя оплата</div>
                    <b style="font-weight: bold" ><?= $last_payment['summ'] ?></b> грн. <br />
                    <?= $last_payment['cnt_lessons'] ?> занятий 
                    ( <span><?= timestamp_to_date( $last_payment['period_date_start'], true ).' - '.timestamp_to_date($last_payment['period_date_stop'], true) ?></span> )
                    <br />
                    Дата оплаты: <?= timestamp_to_date($last_payment['date']) ?>
                </div>
            <? endif; ?>


            <? if ($paused_group_list != NULL):
                foreach ($paused_group_list as $paused_group):
                    ?>
                    <div class="last_payment_block left_paused_block">
                        <div class="left_info_block_title" onclick="$('#page_tabs').tabs('select',2)">Занятия остановлены</div>
                        в группе <b style="font-weight: bold"><?= $paused_group['name'] ?></b><br />
                        с   <?= timestamp_to_date($paused_group['start_pause']) ?><br />
                        по  <?= timestamp_to_date($paused_group['stop_pause']) ?>
                    </div>
                <?
                endforeach;
            endif;
            ?>

        </div>


        <div class="student_cart_right_block">


            <!-- ИНФО -->
            <div id="st_tbs1" class="student_tabs_block">
                <div class="studen_cart_info">
                    <h1>
                        Информация о студенте 
                        <span style=" display: inline-block; width: 20px;"></span>
                    </h1>

                    <table class="student_cart_info_tbl">
                        <tr>
                            <td>ФИО</td>
                            <td><?= $student_info_ar['fio'] ?></td>
                        </tr>
                        <tr>
                            <td>Адрес</td>
                            <td><?= $student_info_ar['address'] ?></td>
                        </tr>
                        <tr>
                            <td>Телефон</td>
                            <td><?= $student_info_ar['phone'] ?></td>
                        </tr>
                        <tr>
                            <td>E-mail</td>
                            <td><?= $student_info_ar['mail'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="info_space"></td>
                        </tr>
                        <tr>
                            <td>Level test</td>
                            <td>A1    60%</td>
                        </tr>
                        <tr>
                            <td>Статус</td>
                            <td><?= $student_info_ar['status'] ?></td>
                        </tr>
                        <tr>
                            <td>Дата записи</td>
                            <td><?= timestamp_to_date($student_info_ar['date']) ?></td>
                        </tr>
                        <tr>
                            <td>Скидка</td>
                            <td><?= $student_info_ar['discount'] ?>%</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="info_space"></td>
                        </tr>
                        <tr>
                            <td>Дата рождения</td>
                            <td>
                                <?
                                $b_date = timestamp_to_date($student_info_ar['birthday']);
                                if ($b_date != '00.00.0000')
                                    echo $b_date;
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Род занятий</td>
                            <td><?= $student_info_ar['business_info'] ?></td>
                        </tr>
                        <tr>
                            <td>Откуда узнал</td>
                            <td><?= $student_info_ar['from_know'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="info_space"></td>
                        </tr>
                        <tr>
                            <td>Комментарий</td>
                            <td><?= $student_info_ar['comment'] ?></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="javascript:void(0)" class="btn_student_info" onclick="$('#page_tabs').tabs('select',4)" >Изменить</a>
                            </td>
                            <td></td>
                        </tr>

                    </table>
                </div>
            </div>
            <!-- /ИНФО -->


            <!-- ОПЛАТЫ -->
            <div id="st_tbs2" class="student_tabs_block">
                <div class="studen_cart_info studen_cart_payment">
                    <h1>
                        Оплата
                        <div>1 занятие = 85 грн. </div>        
                    </h1>

                    <div id="tabs" class="student_cart_tabs" >
                        <ul>
<? if ($student_groups_list != NULL):
    foreach ($student_groups_list as $student_group_ar):
        ?>
                                    <li>
                                        <a href="#tabs-<?= $student_group_ar['id'] ?>" class="payment_tab">
                                    <?= $student_group_ar['name'] . ' ' . $student_group_ar['lang'] . ' ' . $student_group_ar['level'] ?>
                                        </a>
                                        <div class="tabs_right_img"></div>
                                    </li>
    <?
    endforeach;
endif;
?>
                        </ul>

<? if ($student_groups_list != NULL):
    foreach ($student_groups_list as $student_group_ar):
        ?>
                                <div id="tabs-<?= $student_group_ar['id'] ?>">

                                    <table class="student_cart_payment_tab_tbl">
                                        <tr class="student_payment_first_tr">
                                            <td>Сумма</td>
                                            <td>Период</td>
                                            <td>Дата оплаты</td>
                                            <td>Менеджер</td>
                                            <td>Комментарий</td>
                                            <td></td>
                                        </tr>
                                    </table>

                                    <div class="st_cart_payment_scroll_block" groupid="<?= $student_group_ar['id'] ?>">
                                        <table class="student_cart_payment_tab_tbl">    
                                            <?
                                            if (isset($payment_list[$student_group_ar['id']])):
                                                foreach ($payment_list[$student_group_ar['id']] as $payment_ar):
                                                    if ($payment_ar['not_full'] == 1)
                                                        $bg = ' style="color: #d00;" ';
                                                    else
                                                        $bg = '';
                                                    ?>
                                                    <tr>
                                                        <td<?= $bg ?>><b><?= $payment_ar['summ'] ?></b> грн.</td>
                                                        <td><?= $payment_ar['cnt_lessons'] ?> занятий <br /> <span><?= timestamp_to_date( $payment_ar['period_date_start'], true ).' - '.timestamp_to_date($payment_ar['period_date_stop'], true) ?></span></td>
                                                        <td><?= timestamp_to_date($payment_ar['date']) ?> <br /> <span></span></td>
                                                        <td>
                                                            <a href="/manager/<?= $payment_ar['user_id'] ?>/">
                                                    <?= $payment_ar['user_name'] ?>
                                                            </a>
                                                        </td>
                                                        <td><?= $payment_ar['comment'] ?></td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="del_payment"
                                                               onclick="send_post({ id: '<?= $payment_ar['id'] ?>', 
                                                                   group_id:'<?= $student_group_ar['id'] ?>', 
                                                                   student_id:'<?= $student_info_ar['id'] ?>'
                                                               }, 
                                                               '/action/payment/del_payment/', 
                                                               {title:'Выполняется удаление оплаты', content:'loader'} )">
                                                                Удалить
                                                            </a>

                                                            <a href="javascript:void(0)" 
                                                               onclick="upd_payment({   id:<?= $payment_ar['id'] ?>,
                                                               cnt_lesson:<?= $payment_ar['cnt_lessons'] ?>,
                                                               summ:<?= $payment_ar['summ'] ?>,
                                                               date:'<?= timestamp_to_date($payment_ar['date']) ?>',
                                                               comment:'<?= $payment_ar['comment'] ?>',
                                                               not_full:<?= $payment_ar['not_full'] ?>
                                                           })">
                                                                Редактировать
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?
                                                        endforeach;
                                                        else:
                                                    ?>
                                                <tr>
                                                    <td colspan="6"> Оплаты для этой группы отсутствуют</td>
                                                </tr>
                                <? endif; ?>
                                        </table>
                                    </div>
                                </div>
                                <?
                                    endforeach;
                                endif;
                                ?>


                    </div>

                    <!--add payment btn -->
                        <? if ($student_groups_list != NULL): ?>
                        <div class="confirm_block" id="show_add_payment_form" style="margin-left: 40px;">
                            <a href="javascript:void(0)" class="confirm_button" >Добавить платеж</a>
                        </div>
                        <? endif; ?>

                    <div id="add_payment_form_block">
                        <form id="add_payment_form" action="/action/payment/add_payment/">
                            <input type="hidden" name="student_id" value="<?= $student_info_ar['id'] ?>" />
                            <input type="hidden" name="group_id" value=""/>
                            <input type="hidden" name="payment_id" value=""/>
                            <table class="payment_type_tbl">
                                <tr>
                                    <td rowspan="2" style="width: 30px;">
                                        <input type="radio" name="payment_type" value="cnt_lesson" checked="checked" onchange="change_payment_type()" />
                                    </td>
                                    <td style="font-weight: bold;">Оплата за занятия</td>
                                </tr>
                                <tr>
                                    <td>Ощусетсвляется оплата определенного количества занятий.</td>
                                </tr>
                                <tr><td style="height: 10px;"></td></tr>
                                <tr>
                                    <td rowspan="2">
                                        <input type="radio" name="payment_type" value="period" onchange="change_payment_type()" />
                                    </td>
                                    <td style="font-weight: bold;">Оплата за период</td>
                                </tr>
                                <tr>
                                    <td>Осуществляется оплата за определенный период обучения вне зависисмости от стоимости одного занятия.</td>
                                </tr>
                                <tr><td style="height: 10px;"></td></tr>
                                <tr>
                                    <td rowspan="2">
                                        <input type="radio" name="payment_type" value="other" onchange="change_payment_type()" />
                                    </td>
                                    <td style="font-weight: bold;">Другое</td>
                                </tr>
                                <tr>
                                    <td>Осуществляется оплата за .</td>
                                </tr>
                            </table>
                            <table class="student_cart_info_tbl paymant_add_tbl">
                                <tr>
                                    <td>Сумма</td>
                                    <td>
                                        <input type="text" class="greyinput" name="summ" style="width: 120px;" />
                                    </td>
                                    <td rowspan="5" style="vertical-align: top;">
                                        <table class="payment_comment_tbl">
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="not_full" value="1" />
                                                    <span  style="color:#00a8ff !important;">Оплаченно частично</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:15px 0px 8px 0px;">Комментарий</td>
                                            </tr>
                                            <tr>
                                                <td><textarea name="comment"></textarea></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr class="peyment_period_start_tr">
                                    <td>Начало периода:</td>
                                    <td>
                                        <div class="payment_add_date_block">
                                            <input type="text" class="greyinput date_input" name="start_period" value="<?= date("d.m.Y") ?>" style="width: 90px;" />
                                        </div>
                                    </td>
                                </tr>
                                <tr class="peyment_period_tr">
                                    <td>Период:</td>
                                    <td>
                                        <select name="payment_period" class="greyselect" style="width: 130px;" >
                                            <option value="1">1 мес.</option>
                                            <option value="2">2 мес.</option>
                                            <option value="3">3 мес.</option>
                                            <option value="4">4 мес.</option>
                                            <option value="5">5 мес.</option>
                                            <option value="6">6 мес.</option>
                                            <option value="7">7 мес.</option>
                                            <option value="8">8 мес.</option>
                                            <option value="9">9 мес.</option>
                                            <option value="10">10 мес.</option>
                                            <option value="11">11 мес.</option>
                                            <option value="12">12 мес.</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="peyment_cnt_lesson_tr">
                                    <td id="payment_type_txt" >Кол. занятий</td>
                                    <td>
                                        <input type="text" class="greyinput" name="cnt_lessons" style="width: 120px;" />
                                    </td>
                                </tr>
                                <tr class="peyment_other_tr">
                                    <td style="vertical-align: middle;">Назначение</td>
                                    <td>
                                        <select name="payment_to" class="greyselect" style="width: 130px;" >
                                            <option value="За обучение">За обучение</option>
                                            <option value="За литературу">За литературу</option>
                                            <option value="За на бухло">За на бухло</option>
                                            <option value="За обучение">За обучение</option>
                                            <option value="За литературу">За литературу</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Дата приема</td>
                                    <td>
                                        <div class="payment_add_date_block">
                                            <input type="text" class="greyinput date_input" name="date" value="<?= date("d.m.Y") ?>" style="width: 90px;" />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: middle;" >Принял</td>
                                    <td style="vertical-align: top;">
                                        <select name="manager_id" class="greyselect" style="width: 130px;" >
                                            <option value="1">Максим</option>
                                            <option value="2">Анна</option>
                                            <option value="3">Ярослав</option>
                                            <option value="4">Антон</option>
                                            <option value="5">Мираслав</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>

                            <div class="confirm_block" style="margin-left: 40px;">
                                <a href="javascript:void(0)" class="confirm_button jq_payment_btn" id="payment_add_btn" 
                                   onclick="send_form('#add_payment_form', {title:'Выполняется обработка платежа', content:'loader'} )" >
                                    Добавить платеж
                                </a>
                                <a href="javascript:void(0)" id="close_payment_form">Отмена</a>
                            </div>
                        </form>
                    </div>

                    <!-- /add payment btn -->


                </div>
            </div>
            <!-- /ОПЛАТЫ -->




            <!-- ГРУППЫ СТУДЕНТА/ПРЕДПОЧТИТЕЛЬНЫЙ ГРАФИК -->
            <div id="st_tbs3" class="student_tabs_block">
                <div class="studen_cart_info">
                    <h1>
                    <? if ($student_info_ar['status_id'] == 3): ?>
                            Студент желает обучается по следующему графику
                    <? else: ?>
                            Студент обучается в группе
                    <? endif; ?>
                    </h1>
                </div>



                <div id="ajax_update_groups">
                <?= $group_tab ?>
                </div>


                <div class="studen_cart_info studen_cart_add_to_group_block hide_form">
                    <h1>
                        Добавление в группу
                    </h1>
                    <form action="/action/student/add_to_group/" id="add_student_to_group">
                        <input type="hidden" name="student_id" value="<?= $student_info_ar['id'] ?>" />
                        <div style="margin-top: 17px;">
                            <select name="group_id" class="greyselect" style="width: 330px;">
                                    <?
                                    foreach ($group_list as $group_ar):
                                        if (id_in_groups($group_ar['id'], $student_groups_list))
                                            continue;
                                        ?>
                                    <option value="<?= $group_ar['id'] ?>">
                            <?= "({$group_ar['lang']}, {$group_ar['level']}) {$group_ar['name']}" ?>
                                    </option>
                            <? endforeach; ?>
                            </select>
                        </div>

                        <table class="student_cart_info_tbl paymant_add_tbl">
                            <tr>
                                <td style="width: 100px;">Начало занятий</td>
                                <td>
                                    <div class="payment_add_date_block">
                                        <input type="text" class="greyinput date_input" name="start_lesson_date" style="width: 70px;" />
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>

                    <div class="confirm_block">
                        <a href="javascript:void(0)" class="confirm_button" style="width: 110px;"
                           onclick="send_form('#add_student_to_group', {title:'Выполняется добавление студента в группу', content:'loader'} )">
                            Добавить в группу
                        </a>
                        <a href="javascript:void(0)" class="hide_form_btn">Отмена</a>
                    </div>
                </div>


                <div class="confirm_block show_form_btn">
                    <a href="javascript:void(0)" class="confirm_button" style="width: 110px; margin-left: 40px;" >
                        Добавить в группу
                    </a>
                </div>

            </div>
            <!-- /ГРУППЫ СТУДЕНТА/ПРЕДПОЧТИТЕЛЬНЫЙ ГРАФИК -->



            <!-- СЕРТИФИКАТЫ -->

            <div id="st_tbs4" class="student_tabs_block">
                <div class="studen_cart_info studen_cart_payment">
                    <h1>
                        Сертификаты 
                        <span style=" display: inline-block; width: 20px;"></span>
                    </h1>

                    <div id="tabs2" class="student_cart_tabs" >
                        <ul>
                    <? if ($student_groups_list != NULL):
                        foreach ($student_groups_list as $student_group_ar):
                    ?>
                                    <li>
                                        <a href="#tabs2-<?= $student_group_ar['id'] ?>" class="certificate_tab">
                                <?= $student_group_ar['name'] . ' ' . $student_group_ar['lang'] . ' ' . $student_group_ar['level'] ?>
                                        </a>
                                        <div class="tabs_right_img"></div>
                                    </li>
                                    <?
                                    endforeach;
                                endif;
                                ?>
                        </ul>
                    <? if ($student_groups_list != NULL):
                        foreach ($student_groups_list as $student_group_ar):
                    ?>
                                <div id="tabs2-<?= $student_group_ar['id'] ?>" class="certificate_tab_block" groupid="<?= $student_group_ar['id'] ?>">
                                    <table class="certificates_list_tbl">
                    <?
                    if (isset($certificate_list[$student_group_ar['id']])):
                        foreach ($certificate_list[$student_group_ar['id']] as $certificate_ar):
                    ?>
                                                <tr>
                                                    <td>
                                                        <a href="/upload/<?= $certificate_ar['img'] ?>" target="_blank">
                                                               <?= $certificate_ar['level_name'] . '&nbsp;' . $certificate_ar['name'] ?>
                                                        </a>
                                                    </td>
                                                    <td><?= timestamp_to_date($certificate_ar['date']) ?></td>
                                                    <td>
                                                        <a class="del_payment" href="javascript:void(0)" 
                                                           onclick="send_post({ id: '<?= $certificate_ar['id'] ?>', 
                                                       group_id:'<?= $student_group_ar['id'] ?>', 
                                                       student_id:'<?= $student_info_ar['id'] ?>'
                                                   }, 
                                                   '/action/student/del_certificate/', 
                                                   {title:'Выполняется удаление сертификата', content:'loader'} )">
                                                            Удалить
                                                        </a>
                                                    </td>
                                                </tr>

                    <?
                        endforeach;
                            else:
                    ?>
                                            <tr>
                                                <td colspan="3"> Сертификаты отсутствуют</td>
                                            </tr>
                    <? endif; ?>

                                    </table>
                                </div>
                    <?
                      endforeach;
                        endif;
                    ?>

                    <? if ($student_groups_list != NULL): ?>
                            <div class="confirm_block" style="margin-left: 40px;">
                                <div style="height: 0px; overflow: hidden">
                                    <form name="certificate" id="certificate_form" action="/action/student/add_certificate/" enctype="multipart/form-data">
                                        <input type="file"      name="img" onchange="send_form( '#certificate_form', {title:'Выполняется добавление сертефиката',  content:'loader'}  )" />
                                        <input type="hidden"    name="group_id" />
                                        <input type="hidden"    name="student_id" value="<?= $student_info_ar['id'] ?>" />
                                    </form>
                                </div>
                                <a href="javascript:void(0)" class="confirm_button" id="payment_add_btn" onclick="document.certificate.img.click(); return false;">
                                    Добавить сертификат
                                </a>
                            </div>
                    <? endif; ?>


                    </div>
                </div>
            </div>
            <!-- /СЕРТИФИКАТЫ -->



            <!-- РЕДАКТИРОВАНИЕ ИНФОРМАЦИИ -->
            <div id="st_tbs5" class="student_tabs_block">
                <div class="studen_cart_info studen_cart_info_upd">
                    <form id="student_info_upd_form" action="/action/student/update_student/" >
                        <input type="hidden" name="student_id" value="<?= $student_info_ar['id'] ?>" />
                        <h1>
                            Информация о студенте 
                            <span style=" display: inline-block; width: 20px;"></span>
                            <a href="#">Архив</a>
                        </h1>

                        <table class="student_cart_info_tbl">
                            <tr>
                                <td style="width: 110px;">Фамилия</td>
                                <td> 
                                    <input type="text" name="fio_sname" value="<?= $student_info_ar['fio_sname'] ?>" class="greyinput" style="width: 350px" /> 
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 110px;">Имя</td>
                                <td> 
                                    <input type="text" name="fio_name" value="<?= $student_info_ar['fio_name'] ?>" class="greyinput" style="width: 350px" /> 
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 110px;">Отчество</td>
                                <td> 
                                    <input type="text" name="fio_mname" value="<?= $student_info_ar['fio_mname'] ?>" class="greyinput" style="width: 350px" /> 
                                </td>
                            </tr>
                            <tr>
                                <td>Адрес</td>
                                <td><input type="text" name="address" value="<?= $student_info_ar['address'] ?>" class="greyinput" style="width: 350px" /></td>
                            </tr>
                            <tr>
                                <td>Телефон</td>
                                <td><input type="text" name="phone" value="<?= $student_info_ar['phone'] ?>" class="greyinput" style="width: 120px" /></td>
                            </tr>
                            <tr>
                                <td>E-mail</td>
                                <td><input type="text" name="email" value="<?= $student_info_ar['mail'] ?>" class="greyinput" style="width: 180px" /></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="info_space" style="padding-top: 10px;"></td>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle; padding-top: 20px;">Level test</td>
                                <td style="vertical-align: middle;">
                                    <table>
                                        <tr>
                                            <td style="width: 75px;">
                                                <select name="level_test" class="greyselect" style="width: 60px;">
                                                    <option value="A1" >A1</option>
                                                    <option value="B1" >B1</option>
                                                    <option value="B2" >B2</option>
                                                    <option value="H2" >H2</option>
                                                    <option value="C1" >C1</option>
                                                </select>
                                            </td>
                                            <td style="vertical-align: middle; width: 85px;">
                                                <input type="text" name="level_test_percent" class="greyinput" style="width: 50px;" /> %
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle;" >Статус</td>
                                <td>
                                    <select class="greyselect" name="status_id" >
                            <? foreach ($status_list as $status_ar): ?>
                                            <option value="<?= $status_ar['id'] ?>" <? if ($status_ar['id'] == $student_info_ar['status_id']) echo 'selected="selected"' ?> >
                                            <?= $status_ar['name'] ?>
                                            </option>
                            <? endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Дата записи</td>
                                <td>
                                    <div class="payment_add_date_block student_upd_date_block" >
                                        <input type="text" name="add_date" value="<?= timestamp_to_date($student_info_ar['date']) ?>" class="greyinput date_input" style="width: 105px"  />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Скидка</td>
                                <td><input type="text" name="sale" value="<?= $student_info_ar['discount'] ?>" class="greyinput" style="width: 50px" /> %</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="info_space"></td>
                            </tr>
                            <tr>
                                <td>Дата рождения</td>
                                <td>
                                    <div class="payment_add_date_block student_upd_date_block">
                                        <input type="text" name="birthday_date" value="<?= timestamp_to_date($student_info_ar['birthday']) ?>" class="greyinput date_input" style="width: 105px"  />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Род занятий</td>
                                <td><input type="text" name="business_info" value="<?= $student_info_ar['business_info'] ?>" class="greyinput" style="width: 180px" /></td>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle;" >Откуда узнал</td>
                                <td>
                                    <select class="greyselect" name="from_know" >
                                        <option value="метро" >метро</option>
                                        <option value="интернет" >интернет</option>
                                        <option value="уличная реклама" >уличная реклама</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="info_space"></td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; padding-top: 14px;">
                                    Комментарий
                                </td>
                                <td><textarea name="comment"><?= $student_info_ar['comment'] ?></textarea></td>
                            </tr>
                        </table>

                        <div class="confirm_block">
                            <a href="#" class="confirm_button" style="width: 65px;" 
                               onclick="send_form('#student_info_upd_form', {title:'Выполняется обновление информации', content:'loader'} )">
                                Сохранить
                            </a>
                            <a href="#" onclick="$('#page_tabs').tabs('select',0)" >Отмена</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /РЕДАКТИРОВАНИЕ ИНФОРМАЦИИ -->



            <? if ($individual): ?>
                <!-- ВЫХОДНЫЕ ДНИ -->
                <div id="st_tbs6" class="student_tabs_block">
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
                </div>
                <!-- /ВЫХОДНЫЕ ДНИ -->


                <!-- ГРАФИК -->
                <div id="st_tbs7" class="student_tabs_block">
                    <div class="studen_cart_info">
                        <h1>График занятий</h1>
                        <form id="group_schedule_form" action="/action/group/upd_schedule/">
                            <input type="hidden" name="group_id" value="<?=$individ_group_id_ar[0]?>">
                        <table class="group_schedule_tbl" id="group_schedule_tbl_info3">
                            <tr class="group_schedule_first_str">
                                <td style="width:70px;">Дни</td>
                                <td style="width:195px">Аудитория</td>
                                <td style="width:115px">Начало занятия</td>
                                <td>Преподаватель</td>
                            </tr>
                                <?
                                    $day_ar = array(1 => 'Пн.', 'Вт.', 'Ср.', 'Чт.', 'Пт.', 'Сб.', 'Вс.');
                                    for ($i = 1; $i <= 7; $i++):
                                ?>
                                <tr>
                                    <td>
                                        <? if( isset($timetable_list[$i]) ): ?>
                                        <input type="hidden" name="day_id[<?=$i?>]" value="<?=$timetable_list[$i]['id']?>">
                                        <? endif; ?>
                                        <input type="checkbox" name="day[<?= $i ?>]" <? if (isset($timetable_list[$i])) echo ' checked="checked" ' ?>/>
                                            <?= $day_ar[$i] ?>
                                    </td>
                                    <td>
                                        <select name="class[<?= $i ?>]" class="greyselect" style="width: 170px" disabled="disabled">
                                            <?
                                            foreach ($classroom_list as $classroom_ar):
                                                if ($timetable_list[$i]) {
                                                    if ($timetable_list[$i]['classroom_id'] == $classroom_ar['id'])
                                                        $class_selected = ' selected="selected" ';
                                                    else
                                                        $class_selected = '';
                                                }
                                                else
                                                    $class_selected = '';
                                                ?>
                                                <option value="<?= $classroom_ar['id'] ?>" <?= $class_selected ?> >   
                                                <?= $classroom_ar['name'] ?>  
                                                </option>
                                            <? endforeach; ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="start_lesson[<?= $i ?>]" class="greyselect" style="width: 95px">
                                        <?
                                        if ($timetable_list[$i])
                                            echo set_select_value($timeselect_opt, $timetable_list[$i]['time_start']);
                                        else
                                            echo $timeselect_opt;
                                        ?>
                                        </select>
                                    </td>
                                    <td>
                                        <?
                                            if (isset($timetable_list[$i])) {
                                                $less_long = summ_time($timetable_list[$i]['time_stop'], '-', $timetable_list[$i]['time_start']);
                                            }
                                            else
                                                $less_long = '00:00:00';
                                        ?>
                                        <select name="lesson_long[<?= $i ?>]" class="greyselect" style="width: 80px">
                                            <option value="01:00:00" <? if ('01:00:00' == $less_long) echo 'selected="selected"' ?> >1:00</option>
                                            <option value="01:30:00" <? if ('01:30:00' == $less_long) echo 'selected="selected"' ?> >1:30</option>
                                            <option value="02:00:00" <? if ('02:00:00' == $less_long) echo 'selected="selected"' ?> >2:00</option>
                                            <option value="02:30:00" <? if ('02:30:00' == $less_long) echo 'selected="selected"' ?> >2:30</option>
                                            <option value="03:00:00" <? if ('03:00:00' == $less_long) echo 'selected="selected"' ?> >3:00</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="teacher[<?= $i ?>]" class="greyselect" style="width: 170px">
                                        <?
                                            foreach ($teachers_list as $teacher_ar):
                                                if ($timetable_list[$i]) {
                                                    if ($timetable_list[$i]['user_id'] == $teacher_ar['id'])
                                                        $teacher_selected = ' selected="selected" ';
                                                    else
                                                        $teacher_selected = '';
                                            }
                                            else
                                                $teacher_selected = '';
                                         ?>
                                                <option value="<?= $teacher_ar['id'] ?>" <?= $teacher_selected ?> >   
                                                    <?= $teacher_ar['fio_sname'] . " " . $teacher_ar['fio_name'] ?>  
                                                </option>
                                        <? endforeach; ?>
                                        </select>
                                    </td>
                                </tr>
                            <? endfor; ?>
                        </table>
                        </form>
                        <div class="confirm_block">
                            <a href="javascript:void(0)" class="confirm_button" style="width: 68px"
                               onclick="send_form('#group_schedule_form', {title:'Выполняется изменение расписания', content:'loader'} )">
                                Сохранить</a>
                        </div>
                    </div>

                </div>
                <!-- /ГРАФИК -->
        <? endif; ?>



        </div>
    </div>


</div>