<?php 
require_once 'conexion.php'; 
$libros = $pdo->query("SELECT id_titulo, titulo, tipo, precio, notas FROM titulos")->fetchAll();

$traducciones = [
    'business' => 'Negocios', 'psychology' => 'Psicología', 'popular_comp' => 'Computación',
    'trad_cook' => 'Cocina Tradicional', 'mod_cook' => 'Cocina Moderna', 'UNDECIDED' => 'Por definir'
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Libreria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark mb-5">
        <div class="container">
            <a class="navbar-brand" href="index.php">Libreria</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link active" href="index.php">Libros</a>
                <a class="nav-link" href="autores.php">Autores</a>
                <a class="nav-link" href="contacto.php">Contacto</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2 class="text-center mb-5">Nuestro Catálogo</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($libros as $libro): 
                $tipo_es = $traducciones[$libro->tipo] ?? $libro->tipo; ?>
            <div class="col">
                <div class="card h-100 shadow-sm book-card" 
     tabindex="0"
     data-bs-toggle="modal" data-bs-target="#bookModal"
                     data-titulo="<?php echo htmlspecialchars($libro->titulo); ?>"
                     data-tipo="<?php echo htmlspecialchars($tipo_es); ?>"
                     data-precio="<?php echo number_format($libro->precio, 2); ?>"
                     data-notas="<?php echo htmlspecialchars($libro->notas); ?>">
                    <div class="book-accent"></div>
                    <div class="card-body">
                        <span class="badge bg-light text-primary border mb-2"><?php echo $tipo_es; ?></span>
                        <h5 class="card-title"><?php echo $libro->titulo; ?></h5>
                        <p class="text-success fw-bold">US$ <?php echo number_format($libro->precio, 2); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Modal Unico -->
    <div class="modal fade" id="bookModal" tabindex="-1" 
     aria-labelledby="m-titulo" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header text-white" style="background: var(--itla-blue)">
                    <h5 class="modal-title" id="m-titulo"></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <span class="badge bg-info text-dark mb-3" id="m-tipo"></span>
                    <h6>Sinopsis:</h6>
                    <p class="text-muted small" id="m-notas"></p>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="text-success fw-bold mb-0" id="m-precio"></h4>
                        <button type="button" 
                                id="btn-carrito" 
                                class="btn btn-primary" 
                                style="background: var(--itla-red); border:none">
                            Añadir al Carrito
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 1. Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- 2. iziToast -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    
    <!-- 3. JS -->
    <script src="assets/js/catalogo.js?v=<?php echo time(); ?>"></script>
</body>   
</html>