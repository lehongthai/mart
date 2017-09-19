function ChangeToSlugVietName()
    {
        var title, slug;
     
        //Lấy text từ thẻ input title 
        title = document.getElementById("title").value;
     
        //Đổi chữ hoa thành chữ thường
        slug = title.toLowerCase();
     
        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('slug').value = slug;
    }

    $('input#title').keyup(function(){
        ChangeToSlugVietName();
    });

    function ChangeToSlugEnglish()
    {
        var title, slug;
     
        //Lấy text từ thẻ input title 
        title = document.getElementById("title_en").value;
     
        //Đổi chữ hoa thành chữ thường
        slug = title.toLowerCase();
     
        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('slug_en').value = slug;
    }

    $('input#title_en').keyup(function(){
        ChangeToSlugEnglish();
    });

function BrowseServer()
{
    // You can use the "CKFinder" class to render CKFinder in a page:
    var finder = new CKFinder();
    finder.basePath = '../';    // The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = SetFileField;
    finder.popup();
}

// This is a sample function which is called when a file is selected in CKFinder.
function SetFileField( fileUrl )
{
  document.getElementById( 'link_avatar' ).value = fileUrl;
  document.getElementById( 'avatar' ).src = document.getElementById( 'link_avatar' ).value;
}

function BrowseServerDetail()
{
    // You can use the "CKFinder" class to render CKFinder in a page:
    var finder = new CKFinder();
    finder.basePath = '../';    // The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = SetFileFieldDetail;
    finder.popup();
}
function SetFileFieldDetail( fileUrl )
{
  document.getElementById( 'detailImg' ).value = fileUrl;
  document.getElementById( 'imgDetail' ).src = document.getElementById( 'detailImg' ).value;
}

function BrowseServerDetail1()
{
    // You can use the "CKFinder" class to render CKFinder in a page:
    var finder = new CKFinder();
    finder.basePath = '../';    // The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = SetFileFieldDetail1;
    finder.popup();
}
function SetFileFieldDetail1( fileUrl )
{
  document.getElementById( 'detailImg1' ).value = fileUrl;
  document.getElementById( 'imgDetail1' ).src = document.getElementById( 'detailImg1' ).value;
}
function BrowseServerDetail2()
{
    // You can use the "CKFinder" class to render CKFinder in a page:
    var finder = new CKFinder();
    finder.basePath = '../';    // The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = SetFileFieldDetail2;
    finder.popup();
}
function SetFileFieldDetail2( fileUrl )
{
  document.getElementById( 'detailImg2' ).value = fileUrl;
  document.getElementById( 'imgDetail2' ).src = document.getElementById( 'detailImg2' ).value;
}
function BrowseServerDetail3()
{
    // You can use the "CKFinder" class to render CKFinder in a page:
    var finder = new CKFinder();
    finder.basePath = '../';    // The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = SetFileFieldDetail3;
    finder.popup();
}
function SetFileFieldDetail3( fileUrl )
{
  document.getElementById( 'detailImg3' ).value = fileUrl;
  document.getElementById( 'imgDetail3' ).src = document.getElementById( 'detailImg3' ).value;
}

function BrowseServerDetail4()
{
    // You can use the "CKFinder" class to render CKFinder in a page:
    var finder = new CKFinder();
    finder.basePath = '../';    // The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = SetFileFieldDetail4;
    finder.popup();
}
function SetFileFieldDetail4( fileUrl )
{
  document.getElementById( 'detailImg4' ).value = fileUrl;
  document.getElementById( 'imgDetail4' ).src = document.getElementById( 'detailImg4' ).value;
}

