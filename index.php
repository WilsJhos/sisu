<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISU</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-road-circle-exclamation me-2"></i>
                SISU
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#reportes">Reportes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#estadisticas">Estadísticas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#nuevo-reporte">Reportar Peligro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contacto">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero-section">
        <div class="container">
            <h1 class="hero-title">Sistema Inteligente de Sensores Ultrasonicos</h1>
            <p class="hero-subtitle">Sistema de Seguridad Vial</p>
            <a href="#nuevo-reporte" class="btn btn-primary btn-hero">
                <i class="fas fa-plus-circle me-2"></i>Reportar incidentes
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container">
        <!-- Features Section -->
        <section class="mb-5">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <h3>Monitoreo en Tiempo Real</h3>
                        <p>Sistema de seguimiento continuo de las condiciones de las carreteras y curvas peligrosas.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <h3>Alertas Inmediatas</h3>
                        <p>Notificaciones instantáneas sobre peligros en carreteras para una acción rápida.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Análisis Predictivo</h3>
                        <p>Identificación proactiva de puntos críticos basada en datos históricos.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Statistics Section -->
        <section id="estadisticas" class="mb-5">
            <h2 class="section-title">Estadísticas de Peligro en Carreteras</h2>
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="stats-box">
                        <div class="stats-number text-danger">42</div>
                        <div class="stats-label">Puntos de Alto Riesgo</div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="stats-box">
                        <div class="stats-number text-warning">78</div>
                        <div class="stats-label">Puntos de Riesgo Medio</div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="stats-box">
                        <div class="stats-number text-success">125</div>
                        <div class="stats-label">Puntos de Bajo Riesgo</div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="stats-box">
                        <div class="stats-number text-primary">15</div>
                        <div class="stats-label">Reportes este mes</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Map Section -->
        <section class="mb-5">
            <h2 class="section-title">Ubicación de incidentes</h2>
            <div class="map-container mb-4 d-flex align-items-center justify-content-center">
                <div class="text-center text-primary">
                    <i class="fas fa-map-marked-alt" style="font-size: 3rem;"></i>
                    <p class="mt-3">Mapa interactivo mostrando ubicaciones de incidentes</p>
                    <div class="legend mt-4">
                        <div class="mb-2"><span class="curve-indicator high-risk"></span> Alto Riesgo</div>
                        <div class="mb-2"><span class="curve-indicator medium-risk"></span> Riesgo Medio</div>
                        <div><span class="curve-indicator low-risk"></span> Bajo Riesgo</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Reports Section -->
        <section id="reportes" class="mb-5">
            <h2 class="section-title">Reportes Recientes</h2>
            <div class="row">
                <!-- Los reportes se cargarán dinámicamente con PHP -->
                <?php
                include 'conexion.php';
                
                $sql = "SELECT * FROM curvas_peligrosas ORDER BY nivel_riesgo DESC, kilometro ASC";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $riskClass = '';
                        $riskText = '';
                        $badgeColor = '';
                        
                        switch($row["nivel_riesgo"]) {
                            case 'alto':
                                $riskClass = 'danger-card';
                                $riskText = 'Alto Riesgo';
                                $badgeColor = 'danger';
                                break;
                            case 'medio':
                                $riskClass = 'warning-card';
                                $riskText = 'Riesgo Medio';
                                $badgeColor = 'warning';
                                break;
                            case 'bajo':
                                $riskClass = 'safe-card';
                                $riskText = 'Bajo Riesgo';
                                $badgeColor = 'success';
                                break;
                        }
                        
                        echo '<div class="col-md-6 col-lg-4 mb-4">';
                        echo '<div class="card h-100 ' . $riskClass . '">';
                        echo '<div class="card-body">';
                        echo '<div class="d-flex justify-content-between align-items-start mb-2">';
                        echo '<h5 class="card-title">' . $row["carretera"] . ' - Km ' . $row["kilometro"] . '</h5>';
                        echo '<span class="badge bg-' . $badgeColor . '">' . $riskText . '</span>';
                        echo '</div>';
                        echo '<h6 class="card-subtitle mb-2 text-muted">' . $row["ubicacion"] . '</h6>';
                        echo '<p class="card-text">' . $row["descripcion"] . '</p>';
                        echo '</div>';
                        echo '<div class="card-footer bg-transparent">';
                        echo '<small class="text-muted">Reportado el ' . $row["fecha_reporte"] . '</small>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<div class="col-12"><div class="alert alert-info text-center">No hay curvas peligrosas reportadas</div></div>';
                }
                
                $conn->close();
                ?>
            </div>
        </section>

        <!-- New Report Section -->
        <section id="nuevo-reporte" class="mb-5">
            <h2 class="section-title">Reportar incidentes</h2>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white py-3">
                            <h3 class="card-title mb-0"><i class="fas fa-exclamation-circle me-2"></i>Formulario de Reporte</h3>
                        </div>
                        <div class="card-body">
                            <form action="procesar.php" method="POST">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="highway" class="form-label">Carretera <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="highway" name="highway" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="km" class="form-label">Kilómetro <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="km" name="km" step="0.1" min="0" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="location" class="form-label">Ubicación <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="location" name="location" required>
                                </div>
                                <div class="mb-3">
                                    <label for="risk-level" class="form-label">Nivel de Riesgo <span class="text-danger">*</span></label>
                                    <select class="form-select" id="risk-level" name="risk-level" required>
                                        <option value="">Seleccionar nivel de riesgo</option>
                                        <option value="alto">Alto Riesgo</option>
                                        <option value="medio">Riesgo Medio</option>
                                        <option value="bajo">Bajo Riesgo</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane me-2"></i>Enviar Reporte</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer id="contacto">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>SISU</h5>
                    <p>Sistema Inteligente de Sensores ultrasonicos</p>
                    <p>Contribuye a hacer las carreteras más seguras para todos</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Enlaces Rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Inicio</a></li>
                        <li><a href="#reportes" class="text-white">Reportes</a></li>
                        <li><a href="#estadisticas" class="text-white">Estadísticas</a></li>
                        <li><a href="#nuevo-reporte" class="text-white">Reportar Peligro</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contacto</h5>
                    <address>
                        <i class="fas fa-envelope me-2"></i> info@sisu.com<br>
                        <i class="fas fa-phone me-2"></i> +593 999999999<br>
                        <i class="fas fa-map-marker-alt me-2"></i> Ecuador
                    </address>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <hr class="bg-light">
            <div class="text-center">
                <p class="mb-0">&copy; 2025 SISU.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>