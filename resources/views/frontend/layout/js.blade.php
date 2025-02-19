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

<script>
$(document).ready(function() {
    var $grid = $('.grid').isotope({
        itemSelector: '.grid-item',
        percentPosition: true,
        layoutMode: 'masonry',
        masonry: {
            columnWidth: '.grid-sizer',
            gutter: 0
        }
    });

    // Sayfa ilk yüklendiğinde varsayılan resimleri göster
    $('#gallery-container').imagesLoaded(function() {
        $grid.isotope('reloadItems');
        $grid.isotope({
            sortBy: 'original-order',
            layoutMode: 'masonry'
        });
    });

    // Tab tıklamalarını dinle
    $('.filters-button-group .button').on('click', function() {
        let $this = $(this);
        $('.filters-button-group .button').removeClass('is-checked');
        $this.addClass('is-checked');
        loadGallery($this.data('slug'));
    });

    function loadGallery(slug = '') {
        $('#gallery-container').addClass('loading');
        
        $.get(`/get-service-gallery/${slug}`, function(response) {
            var $content = $(response.html);
            
            $('#gallery-container').empty().append($content);
            
            // Count'u güncelle
            $('.filters-button-group .button[data-slug="'+ slug +'"] .filter-count').text(response.count);
            
            $('#gallery-container').imagesLoaded(function() {
                $grid.isotope('reloadItems');
                $grid.isotope({
                    sortBy: 'original-order',
                    layoutMode: 'masonry'
                });
                
                $('#gallery-container').removeClass('loading');
            });
        });
    }
});
</script>

<script>
// Tema değiştirme fonksiyonu
function toggleTheme() {
    const body = document.body;
    const icon = document.getElementById('theme-icon');
    
    if (body.classList.contains('bg-white')) {
        // Light'tan Dark'a geç
        body.classList.remove('bg-white');
        body.classList.add('bg-dark');
        icon.classList.remove('bi-moon-fill');
        icon.classList.add('bi-sun-fill');
        localStorage.setItem('theme', 'dark');
    } else {
        // Dark'tan Light'a geç
        body.classList.remove('bg-dark');
        body.classList.add('bg-white');
        icon.classList.remove('bi-sun-fill');
        icon.classList.add('bi-moon-fill');
        localStorage.setItem('theme', 'light');
    }
}

// Sayfa yüklendiğinde
document.addEventListener('DOMContentLoaded', () => {
    const savedTheme = localStorage.getItem('theme') || 'dark';
    const body = document.body;
    const icon = document.getElementById('theme-icon');
    
    if (savedTheme === 'light') {
        body.classList.remove('bg-dark');
        body.classList.add('bg-white');
        icon.classList.remove('bi-sun-fill');
        icon.classList.add('bi-moon-fill');
    } else {
        body.classList.remove('bg-white');
        body.classList.add('bg-dark');
        icon.classList.remove('bi-moon-fill');
        icon.classList.add('bi-sun-fill');
    }
    
    // Tema değiştirme butonuna tıklama olayı
    document.getElementById('theme-toggle').addEventListener('click', (e) => {
        e.preventDefault();
        toggleTheme();
    });
});
</script>

<style>

</style>