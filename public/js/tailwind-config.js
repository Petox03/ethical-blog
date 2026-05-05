/**
 * Configuración de Tailwind para usar las fuentes personalizadas
 * y la paleta de colores del diseño (crema, carbón, acento rojo apagado).
 */
tailwind.config = {
    theme: {
        extend: {
            fontFamily: {
                display: ['"Playfair Display"', 'Georgia', 'serif'],
                body: ['"Source Serif 4"', 'Georgia', 'serif'],
            },
            colors: {
                cream:  '#F5F0EB',
                carbon: '#1C1C1C',
                muted:  '#6B6560',
                accent: '#9B2226',
                border: '#DDD8D0',
            },
        },
    },
}
