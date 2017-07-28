<!-- To-do: Add some HTML5 semantic elements -->
<header class="featured-image-main jumbotron jumbotron-fluid py-0">
	<img src="/assets/images/poster-le-roi-lion.jpg" alt="Book's poster" class="cover">
</header>
<div class="container">
	<div class="episode-main-content-wrap row">
		<div class="episode-main-content col-md-10 offset-md-1 px-5 py-3">
			<article class="episode">
				<ol class="breadcrumb bg-white pb-4 mb-4">
					<li class="breadcrumb-item"><a href="<?= $path('root') ?>">Accueil</a></li>
					<li class="breadcrumb-item active"><?= $episode->title() ?></li>
				</ol>
				<header class="text-center">
					<div class="badge badge-primary mw-100">
						#
						<input class="ghost text-white mw-100" type="text" name="episode-number" id="input-episode-number" value="<?= $episode->number() ?>" pattern="[0-9]+" placeholder="épisode" size="1">
						<span class="mr-1">-</span>
						<input class="ghost text-white mw-100" type="text" name="episode-part" id="input-episode-part" value="<?= $episode->part() ?>" pattern="[0-9]+" placeholder="partie" size="1">
					</div>
					<h1 class="w-75 mx-auto my-5 episode-title"><?= $episode->title() ?></h1>
					<div class="input-group justify-content-center mb-3">
						<span class="input-group-addon" id="basic-addon-slug">Permalien</span>
						<input class="form-control flex-g-0" type="text" name="episode-slug" id="input-episode-slug" value="<?= $episode->slug() ?>" pattern="[a-z0-9-]+" placeholder="Laissé vide, il sera généré automatiquement." aria-describedby="basic-addon-slug">
					</div>
					<div class="d-flex col-6 offset-3 justify-content-between">
						<time class="datetime meta" datetime="<?= ($current_route->name() == 'episode') ? $episode->modificationDatetime() : $episode->publishDatetime() ?>">
							<svg xmlns="http://www.w3.org/2000/svg" class="si-glyph-calendar-1">
								<use xlink:href="/sprite.svg#si-glyph-calendar-1">
							</svg>
							<?= ($current_route->name() == 'episode') ? 'Modifié' : 'Publié' ?> <span></span>
						</time>
						<a class="meta" href="<?= $path('episode', [$episode->number(), $episode->slug()]) ?>#anchor-comments">
							<svg xmlns="http://www.w3.org/2000/svg" class="si-glyph-bubble-<?= $_ifPlural($episode->nbrComments(), 'message-talk', 'message') ?>">
								<use xlink:href="/sprite.svg#si-glyph-bubble-<?= $_ifPlural($episode->nbrComments(), 'message-talk', 'message') ?>">
							</svg>
							<?= $episode->nbrComments() ?>
							<?= $_ifPlural($episode->nbrComments(), 'commentaires', 'commentaire') ?>
						</a>
					</div>
				</header>
				<div class="episode-text" placeholder="test" style="min-height: 150px;">
					<?= $episode->text() ?>
				</div>
				<form class="text-right" action="" method="POST">
					<div>
						<button class="btn btn-link meta-danger" type="submit" name="action" value="delete-episode">
							Mettre à la corbeille
						</button>
						<button class="btn btn-primary" type="submit" name="action" value="update-episode">
							Enregistrer
						</button>
					</div>
				</form>
			</article>
			<div class="mt-5">
				<h4>Un commentaire ?</h4>
				<hr>
				<?= $new_comment_form ?>
			</div>
			<?php if (!empty($comments)): ?>
				<div class="mt-5">
					<h4 id="anchor-comments">Commentaires</h4>
					<hr>
					<?= $comments ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>