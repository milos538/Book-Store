<?php
    namespace App\Controllers;
    
    require_once 'vendor/autoload.php';
    
    use App\Core\DatabaseConnection;
    use App\Models\BookModel;
    use App\Core\Controller;
    use App\Core\ApiController;


    class CartController extends ApiController {

        public function getBookmarks(){
            $bookmarks = $this->getSession()->get('bookmarks',[]);
            $this->set('bookmarks', $bookmarks);
        }

        public function addBookmark($bookId){
            $bookModel = new BookModel($this->getDatabaseConnection());
            $book = $bookModel->getBookById($bookId);

            if(!$book){
                return;
            }

            $bookmarks = $this->getSession()->get('bookmarks', []);
            if($bookmarks){
                foreach($bookmarks as $bookmark){
                    if($bookmark == $book){
                        return;
                    }
                }
            }
            $bookmarks[] = $book;
            $this->getSession()->put('bookmarks', $bookmarks);
        }

        public function clear(){
            $this->getSession()->put('bookmarks', []);
        }

    }