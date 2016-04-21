var id = 1;
var image = 'blue.png';
var siteUrl = 'zenphoto1.catscarlet.com/albums/newProjectImageFolder/';
if (window.location.protocol == "https:") {
    siteUrl = 'https://' + siteUrl;
}else {
    siteUrl = 'http://' + siteUrl;
}

function getImageUrl(id, image) {
    imageUrl = siteUrl + id + '/' + image;
    return imageUrl;
}
