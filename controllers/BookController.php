<?php
    namespace App\Controllers;
    
    require_once 'vendor/autoload.php';
    
    use App\Core\DatabaseConnection;
    use App\Models\BookModel;
    use App\Core\Controller;

    class BookController extends Controller {

        public function book(int $bookId){
            $bookModel = new BookModel($this->getDatabaseConnection());
            $book = $bookModel->getBookById($bookId);
            $this->set('books', $book);
            $this->userLoggedIn();
        }

        public function userLoggedIn(){
            $loggedIn = $this->userLoggedInStatus();
            $this->set('user', $loggedIn);
        }
    }