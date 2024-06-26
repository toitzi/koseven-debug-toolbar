<?php $panels = Kohana::$config->load('debug_toolbar.panels'); ?>

<!-- Toolbar CSS -->
<style type="text/css">
    <?php echo file_get_contents(Kohana::find_file('views', 'debug_toolbar', 'css')); ?>
</style>

<!-- Toolbar Javascript -->
<script type="text/javascript">
    <?php echo file_get_contents(Kohana::find_file('views', 'debug_toolbar', 'js')); ?>
</script>

<!-- DEBUG TOOLBAR -->
<div id="kohana-debug-toolbar">

	<!-- Toolbar -->
	<div id="debug-toolbar" class="debug-toolbar-align-<?php echo $align ?>">

		<!-- Kohana link -->
		<img style="max-height: 17px; padding: 2px 10px 0 10px;" src="data:image/png;base64,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" alt="Koseven" onclick="debugToolbar.collapse()">

		<!-- Kohana icon -->
        <ul id="debug-toolbar-menu" class="menu" style="<?php echo (Kohana::$config->load('debug_toolbar.start_closed')) ? 'display:none;': ''; ?>">
			<!-- Kohana version -->
			<li>
				<?php echo HTML::anchor("https://koseven.ga", Kohana::VERSION, array('target' => '_blank')) ?>
			</li>

			<!-- Benchmarks -->
			<?php if (isset($benchmarks)): ?>
				<!-- Time -->
				<li id="time" onclick="debugToolbar.show('debug-benchmarks'); return false;">
					<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAKrSURBVDjLpdPbT9IBAMXx/qR6qNbWUy89WS5rmVtutbZalwcNgyRLLMyuoomaZpRQCt5yNRELL0TkBSXUTBT5hZSXQPwBAvor/fZGazlb6+G8nIfP0znbgG3/kz+Knsbb+xxNV63DLxVLHzqV0vCrfMluzFmw1OW8ePEwf8+WgM1UXDnapVgLePr5Nj9DJBJGFEN8+TzKqL2RzkenV4yl5ws2BXob1WVeZxXhoB+PP0xzt0Bly0fKTePozV5GphYQPA46as+gU5/K+w2w6Ev2Ol/KpNCigM01R2uPgDcQIRSJEYys4JmNoO/y0tbnY9JlxnA9M15bfHZHCnjzVN4x7TLz6fMSJqsPgLAoMvV1niSQBGIbUP3Ki93t57XhItVXjulTQHf9hfk5/xgGyzQTgQjx7xvE4nG0j3UsiiLR1VVaLN3YpkTuNLgZGzRSq8wQUoD16flkOPSF28/cLCYkwqvrrAGXC1UYWtuRX1PR5RhgTJTI1Q4wKwzwWHk4kQI6a04nQ99mUOlczMYkFhPrBMQoN+7eQ35Nhc01SvA7OEMSFzTv8c/0UXc54xfQcj/bNzNmRmNy0zctMpeEQFSio/cdvqUICz9AiEPb+DLK2gE+2MrR5qXPpoAn6mxdr1GBwz1FiclDcAPCEkTXIboByz8guA75eg8WxxDtFZloZIdNKaDu5rnt9UVHE5POep6Zh7llmsQlLBNLSMTiEm5hGXXDJ6qb3zJiLaIiJy1Zpjy587ch1ahOKJ6XHGGiv5KeQSfFun4ulb/josZOYY0di/0tw9YCquX7KZVnFW46Ze2V4wU1ivRYe1UWI1Y1vgkDvo9PGLIoabp7kIrctJXSS8eKtjyTtuDErrK8jIYHuQf8VbK0RJUsLfEg94BfIztkLMvP3v3XN/5rfgIYvAvmgKE6GAAAAABJRU5ErkJggg==" alt="time">
					<?php echo round($benchmarks['application']['total_time']*1000, 2) ?> ms
				</li>
				<!-- Memory -->
				<li id="memory" onclick="debugToolbar.show('debug-benchmarks'); return false;">
					<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAGvSURBVDjLpZO7alZREEbXiSdqJJDKYJNCkPBXYq12prHwBezSCpaidnY+graCYO0DpLRTQcR3EFLl8p+9525xgkRIJJApB2bN+gZmqCouU+NZzVef9isyUYeIRD0RTz482xouBBBNHi5u4JlkgUfx+evhxQ2aJRrJ/oFjUWysXeG45cUBy+aoJ90Sj0LGFY6anw2o1y/mK2ZS5pQ50+2XiBbdCvPk+mpw2OM/Bo92IJMhgiGCox+JeNEksIC11eLwvAhlzuAO37+BG9y9x3FTuiWTzhH61QFvdg5AdAZIB3Mw50AKsaRJYlGsX0tymTzf2y1TR9WwbogYY3ZhxR26gBmocrxMuhZNE435FtmSx1tP8QgiHEvj45d3jNlONouAKrjjzWaDv4CkmmNu/Pz9CzVh++Yd2rIz5tTnwdZmAzNymXT9F5AtMFeaTogJYkJfdsaaGpyO4E62pJ0yUCtKQFxo0hAT1JU2CWNOJ5vvP4AIcKeao17c2ljFE8SKEkVdWWxu42GYK9KE4c3O20pzSpyyoCx4v/6ECkCTCqccKorNxR5uSXgQnmQkw2Xf+Q+0iqQ9Ap64TwAAAABJRU5ErkJggg==" alt="memory">
					<?php echo Text::bytes($benchmarks['application']['total_memory'], '') ?>
				</li>
			<?php endif ?>

			<!-- Queries -->
			<?php if ($panels['database']): ?>
				<li id="toggle-database" onclick="debugToolbar.show('debug-database'); return false;">
					<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAEYSURBVBgZBcHPio5hGAfg6/2+R980k6wmJgsJ5U/ZOAqbSc2GnXOwUg7BESgLUeIQ1GSjLFnMwsKGGg1qxJRmPM97/1zXFAAAAEADdlfZzr26miup2svnelq7d2aYgt3rebl585wN6+K3I1/9fJe7O/uIePP2SypJkiRJ0vMhr55FLCA3zgIAOK9uQ4MS361ZOSX+OrTvkgINSjS/HIvhjxNNFGgQsbSmabohKDNoUGLohsls6BaiQIMSs2FYmnXdUsygQYmumy3Nhi6igwalDEOJEjPKP7CA2aFNK8Bkyy3fdNCg7r9/fW3jgpVJbDmy5+PB2IYp4MXFelQ7izPrhkPHB+P5/PjhD5gCgCenx+VR/dODEwD+A3T7nqbxwf1HAAAAAElFTkSuQmCC" alt="queries">
					<?php echo isset($queries) ? $query_count : 0 ?>
				</li>
			<?php endif ?>

			<!-- Vars -->
			<?php if ($panels['vars']): ?>
				<li id="toggle-vars" onclick="debugToolbar.show('debug-vars'); return false;">
					<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAFWSURBVBgZBcE/SFQBAAfg792dppJeEhjZn80MChpqdQ2iscmlscGi1nBPaGkviKKhONSpvSGHcCrBiDDjEhOC0I68sjvf+/V9RQCsLHRu7k0yvtN8MTMPICJieaLVS5IkafVeTkZEFLGy0JndO6vWNGVafPJVh2p8q/lqZl60DpIkaWcpa1nLYtpJkqR1EPVLz+pX4rj47FDbD2NKJ1U+6jTeTRdL/YuNrkLdhhuAZVP6ukqbh7V0TzmtadSEDZXKhhMG7ekZl24jGDLgtwEd6+jbdWAAEY0gKsPO+KPy01+jGgqlUjTK4ZroK/UVKoeOgJ5CpRyq5e2qjhF1laAS8c+Ymk1ZrVXXt2+9+fJBYUwDpZ4RR7Wtf9u9m2tF8Hwi9zJ3/tg5pW2FHVv7eZJHd75TBPD0QuYze7n4Zdv+ch7cfg8UAcDjq7mfwTycew1AEQAAAMB/0x+5JQ3zQMYAAAAASUVORK5CYII=" alt="vars">
					vars
				</li>
			<?php endif ?>

            <!-- Ajax -->
			<?php if ($panels['ajax']): ?>
                <li id="toggle-ajax" onclick="debugToolbar.show('debug-ajax'); return false;" style="display: none">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAALvSURBVBgZBcFNaNUFAADw3//jbe/t6d6cc2/kUpeXsEgUsSSiKIzAQxDdvCgdulgagmBXLx4K7BgRWamnOgSDIj3EusRangwlbVvOyba25tvH23v/z36/oCxLcOr7uaO48sxA9Vg7LbTTQloUtrKihXUsI8cqVvAtfo4Biix78eDItmPnX90FADaTotFOisZqJx9NUta7udnlDT/+vXkc52KAIsua/T0BmHuSqwSBOCCK6a2E9vSGojBUiTg0WvNUoz74xeTjT0OAPE376zFZwXoSaKU86dLq0OqwssXSRg4uXn/o2Fjd80OVXTFAnqaD23tCm102O7kwDMSIIsKISCAKKBDka36bXnX7YetxDJAnSbNRi7S2Mu1uKQxLUUiYB6KQSCmKUEYW17o+u/lgDadigCxJ9jb7K1qdUgYlUR4IS+RsPfhFliaeGzkhr+SyJBv74aOX/wsB8qS7d6TRazMpBSFREAjWH0lmflV21lR7e/T19fl3acmbAw+9MzT7CQRlWXrr0k+1OArb3104bvKfVKEE6fSEffv2mZ+f12w2hWFodnbW6Oio8fFxRVHUY8i6ya56vSoMKKAkCAi279bpdCwvL5uYmFCr1Rw4cEC73Vav1786c+ZMO4Q86fbFCnFIFAYEoY17tzSiTcPDw+7fv+/1kxe9e/q8R/PzRkZG7N+///Tly5fL+JVz14dw6eizeyyslWYXc/UqnVZLFEWazabh4WG1Kv19lGVgfX3d3Nyc6elpcZ4kb+DEH3dnrG7FNrqlNC8V2UEjG/MGBxeMjY2ZHP/aVFDa8/RuKysr7ty58yUuxHmaHn77tRdqH598CQDkJde+mcKAhYUFRw4f1Ol0zMzMaDQa8F6tVns/ztN0ZmG55drNuwa21Qz0Vw3UezXqvQYGh1y9etUHH5419fukxcVFy2XTrVufl1mW3bxx40YeHDp5ZQjnsBc7sRM7sAONak+lUq1WHKrds7S05M/yyF84efva2Sn4HxcNUm7wsX3qAAAAAElFTkSuQmCC" alt="ajax">
                    ajax (<span>0</span>)
                </li>
			<?php endif ?>

			<!-- Files -->
			<?php if ($panels['files']): ?>
				<li id="toggle-files" onclick="debugToolbar.show('debug-files'); return false;">
					<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAIpSURBVDjLddM9aFRBFIbh98zM3WyybnYVf4KSQjBJJVZBixhRixSaShtBMKUoWomgnaCxsJdgIQSstE4nEhNREgyoZYhpkogkuMa4/3fuHIu7gpLd00wz52POMzMydu/Dy958dMwYioomIIgqDa+VnWrzebNUejY/NV6nQ8nlR4ufXt0fzm2WgxUgqBInAWdhemGbpcWNN9/XN27PPb1QbRdgjEhPqap2ZUv5+iOwvJnweT1mT5djZKjI6Ej/udz+wt1OJzAKYgWyDjJWyFghmzFsbtcY2gsTJwv09/Vc7RTgAEQgsqAKaoWsM8wu/z7a8B7vA8cHD3Fr+ktFgspO3a+vrdVfNEulJ/NT4zWngCBYY1oqSghKI465fvYwW+VAatPX07IZmF7YfrC0uDE8emPmilOFkHYiBKxAxhmSRPlZVVa2FGOU2Ad2ap4zg92MDBXJZczFmdflx05VEcAZMGIIClZASdesS2cU/dcm4sTBArNzXTcNakiCb3/HLRsn4Fo2qyXh3WqDXzUlcgYnam3Dl4Hif82dbOiyiBGstSjg4majEpl8rpCNUQUjgkia0M5GVAlBEBFUwflEv12b/Hig6SmA1iDtzhcsE6eP7LIxAchAtwNVxc1MnhprN/+lh0txErxrPZVdFdRDEEzHT6LWpTbtq+HLSDDiOm2o1uqlyOT37bIhHdKaXoL6pqhq24Dzd96/tUYGwPSBVv7atFglaFIu5KLuPxeX/xsp7aR6AAAAAElFTkSuQmCC" alt="files">
					files
				</li>
			<?php endif ?>

			<!-- Modules -->
			<?php if ($panels['modules']): ?>
				<li id="toggle-modules" onclick="debugToolbar.show('debug-modules'); return false;">
					<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAHhSURBVDjLpZI9SJVxFMZ/r2YFflw/kcQsiJt5b1ije0tDtbQ3GtFQYwVNFbQ1ujRFa1MUJKQ4VhYqd7K4gopK3UIly+57nnMaXjHjqotnOfDnnOd/nt85SURwkDi02+ODqbsldxUlD0mvHw09ubSXQF1t8512nGJ/Uz/5lnxi0tB+E9QI3D//+EfVqhtppGxUNzCzmf0Ekojg4fS9cBeSoyzHQNuZxNyYXp5ZM5Mk1ZkZT688b6thIBenG/N4OB5B4InciYBCVyGnEBHO+/LH3SFKQuF4OEs/51ndXMXC8Ajqknrcg1O5PGa2h4CJUqVES0OO7sYevv2qoFBmJ/4gF4boaOrg6rPLYWaYiVfDo0my8w5uj12PQleB0vcp5I6HsHAUoqUhR29zH+5B4IxNTvDmxljy3x2YCYUwZVlbzXJh9UKeQY6t2m0Lt94Oh5loPdqK3EkjzZi4MM/Y9Db3MTv/mYWVxaqkw9IOATNR7B5ABHPrZQrtg9sb8XDKa1+QOwsri4zeHD9SAzE1wxBTXz9xtvMc5ZU5lirLSKIz18nJnhOZjb22YKkhd4odg5icpcoyL669TAAujlyIvmPHSWXY1ti1AmZ8mJ3ElP1ips1/YM3H300g+W+51nc95YPEX8fEbdA2ReVYAAAAAElFTkSuQmCC" alt="modules">
					modules
				</li>
			<?php endif ?>

			<!-- Routes -->
			<?php if ($panels['routes']): ?>
				<li id="toggle-routes" onclick="debugToolbar.show('debug-routes'); return false;">
					<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAHYSURBVDjLlVLPS1RxHJynpVu7KEn0Vt+2l6IO5qGCIsIwCPwD6hTUaSk6REoUHeoQ0qVAMrp0COpY0SUIPVRgSl7ScCUTst6zIoqg0y7lvpnPt8MWKuuu29w+hxnmx8dzzmE5+l7mxk1u/a3Dd/ejDjSsII/m3vjJ9MF0yt93ZuTkdD0CnnMO/WOnmsxsJp3yd2zfvA3mHOa+zuHTjy/zojrvHX1YqunAZE9MlpUcZAaZQBNIZUg9XdPBP5wePuEO7eyGQXg29QL3jz3y1oqwbvkhCuYEOQMp/HeJohCbICMUVwr0DvZcOnK9u7GmQNmBQLJCgORxkneqRmAs0BFmDi0bW9E72PPda/BikwWi0OEHkNR14MrewsTAZF+lAAWZEH6LUCwUkUlntrS1tiG5IYlEc6LcjYjSYuncngtdhakbM5dXlhgTNEMYLqB9q49MKgsPjTBXntVgkDNIgmI1VY2Q7QzgJ9rx++ci3ofziBYiiELQEUAyhB/D29M3Zy+uIkDIhGYvgeKvIkbHxz6Tevzq6ut+ANh9fldetMn80OzZVVdgLFjBQ0tpEz68jcB4ifx3pQeictVXIEETnBPCKMLEwBIZAPJD767V/ETGwsjzYYiC6vzEP9asLo3SGuQvAAAAAElFTkSuQmCC" alt="routes">
					routes
				</li>
			<?php endif ?>

			<!-- Custom data -->
			<?php if ($panels['customs']): ?>
				<?php foreach($sections as $num => $section) : ?>
				<li onclick="debugToolbar.show('debug-custom-section-<?php echo $num ?>'); return false;">
					<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAIMSURBVDjLpVNLaxNRFP6STmaKdFqrgYKWlGLSgoiKCwsKVnFRtBsVUSTNyj/gxv4Bl678AyKCoCulgmtd+W7romgzKT4QMW1G+5hMpnPnnuuZm6ZNawoVBw7n3pn5vvP4zkkopfA/j9F8cafO3FekCjGpIgKIvayftTXOkr71jkz2/UXA4HxXfz72gIx/lBsWSfiVtwiWHK8B3kRQeX/6lmnnkuDAwn0MJSKQEFChQCp9CcHixxgsGWw3B01uRKfx9t1HIP1POpoSdUulLyD0vqO26IAkDW7tgSZYeHPqcmpXxkTChKzOaAKSEdo6jnEWVY5ehFxdHs2cn55rScDR73H6DKyyRWs1R0haGdR+z8YZ3MyMTj9rpUKi/PLkUJuZfmX3nkNYmQBxzYprpyCA2XMRrvNAcdfDhgKkm6ttKTdW6jH4w4RpD/ALAaNzhH2kSwALoSJCd9+VhIqEVVeD4C1MclaOT0Ke0Cowq+X9eLHapLH23f1XreDzI27LfqT2HIfvzsRAyLB2N1coXV8vodUkfn16+HnnvrPDhrmXsxBY+fmOwcVlJh/IFebK207iuqSShg0rjer8B9TcWY7q38nmnRstm7g1gy9PDk2129mjinjy3OIvJjvI4PJ2u7CJgMEdUMmVuA9ShLez14rj/7RMDHzNAzTP/gCDvR2to968NSs9HBxqvu/E/gBCSoxk53STJQAAAABJRU5ErkJggg==" alt="customs">
					<?php echo $section['title'] ?>
				</li>
				<?php endforeach ?>
                <?php if (count($customs) > 0): ?>
                    <li id="toggle-customs" onclick="debugToolbar.show('debug-customs'); return false;">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAIMSURBVDjLpVNLaxNRFP6STmaKdFqrgYKWlGLSgoiKCwsKVnFRtBsVUSTNyj/gxv4Bl678AyKCoCulgmtd+W7romgzKT4QMW1G+5hMpnPnnuuZm6ZNawoVBw7n3pn5vvP4zkkopfA/j9F8cafO3FekCjGpIgKIvayftTXOkr71jkz2/UXA4HxXfz72gIx/lBsWSfiVtwiWHK8B3kRQeX/6lmnnkuDAwn0MJSKQEFChQCp9CcHixxgsGWw3B01uRKfx9t1HIP1POpoSdUulLyD0vqO26IAkDW7tgSZYeHPqcmpXxkTChKzOaAKSEdo6jnEWVY5ehFxdHs2cn55rScDR73H6DKyyRWs1R0haGdR+z8YZ3MyMTj9rpUKi/PLkUJuZfmX3nkNYmQBxzYprpyCA2XMRrvNAcdfDhgKkm6ttKTdW6jH4w4RpD/ALAaNzhH2kSwALoSJCd9+VhIqEVVeD4C1MclaOT0Ke0Cowq+X9eLHapLH23f1XreDzI27LfqT2HIfvzsRAyLB2N1coXV8vodUkfn16+HnnvrPDhrmXsxBY+fmOwcVlJh/IFebK207iuqSShg0rjer8B9TcWY7q38nmnRstm7g1gy9PDk2129mjinjy3OIvJjvI4PJ2u7CJgMEdUMmVuA9ShLez14rj/7RMDHzNAzTP/gCDvR2to968NSs9HBxqvu/E/gBCSoxk53STJQAAAABJRU5ErkJggg==" alt="customs">
                        custom
                    </li>
                <?php endif; ?>
			<?php endif ?>

			<!-- Swap sides -->
			<li onclick="debugToolbar.swap(); return false;">
				<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAABjSURBVCjPY/zPgB8wMVCqgAVElP//x/AHDH+D4S8w/sWwl5GBgfE/MSYU/Ifphej8xbCLEaaAOBNS/yPbjIC3iHZD5P9faHqvk+gGbzQTYD76TLQbbP//hOqE6f5AvBsIRhYAysRMHy5Vf6kAAAAASUVORK5CYII=" alt="align">
			</li>

			<!-- Close -->
			<li class="last" onclick="debugToolbar.close(); return false;">
				<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAIhSURBVDjLlZPrThNRFIWJicmJz6BWiYbIkYDEG0JbBiitDQgm0PuFXqSAtKXtpE2hNuoPTXwSnwtExd6w0pl2OtPlrphKLSXhx07OZM769qy19wwAGLhM1ddC184+d18QMzoq3lfsD3LZ7Y3XbE5DL6Atzuyilc5Ciyd7IHVfgNcDYTQ2tvDr5crn6uLSvX+Av2Lk36FFpSVENDe3OxDZu8apO5rROJDLo30+Nlvj5RnTlVNAKs1aCVFr7b4BPn6Cls21AWgEQlz2+Dl1h7IdA+i97A/geP65WhbmrnZZ0GIJpr6OqZqYAd5/gJpKox4Mg7pD2YoC2b0/54rJQuJZdm6Izcgma4TW1WZ0h+y8BfbyJMwBmSxkjw+VObNanp5h/adwGhaTXF4NWbLj9gEONyCmUZmd10pGgf1/vwcgOT3tUQE0DdicwIod2EmSbwsKE1P8QoDkcHPJ5YESjgBJkYQpIEZ2KEB51Y6y3ojvY+P8XEDN7uKS0w0ltA7QGCWHCxSWWpwyaCeLy0BkA7UXyyg8fIzDoWHeBaDN4tQdSvAVdU1Aok+nsNTipIEVnkywo/FHatVkBoIhnFisOBoZxcGtQd4B0GYJNZsDSiAEadUBCkstPtN3Avs2Msa+Dt9XfxoFSNYF/Bh9gP0bOqHLAm2WUF1YQskwrVFYPWkf3h1iXwbvqGfFPSGW9Eah8HSS9fuZDnS32f71m8KFY7xs/QZyu6TH2+2+FAAAAABJRU5ErkJggg==" alt="close">
			</li>
		</ul>
	</div>

	<!-- Benchmarks -->
	<?php if ($panels['benchmarks']): ?>
		<div id="debug-benchmarks" class="top" style="display: none;">
			<h1>Benchmarks</h1>
			<table cellspacing="0" cellpadding="0">
				<tr>
					<th align="left">benchmark</th>
					<th align="right">count</th>
					<th align="right">avg time</th>
					<th align="right">total time</th>
					<th align="right">avg memory</th>
					<th align="right">total memory</th>
				</tr>
				<?php if (count($benchmarks)):
					$application = array_pop($benchmarks);?>
					<?php foreach ((array)$benchmarks as $group => $marks): ?>
						<tr>
							<th colspan="6"><?php echo $group?></th>
						</tr>
						<?php foreach($marks as $benchmark): ?>
						<tr class="<?php echo Text::alternate('odd','even')?>">
							<td align="left"><?php echo $benchmark['name'] ?></td>
							<td align="right"><?php echo $benchmark['count'] ?></td>
							<td align="right"><?php echo sprintf('%.2f', $benchmark['avg_time'] * 1000) ?> ms</td>
							<td align="right"><?php echo sprintf('%.2f', $benchmark['total_time'] * 1000) ?> ms</td>
							<td align="right"><?php echo Text::bytes($benchmark['avg_memory'], '') ?></td>
							<td align="right"><?php echo Text::bytes($benchmark['total_memory'], '') ?></td>
						</tr>
						<?php endforeach; ?>
					<?php endforeach; ?>
						<tr>
							<th colspan="2" align="left">APPLICATION</th>
							<th align="right"><?php echo sprintf('%.2f', $application['avg_time'] * 1000) ?> ms</th>
							<th align="right"><?php echo sprintf('%.2f', $application['total_time'] * 1000) ?> ms</th>
							<th align="right"><?php echo Text::bytes($application['avg_memory'], '') ?></th>
							<th align="right"><?php echo Text::bytes($application['total_memory'], '') ?></th>
						</tr>
				<?php else: ?>
					<tr class="<?php echo Text::alternate('odd','even') ?>">
						<td colspan="6">no benchmarks to display</td>
					</tr>
				<?php endif ?>
			</table>
		</div>
	<?php endif ?>

	<!-- Database -->
	<?php if ($panels['database']): ?>
		<div id="debug-database" class="top" style="display: none;">
			<h1>SQL Queries</h1>
			<table cellspacing="0" cellpadding="0">
				<tr align="left">
					<th>#</th>
					<th>query</th>
					<th>time</th>
					<th>memory</th>
				</tr>
				<?php foreach ($queries as $db_profile => $stats):
					list($sub_count, $sub_time, $sub_memory) = array_pop($stats); ?>
				<tr align="left">
					<th colspan="4">DATABASE "<?php echo strtoupper($db_profile) ?>"</th>
				</tr>
					<?php foreach ($stats as $num => $query): ?>
					<tr class="<?php echo Text::alternate('odd','even') ?>">
						<td><?php echo $num+1 ?></td>
						<td><?php echo $query['name'] ?></td>
						<td><?php echo number_format($query['time'] * 1000, 3) ?> ms</td>
						<td><?php echo number_format($query['memory'] / 1024, 3) ?> kb</td>
					</tr>
					<?php	endforeach;	?>
					<tr>
						<th>&nbsp;</th>
						<th><?php echo $sub_count ?> total</th>
						<th><?php echo number_format($sub_time * 1000, 3) ?> ms</th>
						<th><?php echo number_format($sub_memory / 1024, 3) ?> kb</th>
					</tr>
				<?php endforeach; ?>
				<?php if (count($queries) > 1): ?>
					<tr>
						<th colspan="2" align="left"><?php echo $query_count ?> TOTAL</th>
						<th><?php echo number_format($total_time * 1000, 3) ?> ms</th>
						<th><?php echo number_format($total_memory / 1024, 3) ?> kb</th>
					</tr>
				<?php endif; ?>
			</table>
		</div>
	<?php endif ?>

	<!-- Vars -->
	<?php if ($panels['vars']): ?>
		<div id="debug-vars" class="top" style="display: none;">
			<h1>Vars</h1>
			<ul class="varmenu">
				<li onclick="debugToolbar.showvar(this, 'vars-post'); return false;">POST</li>
				<li onclick="debugToolbar.showvar(this, 'vars-get'); return false;">GET</li>
				<li onclick="debugToolbar.showvar(this, 'vars-files'); return false;">FILES</li>
				<li onclick="debugToolbar.showvar(this, 'vars-server'); return false;">SERVER</li>
				<li onclick="debugToolbar.showvar(this, 'vars-cookie'); return false;">COOKIE</li>
				<li onclick="debugToolbar.showvar(this, 'vars-session'); return false;">SESSION</li>
				<?php if ($panels['configs']): ?>
				<li onclick="debugToolbar.showvar(this, 'vars-config'); return false;">CONFIG</li>
				<?php endif ?>
			</ul>
			<div style="display: none;" id="vars-post">
				<?php echo isset($_POST) ? Debug::vars($_POST) : Debug::vars(array()) ?>
			</div>
			<div style="display: none;" id="vars-get">
				<?php echo isset($_GET) ? Debug::vars($_GET) : Debug::vars(array()) ?>
			</div>
			<div style="display: none;" id="vars-files">
				<?php echo isset($_FILES) ? Debug::vars($_FILES) : Debug::vars(array()) ?>
			</div>
			<div style="display: none;" id="vars-server">
				<?php echo isset($_SERVER) ? Debug::vars($_SERVER) : Debug::vars(array()) ?>
			</div>
			<div style="display: none;" id="vars-cookie">
				<?php echo isset($_COOKIE) ? Debug::vars($_COOKIE) : Debug::vars(array()) ?>
			</div>
			<div style="display: none;" id="vars-session">
				<?php echo isset($_SESSION) ? Debug::vars($_SESSION) : Debug::vars(array()) ?>
			</div>
			<?php if ($panels['configs']): ?>
			<div style="display: none;" id="vars-config">
				<ul class="configmenu">
					<?php foreach($configs as $name => $config) { ?>
					<li onclick="debugToolbar.toggle('vars-config-<?php echo $name ?>'); return false;" class="<?php echo Text::alternate('odd','even') ?>">
						<div><?php echo $name ?></div>
						<div style="display: none" id="vars-config-<?php echo $name ?>">
							<pre><?php echo Debug::dump($config) ?></pre>
						</div>
					</li>
					<?php } ?>
				</ul>
			</div>
			<?php endif ?>
		</div>
	<?php endif ?>

    <!-- Ajax Requests -->
	<?php if ($panels['ajax']): ?>
        <div id="debug-ajax" class="top" style="display:none;">
            <h1>Ajax</h1>
            <table cellspacing="0" cellpadding="0">
                <tr align="left">
                    <th width="1%">#</th>
                    <th width="150">source</th>
                    <th width="150">status</th>
                    <th>request</th>
                </tr>
            </table>
        </div>
	<?php endif ?>

	<!-- Included Files -->
	<?php if ($panels['files']): ?>
		<div id="debug-files" class="top" style="display: none;">
			<h1>Files Included</h1>
			<table cellspacing="0" cellpadding="0">
				<tr align="left">
					<th>#</th>
					<th>file</th>
					<th>size</th>
					<th>lines</th>
				</tr>
				<?php $total_size = $total_lines = 0 ?>
				<?php foreach ((array)$files as $id => $file): ?>
					<?php
					$size = filesize($file);
					$lines = count(file($file));
					?>
					<tr class="<?php echo Text::alternate('odd','even')?>">
						<td><?php echo $id + 1 ?></td>
						<td><?php echo $file ?></td>
						<td><?php echo $size ?></td>
						<td><?php echo $lines ?></td>
					</tr>
					<?php
					$total_size += $size;
					$total_lines += $lines;
					?>
				<?php endforeach; ?>
				<tr align="left">
					<th colspan="2">total</th>
					<th><?php echo Text::bytes($total_size, '') ?></th>
					<th><?php echo number_format($total_lines) ?></th>
				</tr>
			</table>
		</div>
	<?php endif ?>

	<!-- Module list -->
	<?php if ($panels['modules']):
			$mod_counter = 0; ?>
		<div id="debug-modules" class="top" style="display: none;">
			<h1>Modules</h1>
			<table cellspacing="0" cellpadding="0">
				<tr align="left">
					<th>#</th>
					<th>name</th>
					<th>abs path</th>
				</tr>
				<?php foreach($modules as $name => $path): ?>
				<tr class="<?php echo Text::alternate('odd','even')?>">
					<td><?php echo ++$mod_counter ?></td>
					<td><?php echo $name ?></td>
					<td><?php echo $path ?></td>
				</tr>
				<?php endforeach ?>
			</table>
		</div>
	<?php endif ?>

	<!-- Routes -->
	<?php if ($panels['routes']):
			$r_counter = 0; ?>
		<div id="debug-routes" class="top" style="display: none;">
			<h1>Routes</h1>
			<table cellspacing="0" cellpadding="0">
				<tr align="left">
					<th>#</th>
					<th>name</th>
					<th>directory</th>
					<th>controller</th>
					<th>action</th>
					<th>params</th>
				</tr>
				<?php foreach($routes as $name => $route):
						// Toolbar may render on shutdown, so Request::current() is empty
						$request = Request::current() ? Request::current() : Request::initial();
						$current = $route === $request->route();
						$class = ($current ? ' current' : ''); ?>
				<tr class="<?php echo Text::alternate('odd','even').$class?>">
					<td><?php echo ++$r_counter ?></td>
					<td><?php echo $name ?></td>
				<?php if ($current) : ?>
					<td><?php echo $request->directory() ?></td>
					<td><?php echo $request->controller() ?></td>
					<td><?php echo $request->action() ?></td>
					<td class="params">
						<ul>
							<?php foreach ($request->param() as $k => $v): ?>
								<li><?php echo $k ?>: <span><?php echo $v ?></li>
							<?php endforeach ?>
						</ul>

					</td>
					<?php else : ?>
					<td colspan="4">&nbsp</td>
				<?php endif ?>
				</tr>
				<?php endforeach ?>
			</table>
		</div>
	<?php endif ?>

	<!-- Custom sections -->
	<?php if (isset($sections)): ?>
		<?php foreach($sections as $num => $section) : ?>
		<div id="debug-custom-section-<?php echo $num ?>" class="top" style="display: none;">
			<h1><?php echo $section['title'] ?></h1>
			<div>
				<?php echo $section['content'] ?>
			</div>
		</div>
		<?php endforeach ?>
	<?php endif ?>

	<!-- Custom data-->
	<?php if ($panels['customs'] && count($customs) > 0):
			$r_counter = 0; ?>
		<div id="debug-customs" class="top" style="display: none;">
			<h1>Custom data</h1>
			<ul class="sectionmenu">
				<?php foreach($customs as $section => $data): ?>
				<li onclick="debugToolbar.showvar(this, 'customs-<?php echo $section ?>'); return false;"><?php echo $section ?></li>
				<?php endforeach; ?>
			</ul>
			<?php foreach($customs as $section => $data): ?>
			<div style="display: none;" id="customs-<?php echo $section ?>">
					<pre><?php echo $data ?></pre>
			</div>
			<?php endforeach; ?>
		</div>
	<?php endif ?>
</div>
