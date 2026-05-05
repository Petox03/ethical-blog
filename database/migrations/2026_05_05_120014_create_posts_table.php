<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Crea la tabla de posts e inserta los 5 posts del Módulo 3 como
     * dato inicial de producción. Se usa la migración (no seeders) porque
     * este contenido es permanente y debe existir desde el primer deploy.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('topic_number', 10);
            $table->string('slug')->unique();
            $table->text('excerpt');
            $table->longText('content');
            $table->string('image_path')->nullable();
            // JSON con los recursos complementarios de cada post.
            // Estructura: [{ "type": "video|link|tool|simulator", "label": "...", "url": "..." }]
            $table->json('resources');
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });

        // -------------------------------------------------------------------------
        // Dato inicial de producción: los 5 posts del Módulo 3 de EPyC.
        // Hardcodeado aquí porque es contenido estático que siempre debe existir.
        // -------------------------------------------------------------------------
        $now = now();

        DB::table('posts')->insert([

            // -----------------------------------------------------------------
            // POST 1 — Subtema 12.1: Agencia ciudadana y trabajo público
            // -----------------------------------------------------------------
            [
                'title' => 'Refactorizando la Realidad: El Poder de la Agencia Ciudadana',
                'topic_number' => '12.1',
                'slug' => 'agencia-ciudadana-trabajo-publico',
                'excerpt' => 'La agencia ciudadana es la facultad de los individuos para actuar deliberadamente y transformar su entorno. Para un profesional de la tecnología, esto significa pasar de ser "usuario" a ser "arquitecto social".',
                'image_path' => 'https://plus.unsplash.com/premium_photo-1745504397871-71d701269284?q=80&w=1170&auto=format&fit=crop',
                'resources' => json_encode([
                    [
                        'type' => 'link',
                        'label' => 'Code for America: desarrolladores al servicio público',
                        'url' => 'https://codeforamerica.org/',
                    ],
                    [
                        'type' => 'link',
                        'label' => 'Ciudadanía y Agencia — Redalyc (Pineda, 2013)',
                        'url' => 'https://www.redalyc.org/articulo.oa?id=760281396004',
                    ],
                    [
                        'type' => 'link',
                        'label' => 'La Agencia Ciudadana — Noroeste (Vega, 2015)',
                        'url' => 'https://www.noroeste.com.mx/opinion/malecon-mazatlan/la-agencia-ciudadana-GNOP91282',
                    ],
                ]),
                'is_published' => true,
                'created_at' => $now,
                'updated_at' => $now,
                'content' => <<<'HTML'
<p>En el desarrollo de software, un sistema es tan robusto como la lógica de sus nodos. En la sociedad, ocurre lo mismo. La agencia ciudadana es la facultad de los individuos para proponerse objetivos y actuar deliberadamente para transformar su entorno. Esta no es una propiedad estática que se posee por decreto.</p>

<h2>1. Más que Usuarios: Agentes de Cambio</h2>
<p>Según Vega (2015), la agencia es la capacidad de <em>"hacer que las cosas sucedan"</em>. No se trata de una participación decorativa, sino de una intervención consciente en lo público. Para un profesional de la tecnología, esto significa transitar de ser un "usuario" —sujeto pasivo que recibe servicios— a ser un "agente" —sujeto activo que propone soluciones—. La agencia es el motor que permite que los ciudadanos dejen de ser espectadores de las deficiencias del sistema y se conviertan en sus arquitectos.</p>

<h2>2. Ciudadanía y Desarrollo Humano</h2>
<p>Desde la perspectiva de Pineda (2013) en Redalyc, la agencia está intrínsecamente ligada a la libertad. Ser ciudadano implica tener la capacidad real de actuar en función de lo que valoramos como sociedad. La agencia ciudadana es el ejercicio de esa libertad en el espacio político, donde el "trabajo público" se convierte en el vehículo para alcanzar niveles superiores de desarrollo humano. Actuar con intención de expandir las capacidades de todos es la ley.</p>

<h2>3. El Trabajo Público como Código Abierto</h2>
<p>El trabajo público es el esfuerzo colectivo para producir bienes que nos pertenecen a todos. En el siglo XXI, este trabajo no le pertenece exclusivamente al gobierno. La infraestructura social, así como el código open source, se mantiene y mejora gracias a las contribuciones de ciudadanos que deciden invertir su tiempo y conocimiento en resolver problemas comunes.</p>

<div class="example-block">
    <h3>⚙️ Ejemplo de Aplicación: El "Merge Request" Social</h3>
    <p>Imaginemos que detectamos que el sistema de gestión de residuos en la zona es ineficiente debido a una mala ruta de recolección. En lugar de esperar a que la administración central lo note, podríamos utilizar nuestras habilidades para mapear la zona y proponer una optimización basada en datos, organizando a los vecinos para presentar una propuesta formal.</p>
    <p>Ese diseño de solución y la coordinación vecinal son "trabajo público". Usamos una agencia para mejorar un servicio sin ser un funcionario público, aplicando una lógica de optimización —como si fuera un algoritmo— a un problema social real.</p>
</div>
HTML,
            ],

            // -----------------------------------------------------------------
            // POST 2 — Subtema 12.3: Ciudadanía global e impacto tecnológico
            // -----------------------------------------------------------------
            [
                'title' => 'Compilando una Nueva Realidad: La Ciudadanía Global en la Era Digital',
                'topic_number' => '12.3',
                'slug' => 'ciudadania-global-impacto-tecnologico',
                'excerpt' => 'En pleno 2026, el despliegue de infraestructuras digitales ha reescrito el contrato social. Los avances tecnológicos son el entorno donde hoy se ejerce la agencia ciudadana, y como desarrolladores, somos quienes construimos los puentes o las barreras de esta nueva ciudadanía.',
                'image_path' => 'https://plus.unsplash.com/premium_photo-1661878265739-da90bc1af051?q=80&w=1086&auto=format&fit=crop',
                'resources' => json_encode([
                    [
                        'type' => 'video',
                        'label' => 'Ciudadanía Digital en el Siglo XXI',
                        'url' => 'https://youtu.be/ztgSr42CSEI',
                    ],
                    [
                        'type' => 'tool',
                        'label' => 'ToS;DR — Calificaciones de Términos de Servicio',
                        'url' => 'https://tosdr.org/es',
                    ],
                    [
                        'type' => 'link',
                        'label' => 'IAI: Cómo construir ciudadanía digital en el siglo XXI',
                        'url' => 'https://www.iai.it/en/publications/c41/how-build-digital-citizenship-21st-century',
                    ],
                ]),
                'is_published' => true,
                'created_at' => $now,
                'updated_at' => $now,
                'content' => <<<'HTML'
<p>Históricamente, ser ciudadano se limitaba a las fronteras geográficas y las leyes nacionales. Sin embargo, en pleno 2026, el despliegue de infraestructuras digitales ha reescrito el contrato social. Los avances tecnológicos son el entorno donde hoy se ejerce la agencia ciudadana.</p>

<h2>1. La Identidad Digital como Derecho Humano</h2>
<p>Según los acuerdos del G20 en 2025, la infraestructura pública digital ya no es opcional, se ha convertido en una extensión de los derechos básicos (Istituto Affari Internazionali, 2026). Esto significa que nuestra capacidad para influir en el mundo ahora depende directamente de nuestro acceso y comprensión de la tecnología. Como desarrolladores, nos volvemos jueces y verdugos: somos quienes construyen los puentes —o las barreras— de esta nueva ciudadanía.</p>

<h2>2. El Mercado Global y la Soberanía Tecnológica</h2>
<p>La UNESCO (2025) destaca que la "alfabetización digital" es ahora una habilidad crítica para el mercado laboral globalizado. Para alguien que busca migrar profesionalmente, entender la ética detrás del manejo de datos y la soberanía tecnológica ya no es sólo opcional, es un deber. No basta con saber usar una API; hay que entender cómo esa transferencia de datos impacta en la soberanía del usuario final y su capacidad de actuar de forma autónoma en la red.</p>

<h2>3. Crisis Ecosocial y Tecnopolítica</h2>
<p>Díaz-Salazar (2021) nos advierte que estamos en una <em>"crisis ecosocial"</em> donde la tecnología puede ser el veneno o la cura. La tecnopolítica es la respuesta: usar las redes y el software para organizar la resistencia ética y la colaboración global. En este siglo, un error en la lógica de un sistema de distribución de recursos puede excluir a miles de ciudadanos de sus derechos básicos. Por eso, el "Clean Code" es una responsabilidad ética planetaria.</p>

<div class="example-block">
    <h3>⚙️ Ejemplo de Aplicación: El Deep SaaS y la Ética del Estado</h3>
    <p>Si estás construyendo un sistema de gestión para restaurantes con una implementación que maneja estados, la ciudadanía global aquí se aplica en la trazabilidad.</p>
    <p>Al automatizar el inventario, podrías decidir rastrear la ubicación GPS exacta de cada proveedor en tiempo real o de cada empleado. Pero aplicando el principio de <strong>"privacidad por diseño"</strong>, aún teniendo el poder técnico para rastrear cada movimiento, diseño el sistema para que solamente recoja datos necesarios para la orden. Respetando la agencia ciudadana de todos los usuarios, tratando sus datos con la misma dignidad que me gustaría que mis datos fueran tratados en cualquier parte del mundo.</p>
</div>
HTML,
            ],

            // -----------------------------------------------------------------
            // POST 3 — Subtema 13.1: Diálogo e interdependencia
            // -----------------------------------------------------------------
            [
                'title' => 'Protocolos de Convivencia: Diálogo e Interdependencia',
                'topic_number' => '13.1',
                'slug' => 'dialogo-e-interdependencia',
                'excerpt' => 'En cualquier infraestructura compleja, la estabilidad depende de la calidad de las conexiones entre nodos. En la sociedad, esta arquitectura se sostiene sobre dos pilares: la interdependencia como estado real de nuestra existencia y el diálogo como el protocolo necesario para gestionarla.',
                'image_path' => 'https://images.unsplash.com/photo-1639322537231-2f206e06af84?q=80&w=1332&auto=format&fit=crop',
                'resources' => json_encode([
                    [
                        'type' => 'video',
                        'label' => 'TED: 10 formas de tener una mejor conversación — Celeste Headlee',
                        'url' => 'https://www.ted.com/talks/celeste_headlee_10_ways_to_have_a_better_conversation',
                    ],
                    [
                        'type' => 'tool',
                        'label' => 'CNVC: Centro para la Comunicación No Violenta',
                        'url' => 'https://www.cnvc.org/',
                    ],
                    [
                        'type' => 'link',
                        'label' => 'La Ética de la Interdependencia — Plena Inclusión',
                        'url' => 'https://www.plenainclusion.org/noticias/la-etica-de-la-interdependencia/',
                    ],
                ]),
                'is_published' => true,
                'created_at' => $now,
                'updated_at' => $now,
                'content' => <<<'HTML'
<p>En cualquier infraestructura compleja, la estabilidad no puede apoyarse sobre un único nodo: depende de la calidad de las conexiones entre nodos. En la sociedad, esta arquitectura se sostiene sobre dos pilares: la interdependencia como estado real de nuestra existencia y el diálogo como el protocolo necesario para gestionarla.</p>

<h2>1. La Interdependencia: Reconocer la Red de Cuidados</h2>
<p>La interdependencia no es una debilidad. No es que no podamos solos, ni que no seamos fuertes individualmente. Es una condición humana fundamental. Nadie es autosuficiente por completo; existimos porque formamos parte de una red de cuidados y apoyos mutuos que nos permite sobrevivir y desarrollarnos. Reconocer que somos seres vulnerables nos obliga a aceptar que nuestra autonomía siempre es relativa y está vinculada a los demás.</p>
<p>Esta interdependencia exige una ética que priorice el sostenimiento de la vida y el apoyo mutuo sobre el individualismo extremo. En un entorno profesional, esto se traduce en entender que el éxito de un proyecto depende de la salud del equipo y la colaboración interdisciplinaria.</p>

<h2>2. El Diálogo: El Protocolo de Acción Comunicativa</h2>
<p>Si la interdependencia es la red, el diálogo es el protocolo con el que nos comunicamos, el cual permite que los paquetes de información lleguen a su destino con integridad. Según la ética del discurso, el diálogo no es una mera transmisión de datos: se convierte en el esfuerzo por alcanzar un entendimiento mutuo basado en razones que todos los participantes puedan aceptar como válidas. El diálogo auténtico requiere ver al interlocutor como un sujeto con igual dignidad y capacidad de razón, no como un obstáculo a superar.</p>

<h2>3. Sincronización Social y Ética</h2>
<p>La convivencia humana es imposible sin una comunicación que busque la verdad y el acuerdo. En sociedades complejas y globalizadas, la interdependencia nos obliga a negociar constantemente nuestras realidades; el diálogo es la única herramienta legítima para resolver conflictos sin recurrir a la fuerza, permitiendo que la diversidad de pensamiento enriquezca el sistema en lugar de fragmentarlo.</p>

<div class="example-block">
    <h3>⚙️ Ejemplo de Aplicación: El "Code Review" como Diálogo Ético</h3>
    <p>En la ingeniería de software, la interdependencia es técnica —un servicio depende de otro— y humana —un desarrollador depende del código del otro.</p>
    <p>Supongamos que, durante una revisión de código, encuentras un error crítico en el trabajo de un colega. En lugar de imponer una corrección unilateral, estableces un diálogo. Explicas el razonamiento técnico, escuchas la lógica original del compañero y llegan a un consenso sobre la mejor solución. El error no sólo fue arreglado; de esta manera se fortalece la relación de interdependencia del equipo y se mejora el conocimiento colectivo.</p>
</div>
HTML,
            ],

            // -----------------------------------------------------------------
            // POST 4 — Subtema 15.1: Ética planetaria
            // -----------------------------------------------------------------
            [
                'title' => 'Más Allá del Entorno Local: Ética Planetaria en el Desarrollo',
                'topic_number' => '15.1',
                'slug' => 'etica-planetaria',
                'excerpt' => 'En la ingeniería de software, estamos obsesionados con la eficiencia y la escalabilidad. Sin embargo, la ética planetaria nos obliga a levantar la vista del monitor: cada línea de código, cada servidor encendido y cada algoritmo desplegado es parte de un ecosistema vivo e interdependiente.',
                'image_path' => 'https://plus.unsplash.com/premium_photo-1714618990872-09781a8421f0?q=80&w=1121&auto=format&fit=crop',
                'resources' => json_encode([
                    [
                        'type' => 'simulator',
                        'label' => 'En-ROADS: Simulador de Soluciones Climáticas',
                        'url' => 'https://en-roads.climateinteractive.org/scenario.html?v=26.4.0&lang=es',
                    ],
                    [
                        'type' => 'link',
                        'label' => 'La Carta de la Tierra Internacional',
                        'url' => 'https://cartadelatierra.org/lea-la-carta-de-la-tierra/',
                    ],
                    [
                        'type' => 'link',
                        'label' => 'UNESCO: Ética de la Ciencia y la Tecnología',
                        'url' => 'https://www.unesco.org/es/ethics-science-technology',
                    ],
                ]),
                'is_published' => true,
                'created_at' => $now,
                'updated_at' => $now,
                'content' => <<<'HTML'
<p>En la ingeniería de software, a menudo estamos obsesionados con que el sistema sea eficiente y escalable. Sin embargo, el concepto de ética planetaria nos obliga a levantar la vista del monitor y entender que cada línea de código, cada servidor encendido y cada algoritmo desplegado es parte de un ecosistema vivo e interdependiente.</p>

<h2>1. La Interdependencia como Axioma</h2>
<p>La Carta de la Tierra establece un principio fundamental: somos una sola familia humana y una sola comunidad terrestre con un destino común. En el siglo XXI, esto se traduce en una responsabilidad compartida que trasciende las fronteras nacionales. Un despliegue masivo de IA o una minería de datos agresiva —un servicio que siempre está encendido— consume recursos energéticos y sociales que afectan el equilibrio de todo el planeta.</p>

<h2>2. Ciencia y Tecnología con Conciencia</h2>
<p>La UNESCO señala que los avances en ciencia y tecnología deben estar anclados en marcos éticos que garanticen que el progreso no sea a costa de la dignidad humana o la salud del ecosistema. No se trata solo de si <em>podemos</em> construir algo, sino de si <em>debemos</em> hacerlo considerando el bienestar de las generaciones futuras. La ética planetaria es, en esencia, un nuevo imperativo categórico: actúa de tal forma que los efectos de tu acción sean compatibles con la permanencia de una vida auténticamente humana en la Tierra.</p>

<h2>3. Visión Sistémica y Sostenibilidad</h2>
<p>La ética planetaria nos invita a adoptar una visión sistémica. Al igual que en una arquitectura de microservicios donde el fallo de uno puede tumbar toda la red, la degradación de un entorno natural o social en una parte del mundo afecta la estabilidad del conjunto global. La tecnología debe ser, por lo tanto, una herramienta de regeneración y no solo de extracción.</p>

<div class="example-block">
    <h3>⚙️ Ejemplo de Aplicación: Optimización de Recursos y VRAM</h3>
    <p>Supongamos que estás configurando un servidor local para correr modelos de lenguaje (LLMs). Podrías correr el modelo más pesado y demandante de VRAM sin restricciones, lo que implica un consumo eléctrico elevado y un desgaste acelerado del hardware.</p>
    <p>La decisión más ética sería optar por técnicas de <strong>cuantización</strong> para reducir el peso del modelo y optimizar el consumo de energía, logrando un equilibrio entre rendimiento y eficiencia energética. Entiendes que, aunque el servidor sea "tuyo", la energía que consume y el calor que genera impactan en la huella de carbono global. Estás aplicando una ética de cuidado hacia el entorno desde tu propio cuarto de servidores.</p>
</div>
HTML,
            ],

            // -----------------------------------------------------------------
            // POST 5 — Subtema 15.2: Proyecto de vida y nuevo imperativo categórico
            // -----------------------------------------------------------------
            [
                'title' => 'El Deployment Definitivo: Proyecto de Vida y el Nuevo Imperativo Categórico',
                'topic_number' => '15.2',
                'slug' => 'proyecto-de-vida-nuevo-imperativo-categorico',
                'excerpt' => 'La ética es el sistema que opera nuestra conducta, pero el proyecto de vida es la aplicación principal que decidimos ejecutar. Hans Jonas nos exige una actualización al imperativo de Kant: actuar de forma que la vida humana siga siendo posible para las generaciones venideras.',
                'image_path' => 'https://images.unsplash.com/photo-1559816827-cd6130a58bf7?q=80&w=1074&auto=format&fit=crop',
                'resources' => json_encode([
                    [
                        'type' => 'tool',
                        'label' => 'Calculadora de Huella de Carbono — Climate Neutral Now',
                        'url' => 'https://offset.climateneutralnow.org/footprintcalc',
                    ],
                    [
                        'type' => 'link',
                        'label' => 'Cartilla Moral — Gobierno de México',
                        'url' => 'https://www.gob.mx/cms/uploads/attachment/file/427152/CartillaMoral_.pdf',
                    ],
                    [
                        'type' => 'link',
                        'label' => 'Introducción a Hans Jonas — Alcoberro',
                        'url' => 'http://www.alcoberro.info/V1/jonas0.htm',
                    ],
                ]),
                'is_published' => true,
                'created_at' => $now,
                'updated_at' => $now,
                'content' => <<<'HTML'
<p>Llegar al final de este recorrido ha sido más que completar un temario. Esto ha definido quienes seremos en el futuro. La ética es el sistema que opera nuestra conducta, pero el proyecto de vida es la aplicación principal que decidimos ejecutar.</p>

<h2>1. Del Deber Abstracto a la Responsabilidad Real</h2>
<p>Tradicionalmente, seguimos el imperativo categórico de Kant, que nos pide actuar bajo principios que quisiéramos ver convertidos en leyes universales —haciendo lo correcto por deber y no por interés—. Sin embargo, el siglo XXI nos exige una actualización.</p>
<p>Hans Jonas propone un nuevo imperativo categórico: <em>"Obra de tal manera que los efectos de tu acción sean compatibles con la permanencia de una vida humana auténtica sobre la Tierra"</em>. Ser una buena persona en lo privado no es suficiente; nuestras decisiones técnicas y profesionales deben garantizar que las generaciones futuras reciban un mundo donde todavía sea posible vivir con dignidad.</p>

<h2>2. La Ética del Cuidado: Refactorizando Relaciones</h2>
<p>Frente a los modelos de justicia abstracta de Kohlberg, surge la ética del cuidado de Carol Gilligan. Esta perspectiva nos enseña que las decisiones morales no solo se basan en reglas, sino en la responsabilidad hacia personas específicas y la preservación de vínculos. Cuidar no es una opción, es una necesidad de supervivencia. En el ámbito profesional, el cuidado se manifiesta en el respeto al instrumental, la calidad de los programas, la hospitalidad con el colega y el mantenimiento de los espacios públicos.</p>

<h2>3. Tu Huella en el Código Global</h2>
<p>Cada acción diaria suma a nuestra huella de carbono. El aumento de CO₂ y el calentamiento global no son problemas ajenos; son el resultado de modelos de dominación y consumo que ya no son sostenibles. Integrar un proyecto de vida ético implica transitar de una lógica de "conquista y competencia" a una de "cuidado y colaboración".</p>

<div class="example-block">
    <h3>⚙️ Ejemplo de Aplicación: Arquitectura Sustentable y Legado</h3>
    <p>Supongamos que estás liderando un proyecto que requiere una gran capacidad de procesamiento en la nube. Te aseguras de que la arquitectura sea lo más eficiente posible, minimizando el desperdicio de energía y priorizando proveedores con energía limpia. Fomentas un ambiente de trabajo donde la salud mental y el crecimiento de tu equipo sean tan importantes como el deadline.</p>
    <p>Tu proyecto de vida es construir una carrera que deje un sistema —social y ecológico— mejor de como lo encontraste, asegurando que los desarrolladores del año 2060 hereden una base de código y un planeta funcionales.</p>
</div>
HTML,
            ],

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
