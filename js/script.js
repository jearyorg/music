(function($){
	// Settings
	var repeat = localStorage.repeat || 0,
		shuffle = localStorage.shuffle || 'false',
		continous = true,
		autoplay = true,
		playlist = [
		{
title: '�¼Ű�ľľ',
artist: '�������',
album: '�¼Ű�ľľ',
cover:'/images/mm.jpg',
mp3: 'http://jeary.org/content/uploadfile/201504/mm.mp3',
ogg: ''
},
{
title: 'Beam Me Up',
artist: 'Cazzette',
album: 'Beam me up',
cover: 'http://img.xiami.net/images/album/img65/1164547465/12776578021377657802_2.jpg',
mp3: 'http://miantiao.jd-app.com/xiami/1772141223.mp3',
ogg: ''
},
{
title: 'Because Of You',
artist: 'Kelly Clarkson',
album: 'Breakaway',
cover: 'http://img.xiami.net/images/album/img81/23681/1696471377223876_2.jpg',
mp3: 'http://miantiao.jd-app.com/xiami/2094751.mp3',
ogg: ''
},
{
title: 'Blow Me a Kiss',
artist: 'Git Fresh',
album: 'Deep Side',
cover: 'http://img.xiami.net/images/album/img72/63172/3622141262232592_2.jpg',
mp3: 'http://miantiao.jd-app.com/xiami/1769301117.mp3',
ogg: ''
},
{
title: 'Free Loop',
artist: 'Daniel Powter',
album: 'Daniel Powter',
cover: 'http://img.xiami.net/images/album/img44/23844/1703441376477561_2.jpg',
mp3: 'http://miantiao.jd-app.com/xiami/2103608.mp3',
ogg: ''
},
{
title: 'I Have Nothing',
artist: 'Love, Whitney',
album: 'Whitney Houston',
cover: 'http://img.xiami.net/images/album/img27/11627/2161501375695126_2.jpeg',
mp3: 'http://miantiao.jd-app.com/xiami/2554137.mp3',
ogg: ''
},
{
title: 'See You Again',
artist: 'Furious 7',
album: 'Wiz Khalifa',
cover: 'http://img.xiami.net/images/album/img43/175443/1754431424175444_2.jpg',
mp3: 'http://miantiao.jd-app.com/xiami/1774054136.mp3',
ogg: ''
},
{
title: 'It Was Always You',
artist: 'V',
album: 'Maroon 5',
cover: 'http://img.xiami.net/images/album/img19/23519/29421461408944605_2.jpg',
mp3: 'http://miantiao.jd-app.com/xiami/1773381413.mp3',
ogg: ''
},
{
title: 'Find a Way',
artist: 'Sweet Little Nothing',
album: 'J-5',
cover: 'http://img.xiami.net/images/album/img85/60885/3297971382416910_2.jpg',
mp3: 'http://miantiao.jd-app.com/xiami/3676725.mp3',
ogg: ''
},
{
title: 'I Know You',
artist: 'Skylar Grey',
album: 'I Know You',
cover: 'http://img.xiami.net/images/album/img56/23256/11210456361421215184_2.jpeg',
mp3: 'http://miantiao.jd-app.com/xiami/1773920756.mp3',
ogg: ''
},];

	// Load playlist
	for (var i=0; i<playlist.length; i++){
		var item = playlist[i];
		$('#playlist').append('<li>'+item.artist+' - '+item.title+'</li>');
	}

	var time = new Date(),
		currentTrack = shuffle === 'true' ? time.getTime() % playlist.length : 0,
		trigger = false,
		audio, timeout, isPlaying, playCounts;

	var play = function(){
		audio.play();
		$('.playback').addClass('playing');
		timeout = setInterval(updateProgress, 500);
		isPlaying = true;
	}

	var pause = function(){
		audio.pause();
		$('.playback').removeClass('playing');
		clearInterval(updateProgress);
		isPlaying = false;
	}

	// Update progress
	var setProgress = function(value){
		var currentSec = parseInt(value%60) < 10 ? '0' + parseInt(value%60) : parseInt(value%60),
			ratio = value / audio.duration * 100;

		$('.timer').html(parseInt(value/60)+':'+currentSec);
		$('.progress .pace').css('width', ratio + '%');
		$('.progress .slider a').css('left', ratio + '%');
	}

	var updateProgress = function(){
		setProgress(audio.currentTime);
	}

	// Progress slider
	$('.progress .slider').slider({step: 0.1, slide: function(event, ui){
		$(this).addClass('enable');
		setProgress(audio.duration * ui.value / 100);
		clearInterval(timeout);
	}, stop: function(event, ui){
		audio.currentTime = audio.duration * ui.value / 100;
		$(this).removeClass('enable');
		timeout = setInterval(updateProgress, 500);
	}});

	// Volume slider
	var setVolume = function(value){
		audio.volume = localStorage.volume = value;
		$('.volume .pace').css('width', value * 100 + '%');
		$('.volume .slider a').css('left', value * 100 + '%');
	}

	var volume = localStorage.volume || 0.5;
	$('.volume .slider').slider({max: 1, min: 0, step: 0.01, value: volume, slide: function(event, ui){
		setVolume(ui.value);
		$(this).addClass('enable');
		$('.mute').removeClass('enable');
	}, stop: function(){
		$(this).removeClass('enable');
	}}).children('.pace').css('width', volume * 100 + '%');

	$('.mute').click(function(){
		if ($(this).hasClass('enable')){
			setVolume($(this).data('volume'));
			$(this).removeClass('enable');
		} else {
			$(this).data('volume', audio.volume).addClass('enable');
			setVolume(0);
		}
	});

	// Switch track
	var switchTrack = function(i){
		if (i < 0){
			track = currentTrack = playlist.length - 1;
		} else if (i >= playlist.length){
			track = currentTrack = 0;
		} else {
			track = i;
		}

		$('audio').remove();
		loadMusic(track);
		if (isPlaying == true) play();
	}

	// Shuffle
	var shufflePlay = function(){
		var time = new Date(),
			lastTrack = currentTrack;
		currentTrack = time.getTime() % playlist.length;
		if (lastTrack == currentTrack) ++currentTrack;
		switchTrack(currentTrack);
	}

	// Fire when track ended
	var ended = function(){
		pause();
		audio.currentTime = 0;
		playCounts++;
		if (continous == true) isPlaying = true;
		if (repeat == 1){
			play();
		} else {
			if (shuffle === 'true'){
				shufflePlay();
			} else {
				if (repeat == 2){
					switchTrack(++currentTrack);
				} else {
					if (currentTrack < playlist.length) switchTrack(++currentTrack);
				}
			}
		}
	}

	var beforeLoad = function(){
		var endVal = this.seekable && this.seekable.length ? this.seekable.end(0) : 0;
		$('.progress .loaded').css('width', (100 / (this.duration || 1) * endVal) +'%');
	}

	// Fire when track loaded completely
	var afterLoad = function(){
		if (autoplay == true) play();
	}

	// Load track
	var loadMusic = function(i){
		var item = playlist[i],
			newaudio = $('<audio>').html('<source src="'+item.mp3+'"><source src="'+item.ogg+'">').appendTo('#player');
		
		$('.cover').html('<img src="'+item.cover+'" alt="'+item.album+'">');
		$('.tag').html('<strong>'+item.title+'</strong><span class="artist">'+item.artist+'</span><span class="album">'+item.album+'</span>');
		$('#playlist li').removeClass('playing').eq(i).addClass('playing');
		audio = newaudio[0];
		audio.volume = $('.mute').hasClass('enable') ? 0 : volume;
		audio.addEventListener('progress', beforeLoad, false);
		audio.addEventListener('durationchange', beforeLoad, false);
		audio.addEventListener('canplay', afterLoad, false);
		audio.addEventListener('ended', ended, false);
	}

	loadMusic(currentTrack);
	$('.playback').on('click', function(){
		if ($(this).hasClass('playing')){
			pause();
		} else {
			play();
		}
	});
	$('.rewind').on('click', function(){
		if (shuffle === 'true'){
			shufflePlay();
		} else {
			switchTrack(--currentTrack);
		}
	});
	$('.fastforward').on('click', function(){
		if (shuffle === 'true'){
			shufflePlay();
		} else {
			switchTrack(++currentTrack);
		}
	});
	$('#playlist li').each(function(i){
		var _i = i;
		$(this).on('click', function(){
			switchTrack(_i);
		});
	});

	if (shuffle === 'true') $('.shuffle').addClass('enable');
	if (repeat == 1){
		$('.repeat').addClass('once');
	} else if (repeat == 2){
		$('.repeat').addClass('all');
	}

	$('.repeat').on('click', function(){
		if ($(this).hasClass('once')){
			repeat = localStorage.repeat = 2;
			$(this).removeClass('once').addClass('all');
		} else if ($(this).hasClass('all')){
			repeat = localStorage.repeat = 0;
			$(this).removeClass('all');
		} else {
			repeat = localStorage.repeat = 1;
			$(this).addClass('once');
		}
	});

	$('.shuffle').on('click', function(){
		if ($(this).hasClass('enable')){
			shuffle = localStorage.shuffle = 'false';
			$(this).removeClass('enable');
		} else {
			shuffle = localStorage.shuffle = 'true';
			$(this).addClass('enable');
		}
	});
})(jQuery);