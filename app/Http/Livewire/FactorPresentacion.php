<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FactorPresentacion extends Component
{

    public $factor= [];

    public $factorvsfactorial = [];

    public $factorvsprysmex = [];

    public $factorvsoracle = [];

    public $factorvstimeblock = [];
    
    public $modal= false, $titulomsj,$msj,$btnTexto;

    public function mount(){
        
    }

    public function render()
    {
        return view('livewire.factor-presentacion')->layout('layouts.guest');
    }

    public function comparar($valor)
    {

        $this->factor = [];
        $this->factorvsfactorial = [];
        $this->factorvsprysmex = [];
        $this->factorvsoracle = [];
        $this->factorvstimeblock = [];

        if ($valor == 1) {
            $this->modal = true;
            $this->titulomsj = 'Comparación de Factor 2.0 y Humand';
            $this->btnTexto = 'Cerrar';

            $this->factor = [
                'Muro social',
                'Encuestas segmentadas',
                'Perfil del colaborador',
                'Contenidos segmentados',
                'Noticias de la empresa',
                'Asignacion de insignias, visualizacion de insignias asignadas',
                'Solicitudes, reportes con estatus y preguntas frecuentes',
                'Formularios y trámites',
                'Archivos (ruta de transporte, comedor, medidas de seguridad, covid-19, valores culturales)',
                'Capacitación',
                'Formulario de pre-boarding',
                'Eventos',
                'Beneficios',
                'Consulta de saldo de vacaciones',
                'Actualizacion de datos personales',
                'Listas de renovacion de contrato, sanciones,etc',
                'Informacion de consulta (FAQ)',
                'Pasaporte: visualizacion de monedas,tienda,compra de nivel',
                'Productividad (sólo gráficas)',
        
                'Tareas (sorpresa, acciones correctivas, etc)',
                'Ranking de insignias',
                'Chat',
                'Creacion de grupos (estilo whatsApp)',
                'Directorio de todos los colaboradores (por nivelación)',
                'Bienvenida del CEO',
                'Kit de bienvenida con responsabilidad social (videos de las personas que hacen tu kit)',
                'Encuesta del primer dia de trabajo',
                'Encuesta sobre la primera semana',
                'Encuesta segundo mes',
                'Menú de la cafeteria',
                'Descripcion del puesto, objetivos, evaluación de desempeño, intereses, habilidades, idiomas.',
                'Notificaciones segmentadas',
                'Tips de bienestar y salud',
                'Recomendaciones y beneficios por interés',
                'Happy Index',
                'Servicio on demand de contenidos interactivos, de lectura, auditivos, video, y realidad aumentada)',
                'Reservación de salas',
                'Calendario global',
                'Presentación del amigo aguila para apoyo de dudas generales de la empresa/area',
                'Calendario de nómina / visualización del recibo de nómina',
                'Conoce a tu equipo/compañeros de trabajo',
                'Informacion sobre el primer día (fecha de ingreso, horario de inducción, compañeros de inducción, instructor, información básica de la empresa)',
                'Reglas básicas de seguridad',
                'Reservación de vacaciones y permisos',
                'Seguimiento y agenda de citas',
                'Aviso de incapacidad',
                'Traige',
                'Hallazgos de seguridad',
                'Simulador de evacuaciones',
                'Gráficas de productividad y QRQC',
                'Días sin accidentes incapacitantes',
                'Recorridos de planta',
                'Cruce de experiencias (noticias con beneficios, beneficios con tips)',
                'Credencial RFID digital',
                'Entrega de regalos con código QR',
                'Inscripción a clases',
                'Capacitaciones generales bajo demanda (condicionadas a resultados de evaluación de desempeño)',
                'Comunicados interactivos',
                'Notificaciones push (por aprobación, por mensaje, etc)',
                'Tarjeton de transporte',
                'Rastreabilidad de transporte',
                'Dashboard de incidencias, transporte, comportamientos, happy index',
                'Conexión a otros sistemas (toolkit, oracle cloud, talento aguila)',
                'Gestión por área, cada quién nutre de información al sistema',
                'Generación de listados',
                'Comunicación multicanal para localizar al colaborador o sus contactos de emergencia',
            ];

        }elseif($valor == 2){
            $this->modal = true;
            $this->titulomsj = 'Comparación de Factor 2.0 y Factorial';
            $this->btnTexto = 'Cerrar';

            
            $this->factorvsfactorial = [
                'Gestión de vaciones y faltas',
                'Control de accesos y reloj checador',
                'Informes e indicadores de capital humano',
                'Conexión a otros sistemas (toolkit, oracle cloud, talento aguila)',
                'Gestión por área, cada quién nutre de información al sistema'
            ];

        }elseif($valor == 3){
            $this->modal = true;
            $this->titulomsj = 'Comparación de Factor 2.0 y Prysmex';
            $this->btnTexto = 'Cerrar';

            $this->factorvsprysmex = [
                'Gestion de riesgos',
                'Inspecciones',
                'Recorridos',
                'Campañas',
                'Comunicados',
                'Analitica',
                'Reconocimientos',
                'Comunidad',
                'Conexión a otros sistemas (toolkit, oracle cloud, talento aguila)',
                'Gestión de las áreas de Serivicio medico,seguridad,mantenimiento, cada quién nutre de información al sistema'
            ];

        }elseif($valor == 4){
            $this->modal = true;
            $this->titulomsj = 'Comparación de Factor 2.0 y Oracle';
            $this->btnTexto = 'Cerrar';

            $this->factorvsoracle = [
                'Conexión a otros sistemas (toolkit, oracle cloud, talento aguila)',
                'Gestión por área, cada quién nutre de información al sistema',
                'Agregar nuevos modulos',
            ];

        }elseif($valor == 5){
            $this->modal = true;
            $this->titulomsj = 'Comparación de Factor 2.0 y TimeBlock';
            $this->btnTexto = 'Cerrar';

            $this->factorvstimeblock = [
                'visualisación de empleados',
                'busqueda de empleados',
                'calendario',
                'Planificador',
                'Asignación de jornadas laborales',
                'Solicitud y autorización de justificantes',
                'Flujo de trabajo',
                'Reportes',
                'Conexión a otros sistemas (toolkit, oracle cloud, talento aguila)',
            ];

        }

    }


    public function ocultarModal(){
        $this->modal = false;
    }

}
