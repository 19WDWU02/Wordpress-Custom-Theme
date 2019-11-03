<div class="card h-100 blogCard">
    <h5 class="card-header"><?php the_title(); ?></h5>
    <div class="card-body">
        <div class="row">
            <?php if(has_post_thumbnail()): ?>
                <div class="col-12 col-md-3">
                    <?php the_post_thumbnail('medium', ['class' => 'img-fluid']); ?>
                </div>
            <?php endif; ?>
            <div class="col">
                <div>
                    <?php the_excerpt() ; ?>
                </div>
                <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
            </div>
        </div>
    </div>
</div>
