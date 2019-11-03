<?php
    if(has_blocks()){
        $allBlocks = parse_blocks( get_the_content() );
        for ($i=0; $i < count($allBlocks); $i++) {
            if($allBlocks[$i]['blockName'] == 'core/gallery'){
                $firstGalleyBlock = $allBlocks[$i];
                break;
            }
        }
    };
 ?>

<div class="card h-100 blogCard">
    <h5 class="card-header"><?php the_title(); ?></h5>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <?php if(isset($firstGalleyBlock)): ?>
                    <?php echo apply_filters( 'the_content', render_block( $firstGalleyBlock ) ); ?>
                <?php endif; ?>
            </div>
            <div class="col">
                <a href="<?php the_permalink(); ?>" class="btn btn-danger">View Gallery</a>
            </div>
        </div>
    </div>
</div>
