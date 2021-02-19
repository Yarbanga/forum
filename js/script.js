// afficher phto dans imput enregistrement
var photo=document.getElementById('inputphoto');
var lab=document.getElementById('labelphoto');
var con=document.getElementById('cont');
var sub=document.getElementById('sub');
if(photo){
  photo.addEventListener('change',function(){
    var lecteur= new FileReader();
      lecteur.readAsDataURL(this.files[0]);
      lecteur.onloadend =function(e){
        console.log(e.target.result);
          lab.src=e.target.result;
      }
  });
}

$('#rech').Jsearch({content:"#cont",url:"traitement/recherche.php"});

$("#list-messages-list").click(function() {
  window.print();
});
window.onbeforeprint=function() {
  $("aside").css('display','none');
  $("#btopen").css('display','none');
  $("body").css('overflow','auto');
  $(".contenu").css('overflow','visible');
  $(".tr_list").css('display','block');
};
window.onafterprint=function() {
  $("aside").css('display','inline-block');
  $("#btopen").css('display','block');
  $(".tr_list").css('display','none');
};


$('#btopen').click(function(e) {
  $("aside").toggle("visibility");
  var cont=$(".contenu");
  if(cont.hasClass("col-lg-12")){
    cont.removeClass("col-lg-12");
    cont.addClass("col-lg-10");
  }else if (cont.hasClass("col-lg-10")) {
    cont.removeClass("col-lg-10");
    cont.addClass("col-lg-12");
  }
})



