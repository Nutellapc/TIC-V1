<?php
require('../../config.php');
require_login();

// Configuración básica de la página en Moodle
$PAGE->set_url(new moodle_url('/local/ml_dashboard/index.php'));
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('embedded');

// Obtener textos desde el archivo de idioma de Moodle
$dashboard_enabled_text = get_string('dashboard_enabled', 'local_ml_dashboard');
$view_dashboard_text = get_string('viewdashboard', 'local_ml_dashboard');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $view_dashboard_text; ?></title>

    <!-- Cargar el CSS de Tailwind -->

    <link rel="stylesheet" href="src/style.css">


    <!-- Cargar Vue desde CDN -->
    <script src="https://unpkg.com/vue@3"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<!-- Contenedor para la aplicación Vue -->
<div id="app" class="text-center p-6 bg-gray-200 rounded-lg shadow-lg">
    <h1 class="text-4xl font-bold text-blue-600 mb-4">{{ heading }}</h1>
    <p class="text-lg text-gray-700 mb-4">Bienvenido al ML Dashboard</p>
    <button
        @click="showMessage"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
    >
        {{ buttonText }}
    </button>
</div>



<script>
    // Pasar variables de PHP a JavaScript usando JSON
    const dashboardEnabledText = <?php echo json_encode($dashboard_enabled_text); ?>;
    const viewDashboardText = <?php echo json_encode($view_dashboard_text); ?>;

    // Configurar la aplicación Vue sin PrimeVue
    const { createApp } = Vue;

    const App = {
        data() {
            return {
                heading: viewDashboardText, // Título de la página desde `get_string`
                buttonText: 'Click me', // Puedes reemplazarlo con otra cadena de idioma si tienes una definida
            };
        },
        methods: {
            showMessage() {
                alert(dashboardEnabledText); // Muestra un mensaje con el texto obtenido desde `get_string`
            }
        }
    };

    const app = createApp(App);
    app.mount('#app');
</script>

</body>
</html>
