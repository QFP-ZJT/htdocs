$(document)
    .ready(function () {
        $('.mainmain').hide();//隐藏所有的主界面
        $('#p_main_dh').hide();//隐藏所有的主界面组件
        $('._sidegirde').hide();
        head_choose('#O_info');
        owner_check();

    })
;

//主界面选择器
function head_choose(btn) {
    $(btn).addClass('active').siblings().removeClass('active');
    $('#aaa').addClass('four wide column').show();
    $('.mainmain').hide();
//管理员个人信息
    if (btn == '#h_person') {
        $('#second_menu_person').show().siblings().hide();
        console.log('个人中心激活')
    }
//房屋信息检索
    if (btn == '#h_info') {
        $('#second_menu_house').show().siblings().hide();
    }
    if (btn == '#amount_add') {
        $('#second_menu_amount').show().siblings().hide();
    }
//业主信息检索
    if (btn == "#O_info") {
        $('#second_menu_owner').show().siblings().hide();
    }

    if (btn == '#h_cost') {
        $('#second_menu_cost').show().siblings().hide();
        console.log('费用中心激活')
    }
    if (btn == '#h_price') {
        $('#second_menu_price').show().siblings().hide();
        console.log('价格中心激活')
    }
    if (btn == '#h_quick') {
        $('#second_menu_quick').siblings().hide();
        //TODO 启动主界面
        $('#search_main').show().siblings().hide();
        $('#wordcut').hide();
        $('#sql').hide();
        $('#aaa').removeClass('four wide column').hide();
        console.log('快捷中心激活')
    }
}
//次级目录按钮触发显示
function sidegridechoose(btn) {
    $(btn).addClass('active').siblings().removeClass('active');
}
//价格格式输入判断
$('#price_modify_main_form').form({
    fields: {
        water: {
            identifier: 'water',
            rules: [
                {
                    type: 'decimal',
                    prompt: '请输入合法小数'
                }
            ]
        },
        electric: {
            identifier: 'electric',
            rules: [
                {
                    type: 'decimal',
                    prompt: '请输入合法小数'
                }
            ]
        },
        wy: {
            identifier: 'wy',
            rules: [
                {
                    type: 'decimal',
                    prompt: '请输入合法小数'
                }
            ]
        }
    },
    inline: true,
    on: 'blur'
});
//密码修改表单的验证
$('#p_pm_main_form').form({
    fields: {
        pw: {
            identifier: 'pw',
            rules: [
                {
                    type: 'empty',
                    prompt: '请输入您的新密码'
                },
                {
                    type: 'minLength[6]',
                    prompt: '密码最少为6位'
                }
            ]
        },
        pw_again: {
            identifier: 'pw_again',
            rules: [
                {
                    type: 'match[pw]',
                    prompt: '您两次输入的密码不一致'
                }
            ]
        },
        pw_check: {
            identifier: 'pw_check',
            rules: [
                {
                    type: 'different[pw]',
                    prompt: '您的密码没有变化'
                }
            ]
        },
        terms: {
            identifier: 'terms',
            rules: [
                {
                    type: 'checked',
                    prompt: '您需要同意条款'
                }
            ]
        }
    },
    inline: true,
    on: 'blur'
});
//用量格式判断

//重置水量
function reset_amount_water() {
    console.log('重置');
    $('.w_add').val('');
}
function reset_amount_elc() {
    $('.e_add').val('');
}

function pwcheck() {
    $('#p_pm_main_check').modal('show');
}

