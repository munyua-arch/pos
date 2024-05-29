<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?= form_open()?>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control form-control-lg">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control form-control-lg">
        </div>

        <input type="submit">
    <?= form_close()?>
</body>
</html>