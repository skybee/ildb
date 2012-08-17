<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>


<center>
    <div class="top_payment_navigation_block">
        <a href="/payment/<?=$month_week?>/<?=$next_prev_date['prev']?>/" id="btn_top_date_vavigation_left"></a>
        <a href="/payment/<?=$month_week?>/<?=$next_prev_date['next']?>/" id="btn_top_date_vavigation_right"></a>
        Оплаты: <?= $title_str ?>
    </div>
</center>