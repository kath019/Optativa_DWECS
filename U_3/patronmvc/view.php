<?php
// Pinta HTML. No calcula nada: solo muestra lo que le da el Controlador.
class View {

    // CSS unificado: lo usan el listado y el detalle
    private function estilos(): void {
        ?>
            <style>
                body {
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                    background-color: #f4f6f9;
                    margin: 0;
                    padding: 30px;
                    color: #333;
                }
                .container {
                    max-width: 700px;
                    margin: 0 auto;
                    background-color: #ffffff;
                    padding: 25px 30px;
                    border-radius: 8px;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                }
                h1 {
                    color: #1a252f;
                    margin-top: 0;
                    border-bottom: 2px solid #007bff;
                    padding-bottom: 10px;
                    font-size: 24px;
                }
                h2 {
                    color: #1a252f;
                    font-size: 18px;
                    margin: 0 0 12px 0;
                }
                p.descripcion {
                    color: #6c757d;
                    margin-bottom: 20px;
                }
                .caja-filtro {
                    background-color: #f8fafc;
                    border: 1px solid #e2e8f0;
                    padding: 15px;
                    border-radius: 6px;
                    margin-bottom: 20px;
                    display: flex;
                    align-items: center;
                    gap: 10px;
                }
                .caja-filtro label {
                    font-weight: 600;
                    color: #334155;
                    font-size: 14px;
                }
                .caja-filtro select {
                    padding: 8px 12px;
                    border-radius: 4px;
                    border: 1px solid #cbd5e1;
                    font-size: 14px;
                    outline: none;
                    background-color: #ffffff;
                    cursor: pointer;
                }
                .caja-filtro select:focus {
                    border-color: #007bff;
                }
                .tarjeta-item {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    padding: 12px 16px;
                    margin-bottom: 15px;
                    border: 1px solid #e2e8f0;
                    border-radius: 6px;
                    background-color: #ffffff;
                    transition: transform 0.1s ease, box-shadow 0.1s ease;
                }
                .tarjeta-item:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
                    border-color: #cbd5e1;
                }
                .item-imagen {
                    width: 45px;
                    height: 45px;
                    object-fit: contain;
                    border-radius: 6px;
                    margin-right: 15px;
                }
                .item-form {
                    flex-grow: 1;
                }
                .item-form form {
                    margin: 0;
                }
                .item-titulo-btn {
                    background: none;
                    border: none;
                    color: #0f172a;
                    font-size: 18px;
                    font-weight: 600;
                    padding: 0;
                    text-align: left;
                    cursor: pointer;
                    font-family: inherit;
                }
                .item-titulo-btn:hover {
                    color: #007bff;
                    text-decoration: underline;
                }
                .item-subtitulo {
                    font-size: 13px;
                    color: #64748b;
                    margin-top: 3px;
                }
                .item-contador {
                    font-size: 13px;
                    font-weight: 500;
                    color: #475569;
                    background-color: #f1f5f9;
                    padding: 5px 12px;
                    border-radius: 20px;
                    white-space: nowrap;
                    border: 1px solid #e2e8f0;
                }

