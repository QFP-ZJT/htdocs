<head>

    <div class="ui inverted head menu">{{--TODO head头目录--}}

        <a class="active item">
            <i class="home icon" href="/"></i> 欢迎
        </a>


        <a id='h_info' class="head_mu item" onclick="head_choose('#h_info')">
            <i class="home icon" herf=''></i> 房屋信息
        </a>

        <a id='O_info' class="head_mu item" onclick="head_choose('#O_info')">
            <i class="user icon"></i> 业主信息
        </a>

        <a id='h_cost' class="head_mu item" onclick="head_choose('#h_cost')">
            <i class="yen icon"></i> 缴费情况
        </a>
        <a id="h_price" class="head_mu item" onclick="head_choose('#h_price')">
            <i class="barcode icon"></i> 价格变更
        </a>
        <a id="amount_add" class="head_mu item" onclick="head_choose('#amount_add')">
            <i class="database icon"></i> 用量记录
        </a>
        <a id="h_quick" class="head_mu item" onclick="head_choose('#h_quick')">
            <i class="search icon"></i> 快捷查询
        </a>

        <a id='h_person' class=" head_mu item" onclick="head_choose('#h_person')">
            <i class="user icon" herf=''></i> 个人信息
        </a>
        <div class="right menu">
            {{--右侧显示用户名--}}

            <a class="item">您好，<?php echo $name; ?></a>
            {{--添加翻译器--}}
            <a id="google_translate_element" class="item">
                <script type="text/javascript">
                    function googleTranslateElementInit() {
                        new google.translate.TranslateElement({
                            pageLanguage: 'zh-CN',
                            includedLanguages: 'en',
                            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
                        }, 'google_translate_element');
                    }
                </script>
                <script type="text/javascript"
                        src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
            </a>
            <a id="h_exit" class="head_mu item" href='/'>
                {{--TODO 添加退出功能--}}
                <i class="sign out icon"></i>
            </a>
        </div>

    </div>
</head>
