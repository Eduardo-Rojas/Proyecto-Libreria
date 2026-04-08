<?php require_once 'conexion.php'; 
$autores = $pdo->query("SELECT nombre, apellido, telefono, ciudad FROM autores")->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Librería - Autores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark mb-5">
        <div class="container">
            <a class="navbar-brand" href="index.php">Libreria</a>
            <div class="navbar-nav">
                <a class="nav-link" href="index.php">Libros</a>
                <a class="nav-link active" href="autores.php">Autores</a>
                <a class="nav-link" href="contacto.php">Contacto</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2 class="mb-4 text-center">Nuestros Autores</h2>
        <div class="row">
            <?php foreach ($autores as $autor): ?>
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm p-3">
                    <div class="d-flex align-items-center">
                        <div class="author-avatar me-3"><?php echo strtoupper(substr($autor->nombre, 0, 1)); ?></div>
                        <div>
                            <h6 class="mb-0 fw-bold"><?php echo $autor->nombre . " " . $autor->apellido; ?></h6>
                            <small class="text-muted"><?php echo $autor->ciudad; ?></small>
                        </div>
                    </div>
                    <div class="mt-2 small text-muted">Tel: <?php echo $autor->telefono; ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>