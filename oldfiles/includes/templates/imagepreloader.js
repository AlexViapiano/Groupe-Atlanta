function preloadImages(imgs){
	
	var picArr = [];
	
		for (i = 0; i<imgs.length; i++){
			
				picArr[i]= new Image(100,100); 
				picArr[i].src=imgs[i]; 

			
			}
	
	}
	
preloadImages([
			'images/menu_right.gif',
			'images/menu_left.gif',
			'images/menu_rep.gif']);	