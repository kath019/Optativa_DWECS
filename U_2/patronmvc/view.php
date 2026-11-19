<!--pinta HTML(no calcula nada llama al método pedido)-->
<?php
class View {
    public function renderizar(array $config, array $elementos, string $ordenActual): void {
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo htmlspecialchars($config['titulo_pagina']); ?></title>
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
                .item-titulo-btn {
                    background: none;
                    border: none;
                    color: #0f172a;
                    font-size: 18px;
                    font-weight: 600;
                    padding: 0;
                    text-align: left;
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
            </style>
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
                        <div class="item-titulo-btn"><?php echo htmlspecialchars($item['nombre']); ?></div>
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
}