<?php
//CRUD yra pilnas 
$host = '127.0.0.1';
$db   = 'linkin_park';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
// prisijungimas prie duomenu bazes
$pdo = new PDO($dsn, $user, $pass, $options);
// R is CRUD
// norėdami nuskaityti iš duomenų bazės kažką, mes naudojame komandą select

// C SQL INSERT INTO Statement
// INSERT INTO table_name (column1, column2, column3, ...)
// VALUES (value1, value2, value3, ...);
$sql = "INSERT INTO
trees 
(title, height, `type`)
VALUES 
('Agrastas', 0.2, 2)
";

$pdo->query($sql);

// D SQL DELETE Statement
// DELETE FROM table_name WHERE condition;
// trynimas visos eilutes (eilutes ID yra 16 bus WHERE id = 16)
// istrins visus kuriu ID didesni uz 16 (bus WHERE ID > 16)
$sql = "DELETE FROM
trees
WHERE ID > 16 AND id < 20
";

$pdo->query($sql);


// U The SQL UPDATE Statement
// UPDATE table_name
// SET column1 = value1, column2 = value2, ...
// WHERE condition;
// kodas parasytas perrasyti-UPDATE- 'slyva' kuriu id bus didesnis uz 40
$sql = "UPDATE
trees
SET title = 'Slyva'
WHERE id > 40
";

$pdo->query($sql);


$sql = "SELECT
id, title, height, `type`
FROM
trees; 
";

// naudojame pdo metodą query metodu.
// $sql perduos i PDO 
// ir PDO perduos i duomenu baze 
//ir duomenu baze grazins atsakyma pareiskimo pavidale $stmt
$stmt = $pdo->query($sql);

echo '<ul>';

while ($row = $stmt->fetch()) {
    echo '<li>' . ' ' . $row['id'] . ' ' . $row['title'] . ' ' . $row['height'] . ' ' . $row['type'] . '</li>';
}
echo '</ul>';
