<?php
$first  = '';
$second = '';
$op     = '+';

$result = null;
$error  = null;

function e(string $text): string {
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

function calculate(float $a, float $b, string $op, ?string &$error): ?float {
    if ($op === '+') return $a + $b;
    if ($op === '-') return $a - $b;
    if ($op === '*') return $a * $b;

    if ($op === '/') {
        if ($b == 0) {
            $error = 'Delenie nulou nie je povolené.';
            return null;
        }
        return $a / $b;
    }

    $error = 'Neznáma operácia.';
    return null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first  = $_POST['a'] ?? '';
    $second = $_POST['b'] ?? '';
    $op     = $_POST['operator'] ?? '+';

    if (!is_numeric($first) || !is_numeric($second)) {
        $error = 'Zadaj platné čísla.';
    } else {
        $a = (float) $first;
        $b = (float) $second;
        $result = calculate($a, $b, $op, $error);
    }
}
?>
<!doctype html>
<html lang="sk">
<head>
  <meta charset="utf-8">
  <title>PHP Kalkulačka</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="card">
    <h2>Kalkulačka</h2>

    <form method="post" id="calcForm">
      <input type="text" name="a" placeholder="Prvé číslo" value="<?= e($first) ?>" required>

      <select name="operator">
        <option value="+" <?= $op === '+' ? 'selected' : '' ?>>+</option>
        <option value="-" <?= $op === '-' ? 'selected' : '' ?>>−</option>
        <option value="*" <?= $op === '*' ? 'selected' : '' ?>>×</option>
        <option value="/" <?= $op === '/' ? 'selected' : '' ?>>÷</option>
      </select>

      <input type="text" name="b" placeholder="Druhé číslo" value="<?= e($second) ?>" required>
      <button type="submit">Vypočítať</button>
    </form>

    <?php if ($result !== null): ?>
      <div class="message">Výsledok: <?= $result ?></div>
    <?php endif; ?>

    <?php if ($error !== null): ?>
      <div class="message error"><?= e($error) ?></div>
    <?php endif; ?>
  </div>

  <script src="js/app.js"></script>
</body>
</html>