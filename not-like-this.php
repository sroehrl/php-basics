<html>
<head>
    <title>Not like this</title>
</head>
<body>


<?php

$array = [
    ['author' => 'sam'],
    ['author' => 'joe'],
    ['author' => 'sarah'],
]

?>
</body>
<table>
    <tr>
        <th>Author</th>
    </tr>

    <?php
    foreach ($array as $author) {
        ?>
        <tr>
            <td><?= $author ?></td>
        </tr>

        <?php

    }

    ?>
</table>

</html>