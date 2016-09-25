var timestamp;

$(document).ready(function() {
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
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
    xhr.open('POST', '/post_test_ajax.php');

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
    reportlostdata.append('timestamp', timestamp);

    var img_info_id;
    img_info_id = $('#img-info-id').prop('value');
    reportlostdata.append('timestamp', timestamp);
    reportlostdata.append('img_info_id', img_info_id);
    console.log(reportlostdata);

    $.ajax({
        type: 'POST',
        url: '/post_test.php',
        data: reportlostdata,
        processData: false,  // 告诉jQuery不要去处理发送的数据
        contentType: false,   // 告诉jQuery不要去设置Content-Type请求头
        dataType: 'json',
        async: false,
        success: function(msg) {
            console.log(msg);
        },
        error: function() {
            console.log(msg);
        }
    });
}
