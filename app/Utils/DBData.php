<?php
namespace myFramework\Utils;
use PDO;
/**
 * Classe permettant de retourner des données stockées dans la base de données
 */
class DBData {
    // Singleton est un patron de conception de création qui garantit que l’instance d’une classe n’existe qu’en un seul exemplaire, tout en fournissant un point d’accès global à cette instance.
    // Instance du singleton
    private static $_instance;
	/** @var PDO */
	private $dbh; // database handler

    /**
     * Constructeur se connectant à la base de données à partir des informations du fichier de configuration
     */
    public function __construct()
    {
        // Récupération des données du fichier de config
        //   la fonction parse_ini_file parse le fichier et retourne un array associatif
        // Attention, "config.conf" ne doit pas être versionné,
        //   on versionnera plutôt un fichier d'exemple "config.dist.conf" ne contenant aucune valeur
        $configData = parse_ini_file(__DIR__.'/../config.dist.conf');
        
        try {
            $this->dbh = new \PDO(
                "mysql:host={$configData['DB_HOST']};dbname={$configData['DB_NAME']};charset=utf8",
                $configData['DB_USERNAME'],
                $configData['DB_PASSWORD'],
                array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING) // Affiche les erreurs SQL à l'écran
            );
        }
        catch(\Exception $exception) {
            echo 'Erreur de connexion...<br>';
            echo $exception->getMessage().'<br>';
            echo '<pre>';
            echo $exception->getTraceAsString();
            echo '</pre>';
            exit;
        }
    }
       /**
     * Renvoi de l'instance et initialisation si nécessaire.
     */
    // Le fait de déclarer des propriétés ou des méthodes comme statiques vous permet d'y accéder sans avoir besoin d'instancier la classe. Ceci peuvent être accédé statiquement depuis une instance d'objet.
    public static function getInstance() {
        // L'instance de Database existe-t-elle dans la propriété static
        if (!(self::$_instance instanceof self))
            // Si non, on l'instancie et on la stocke dans ls dite propriété
            self::$_instance = new self(); // = new DBData();

        // Dans tous les cas, on la retourne
        return self::$_instance;
    }

    /**
     * Getter sur dbh
     */
    public static function getPDO()
    {
        // dbh = PDO
        return self::getInstance()->dbh;
    }
    // Récupération de tous les produits Methode 1
    function getProducts(){
        $sql = "SELECT * FROM product;";
        $result = $this->dbh->query($sql);
        // setFetchMode — Définit le mode de récupération par défaut pour cette requête
        // $product['title']
        $result->setFetchMode(PDO::FETCH_CLASS, 'ProductModel');
        $products = $result->fetchAll();
        return $products;
        // dump($products);
    }
    // requete pour ajouter un produit
    public function addProduct()
    {
    $query = 'INSERT INTO product (`title`,`description`,`picture`,`price`,`updated_at`, `created_at`) VALUES(:titleProduct, :descriptionProduct, :pictureProduct, :priceProduct, :updateProduct, :createProduct)';
     
    $statement =$this->dbh->prepare($query);
    if($_POST){
        $statement->bindValue(':titleProduct', htmlspecialchars($_POST['title']), \PDO::PARAM_STR);
        $statement->bindValue(':descriptionProduct', $_POST['description'], \PDO::PARAM_STR);
        $statement->bindValue(':pictureProduct', $_POST['picture'], \PDO::PARAM_STR);
        $statement->bindValue(':priceProduct', $_POST['price'], \PDO::PARAM_INT);
        $statement->bindValue(':updateProduct', Date('yy/m/d'), \PDO::PARAM_STR);
        $statement->bindValue(':createProduct', Date('yy/m/d'), \PDO::PARAM_STR);
    }
    // var_dump($statement);
    $statement->execute();
    }

}