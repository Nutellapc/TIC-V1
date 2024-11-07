<?php
defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) { // Solo visible para administradores
    // Crea una página de ajustes para el plugin
    $settings = new admin_settingpage('local_ml_dashboard', get_string('pluginconfig', 'local_ml_dashboard'));

    // Agrega una opción para habilitar o deshabilitar el plugin
    $settings->add(new admin_setting_configcheckbox('local_ml_dashboard/enabled',
        get_string('enabled', 'local_ml_dashboard'),
        get_string('enableddesc', 'local_ml_dashboard'), 0));

    // Añade la página de ajustes al menú de plugins locales
    $ADMIN->add('localplugins', $settings);

    // Verificar si el dashboard está habilitado antes de mostrar el enlace
    if (get_config('local_ml_dashboard', 'enabled')) {
        // Agregar un enlace al dashboard solo si está habilitado
        $ADMIN->add('localplugins', new admin_externalpage(
            'local_ml_dashboard_page', // Identificador único
            get_string('viewdashboard', 'local_ml_dashboard'), // Nombre visible en el menú
            new moodle_url('/local/ml_dashboard/index.php') // URL del dashboard
        ));
    }
}
