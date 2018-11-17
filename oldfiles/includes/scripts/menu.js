	var expanded = false;
	var autosave = false;
	var navmenu = new Array(1,1,1,1,1,1,1,1,1);	
	var files = new Array('menu');
	
	function nobub()
	{
		window.event.cancelBubble = true;
	}
 
	function nav_goto(targeturl)
	{
		parent.frames.main.location = targeturl;
	}
 
	function open_close_group(group, doOpen, path_img)
	{
		var curdiv = document.getElementById("group_" + group);
		var curbtn = document.getElementById("button_" + group);
		var path = path_img;
 
		if (doOpen)
		{
			curdiv.style.display = "";
			curbtn.src = path + "/admin/cp_expand.gif";
			curbtn.title = "Collapse Group";
		}
		else
		{
			curdiv.style.display = "none";
			curbtn.src = path + "/admin/cp_collapse.gif";
			curbtn.title = "Expand Group";
		}
 
	}
 
	function toggle_group(group, path_img)
	{
		var curdiv = document.getElementById("group_" + group);
		var path = path_img;		
 
		if (curdiv.style.display == "none")
		{
			open_close_group(group, true, path);
		}
		else
		{
			open_close_group(group, false, path);
		}
 
		if (autosave)
		{
			save_group_prefs(group);
		}
	}
 
	function expand_all_groups(doOpen, path_img)
	{
		var navobj = null;
		var path = path_img;	

		for (nav_file in files)
		{
			navobj = eval('nav' + files[nav_file]);
			for (var i = 1; i < navobj.length; i++)
			{
				
				open_close_group(files[nav_file] + '_' + i, doOpen, path);
			}
		}
 
		if (autosave)
		{
			save_group_prefs(-1);
		}
	}
 
	function read_group_prefs()
	{
		var navobj = null;
		for (nav_file in files)
		{
			navobj = eval('nav' + files[nav_file]);
			for (var i = 0; i < navobj.length; i++)
			{
				open_close_group(files[nav_file] + '_' + i, navobj[i]);
			}
		}
	}