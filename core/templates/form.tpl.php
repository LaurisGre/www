<form <?php form_attr($form); ?>>
    <?php foreach ($form['fields'] as $input_name => $input) : ?>
        <label for="">
            <span><?php print $input['label']; ?></span>
            <input <?php print input_attr($input_name, $input); ?>>
            <?php if (isset($input['error'])) : ?>
                <p class="error"><?php print $input['error']; ?></p>
            <?php endif; ?>
        </label>
    <?php endforeach; ?>

    <?php foreach ($form['buttons'] as $button_id => $button) : ?>
        <button <?php print button_attr($button_id, $button); ?>>
            <?php print $button['title']; ?>
        </button>
    <?php endforeach; ?>
</form>