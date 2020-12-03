<h1 class="title"><?php print $data['title']; ?></h1>
<section class="poop_box">
    <div class="poop_wall">
        <?php require ROOT . '/app/templates/wall.tpl.php'; ?>
        <?php foreach ($data['products'] as $product) : ?>
            <?php if ($product['poster'] === $_SESSION['email']) : ?>
                <div>
                    <span <?php print pixel_attr($product); ?>>
                        <span class="brick_tooltip">
                            <?php print pixel_hint_text($product); ?>
                        </span>
                    </span>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>