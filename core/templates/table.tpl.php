<table>
    <h3><?php print $table['title']; ?></h3>
    <tr>
        <?php foreach ($table['headers'] as $header) : ?>
            <th><?php print $header; ?></th>
        <?php endforeach; ?>
    </tr>
    <?php foreach ($table['data'] as $data) : ?>
        <tr>
            <?php foreach ($data as $datum) : ?>
                <td><?php print $datum; ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>