//查看个人的基本信息 ok
function p_info(btn) {
    sidegridechoose(btn);
    $('#p_info_main').show().siblings().hide();
    $.ajax({
        type: "get",
        url: '/manager/info',
        dataType: 'json',
        cache: false,
        data: {},//上传数据
        success: function (data) { //data表示接收到的数据
            if (data == null) {
                console.log('未收到请求')
                return;
            }
            if (data.status != 0) {
                $('#p_info_main').removeClass('loading');
                $('#p_main_dh').show();
                $('.p_main_dh_nr').html('个人信息：')
                $('#p_info_main_name').html(data.message.name);
                $('#p_info_main_email').html(data.message.email);
                $('#p_info_main_id').html(data.message.id);
                $('#p_info_main_phone').html(data.message.phone);
                $('#p_info_main_sex').html(data.message.sex);
                console.log(data);
                return;
            }
        },
        error: function () {
            alert('暂时帮不到您，抱歉');
        }
    });
}
//修改个人信息 信息更改展示
function p_modify_info_1(btn) {
    sidegridechoose(btn);
    $('#p_modify_main').show().siblings().hide();//将显示框调进来
    console.log('个人信息修改');
    $.ajax({
        type: "get",
        url: '/manager/info',
        dataType: 'json',
        cache: false,
        data: {},//上传数据

        success: function (data) { //data表示接收到的数据
            if (data == null) {
                console.log('未收到请求')
                return;
            }
            if (data.status != 0) {//结果返回
                $('#p_modify_main').removeClass('loading');//取消等待
                $('#p_modify_main_default_name').attr('placeholder', data.message.name);
                $("#p_modify_main_default_sex").html(data.message.sex);
                $('#p_modify_main_default_id').attr('placeholder', data.message.id);
                $('#p_modify_main_default_phone').attr('placeholder', data.message.phone);
                $('#p_modify_main_default_email').attr('placeholder', data.message.email);
                console.log(data);
                return;
            }
        },
        error: function () {
            alert('暂时帮不到您，抱歉');
        }
    });
}
//修改个人信息 信息更改提交
function p_modufy_info_2() {
    console.log($('input[id=p_modify_main_default_phone]').val());
    $.ajax({
        type: "get",
        url: '/manager/info_change',
        dataType: 'json',
        cache: false,
        data: {
            phone: $('input[id=p_modify_main_default_phone]').val(),
            email: $('input[id=p_modify_main_default_email]').val(),
        },//上传数据

        success: function (data) { //data表示接收到的数据
            if (data == null) {
                console.log('未收到请求')
                return;
            }
            if (data.status != 0) {//结果返回
                if (data.message == 11)
                    $('#error_email_un').modal('show');
                if (data.message == 0)
                    $('#p_modify_main_feedback_success').modal('show');
                console.log(data);
                return;
            }
        },
        error: function () {
            alert('暂时帮不到您，抱歉');
        }
    });
}
//修改个人信息 密码更改展示
function p_modify_pw_1(btn) {
    sidegridechoose(btn);
    console.log('密码修改');
    $('#p_pm_main').show().siblings().hide();//将显示框调进来
}
//修改个人信息 密码更改展示
function p_modify_pw_2(btn) {
    console.log($('input[name=pw]'));
    console.log('激活');
    $newps = $('input[name=pw]').val();
    $oldps = $('input[name=pw_check]').val();
    if ($newps.length < 6 || $newps == $oldps || $newps !== $('input[name=pw_again]').val()) {
        console.log('拒绝请求')
        return;
    }

    $.ajax({
        type: "get",
        url: '/manager/info_pw_change',
        dataType: 'json',
        cache: false,
        data: {
            newps: $newps, oldps: $oldps
        },//上传数据
        success: function (data) { //data表示接收到的数据
            if (data == null) {
                console.log('未收到请求')
                return;
            }
            if (data.status != 0) {//结果返回
                if (data == 1)
                    $('#p_pm_main_feedback_success')
                        .modal('show')
                    ;
                if (data == 0)
                    $('#p_pm_main_feedback_fail')
                        .modal('show')
                    ;
                console.log(data);
                return;
            }
        },
        error: function () {
            alert('暂时帮不到您，抱歉');
        }
    });
}

