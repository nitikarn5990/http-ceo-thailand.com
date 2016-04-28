<ul>
    <li class="<?=
     PAGE_CONTROLLERS == 'member_manage' || PAGE_CONTROLLERS == 'member_profile' ? 'active' : ''
    ?>"><a href="#"> <!-- Icon Container --> <span
                class="da-nav-icon"> <img src="../images/icon-ads.png"
                                      width="32" height="32">
            </span> การจัดการ
        </a>
        <ul>

            <li class="<?= PAGE_CONTROLLERS == 'member_manage' ? 'active' : '' ?>"><a href="<?php echo ADDRESS_ADMIN_CONTROL ?>member_manage">จัดการโฆษณา</a></li>
        </ul>
    </li>


</ul>