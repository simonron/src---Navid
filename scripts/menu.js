var open = false;

function onClickMenu() {
	console.log("onClickMenu called");
	console.log("open = " + open);
	if (open == true) {
		closeMenu();
	} else {
		openMenu();
	}
}

function onClickCover() {
	console.log("onClickCover called");
	console.log("open = " + open);
	closeMenu();
}

var scrollPos;

function openMenu() {
	console.log("openMenu called");

	scrollPos = jQuery('body').scrollTop();
	jQuery('.cover').animate({
		left: '80%'
	});
	jQuery('.mobile-sidebar-left').animate({
		left: '0%'
	});
	jQuery('.mobile-menu-bar').animate({
		left: '80%'
	});
	//jQuery('.off-screen-left').css('display', 'block');
	jQuery('.off-screen-left').animate({
		left: '0%'
	});
	jQuery('.outer').css({
		position: 'fixed',
		top: -(document.body.scrollTop)
	});
	jQuery(".body").on("touchmove", false);
	jQuery('.cover').fadeIn();
	jQuery('.fadeout').fadeOut();
	open = true;
}

function closeMenu() {

	console.log("closeMenu called");
	
	jQuery('.mobile-sidebar-left').animate({
		left: '-80%'
	});
	
	jQuery('.cover').animate({
		left: '0%'
	});
	jQuery('.mobile-menu-bar').animate({
		left: '0%'
	});
	jQuery('.off-screen-left').animate({
		left: '-80%'
	});
	jQuery('.outer').css({
		position: 'relative'
	});
	jQuery('body').scrollTop(scrollPos);
	jQuery(".body").off("touchmove", false);
	jQuery('.cover').fadeOut();
	jQuery('.fadeout').fadeIn();
	open = false;
}