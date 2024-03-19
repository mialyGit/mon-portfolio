(function () {
	"use strict";

	var treeviewMenu = $('.app-menu');
	var conditional = false;
	// Get the current URL
	var url = window.location.href;
	// Iterate through each <li> in the sidebar
	$('.app-menu li').each(function(){
		// Check if the <a> tag's href matches the current URL
		var linkElement = $(this).find('a');
		var subURL = linkElement.attr('href').split('dashboard');
		if (subURL[1]) {
			if(subURL[1] && url.includes(subURL[1])) {
				linkElement.addClass('active');
			};
		} else {
			if(linkElement.attr('href') == url) {
				linkElement.addClass('active');
			}
		}
	});
		
	// Toggle Sidebar
	$('[data-toggle="sidebar"]').click(function(event) {
		event.preventDefault();
		$('.app').toggleClass('sidenav-toggled');
	});

	// Activate sidebar treeview toggle
	$("[data-toggle='treeview']").click(function(event) {
		event.preventDefault();
		if(!$(this).parent().hasClass('is-expanded')) {
			treeviewMenu.find("[data-toggle='treeview']").parent().removeClass('is-expanded');
		}
		$(this).parent().toggleClass('is-expanded');
	});

	// Set initial active toggle
	$("[data-toggle='treeview.'].is-expanded").parent().toggleClass('is-expanded');

	//Activate bootstrip tooltips
	$("[data-toggle='tooltip']").tooltip();

})();