function _reset() {
    console.log('清空输入框')
    $('.reset').val('');
}
//楼房信息检索
function house_check() {
    $('#house_check_main').show().siblings().hide();//显示内容框
    $(".price_water_main_start  tr").empty("");//清除原来的行
    console.log($('input[id=id]').val())
    $.ajax({
        type: "get",
        url: '/house/check',
        dataType: 'json',
        cache: false,
        data: {
            id: $('input[id=id]').val(),
            id_building: $('input[id=id_building]').val(),
            id_unit: $('input[id=id_unit]').val(),
            id_id: $('input[id=id_id]').val()
        },//上传数据

        success: function (data) { //data表示接收到的数据
            if (data == null) {
                console.log(data);
                return;
            }
            if (data.status != 0) {
                var $i = 1;
                for (var $el in data.message) {
                    $timetime = '';
                    if (data.message[$el].house_time != null)
                        $timetime = data.message[$el].house_time.substring(0, 10)
                    $('.price_water_main_start').append('<tr>' +
                        '<td>' + data.message[$el].house_id + '</td>' +
                        '<td>' + data.message[$el].id_building + '</td>' +
                        '<td>' + data.message[$el].id_unit + '</td>' +
                        '<td>' + data.message[$el].id_id + '</td>' +
                        '<td>' + data.message[$el].area + '</td>' +
                        '<td>' + data.message[$el].name + '</td>' +
                        '<td>' + $timetime + '</td>' +
                        '</tr>');
                    $i++;
                }
                if (data.message.length == 0) {
                    console.log('数组长度为0')
                    $('#owner_check_main_feedback').modal('show');
                }
                return;
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert('暂时帮不到您，抱歉');
        }
    });
}
//业主信息检索
function owner_check() {
    $('#owner_check_main').show().siblings().hide();//显示内容框
    $(".price_water_main_start  tr").empty("");//清除原来的行
    $.ajax({
        type: "get",
        url: '/owner/check',
        dataType: 'json',
        cache: false,
        data: {
            id: $('input[id=owner_id]').val(),
            name: $('input[id=owner_name]').val(),
            sex: $('input[id=owner_sex]').val(),
            work: $('input[id=owner_work]').val()
        },//上传数据

        success: function (data) { //data表示接收到的数据
            if (data == null) {
                console.log(data);
                return;
            }
            if (data.status != 0) {
                var $i = 1;
                for (var $el in data.message) {
                    $('.price_water_main_start').append('<tr>' +
                        '<td>' + data.message[$el].owner_id + '</td>' +
                        '<td>' + data.message[$el].name + '</td>' +
                        '<td>' + data.message[$el].sex + '</td>' +
                        '<td>' + data.message[$el].phone + '</td>' +
                        '<td>' + data.message[$el].email + '</td>' +
                        '<td>' + data.message[$el].work + '</td>' +
                        '<td>' + data.message[$el].id_house + '</td>' +
                        '</tr>')
                    $i++;
                }
                if (data.message.length == 0) {
                    console.log('数组长度为0')
                    $('#owner_check_main_feedback').modal('show');
                }
                console.log(data)
                return;
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert('暂时帮不到您，抱歉');
        }
    });
}
//house_check for amount
function house_check_for_amount() {
    $('#amount_main').show().siblings().hide();//显示内容框
    $(".price_water_main_start").empty("");//清除原来的行
    $('.signal_row').removeClass('signal_row');
    $.ajax({
        type: "get",
        url: '/amount/check',
        dataType: 'json',
        cache: false,
        data: {
            id: $('input[id=amount_id]').val(),
            id_building: $('input[id=amount_id_building]').val(),
            id_unit: $('input[id=amount_id_unit]').val(),
            id_id: $('input[id=amount_id_id]').val()
        },//上传数据

        success: function (data) { //data表示接收到的数据
            if (data == null) {
                console.log(data);
                return;
            }
            if (data.status != 0) {
                var $i = 1;
                console.log(data)
                for (var $el in data.message) {
                    $wa = '本月用水量';
                    $wawa = '';
                    $elec = '本月用电量';
                    $elecelec = '';
                    if (data.message[$el].re_water != null) {
                        $wa = data.message[$el].re_water;
                        $wawa = 'readonly="readonly"';
                    }
                    if (data.message[$el].re_electric != null) {
                        $elec = data.message[$el].re_electric;
                        $elecelec = 'readonly="readonly"';
                    }
                    $('.price_water_main_start').append("<tr class = 'signal_row'>" +
                        "<td id = 'id" + $i + "' >" + data.message[$el].id + '</td>' +
                        '<td>' + data.message[$el].id_building + '</td>' +
                        '<td>' + data.message[$el].id_unit + '</td>' +
                        '<td>' + data.message[$el].id_id + '</td>' +
                        '<td>' + data.message[$el].name + '</td>' +
                        '<td>' + '<div class="ui w_add input">' +
                        '<input name = \'water' + $i + '\' ' + $wawa + ' class = "w_add amount_input" type="text" placeholder="' + $wa + '">' +
                        '</div>' + '</td>' +
                        '<td>' + '<div class="ui e_add input">' +
                        '<input name = \'electric' + $i + '\' ' + $elecelec + ' class = "e_add amount_input" type="text" placeholder="' + $elec + '">' +
                        '</div>' + '</td>' +
                        '</tr>')
                    $i++;
                }
                $('#amount_main_number').html(--$i);
                if (data.message.length == 0) {
                    console.log('数组长度为0')
                    $('#owner_check_main_feedback').modal('show');
                }
                return;
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert('暂时帮不到您，抱歉');
        }
    });
}
//房主信息变更提交
function house_change_2() {
    console.log($('input[id=owner_new]').val())
    $.ajax({
        type: "get",
        url: '/house/new_owner',
        dataType: 'json',
        cache: false,
        data: {
            new_id: $('input[id=owner_new]').val(),
            id_building: $('input[id=id_owner]').val()
        },//上传数据

        success: function (data) { //data表示接收到的数据
            console.log(data)
            if (data == null) {
                console.log(data);
                return;
            }
            if (data.status != 0) {
                if (data.message == 1)
                    $('#house_check_change_main_feedback_success').modal('show');
                if (data.message == 0)
                    $('#house_check_change_main_feedback_fail').modal('show');
                return;
            }
            house_change_1();
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert('暂时帮不到您，抱歉');
        }
    });
}

//指定楼房信息获取
function house_change_1() {
    $('#house_owner_empty').html('该房屋目前的拥有权');
    $(".price_water_main_start tr").empty("");//清除原来的行
    $('#house_check_change_main').show().siblings().hide();//显示内容框
    $('#house_check_change_table_main').show();
    $.ajax({
        type: "get",
        url: '/house/check/change',
        dataType: 'json',
        cache: false,
        data: {
            id: $('input[id=id_owner]').val(),
        },//上传数据

        success: function (data) { //data表示接收到的数据
            if (data == null) {
                console.log(data);
                return;
            }
            console.log(data)
            if (data.status != 0) {
                $re = data.message;
                if ($re != null) {
                    $timetime = '';
                    if ($re.house_time != null)
                        $timetime = $re.house_time.substring(0, 10)
                    $('.price_water_main_start').append('<tr>' +
                        '<td>' + $re.house_id + '</td>' +
                        '<td>' + $re.id_building + '</td>' +
                        '<td>' + $re.id_unit + '</td>' +
                        '<td>' + $re.id_id + '</td>' +
                        '<td>' + $re.area + '</td>' +
                        '<td>' + $re.name + '</td>' +
                        '<td>' + $timetime + '</td>' +
                        '</tr>')
                }
                if (data.message == null) {
                    $('#house_check_change_table_main').hide();
                    $('#house_owner_empty').html('没有检索到该房屋').show();
                }
                return;
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert('暂时帮不到您，抱歉');
        }
    });
}

//提取表格数据
function getTableContent(id) {
    $len = $("#amount_main_number").html();
    var data = [];
    var j = 0, k = 0;
    for (var i = 1; i <= $len; i++) {
        var water = "input[name=water" + i + "]";
        var electric = "input[name=electric" + i + "]";
        if ($(water)[3].value != '' || $(electric)[3].value != '') {
            if (!data[j]) {
                data[j] = new Array();
            }
            data[j][0] = $('#id' + i).html();
            data[j][1] = $(water)[3].value;
            data[j][2] = $(electric)[3].value;

            //    格式判断
            if (isNaN(data[j][1])) {
                console.log('禁止提交');
                $('#amount_feedback_fail').modal('show');
                return;
            }
            if (isNaN(data[j][2])) {
                console.log('禁止提交');
                $('#amount_feedback_fail').modal('show');
                return;
            }
            j++;
        }
    }
    console.log(data);
    if (j == 0)
        return;
    $.ajax({
        type: "get",
        url: '/amount/update',
        dataType: 'json',
        cache: false,
        data: {
            data: data
        },//上传数据

        success: function (data) { //data表示接收到的数据
            if (data == null) {
                console.log(data);
                return;
            }
            if (data.status != 0) {
                console.log(data)
                if (data.message == 1) {
                    $('#amount_feedback_success').modal('show');
                    house_check_for_amount()
                }
                else
                    $('#amount_feedback_fail').modal('show');
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert('暂时帮不到您，抱歉');
        }
    });
    console.log(data);
}

//价格
function pr_check(btn, $cate) {
    sidegridechoose(btn);//正常显示边栏
    if ($cate == 5) {
        $('#price_modify_main').show().siblings().hide();//显示内容更改框
        return;
    }
    $('#price_main').show().siblings().hide();//显示内容框
    $(".price_water_main_start  tr").empty("");//清除原来的行
    console.log('水费查询');
    $.ajax({
        type: "get",
        url: '/price',
        dataType: 'json',
        cache: false,
        data: {cate: $cate},//上传数据

        success: function (data) { //data表示接收到的数据
            if (data == null) {
                console.log(data);
                return;
            }
            if (data.status != 0) {
                console.log(data)
                var $i = 1;
                for (var $el in data.message) {
                    $timetime = '';
                    if (data.message[$el].cate_time != null)
                        $timetime = data.message[$el].cate_time.substring(0, 10)
                    $('.price_water_main_start').append('<tr>' +
                        '<td>' + $i + '</td>' +
                        '<td>' + data.message[$el].name + '</td>' +
                        '<td>' + data.message[$el].price + '</td>' +
                        '<td>' + data.message[$el].uom + '</td>' +
                        '<td>' + $timetime + '</td>' +
                        '</tr>')
                    $i++;
                }

                console.log(data);
                return;
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert('暂时帮不到您，抱歉');
        }
    });
}
//价格信息更改
function price_modify() {
    $water = $('input[name=water]').val();
    $electric = $('input[name=electric]').val();
    $wy = $('input[name=wy]').val();
    console.log($water);
    console.log($electric);
    console.log($wy);
    if (!((!isNaN($water) || $water == '') && (!isNaN($electric) || $electric == '') && (!isNaN($wy) || $wy == ''))) {
        console.log('价格提交拦截')
        return;
    }
    if ($water == '' && $electric == '' && $wy == '') {
        $('#price_modify_feedback_fail_empty').modal('show');
        return;
    }
    console.log('change');
    $.ajax({
        type: "get",
        url: '/price/modify',
        dataType: 'json',
        cache: false,
        data: {
            water: $water, electric: $electric, my: $wy
        },//上传数据
        success: function (data) { //data表示接收到的数据
            if (data == null) {
                console.log('未收到请求')
                return;
            }
            if (data.status != 0) {//结果返回
                if (data.message == 1)
                {   console.log('feedback')
                    $('#price_modify_feedback_success').modal('show');}
                if (data == 0)
                    $('#price_modify_feedback_fail').modal('show');
                console.log(data);
                return;
            }
        },
        error: function () {
            alert('暂时帮不到您，抱歉');
        }
    });
}
//账单查看
function fee_check(btn, $cate) {
    sidegridechoose(btn);//正常显示边栏
    $('#fee_main').show().siblings().hide();//显示内容框
    $(".price_water_main_start").empty("");//清除原来的行
    console.log('账单查询');
    $.ajax({
        type: "get",
        url: '/manager/fee_check',
        dataType: 'json',
        cache: false,
        data: {cate: $cate},//上传数据

        success: function (data) { //data表示接收到的数据
            if (data == null) {
                console.log(data);
                return;
            }
            if (data.status != 0) {
                var $i = 1;
                for (var $el in data.message) {
                    $catecate = '类别';
                    console.log(data.message[$el].cate);
                    switch (data.message[$el].cate) {
                        case '1' :
                            $catecate = '水费';
                            break;
                        case '2' :
                            $catecate = '电费';
                            break;
                        case '3' :
                            $catecate = '物业管理费';
                            break;
                        default:
                            $catecate = '匹配失败'
                    }
                    $idid = "'id" + $i + "'";
                    console.log($idid);
                    $button = '<div class="ui animated fade button">' +
                        '<div class="visible content" onclick="fee_up(this,' + $idid + ')">督促缴费</div>' +
                        '<div class="hidden content" onclick="fee_up(this,' + $idid + ')">' +
                        '模拟督促阶段' +
                        '</div>' +
                        '</div>';
                    if (data.message[$el].haved == 1)
                        $button = '<div class="ui large label">' +
                            '已缴费' +
                            '</div>';
                    console.log(data.message[$el]);
                    $timetime = '';
                    if (data.message[$el].time != null)
                        $timetime = data.message[$el].time.substring(0, 10)
                    $('.price_water_main_start').append('<tr>' +
                        '<td>' + $i + '</td>' +
                        "<td id = " + $idid + ">" + data.message[$el].id + "</td>" +
                        "<td id = " + $idid + ">" + data.message[$el].house_id + "</td>" +
                        "<td id = " + $idid + ">" + data.message[$el].name + "</td>" +
                        '<td>' + $catecate + '</td>' +
                        '<td>' + data.message[$el].amount + '</td>' +
                        '<td>' + (data.message[$el].money / data.message[$el].amount).toFixed(2) + '</td>' +
                        '<td>' + data.message[$el].money + '</td>' +
                        '<td>' + $timetime + '</td>' +
                        '<td> ' + $button + '</td>' +
                        '</tr>'
                    );
                    $i++;
                }
                console.log(data);
                return;
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert('暂时帮不到您，抱歉');
        }
    });
}

//自然语言查询   切词
function search_1() {
    console.log('fenci')
    $('#search_main').addClass('loading form');
    $.ajax({
        type: "get",
        url: '/manager/search',
        dataType: 'json',
        cache: false,
        data: {
            u: $('input[id=ordinary_search]').val()
        },
        success: function (data) { //data表示接收到的数据
            $('#search_main').removeClass('loading');
            if (data != null) {
                console.log(data);
                //以表格的形式展现出来
                $('#search_main_head').empty();
                $('#search_main_context').empty();
                $('#search_main').show();
                $words = '';
                for (var key in data.status[1])
                    $words = $words + ' ' + data.status[1][key];
                $('#sql').html(data.status[0]).show();
                $('#wordcut').html($words).show();
                if (data.message.length != 0) {
                    //添加表头
                    for (var key in data.message[0]) {
                        $('#search_main_head').append(
                            '<td>' + key + '</td>'
                        );
                    }
                    for (var key in data.message) {
                        $('#search_main_context').append('<tr>');
                        for (var el in data.message[key]) {
                            $('#search_main_context').append("<td>" + data.message[key][el] + "</td>");
                        }
                        $('#search_main_context').append("</tr>");
                    }
                    $('#search_main').show();
                }

                else {
                    $('#search_main_head').append(
                        '<td>' + '未检索到信息' + '</td>'
                    );
                }


                return;
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert('暂时帮不到您，抱歉');
            $('#search_main').removeClass('loading');
        }
    })
    ;
}
function fee_up(a,btn) {

    console.log('申请督促');
    console.log(a);
    $.ajax({
        type: "get",
        url: '/ducu',
        dataType: 'json',
        cache: false,
        data: {id: $('#'+btn).html()},//上传数据

        success: function (data) { //data表示接收到的数据
               a.html('已发送邮件').siblings().html('已督促');
               return;
        },

        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert('暂时帮不到您，抱歉');
        }
    });
}

