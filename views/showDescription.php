<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>TEST S2NEXT</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="?action=list">Evaluación</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <?php
                foreach ($menus as $key => $value) {
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $value['nombre_menu_padre']; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">                            
                <?php
                            foreach ($value['menus'] as $key2 => $value2) {
                ?>
                                <a class="dropdown-item" href="?action=description&id=<?= $value2['id_menu']; ?>"><?= $value2['menus']; ?></a>
                <?php
                            }                            
                ?>
                        </div>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </nav>
    <div class="container">
        
        <div class="row my-3">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <?= $dato['descripcion_menu']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>