<?PHP
@session_start();

$host = 'localhost';
$db   = 'phpfront';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';



$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
];
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$pdo = array();
try {
    $pdo = new \PDO($dsn, $user, $pass, $options);
        //print "connected !\n";
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

if(isset($_SERVER['SERVER_NAME']))
	$baseurl = "https://".$_SERVER['SERVER_NAME']."/";
else
	$baseurl = "http://localhost/";
$p = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
?>
