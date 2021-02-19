jQuery.fn.Jsearch=function(param={content,url}) {
    console.log(param.content);
    //console.log(param.url);
    var contenu=$(param.content);
    var contentHtml=contenu.html();
    this.on('keyup',function(e) {
        //console.log(this.value);
        if (e.key=="Backspace" && this.value=="") {
            contenu.html(contentHtml);
        }else{
            $.get(param.url,{search:this.value},function(data){
                console.log(data);
                if(data.length==0){
                    console.log("vide");
                    data='<div class="carte">'+
                    '<div class="col-md-12 d-flex flex-row card">'+
                    '<div class="card-body im-d col-md-5">'+
                      '<h1>AUCUN ELEMENT TROUVE</h1>'+
                    '<div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>';
                }
                contenu.html(data);
            });
        }
    });
    this.on('blur',function() {
        if(this.value==""){
            //console.log(contentHtml);
            contenu.html(contentHtml);
        }
    })
}
// jQuery.fn.dload=function() {
//     $(window).scroll(function (e) {
//        if ($(window).scrollTop()==$(document).height()-$(window).height()) {
//            console.log($(window).scrollTop());
//        } 
//     });
// }