<?php
    if(has_blocks()){
        $allBlocks = parse_blocks( get_the_content() );
        for ($i=0; $i < count($allBlocks); $i++) {
            if($allBlocks[$i]['blockName'] == 'core/image'){
                $firstImageBlock = $allBlocks[$i];
                break;
            }
        }
    };
 ?>

<div class="card h-100 blogCard">
    <h5 class="card-header"><?php the_title(); ?></h5>
    <div class="card-body">
        <div class="row">
            <?php if(isset($firstImageBlock)): ?>
                <div class="col-12">
                    <?php echo apply_filters( 'the_content', render_block( $firstImageBlock ) ); ?>
                </div>
            <?php endif; ?>
            <div class="col">
                <a href="<?php the_permalink(); ?>" class="btn btn-info">View Image</a>
            </div>
        </div>
    </div>
</div>
