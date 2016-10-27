var timestamp;

$(document).ready(function() {
    $('#lost_time_pickadate').datepicker({
        maxViewMode: 2,
        todayBtn: 'linked',
        language: 'zh-CN',
        autoclose: true,
        todayHighlight: true
    });

    $('select').material_select();

    $('#uploadimg').on('click', uploadimgBtnOnClick);

    $('#submit-info').on('click', function() {
        postReportLostData(1);
    });
});

function uploadimgBtnOnClick(event) {
    var files = document.getElementById('files').files;
    if (files.length == 0) {
        Materialize.toast('您没有选择文件', 4000);
        return ;
    }
    $('#img-info-id').prop('value', '上传中...');
    uploadImgAjax(files);

}

function uploadImgAjax(files) {
    $('#uploadimg').off('click');
    $('#uploadimg').addClass('disabled');

    var formData = new FormData();
    formData.append('posttest', 'post files');
    for (var i = 0; i < files.length; i++) {
        formData.append('files[]', files[i]);
    }
    var xhr = new XMLHttpRequest();
    xhr.onprogress = updateProgress;
    xhr.upload.onprogress = updateProgress;
    xhr.open('POST', '/index.php/Home/report/postReportLostImage');

    xhr.send(formData);
    xhr.onreadystatechange = function() {
        if (xhr.status == 200) {
            timestamp = xhr.responseText;
            postInfo(timestamp);
            ifDisplayImgUploaderForm(false);
        } else {
            Materialize.toast('上传失败，请重新上传', 4000);
            $('#img-info-id').prop('value', '上传失败，请重新上传');

            $('#uploadimg').on('click', uploadimgBtnOnClick);
            $('#uploadimg').removeClass('disabled');
            ifDisplayImgUploaderForm(true);
        }
    };
}

function postInfo(timestamp) {
    $('#img-info-id').prop('value', timestamp);
}

function ifDisplayImgUploaderForm(ifDisplay) {
    if (ifDisplay) {
        $('#img-uploader-form').show();
    } else {
        $('#img-uploader-form').hide();
    }
}

function updateProgress(event) {
    if (event.lengthComputable) {
        var percentComplete = event.loaded / event.total;
        var percentCompleteStr = '上传中...' + (percentComplete * 100).toFixed(2) + '%';
        $('#img-info-id').prop('value', percentCompleteStr);
    }
}

function postReportLostData(timestamp) {
    if (!timestamp) {
        return false;
    }
    reportlostdata = new FormData(document.getElementById('reportlostform'));

    var img_info_id;
    img_info_id = $('#img-info-id').prop('value');
    reportlostdata.append('timestamp', timestamp);
    reportlostdata.append('img_info_id', img_info_id);

    var datacheck = postDataCheck();
    if (!datacheck) {
        Materialize.toast('您提交的信息缺少部分字段！请您填写所有带*的字段', 4000);
    }

    $.ajax({
        type: 'POST',
        url: '/index.php/Home/report/postReportLostData',
        data: reportlostdata,
        processData: false,  // 告诉jQuery不要去处理发送的数据
        contentType: false,   // 告诉jQuery不要去设置Content-Type请求头
        dataType: 'json',
        async: false,
        success: function(msg) {
            Materialize.toast('提交成功!', 4000);
            window.location.href = 'http://192.168.1.102:8092/bike404/web/index.php/Home/report/reportSuccess';
        },
        error: function() {
            console.log(msg);
        }
    });
}

function postDataCheck() {
    x = !($('#user').val()) || !($('#area').val()) || !($('#brand').val()) || !($('#color').val()) || !($('#type').val()) || !($('#lost_time_pickadate').val()) || !($('#info').val()) || !($('#email').val());
    if (x) {
        return false;
    }
    return true;
}