                /* -- Vista detalle -- */
                .detalle-cabecera {
                    display: flex;
                    align-items: center;
                    gap: 18px;
                    border-bottom: 2px solid #007bff;
                    padding-bottom: 12px;
                    margin-bottom: 20px;
                }
                .detalle-cabecera h1 {
                    border: none;
                    padding: 0;
                    margin: 0;
                }
                .detalle-imagen {
                    width: 90px;
                    height: 90px;
                    object-fit: contain;
                    border-radius: 8px;
                    border: 1px solid #e2e8f0;
                    background-color: #f8fafc;
                }
                .panel {
                    background-color: #f8fafc;
                    border: 1px solid #e2e8f0;
                    border-radius: 6px;
                    padding: 15px;
                    margin-bottom: 20px;
                }
                .panel p {
                    margin: 0;
                    color: #475569;
                }
                .fila-stat {
                    margin-bottom: 12px;
                }
                .fila-stat-texto {
                    display: flex;
                    justify-content: space-between;
                    font-size: 14px;
                    color: #334155;
                    margin-bottom: 4px;
                }
                .barra-fondo {
                    background-color: #e2e8f0;
                    border-radius: 20px;
                    height: 8px;
                    overflow: hidden;
                }
                .barra-relleno {
                    background-color: #007bff;
                    height: 100%;
                }
                .total-resumen {
                    font-weight: 600;
                    color: #0f172a;
                    margin-bottom: 15px;
                }
                .mensaje-vacio {
                    color: #6c757d;
                    font-style: italic;
                }
                .sub-nombre {
                    font-size: 16px;
                    font-weight: 600;
                    color: #0f172a;
                }
                .btn-volver {
                    display: inline-block;
                    margin-top: 10px;
                    padding: 9px 18px;
                    background-color: #007bff;
                    color: #ffffff;
                    text-decoration: none;
                    border-radius: 4px;
                    font-size: 14px;
                    font-weight: 600;
                }
                .btn-volver:hover {
                    background-color: #0069d9;
                }
            </style>
        <?php
    }

    /* Lista principal*/
    public function renderizar(array $config, array $elementos, string $ordenActual): void {
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo htmlspecialchars($config['titulo_pagina']); ?></title>
            <?php $this->estilos(); ?>
        </head>
        <body>

        <div class="container">
            <h1><?php echo htmlspecialchars($config['titulo_pagina']); ?></h1>
            <p class="descripcion"><?php echo htmlspecialchars($config['subtitulo']); ?></p>

            <!-- Selector para probar la ordenación del Controlador -->
            <div class="caja-filtro">
                <form action="index.php" method="POST">
                    <label for="orden">Ordenar listado por:</label>
                    <select name="orden" id="orden" onchange="this.form.submit()">
                        <option value="nombre_asc"  <?php echo $ordenActual === 'nombre_asc'  ? 'selected' : ''; ?>>Nombre (A - Z)</option>
                        <option value="nombre_desc" <?php echo $ordenActual === 'nombre_desc' ? 'selected' : ''; ?>>Nombre (Z - A)</option>
                        <option value="total_desc"  <?php echo $ordenActual === 'total_desc'  ? 'selected' : ''; ?>>Mayor cantidad primero</option>
                        <option value="total_asc"   <?php echo $ordenActual === 'total_asc'   ? 'selected' : ''; ?>>Menor cantidad primero</option>
                    </select>
                    <noscript><button type="submit">Ordenar</button></noscript>
                </form>
            </div>

            <!-- Renderizado de tarjetas -->
            <?php foreach ($elementos as $item): ?>
                <?php
                $total    = $item['total'];
                $etiqueta = ($total === 1) ? $config['etiqueta_sing'] : $config['etiqueta_plur'];
                ?>
                <div class="tarjeta-item">
                    <img src="<?php echo htmlspecialchars($item['imagen']); ?>"
                         alt="<?php echo htmlspecialchars($item['nombre']); ?>"
                         class="item-imagen">

                    <div class="item-form">
                        <!-- titulo = botón dentro de un formulario POST -->
                        <form action="index.php" method="POST">
                            <button type="submit" name="elemento"
                                    value="<?php echo htmlspecialchars($item['nombre']); ?>"
                                    class="item-titulo-btn">
                                <?php echo htmlspecialchars($item['nombre']); ?>
                            </button>
                        </form>
                        <div class="item-subtitulo"><?php echo htmlspecialchars($item['detalle']); ?></div>
                    </div>

                    <span class="item-contador">
                        <?php echo $total . " " . htmlspecialchars($etiqueta); ?>
                    </span>
                </div>
            <?php endforeach; ?>
        </div>

        </body>
        </html>
        <?php
    }

    /*Vista detalle de un elemento. Recibe todo ya calculado*/
    public function renderizarDetalle(array $config, array $elemento, array $estadisticas): void {
        $total    = $estadisticas['total'];
        $etiqueta = ($total === 1) ? $config['etiqueta_sing'] : $config['etiqueta_plur'];
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo htmlspecialchars($elemento['nombre']); ?></title>
            <?php $this->estilos(); ?>
        </head>
        <body>

        <div class="container">

            <!-- Cabecera -->
            <div class="detalle-cabecera">
                <img src="<?php echo htmlspecialchars($elemento['imagen']); ?>"
                     alt="<?php echo htmlspecialchars($elemento['nombre']); ?>"
                     class="detalle-imagen">
                <h1><?php echo htmlspecialchars($elemento['nombre']); ?></h1>
            </div>

            <!-- Panel de metadatos principales -->
            <div class="panel">
                <p><?php echo htmlspecialchars($elemento['detalle']); ?></p>
            </div>

            <!-- Bloque resumen con estadísticas del controlador -->
            <div class="panel">
                <h2>Resumen</h2>
                <p class="total-resumen">
                    Total: <?php echo $total . " " . htmlspecialchars($etiqueta); ?>
                </p>

                <?php if (empty($estadisticas['desglose'])): ?>
                    <p class="mensaje-vacio">No hay datos para desglosar.</p>
                <?php else: ?>
                    <?php foreach ($estadisticas['desglose'] as $fila): ?>
                        <div class="fila-stat">
                            <div class="fila-stat-texto">
                                <span><?php echo htmlspecialchars($fila['categoria']); ?></span>
                                <span><?php echo $fila['cantidad']; ?> (<?php echo $fila['porcentaje']; ?>%)</span>
                            </div>
                            <div class="barra-fondo">
                                <div class="barra-relleno" style="width: <?php echo $fila['porcentaje']; ?>%;"></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- Listado de subelementos -->
            <h2>Listado completo</h2>
            <?php if (empty($elemento['subelementos'])): ?>
                <p class="mensaje-vacio">Este elemento no tiene <?php echo htmlspecialchars($config['etiqueta_plur']); ?>.</p>
            <?php else: ?>
                <?php foreach ($elemento['subelementos'] as $sub): ?>
                    <div class="tarjeta-item">
                        <div class="item-form">
                            <div class="sub-nombre"><?php echo htmlspecialchars($sub['nombre']); ?></div>
                            <div class="item-subtitulo"><?php echo htmlspecialchars($sub['detalle']); ?></div>
                        </div>
                        <span class="item-contador"><?php echo htmlspecialchars($sub['categoria']); ?></span>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <a href="index.php" class="btn-volver">&larr; Volver al listado</a>
        </div>

        </body>
        </html>
        <?php
    }
}