<table>
    <h3><?php print $data['title']; ?></h3>
    <tr>
        <?php foreach ($data['headers'] as $header) : ?>
            <th><?php print $header; ?></th>
        <?php endforeach; ?>
    </tr>
    <?php foreach ($data['data'] as $data) : ?>
        <tr>
            <?php foreach ($data as $datum) : ?>
                <td><?php print $datum; ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>