$(document).ready(function() {
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });

    $('select').material_select();
    $('#uploadimg').on('click', function() {
        //console.log('click');
        var files = document.getElementById('files').files;
        upload(files);
    });
});

function upload(files) {
    //var mainform = document.getElementById('mainform');
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
        } else {
            //console.log(xhr.statusText);
        }
        //console.log(xhr);
    };
}

function updateProgress(event) {
　　　　if (event.lengthComputable) {
        var percentComplete = event.loaded / event.total;
        console.log(percentComplete);
　　　　}
}
