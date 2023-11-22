<?php
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0"); // Proxies.
    
    include('config.php');

    $query = 'SELECT * FROM `note`';
    $sql = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note App</title>
    <link rel="shortcut icon" href="bootstrap-icons_file-text.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body data-bs-theme="dark"></body>
    <div class="container">
        <header class="sticky-top pt-4">
            <h1><span class="bi bi-file-text mt-4"></span>&nbsp;Note App</h1>
            <div class="card rounded mb-4 mt-4">
                <div class="card-body">
                    <form class="d-flex" action="insert.php" method="post">
                        <input type="text" class="form-control me-2" style="width: 25vw;" placeholder="Title" name="title" required>
                        <input type="text" class="form-control me-2" placeholder="Note" name="note" required>
                        <button type="submit" onclick="return confirm('Add?');" class="btn btn-primary bi bi-plus-circle fs-4 bg-transparent"></button>
                    </form>
                </div>
            </div>
        </header>
        <div class="notes-container pb-4">
            <?php while ($note = mysqli_fetch_assoc($sql)) { ?>
            <div class="card mb-4">
                <div class="card-header bg-body">
                    <h3 class="card-title mb-2 mt-2 fs-4"><?php echo($note['title']); ?></h3>
                </div>
                <div class="card-body">
                    <p class="card-text fs-5"><?php echo($note['note']); ?></p>
                </div>
                <div class="card-footer bg-body d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-0 fs-6"><?php echo($note['date_created']); ?></p>
                        <p class="mb-0 fs-6"><?php echo($note['time_created']); ?></p>
                        <?php if ($note['date_modified'] != '' && $note['time_modified'] != '') {?>
                        <p class="mb-0 fs-6">(Edited <?php echo($note['date_modified']); ?> <?php echo($note['time_modified']); ?>)</p>
                        <?php } ?>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="edit.php?id=<?php echo($note['id']) ?>" class="btn bi bi-pencil-square fs-4 bg-transparent"></a>
                        <a href="delete.php?id=<?php echo($note['id']) ?>" onclick="return confirm('Done with <?php echo($note['title']); ?>?')" class="btn bi bi-trash3 fs-4 bg-transparent"></a>
                    </div>
                </div>
            </div>
            <?php }; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>