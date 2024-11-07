// Importa Vue
import { createApp } from 'vue';

import '../css/tailwind.css'; // Importa el CSS de Tailwind

// Define la aplicación Vue
const App = {
    template: `
        <div>
            <h1>{{ heading }}</h1>
            <button @click="showMessage">Click me</button>
        </div>
    `,
    data() {
        return {
            heading: 'Bienvenido a ML Dashboards' // Título que se mostrará
        };
    },
    methods: {
        showMessage() {
            alert('Button clicked!'); // Mensaje al hacer clic en el botón
        }
    }
};

// Crea y monta la aplicación Vue
const app = createApp(App);
app.mount('#app'); // Monta la aplicación en el contenedor con id "app"
