<?php for ($x = -25; $x < 25; $x++) : ?>
    <div>
        <?php for ($y = -25; $y < 25; $y++) : ?>
            <div class="border_brick">
                <div class="brick_tooltip">
                    <?php print "X:{$x}0 : Y:{$y}0" . '</br>' . 'empty'; ?>
                </div>
            </div>
        <?php endfor; ?>
    </div>
<?php endfor; ?>