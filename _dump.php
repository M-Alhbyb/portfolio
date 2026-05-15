<?php
require_once __DIR__ . '/app/Config/database.php';

$config = require __DIR__ . '/app/Config/database.php';
$driver = $config['driver'] ?? 'pgsql';
$host = $config['host'] ?? 'localhost';
$port = $config['port'] ?? ($driver === 'pgsql' ? 5432 : 3306);
$dbname = $config['dbname'] ?? 'portfolio';
$user = $config['user'] ?? 'admin';
$pass = $config['pass'] ?? '';

$dsn = "{$driver}:host={$host};port={$port};dbname={$dbname}";
$pdo = new PDO($dsn, $user, $pass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);

function quote($val): string {
    if ($val === null) return 'NULL';
    return "'" . str_replace("'", "''", $val) . "'";
}

function dump_table(PDO $pdo, string $table, array $columns, string $order = 'id'): string {
    $sql = "SELECT * FROM {$table} ORDER BY {$order}";
    $rows = $pdo->query($sql)->fetchAll();
    if (empty($rows)) return '';

    $colList = implode(",\n    ", array_map(fn($c) => "    {$c}", $columns));
    $out = "INSERT INTO {$table} (\n{$colList}\n) VALUES\n";

    $parts = [];
    foreach ($rows as $row) {
        $vals = implode(",\n    ", array_map(fn($c) => '    ' . quote($row[$c]), $columns));
        $parts[] = "(\n{$vals}\n)";
    }
    $out .= implode(",\n", $parts) . "\nON CONFLICT DO NOTHING;\n";
    return $out;
}

echo "BEGIN;\n\n";

echo "TRUNCATE TABLE projects RESTART IDENTITY CASCADE;\n";
echo "TRUNCATE TABLE posts RESTART IDENTITY CASCADE;\n";
echo "TRUNCATE TABLE skills RESTART IDENTITY CASCADE;\n";
echo "TRUNCATE TABLE timeline RESTART IDENTITY CASCADE;\n";
echo "TRUNCATE TABLE settings RESTART IDENTITY CASCADE;\n\n";

$projectCols = ['id','user_id','title','slug','short_description','content','tech_stack','architecture_details','deployment_notes','challenges','outcomes','thumbnail','status','featured','sort_order','created_at'];
echo dump_table($pdo, 'projects', $projectCols);

$postCols = ['id','user_id','title','slug','content','excerpt','featured_image','status','locale','published_at'];
echo dump_table($pdo, 'posts', $postCols);

$skillCols = ['id','name','category','proficiency','icon','sort_order'];
echo dump_table($pdo, 'skills', $skillCols);

$timelineCols = ['id','type','period','title','organization','description','place','work_type','link','logo','sort_order'];
echo dump_table($pdo, 'timeline', $timelineCols);

echo dump_table($pdo, 'volunteering', ['id','title','organization','description','place','start_date','end_date','link','sort_order']);

echo dump_table($pdo, 'languages', ['id','name','proficiency','sort_order']);

$settingCols = ['id','key','value','group_name','locale'];
echo dump_table($pdo, 'settings', $settingCols);

echo "COMMIT;\n";
