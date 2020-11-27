    <?php for ($x = 0; $x < 50; $x++) : ?>
        <div>
            <?php for ($y = 0; $y < 50; $y++) : ?>
                <div class="border_brick">
                    <div class="brick_tooltip">
                        <?php print "X:{$x}0 : Y:{$y}0" . '</br>' . 'empty'; ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    <?php endfor; ?>