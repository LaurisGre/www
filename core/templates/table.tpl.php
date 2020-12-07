<table>
    <h1 class="title"><?php print $data['title']; ?></h1>
    <tr>
        <?php foreach ($data['headers'] as $header) : ?>
            <th><?php print $header; ?></th>
        <?php endforeach; ?>
    </tr>
    <?php foreach ($data['data'] as $datas) : ?>
        <tr>
            <?php foreach ($datas as $datum) : ?>
                <td><?php print $datum; ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>