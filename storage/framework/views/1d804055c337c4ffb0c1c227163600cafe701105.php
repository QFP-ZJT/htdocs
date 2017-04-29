<head>

    <div class="ui big inverted head menu"><?php /*TODO head头目录*/ ?>

        <a class=" item">
            <i class="home icon" href="/"></i> 欢迎使用小区物业管理系统
        </a>

        <a id='h_person' class="active head_mu item" onclick="head_choose('#h_person')">
            <i class="user icon" herf=''></i> 个人信息
        </a>

        <a id = 'h_public' class="head_mu item" onclick="head_choose('#h_public')">
            <i class="announcement icon"></i> 小区公告
        </a>

        <a id = 'h_cost' class="head_mu item" onclick="head_choose('#h_cost')">
            <i  class="yen icon"></i> 账单查询
        </a>
        <a id="h_price" class="head_mu item" onclick="head_choose('#h_price')">
            <i class="barcode icon"></i> 价格查询
        </a>
        <a id="h_quick" class="head_mu item" onclick="head_choose('#h_quick')">
            <i class="search icon"></i> 快捷查询
        </a>

        <div class="right menu">
<?php /*右侧显示用户名*/ ?>

            <a class="item">您好，<?php echo $name; ?></a>
            <a id="h_exit" class="head_mu item" onclick="head_choose('#h_quick')">
                <?php /*TODO 添加退出功能*/ ?>
                <i class="sign out icon"></i> 退出
            </a>
        </div>

    </div>
</head>
