<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>


<table class="student_cart_payment_tab_tbl">    
    <?
    if (isset($payment_list)):
        foreach ($payment_list as $payment_ar):
            if( $payment_ar['not_full'] == 1 )
                $bg = ' style="color: #d00;" ';
            else
                $bg = '';
            ?>
            <tr>
                <td<?=$bg?>><b><?= $payment_ar['summ'] ?></b> грн.</td>
                <td><?= $payment_ar['cnt_lessons'] ?> занятий <br /> <span><?= timestamp_to_date( $payment_ar['period_date_start'], true ).' - '.timestamp_to_date($payment_ar['period_date_stop'], true) ?></span></td>
                <td><?= timestamp_to_date($payment_ar['date']) ?> <br /> <span>суббота</span></td>
                <td>
                    <a href="/manager/<?= $payment_ar['user_id'] ?>/">
                        <?= $payment_ar['user_name'] ?>
                    </a>
                </td>
                <td><?= $payment_ar['comment'] ?></td>
                <td>
                    <a href="javascript:void(0)" class="del_payment"
                       onclick="send_post({ id: '<?= $payment_ar['id'] ?>', 
                                            group_id:'<?= $group_id ?>', 
                                            student_id:'<?= $student_id ?>'
                                            }, 
                                            '/action/payment/del_payment/', 
                                            {title:'Выполняется удаление оплаты', content:'loader'} )">
                        Удалить
                    </a>
                    
                    <a href="javascript:void(0)" 
                        onclick="upd_payment({   id:<?=$payment_ar['id']?>,
                        cnt_lesson:<?=$payment_ar['cnt_lessons']?>,
                        summ:<?=$payment_ar['summ']?>,
                        date:'<?=timestamp_to_date($payment_ar['date'])?>',
                        comment:'<?=$payment_ar['comment']?>',
                        not_full:<?=$payment_ar['not_full']?>
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