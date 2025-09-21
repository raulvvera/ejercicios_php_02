<?php
// juego.php
// Lógica del juego "Apuesta y gana"

function h($s){ return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

// Valores seguros
$money = 0.0;
$game_over = false;
$message = '';
$image = '';
$show_restart = false;

// Si vienen desde el formulario inicial
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Si el jugador ha elegido "Cobrar" (acción de cobrar)
    if (isset($_POST['action']) && $_POST['action'] === 'cashout') {
        $money = isset($_POST['money']) ? (float) $_POST['money'] : 0.0;
        $message = "Has cobrado " . number_format($money, 2, ',', '.') . " € — ¡buena jugada!";
        $show_restart = true;
        $game_over = true;
    } else {
        // Determinamos la cantidad que tiene el jugador ahora:
        if (isset($_POST['initial_money'])) {
            // primera vez
            $money = (float) $_POST['initial_money'];
        } elseif (isset($_POST['money'])) {
            // siguiente rondas: traemos la cantidad desde un hidden input
            $money = (float) $_POST['money'];
        } else {
            // sin datos -> volver al inicio
            header("Location: index.html");
            exit;
        }

        // Validaciones básicas
        if ($money <= 0) {
            $message = "No tienes dinero para jugar. Introduce una cantidad válida.";
            $show_restart = true;
            $game_over = true;
        } else {
            // Realizamos la tirada aleatoria (0=calavera,1=limón,2=gato)
            // Usamos random_int para mayor calidad criptográfica (buen detalle desde ciberseguridad 😉)
            $pick = random_int(0, 2);

            if ($pick === 0) {
                // Calavera: pierde todo -> fin de la partida
                $money = 0.0;
                $message = "💀 ¡Calavera! Has perdido todo tu dinero.";
                $image = "img/calavera.webp";
                $game_over = true;
                $show_restart = true;
            } elseif ($pick === 1) {
                // Medio limón: pierde la mitad, puede seguir o cobrar
                $money = round($money / 2.0, 2);
                $message = "🍋 Medio limón: pierdes la mitad. Puedes seguir o cobrar.";
                $image = "img/limon.jpeg";
            } else {
                // Gato de la suerte: duplica y puede seguir o cobrar
                $money = round($money * 2.0, 2);
                $message = "🐱 Gato de la suerte: tu dinero se duplica. Puedes seguir o cobrar.";
                $image = "img/gato.jpeg";
            }
        }
    }
} else {
    // Si se accede por GET, redirigimos al inicio
    header("Location: index.html");
    exit;
}

// Renderizamos HTML
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Apuesta y Gana — Resultado</title>
  <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
  <main class="container">
    <h1>🎲 Apuesta y Gana</h1>

    <div class="card result-card result-wrap">
      <p class="lead"><?php echo h($message); ?></p>

      <?php if ($image): ?>
        <img src="<?php echo h($image); ?>" alt="Resultado" class="result-image">
      <?php endif; ?>

      <p><strong>Saldo actual: <?php echo number_format($money, 2, ',', '.'); ?> €</strong></p>

      <?php if ($game_over): ?>
        <div class="actions-inline">
          <form action="index.html" method="get">
            <button class="btn" type="submit">↺ Volver a empezar</button>
          </form>
        </div>
      <?php else: ?>
        <!-- Form para seguir jugando: manda la cantidad actual de nuevo -->
        <div class="actions-inline">
          <form action="juego.php" method="post" style="display:inline;">
            <input type="hidden" name="money" value="<?php echo h(number_format($money, 2, '.', '')); ?>">
            <button class="btn" type="submit">🔁 Seguir jugando</button>
          </form>

          <form action="juego.php" method="post" style="display:inline;">
            <input type="hidden" name="money" value="<?php echo h(number_format($money, 2, '.', '')); ?>">
            <input type="hidden" name="action" value="cashout">
            <button type="submit" class="small-btn">💶 Cobrar</button>
          </form>

          <form action="index.html" method="get" style="display:inline;">
            <button class="small-btn" type="submit">⤺ Reiniciar</button>
          </form>
        </div>
      <?php endif; ?>

      <p class="note" style="margin-top:12px;">Empresa colaboradora de Diego Raúl Vázquez Vera</p>
    </div>
  </main>
  <div>
      <a href="../"><button>Volver</button></a>
    </div>
</body>
</html>
