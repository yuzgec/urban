<div class="totop"><a href="#">Yukarı</a></div>
<ul class="grid_lines d-none d-md-flex justify-content-between">
	<li class="grid_line"></li>
	<li class="grid_line"></li>
	<li class="grid_line"></li>
	<li class="grid_line"></li>
	<li class="grid_line"></li>
	<li class="grid_line"></li>
	<li class="grid_line"></li>
</ul>

<script src="/frontend/js/jquery-3.6.0.min.js"></script>
<script src="/frontend/js/bootstrap.bundle.min.js"></script>
<script src="/frontend/plugins/swiper/swiper-bundle.min.js"></script>
<script src="/frontend/js/funfacts.js"></script>
<script src="/frontend/plugins/isotope/isotope.pkgd.min.js"></script>
<script src="/frontend/plugins/isotope/imagesloaded.pkgd.min.js"></script>
<script src="/frontend/plugins/isotope/packery-mode.pkgd.js"></script>
<script src="/frontend/plugins/isotope/tilt.jquery.js"></script>
<script src="/frontend/plugins/isotope/isotope-init.js"></script>
<script src="/frontend/plugins/cursor-effect/cursor-effect.js"></script>
<script src="/frontend/plugins/select2/js/select2.min.js"></script>
<script src="/frontend/plugins/aos/aos.js"></script>
<script src="/frontend/js/theme.js"></script>
<script type="text/javascript">
 	const headings = document.querySelectorAll('.content h1, .content h2, .content h3, .content h4, .content h5, .content h6');
	headings.forEach(function(heading) {
		heading.classList.add('widget-title');
		const span = document.createElement('span');
		span.className = 'title-line';
		heading.appendChild(span);
	});

	const lists = document.querySelectorAll('.content ul');
	lists.forEach(function(list) {
		list.classList.add('point_order');
	});
</script>