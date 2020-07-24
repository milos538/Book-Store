<?php
    namespace App\Models;

    use App\Core\DatabaseConnection;
    use App\Core\DatabaseConfiguration;
    use \PDO;

    class BookModel{
        private $dbc;

        public function __construct(DatabaseConnection &$dbc){
            $this->dbc = $dbc;
        }

        public function getAll(){
            $sql = "SELECT * FROM books.knjiga order by RAND() LIMIT 0,1000";
            $prep = $this->dbc->getConnection()->prepare($sql);
            $res = $prep->execute();
            $books = [];

            if($res){
                $books = $prep->fetchAll(PDO::FETCH_OBJ);
            }
            
            return $books;
        }

        public function getBookById(int $bookId){
            $sql = "SELECT knjiga.knjiga_id,knjiga.naziv,knjiga.godina,knjiga.cena,knjiga.isbn,knjiga.opis,knjiga.slika,knjiga.kategorija_id,knjiga_pisac.pisac_id,pisac.ime,pisac.prezime FROM books.knjiga JOIN knjiga_pisac ON knjiga_pisac.knjiga_id = knjiga.knjiga_id JOIN pisac ON knjiga_pisac.pisac_id = pisac.pisac_id WHERE knjiga.knjiga_id = ?";
            $prep = $this->dbc->getConnection()->prepare($sql);
            $res = $prep->execute(array($bookId));
            $books = [];

            if($res){
                $books = Array($prep->fetch(PDO::FETCH_OBJ));
            }
            
            return $books;
        }

        public function getBooksInCategory(string $category){
            $sql = "SELECT * FROM books.knjiga,books.kategorija WHERE knjiga.kategorija_id = kategorija.kategorija_id AND kategorija.imekat = ? ORDER BY RAND() LIMIT 0,30";
            $prep = $this->dbc->getConnection()->prepare($sql);
            $res = $prep->execute(array($category));
            $books = [];

            if($res){
                $books = $prep->fetchAll(PDO::FETCH_OBJ);
            }
            
            return $books;
        }

        public function getBookSorted(string $type){
            $sql;
            switch($type){
                case 'priceu':
                    $sql = "SELECT * FROM knjiga ORDER BY cena";
                    break;
                case 'priced':
                    $sql = "SELECT * FROM knjiga ORDER BY cena DESC";
                    break;
                case 'nameu':
                    $sql = "SELECT * FROM knjiga ORDER BY knjiga.naziv";
                    break;
                case 'named':
                    $sql = "SELECT * FROM knjiga ORDER BY knjiga.naziv DESC";
                    break;
            }
            $prep = $this->dbc->getConnection()->prepare($sql);
            $res = $prep->execute();
            $books = [];

            if($res){
                $books = $prep->fetchAll(PDO::FETCH_OBJ);
            }
            
            return $books;
        }
        public function searchBook(string $term){
            $searchedTerm = substr($term,7);
            $sql = "SELECT * FROM books.knjiga JOIN knjiga_pisac ON knjiga_pisac.knjiga_id = knjiga.knjiga_id JOIN pisac ON knjiga_pisac.pisac_id = pisac.pisac_id WHERE knjiga.naziv LIKE ? OR pisac.ime LIKE ? OR pisac.prezime LIKE ? OR knjiga.isbn LIKE ?";
            $prep = $this->dbc->getConnection()->prepare($sql);
            $res = $prep->execute(array("%$searchedTerm%","%$searchedTerm%","%$searchedTerm%","%$searchedTerm%"));
            $books = [];
            if($res){
                $books = $prep->fetchAll(PDO::FETCH_OBJ);
            }
            return $books;
        }
    }



















?>