<?php


class AuthController
{
    private PDO $pdo;

    // The container will automatically inject PDO here
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function showLogin()
    {
        View::render('/page/auth/login', [
            'pageTitle' => 'Login'
        ]);
    }

    public function login()
    {
        $params = [
            'user' => $_POST['username'],
            'password' => $_POST['password']
        ];

        if (!$params['user'] || !$params['password']) {
            View::render('/page/auth/login', [
                'pageTitle' => 'Login',
                'error' => 'Username and password are required.'
            ]);
            return;
        }
  
        // Assume $this->pdo is injected PDO instance available in controller
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE username = ? LIMIT 1");
        $stmt->execute([$params['user']]);
        $user = $stmt->fetch();
     
        if ($user && $params['password'] === $user['password']) {
            $_SESSION['username'] = $user['username'];
            session_regenerate_id(true);
            header("Location: /dashboard");  // redirect to route, not file
            exit();
        } else {
            View::render('/page/auth/login', [
                'pageTitle' => 'Login',
                'error' => 'Invalid username or password.'
            ]);
        }
    }


    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /login');
        exit();
    }

    // public function showRegister()
    // {
    //     View::render('auth/register', [
    //         'pageTitle' => 'Register'
    //     ]);
    // }

    // public function register()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    //         header('Location: /register');
    //         exit();
    //     }

    //     $username = $_POST['username'] ?? '';
    //     $password = $_POST['password'] ?? '';

    //     // TODO: Validate input and save to DB
    //     // This is just an example
    //     if (strlen($username) < 3 || strlen($password) < 6) {
    //         View::render('auth/register', [
    //             'pageTitle' => 'Register',
    //             'error' => 'Invalid input.'
    //         ]);
    //     } else {
    //         // Simulate success
    //         header('Location: /login');
    //         exit();
    //     }
    // }
}
