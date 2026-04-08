<?php
require_once 'conexion.php';
$status = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $sql = "INSERT INTO contacto (nombre, correo, asunto, comentario) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$_POST['nombre'], $_POST['correo'], $_POST['asunto'], $_POST['comentario']])) {
            $status = "success";
        }
    } catch (PDOException $e) { $status = "error"; }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title> Libreria - Contacto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark mb-5">
        <div class="container">
            <a class="navbar-brand" href="index.php">Libreria</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="index.php">Libros</a>
                <a class="nav-link" href="autores.php">Autores</a>
                <a class="nav-link active" href="contacto.php">Contacto</a>
            </div>
        </div>
    </nav>

    <div class="container col-md-5">
        <div class="card shadow-lg p-4 border-0">
            <h3 class="text-center mb-4">Contacto</h3>
            <form id="formContacto" method="POST" novalidate>
                <input type="text" id="nombre" name="nombre" class="form-control mb-3" placeholder="Nombre completo">
                <input type="email" id="correo" name="correo" class="form-control mb-3" placeholder="Correo electrónico">
                <input type="text" id="asunto" name="asunto" class="form-control mb-3" placeholder="Asunto">
                <textarea id="comentario" name="comentario" class="form-control mb-3" rows="4" placeholder="Comentario"></textarea>
                <button type="submit" class="btn btn-primary w-100" style="background: var(--itla-blue); border:none">Enviar</button>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <script>
        const statusRegistro = "<?php echo $status; ?>";
    </script>
    <script src="assets/js/contacto.js?v=<?php echo time(); ?>"></script>
</body>
</html>