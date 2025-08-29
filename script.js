  // Datos de ejemplo en formato JSON
        const curveData = {
            "reports": [
                {
                    "id": 1,
                    "highway": "A-2",
                    "km": 42,
                    "location": "Madrid-Guadalajara",
                    "riskLevel": "high",
                    "description": "Curva cerrada con visibilidad reducida. Múltiples accidentes reportados.",
                    "date": "2023-05-15",
                    "reportsCount": 8
                },
                {
                    "id": 2,
                    "highway": "AP-7",
                    "km": 123,
                    "location": "Barcelona-Tarragona",
                    "riskLevel": "medium",
                    "description": "Curva pronunciada en descenso. Precaución con suelo mojado.",
                    "date": "2023-05-10",
                    "reportsCount": 5
                },
                {
                    "id": 3,
                    "highway": "A-6",
                    "km": 78,
                    "location": "Madrid-Ávila",
                    "riskLevel": "low",
                    "description": "Curva suave pero con desnivel. Mantener velocidad moderada.",
                    "date": "2023-05-08",
                    "reportsCount": 3
                },
                {
                    "id": 4,
                    "highway": "A-49",
                    "km": 56,
                    "location": "Sevilla-Huelva",
                    "riskLevel": "high",
                    "description": "Curva peligrosa con barrera de seguridad dañada.",
                    "date": "2023-05-05",
                    "reportsCount": 12
                }
            ]
        };

        // Función para cargar reportes en la página
        function loadReports() {
            const reportsContainer = document.getElementById('reports-container');
            reportsContainer.innerHTML = '';
            
            curveData.reports.forEach(report => {
                let riskClass = '';
                let riskText = '';
                
                switch(report.riskLevel) {
                    case 'high':
                        riskClass = 'danger-card';
                        riskText = 'Alto Riesgo';
                        break;
                    case 'medium':
                        riskClass = 'warning-card';
                        riskText = 'Riesgo Medio';
                        break;
                    case 'low':
                        riskClass = 'safe-card';
                        riskText = 'Bajo Riesgo';
                        break;
                }
                
                const reportElement = `
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="card h-100 ${riskClass}">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="card-title">${report.highway} - Km ${report.km}</h5>
                                    <span class="badge bg-${report.riskLevel === 'high' ? 'danger' : report.riskLevel === 'medium' ? 'warning' : 'success'}">${riskText}</span>
                                </div>
                                <h6 class="card-subtitle mb-2 text-muted">${report.location}</h6>
                                <p class="card-text">${report.description}</p>
                            </div>
                            <div class="card-footer bg-transparent">
                                <small class="text-muted">Reportado el ${report.date} · ${report.reportsCount} reportes</small>
                            </div>
                        </div>
                    </div>
                `;
                
                reportsContainer.innerHTML += reportElement;
            });
        }

        // Función para validar el formulario
        function validateForm(formData) {
            // Validaciones básicas
            if (!formData.highway.trim()) {
                alert('Por favor, ingresa el nombre de la carretera.');
                return false;
            }
            
            if (!formData.km || formData.km < 0) {
                alert('Por favor, ingresa un kilómetro válido.');
                return false;
            }
            
            if (!formData.riskLevel) {
                alert('Por favor, selecciona un nivel de riesgo.');
                return false;
            }
            
            return true;
        }

        // Función para manejar el envío del formulario
        function handleFormSubmit(event) {
            event.preventDefault();
            
            const formData = {
                highway: document.getElementById('highway').value,
                km: document.getElementById('km').value,
                location: document.getElementById('location').value,
                riskLevel: document.getElementById('risk-level').value,
                description: document.getElementById('description').value
            };
            
            if (validateForm(formData)) {
                // En una implementación real, aquí enviaríamos los datos al servidor
                console.log('Datos del formulario:', formData);
                
                // Simulamos una respuesta exitosa
                alert('¡Reporte enviado con éxito! Será revisado por nuestros administradores.');
                document.getElementById('report-form').reset();
                
                // Aquí iría el código para actualizar la interfaz con el nuevo reporte
            }
        }

        // Cuando el documento está listo
        $(document).ready(function() {
            // Cargar los reportes
            loadReports();
            
            // Manejar el envío del formulario
            document.getElementById('report-form').addEventListener('submit', handleFormSubmit);
            
            // Manejar el botón de envío del modal
            document.getElementById('modal-submit-btn').addEventListener('click', function() {
                const modalFormData = {
                    highway: document.getElementById('modal-highway').value,
                    km: document.getElementById('modal-km').value,
                    riskLevel: document.getElementById('modal-risk-level').value
                };
                
                if (validateForm(modalFormData)) {
                    // En una implementación real, enviaríamos los datos al servidor
                    console.log('Datos del modal:', modalFormData);
                    alert('¡Reporte enviado con éxito! Será revisado por nuestros administradores.');
                    
                    // Cerramos el modal
                    $('#reportModal').modal('hide');
                    
                    // Limpiamos el formulario del modal
                    document.getElementById('modal-highway').value = '';
                    document.getElementById('modal-km').value = '';
                    document.getElementById('modal-risk-level').value = '';
                }
            });
            
            // Filtrar reportes (simulación)
            $('.dropdown-item').click(function(e) {
                e.preventDefault();
                const filterText = $(this).text();
                $('#filterDropdown').text('Filtrar por: ' + filterText);
                // En una implementación real, aquí filtraríamos los reportes
                alert('Filtrando por: ' + filterText);
            });
        });

        // Simulación de conexión a base de datos (en un caso real, esto se haría con PHP y MySQL)
        function simulateDatabaseConnection() {
            console.log('Conectando a la base de datos...');
            
            // Simulamos una consulta SELECT
            console.log('Ejecutando consulta: SELECT * FROM dangerous_curves');
            
            // Simulamos datos de respuesta
            const simulatedData = [
                {id: 1, highway: 'A-2', km: 42, risk_level: 'high', reports_count: 8},
                {id: 2, highway: 'AP-7', km: 123, risk_level: 'medium', reports_count: 5},
                {id: 3, highway: 'A-6', km: 78, risk_level: 'low', reports_count: 3}
            ];
            
            console.log('Datos obtenidos:', simulatedData);
            
            // Simulamos una inserción
            console.log('Ejecutando consulta: INSERT INTO dangerous_curves (highway, km, risk_level) VALUES ("A-49", 56, "high")');
            console.log('Datos insertados correctamente.');
            
            return simulatedData;
        }

        // Llamamos a la simulación de conexión a base de datos
        simulateDatabaseConnection();