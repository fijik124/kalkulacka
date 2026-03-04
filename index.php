<!doctype html>
<html lang="sk">
<head>
  <meta charset="utf-8">
  <title>Kalkulačka</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="card">
    <h2>Kalkulačka</h2>

    <form id="calcForm">
      <input id="a" type="text" placeholder="Prvé číslo" required>

      <select id="operator">
        <option value="+">+</option>
        <option value="-">−</option>
        <option value="*">×</option>
        <option value="/">÷</option>
      </select>

      <input id="b" type="text" placeholder="Druhé číslo" required>

      <button type="submit">Vypočítať</button>
    </form>

    <div id="message" class="message" aria-live="polite"></div>
  </div>

  <script src="js/app.js"></script>
</body>
</html>