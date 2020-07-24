<?php
    namespace App\Controllers;
    
    require_once 'vendor/autoload.php';
    
    use App\Core\DatabaseConnection;
    use App\Models\BookModel;
    use App\Models\UserModel;
    use App\Core\Controller;

    class MainController extends Controller {

        public function home(){
            $bookModel = new BookModel($this->getDatabaseConnection());
            $books = $bookModel->getAll();
            $this->set('books', $books);
            $this->userLoggedIn();
        }

        public function category(string $category){
            $bookModel = new BookModel($this->getDatabaseConnection());
            $books = $bookModel->getBooksInCategory($category);
            $this->set('books', $books);
            $this->userLoggedIn();
        }

        public function sorted(string $type){
            $bookModel = new BookModel($this->getDatabaseConnection());
            $books = $bookModel->getBookSorted($type);
            $this->set('books', $books);
            $this->userLoggedIn();
        }

        public function search(string $term){
            $bookModel = new BookModel($this->getDatabaseConnection());
            $books = $bookModel->searchBook($term);
            $this->set('books', $books);
            $this->userLoggedIn();
        }

        public function getRegister(){
            $loggedIn = $this->userLoggedInStatus();
            if($loggedIn == 'true'){
                $this->redirect('/');
            }
        }

        public function postRegister(){
            $email = \filter_input(INPUT_POST,'register_email',FILTER_SANITIZE_EMAIL);
            $name = \filter_input(INPUT_POST,'register_name',FILTER_SANITIZE_STRING);
            $surname = \filter_input(INPUT_POST,'register_surname',FILTER_SANITIZE_STRING);
            $password1 = \filter_input(INPUT_POST,'register_password1',FILTER_SANITIZE_STRING);
            $password2 = \filter_input(INPUT_POST,'register_password2',FILTER_SANITIZE_STRING);
            
            if($password1 !== $password2){
                $this->set('message',"Passwords must match! Try again");
                return;
            }

            if(!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$#', $password1)){
                $this->set('message',"Password must containt one big, one small letter and one number!(Minimum 8 characters)! Try again");
                return;
            }
            
            $userModel = new UserModel($this->getDatabaseConnection());
            $user = $userModel->getUserByEmail($email);

            if($user){
                $this->set('message',"You are already registered! Try again with different email or log in!");
                return;
            }

            $passwordHash = password_hash($password1, PASSWORD_DEFAULT);

            $user = $userModel->addUser([
                ':email' => $email,
                ':userName' => $name,
                ':surname' => $surname,
                ':password_hash' => $passwordHash
            ]);
            if(!$user){
                $this->set('message',"Something went wrong! Try again later!");
                return;
            }
            $this->set('message',"Account is made. You are free to log in!");
        }

        public function contact(){
            $this->userLoggedIn();
        }

        public function about(){
            $this->userLoggedIn();
        }

        public function cart(){
            $loggedIn = $this->userLoggedInStatus();
            if($loggedIn == 'false'){
                $this->redirect('/');
            }
            else{
                $this->userLoggedIn();
            }
        }

        public function getLogin(){
            $loggedIn = $this->userLoggedInStatus();
            if($loggedIn == 'true'){
                $this->redirect('/');
            }
        }

        public function postLogin(){
            $email = \filter_input(INPUT_POST,'login_email',FILTER_SANITIZE_EMAIL);
            $password = \filter_input(INPUT_POST,'login_password',FILTER_SANITIZE_STRING);
            
            if(!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$#', $password)){
                $this->set('message',"Wrong format! Password must containt one big, one small letter and one number!(Minimum 8 characters)! Try again.");
                return;
            }
            
            $userModel = new UserModel($this->getDatabaseConnection());
            $user = $userModel->getUserByEmail($email);

            if(!$user){
                $this->set('message',"Wrong email / password! Try again.");
                return;
            }

            if(!password_verify($password, $user->password_hash)){
                sleep(1);
                $this->set('message',"Wrong email / password! Try again.");
                return;
            }

            $this->getSession()->put('user_id',$user->user_id);
            $this->getSession()->save();
            $this->redirect('/');
        }

        public function getLogout(){
            $this->getSession()->clear();
            $this->getSession()->save();
            $this->redirect('/');
        }

        public function userLoggedIn(){
            $loggedIn = $this->userLoggedInStatus();
            $this->set('user', $loggedIn);
        }
    }