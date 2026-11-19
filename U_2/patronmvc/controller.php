<!--Recibe los datos-->
<?php
require_once 'view.php';

class Controller {
    private object $modelo;
    private View $vista;

    // Recibe cualquier modelo compatible (Equipos o Pilotos)
    public function __construct(object $modelo) {
        $this->modelo = $modelo;
        $this->vista  = new View();
    }

    /**
     * Lógica de negocio 1: Calcula el total de elementos internos
     * (jugadores en plantilla o títulos conseguidos).
     */
    public function calcularTotales(array $datos): array {
        $datosProcesados = [];
        foreach ($datos as $item) {
            $item['total'] = count($item['subelementos']);
            $datosProcesados[] = $item;
        }
            
        
        return $datosProcesados;
    }

    /**
     * Lógica de negocio 2: Ordena los datos del array según el parámetro recibido.
     * Valores admitidos: 'nombre_asc', 'nombre_desc', 'total_desc', 'total_asc'
     */
    public function ordenarDatos(array $datos, string $criterio = 'nombre_asc'): array {
        usort($datos, function ($a, $b) use ($criterio) {
            switch ($criterio) {
                case 'nombre_desc':
                    return strcmp($b['nombre'], $a['nombre']);
                case 'total_desc':
                    return $b['total'] <=> $a['total'];
                case 'total_asc':
                    return $a['total'] <=> $b['total'];
                case 'nombre_asc':
                default:
                    return strcmp($a['nombre'], $b['nombre']);
            }
        });

        return $datos;
    }

    /**
     * Método principal que coordina el flujo completo MVC
     */
    public function ejecutar(string $criterioOrden = 'nombre_asc'): void {
        // 1. Pedir configuración y datos al Modelo
        $configuracion = $this->modelo->obtenerConfiguracion();
        $datosCrudos   = $this->modelo->obtenerDatos();

        // 2. Procesar los datos en el Controlador (calcular totales y ordenar)
        $datosConTotales = $this->calcularTotales($datosCrudos);
        $datosOrdenados  = $this->ordenarDatos($datosConTotales, $criterioOrden);

        // 3. Enviar los datos ya listos a la Vista para su renderizado
        $this->vista->renderizar($configuracion, $datosOrdenados, $criterioOrden);
    }
}