<h1 class="title"><?php print $data['title']; ?></h1>
<section class="poop_box">
    <div class="poop_wall">
        <?php require ROOT . '/app/templates/wall.tpl.php'; ?>
        <?php foreach ($data['products'] as $product) : ?>
            <div <?php print pixel_attr($product); ?>>
                <div class="brick_tooltip">
                    <?php print pixel_hint_text($product); ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>