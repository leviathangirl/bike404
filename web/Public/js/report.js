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
    $('#uploadimg').on('click', function() {
        var files = document.getElementById('files').files;
        console.log(files);
        if (files.length == 0) {
            console.log('没有文件');
            return ;
        }
        $('#img-info-id').prop('value', '上传中');
        ifDisplayImgUploaderForm(false);
        uploadImgAjax(files);
    });
    $('#test').on('click', function() {
        postReportLostData(1);
    });
});

function uploadImgAjax(files) {
    var formData = new FormData();
    formData.append('posttest', 'post files');

    console.log(files);
    console.log(files.length);
    for (var i = 0; i < files.length; i++) {
        console.log(files[i]);
        formData.append('files[]', files[i]);
    }

    console.log(formData);

    var xhr = new XMLHttpRequest();
    xhr.onprogress = updateProgress;
    xhr.upload.onprogress = updateProgress;
    xhr.open('POST', '/index.php/Home/report/postReportLostImage');

    xhr.send(formData);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
            timestamp = xhr.responseText;
            postInfo(timestamp);
            return ;
        } else {
            $('#img-info-id').prop('value', '上传失败，请重新上传');
            ifDisplayImgUploaderForm(true);
        }
    };
}

function postInfo(timestamp) {
    $('#img-info-id').prop('value', timestamp);
    ifDisplayImgUploaderForm(false);
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
        console.log(percentComplete);
    }
}

function postReportLostData(timestamp) {
    if (!timestamp) {
        console.log('timestamp is false.');
        return false;
    }
    reportlostdata = new FormData(document.getElementById('reportlostform'));

    var img_info_id;
    img_info_id = $('#img-info-id').prop('value');
    reportlostdata.append('timestamp', timestamp);
    reportlostdata.append('img_info_id', img_info_id);

    var $input_get__select = $('#lost_time_pickadate').pickadate();
    var picker_get__select = $input_get__select.pickadate('picker');
    var lost_time = picker_get__select.get('select', 'yyyy/mm/dd');
    reportlostdata.append('lost_time', lost_time);

    console.log(reportlostdata);

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
            console.log(msg);
            window.location.href = 'http://192.168.1.102:8092/bike404/web/index.php/Home/report/reportSuccess';
        },
        error: function() {
            console.log(msg);
        }
    });
}
