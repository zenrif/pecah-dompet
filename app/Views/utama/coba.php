<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="test" method="post">
        <?php foreach ($utama as $u) : ?>
            <input type="hidden" name="slug" id="slug" value="<?= $u['slug'] ?>">>
        <?php endforeach; ?>
        <button type="submit">OK</button>
    </form>

</body>

</html>