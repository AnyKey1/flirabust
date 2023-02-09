/**
 * WEBSITE: https://themefisher.com
 * TWITTER: https://twitter.com/themefisher
 * FACEBOOK: https://www.facebook.com/themefisher
 * GITHUB: https://github.com/themefisher/
 */

// Preloader js
$(window).on('load', function () {
	'use strict';
	$('.preloader').fadeOut(100);
});

(function ($) {
	'use strict';

	$(window).on('scroll', function () {
		var scrolling = $(this).scrollTop();
		if (scrolling > 10) {
			$('.navigation').addClass('nav-bg');
		} else {
			$('.navigation').removeClass('nav-bg');
		}
	});

	// tab
	$('.tab-content').find('.tab-pane').each(function (idx, item) {
		var navTabs = $(this).closest('.code-tabs').find('.nav-tabs'),
			title = $(this).attr('title');
		navTabs.append('<li class="nav-item"><a class="nav-link" href="#">' + title + '</a></li>');
	});

	$('.code-tabs ul.nav-tabs').each(function () {
		$(this).find('li:first').addClass('active');
	});

	$('.code-tabs .tab-content').each(function () {
		$(this).find('div:first').addClass('active');
	});

	$('.nav-tabs a').click(function (e) {
		e.preventDefault();
		var tab = $(this).parent(),
			tabIndex = tab.index(),
			tabPanel = $(this).closest('.code-tabs'),
			tabPane = tabPanel.find('.tab-pane').eq(tabIndex);
		tabPanel.find('.active').removeClass('active');
		tab.addClass('active');
		tabPane.addClass('active');
	});

	// Accordions
	$('.collapse').on('shown.bs.collapse', function () {
		$(this).parent().find('.ti-plus').removeClass('ti-plus').addClass('ti-minus');
	}).on('hidden.bs.collapse', function () {
		$(this).parent().find('.ti-minus').removeClass('ti-minus').addClass('ti-plus');
	});


	// copy to clipboard
	$('.copy').click(function () {
		$(this).siblings('.inputlink').select();
		document.execCommand('copy');
	});


	// instafeed
	if (($('#instafeed').length) !== 0) {
		var accessToken = $('#instafeed').attr('data-accessToken');
		var userFeed = new Instafeed({
			get: 'user',
			resolution: 'low_resolution',
			accessToken: accessToken,
			template: '<div class="instagram-post"><a href="{{link}}" target="_blank"><img src="{{image}}"></a></div>'
		});
		userFeed.run();
	}

    $('.instagram-slider').css("display", "none");
	setTimeout(function () {
        $('.instagram-slider').css("display", "block");

		$('.instagram-slider').slick({
			dots: false,
			speed: 300,
			autoplay: true,
			arrows: false,
			slidesToShow: 8,
			slidesToScroll: 1,
			responsive: [{
					breakpoint: 1024,
					settings: {
						slidesToShow: 6
					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 4
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 2
					}
				}
			]
		});
	}, 1500);


	// popup video
	var $videoSrc;
	$('.video-btn').click(function () {
		$videoSrc = $(this).data('src');
	});
	console.log($videoSrc);
	$('#myModal').on('shown.bs.modal', function (e) {
		$('#video').attr('src', $videoSrc + '?autoplay=1&amp;modestbranding=1&amp;showinfo=0');
	});
	$('#myModal').on('hide.bs.modal', function (e) {
		$('#video').attr('src', $videoSrc);
	});



})(jQuery);

page = 1;

template = '                        <div class="col-lg-6 col-sm-6 post">\n' +
    '                            <article class="card mb-4">\n' +
    '                                <div class="post-slider slider-sm slick-initialized slick-slider"><button type="button" class="prevArrow slick-arrow" style=""><i class="ti-angle-left"></i></button>\n' +
    '                                         <div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 1750px; transform: translate3d(-350px, 0px, 0px);">\n' +
    '                                            <img src="/images/no-cover.png" class="card-img-top slick-slide slick-cloned" alt="post-thumb" data-slick-index="-1" aria-hidden="true" tabindex="-1" style="width: 350px;">\n' +
    '                                            <img src="/images/no-cover.png" class="card-img-top slick-slide slick-current slick-active" alt="post-thumb" data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 350px;">\n' +
    '                                            <img src="/images/no-cover.png" class="card-img-top slick-slide" alt="post-thumb" data-slick-index="1" aria-hidden="true" tabindex="-1" style="width: 350px;">\n' +
    '                                            <img src="/images/no-cover.png" class="card-img-top slick-slide slick-cloned" alt="post-thumb" data-slick-index="2" aria-hidden="true" tabindex="-1" style="width: 350px;">\n' +
    '                                            <img src="/images/no-cover.png" class="card-img-top slick-slide slick-cloned" alt="post-thumb" data-slick-index="3" aria-hidden="true" tabindex="-1" style="width: 350px;">\n' +
    '                                        </div>' +
    '                                    </div>' +
    '                                    <button type="button" class="nextArrow slick-arrow" style=""><i class="ti-angle-right"></i></button></div>\n' +
    '                                <div class="card-body">\n' +
    '                                    <h3 class="h4 mb-3"><a class="post-title" href="post/elements/">$post->title.</a></h3>\n' +
    '                                    <ul class="card-meta list-inline">\n' +
    '                                        <li class="list-inline-item">\n' +
    '                                            <a href="author-single.html" class="card-meta-author">\n' +
    '                                                <img src="images/john-doe.jpg" alt="John Doe">\n' +
    '                                                <span>$post->author_name</span>\n' +
    '                                            </a>\n' +
    '                                        </li>\n' +
    '                                        <li class="list-inline-item">\n' +
    '                                            <i class="ti-timer"></i>3 Min To Read\n' +
    '                                        </li>\n' +
    '                                        <li class="list-inline-item">\n' +
    '                                            <i class="ti-calendar"></i>$post->created_at->timestamp\n' +
    '                                        </li>\n' +
    '                                        <li class="list-inline-item">\n' +
    '                                            <ul class="card-meta-tag list-inline">\n' +
    '                                                <li class="list-inline-item"><a href="tags.html">Demo</a></li>\n' +
    '                                                <li class="list-inline-item"><a href="tags.html">Elements</a></li>\n' +
    '                                            </ul>\n' +
    '                                        </li>\n' +
    '                                    </ul>\n' +
    '                                    <p>Heading example Here is example of hedings. You can use this heading by …</p>\n' +
    '                                    <a href="/book/$post->id" class="btn btn-outline-primary">Read More</a>\n' +
    '                                </div>\n' +
    '                            </article>\n' +
    '                        </div>'

time = 100;
function loadMore(){


    $.ajax({
            method: "POST",
            url: "/api/recent/" + page,
        })
        .done(function( data ) {
            page++;
            $.each(data, function(key, value){
                setTimeout(function (){

                    html = template.replace('$post->title', data[key].title)
                        .replace('$post->author_name', data[key].author_name)
                        .replace('$post->id', data[key].id);

                    $(html).insertBefore('#loadmore');
                }, time +=50);
            });
        });
    //console.log(page);
}
