try {
    $mr_cuisto = new PDO('mysql:host=localhost;dbname=mr_cuisto;charset=utf8','colin@localhost','123456');
} catch (PDOException $e) {
    print "Une erreur s'est produite";
    die();
}