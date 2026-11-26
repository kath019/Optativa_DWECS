<?php
// Recibe los datos del Modelo, hace los cálculos y se los pasa a la Vista
require_once 'view.php';

class Controller {
    private object $modelo;
    private View $vista;

    // Recibe cualquier modelo compatible (Equipos, Pilotos, Personalizado)
    public function __construct(object $modelo) {
        $this->modelo = $modelo;
        $this->vista  = new View();
    }

    /**
     * Lógica negocio 1, calcula el total de subelementos de cada elemento
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
     * Lógica negocio 2, ordena según 'nombre_asc', 'nombre_desc', 'total_desc' o 'total_asc'
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
     * Lógica negocio 3, localiza un elemento por su nombre dentro de los datos del modelo, devuelve null si no existe
     */
    public function buscarElemento(string $nombre): ?array {
        foreach ($this->modelo->obtenerDatos() as $item) {
            if ($item['nombre'] === $nombre) {
                return $item;
            }
        }
        return null;
    }

    /**
     * Lógica de negocio 4(estadísticas del detalle)
     * Devuelve
     *  ['total' => int,
     *    'desglose' => [ ['categoria' => string, 'cantidad' => int, 'porcentaje' => float], ... ]]
     */
    public function calcularEstadisticasDetalle(array $subelementos): array {
        $total = count($subelementos);

        // Cuenta nº veces aparece cada categoría
        $conteo = [];
        foreach ($subelementos as $sub) {
            $categoria = $sub['categoria'];
            $conteo[$categoria] = ($conteo[$categoria] ?? 0) + 1;
        }

        // De mayor a menor cantidad
        arsort($conteo);

        // Porcentaje sobre el total (si total = 0 el bucle no se ejecuta, así que nunca se divide entre cero)
        $desglose = [];
        foreach ($conteo as $categoria => $cantidad) {
            $desglose[] = [
                'categoria'  => $categoria,
                'cantidad'   => $cantidad,
                'porcentaje' => round(($cantidad / $total) * 100, 1)
            ];
        }

        return [
            'total'    => $total,
            'desglose' => $desglose
        ];
    }

    /* Flujo listado general */
    public function ejecutar(string $criterioOrden = 'nombre_asc'): void {
        $configuracion = $this->modelo->obtenerConfiguracion();
        $datosCrudos   = $this->modelo->obtenerDatos();

        $datosConTotales = $this->calcularTotales($datosCrudos);
        $datosOrdenados  = $this->ordenarDatos($datosConTotales, $criterioOrden);

        $this->vista->renderizar($configuracion, $datosOrdenados, $criterioOrden);
    }

    /* Flujo de la vista detalle */
    public function ejecutarDetalle(string $nombre): void {
        $elemento = $this->buscarElemento($nombre);

        // Si no existe, se vuelve al listado
        if ($elemento === null) {
            header('Location: index.php');
            exit;
        }

        $configuracion = $this->modelo->obtenerConfiguracion();
        $estadisticas  = $this->calcularEstadisticasDetalle($elemento['subelementos']);

        $this->vista->renderizarDetalle($configuracion, $elemento, $estadisticas);
    }
}