<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>


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