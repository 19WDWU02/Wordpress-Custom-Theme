<style media="screen">
    .hidden{
        display: none !important;
    }
    .custom_image{
        max-width: 100%;
    }
</style>

<?php
    $mediaId = get_post_meta(get_the_ID(), 'customImage', true);
    if($mediaId){
        $imagesrc = wp_get_attachment_image_url($mediaId, 'large', false);
    }
 ?>

<div class="formGroup">
    <label for="">Custom Image</label>
    <img class="custom_image" src="<?php if($mediaId){echo $imagesrc;}; ?>">
    <div class="btnGroup">
        <button class="customUpload button customButton">Add new Image</button>
        <button class="removeButton button customButton <?php if(!$mediaId){echo 'hidden';} ?>">Remove Image</button>
    </div>
    <input type="hidden" name="customImage" value="" class="customInput regular-text" readonly>
</div>

<script type="text/javascript">
    $ = jQuery;

    $(document).on('click', '.customUpload', function(e){
        e.preventDefault();
        const formGroup = $(this).parents('.formGroup');
        var items_frame;
        if ( items_frame ) {
            items_frame.open();
            return;
        }
        items_frame = wp.media.frames.items = wp.media({
            title: 'Add to Gallery'
        });
        items_frame.open();
        items_frame.on( 'select', function() {
            const attachment = items_frame.state().get('selection').first().toJSON();
            formGroup.find('input[name="customImage"]').val(attachment.id);
            formGroup.find('img').attr('src', attachment.url);
            formGroup.find('.removeButton').removeClass('hidden');
        });
    });

    $(document).on('click', '.removeButton', function(e){
        e.preventDefault();
        const formGroup = $(this).parents('.formGroup');
        formGroup.find('.hiddenCustomInput').val('');
        formGroup.find('img').attr('src', '');
        formGroup.find('.removeButton').addClass('hidden');
    })
</script>
