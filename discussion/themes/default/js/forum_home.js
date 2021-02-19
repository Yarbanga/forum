function showDiscussions(cat_id){
	var html_id= "#cat_discussions_"+cat_id;
	if ($(html_id).css("display") == 'block'){

       $(html_id).css("display", "none");


	}else{
		 $(html_id).css("display", "block");
	}
}


function startDiscussion(cat_id){
	var html_id="#cat_discussions_" + cat_id;
	if ($(html_id).css("display") == 'block'){

       $(html_id).css("display", "none");


	}else{
		 $(html_id).css("display", "block");
	}
}

