<?php
class MainController {
    private $config;
    private $db;

    public function __construct() {
        $this->config = require __DIR__ . '/../config/config.php';
        try {
            $this->db = new PDO(
                "mysql:host={$this->config['db']['host']};dbname={$this->config['db']['dbname']}",
                $this->config['db']['user'],
                $this->config['db']['pass'],
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (PDOException $e) {
            die("Adatbázis kapcsolódási hiba: " . $e->getMessage());
        }
    }

    public function handleRequest() {
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
        $isLoggedIn = isset($_SESSION['user']);

        // Dinamikus menü láthatóság
        foreach ($this->config['menu'] as $key => &$item) {
            if ($key === 'login') {
                $item['visible'] = !$isLoggedIn;
            } elseif ($key === 'logout' || $key === 'messages') {
                $item['visible'] = $isLoggedIn;
            }
        }

        // Oldal betöltése
        switch ($page) {
            case 'home':
                $this->loadView('home');
                break;
            case 'gallery':
                $this->handleGallery();
                break;
            case 'contact':
                $this->handleContact();
                break;
            case 'messages':
                if ($isLoggedIn) {
                    $this->handleMessages();
                } else {
                    $this->loadView('login');
                }
                break;
            case 'login':
                $this->handleLogin();
                break;
            case 'logout':
                session_destroy();
                header('Location: ' . $this->config['site']['base_url'] . '/index.php?page=home');
                exit;
            default:
                $this->loadView('home');
        }
    }

    private function loadView($view, $data = []) {
        $config = $this->config;
        extract($data);
        require __DIR__ . '/../views/templates/header.php';
        require __DIR__ . "/../views/$view.php";
        require __DIR__ . '/../views/templates/footer.php';
    }

    private function handleLogin() {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'] ?? '';
            if ($action === 'login') {
                $username = $_POST['username'] ?? '';
                $password = $_POST['password'] ?? '';
                $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
                $stmt->execute([$username]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($user && password_verify($password, $user['password'])) {
                    $_SESSION['user'] = [
                        'username' => $user['username'],
                        'firstname' => $user['firstname'],
                        'lastname' => $user['lastname']
                    ];
                    header('Location: ' . $this->config['site']['base_url'] . '/index.php?page=home');
                    exit;
                } else {
                    $error = 'Hibás felhasználónév vagy jelszó!';
                }
            } elseif ($action === 'register') {
                $username = $_POST['username'] ?? '';
                $password = $_POST['password'] ?? '';
                $firstname = $_POST['firstname'] ?? '';
                $lastname = $_POST['lastname'] ?? '';
                if ($username && $password && $firstname && $lastname) {
                    $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
                    $stmt->execute([$username]);
                    if ($stmt->fetch()) {
                        $error = 'A felhasználónév már foglalt!';
                    } else {
                        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                        $stmt = $this->db->prepare("INSERT INTO users (username, password, firstname, lastname) VALUES (?, ?, ?, ?)");
                        $stmt->execute([$username, $hashedPassword, $firstname, $lastname]);
                        $error = 'Sikeres regisztráció! Kérjük, jelentkezzen be.';
                    }
                } else {
                    $error = 'Minden mező kitöltése kötelező!';
                }
            }
        }
        $this->loadView('login', ['error' => $error]);
    }

    private function handleGallery() {
        $error = '';
        $success = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user'])) {
            // Képfeltöltés kezelése
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'public/images/uploads/';
                $fileName = uniqid() . '-' . basename($_FILES['image']['name']);
                $uploadPath = $uploadDir . $fileName;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                    $stmt = $this->db->prepare("INSERT INTO images (filename, user_id) VALUES (?, ?)");
                    $stmt->execute([$fileName, $_SESSION['user']['username']]);
                    $success = 'Kép sikeresen feltöltve!';
                } else {
                    $error = 'Képfeltöltés sikertelen!';
                }
            } else {
                $error = 'Kérjük, válasszon ki egy képet!';
            }

            // Megjegyzés hozzáadása kezelése
            if (isset($_POST['action']) && $_POST['action'] === 'add_comment' && isset($_POST['image_id']) && isset($_POST['comment'])) {
                $imageId = (int)$_POST['image_id'];
                $comment = trim($_POST['comment']);
                if (!empty($comment)) {
                    $stmt = $this->db->prepare("INSERT INTO comments (image_id, user_id, comment) VALUES (?, ?, ?)");
                    $stmt->execute([$imageId, $_SESSION['user']['username'], $comment]);
                    $success = 'Megjegyzés sikeresen hozzáadva!';
                } else {
                    $error = 'A megjegyzés nem lehet üres!';
                }
            }
        }

        // Képek és megjegyzések lekérdezése
        $stmt = $this->db->query("SELECT * FROM images");
        $images = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Megjegyzések lekérdezése minden képhez
        foreach ($images as &$image) {
            $stmt = $this->db->prepare("SELECT * FROM comments WHERE image_id = ? ORDER BY created_at DESC");
            $stmt->execute([$image['id']]);
            $image['comments'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        $this->loadView('gallery', ['images' => $images, 'error' => $error, 'success' => $success]);
    }

    private function handleContact() {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $message = $_POST['message'] ?? '';
            if ($name && filter_var($email, FILTER_VALIDATE_EMAIL) && $message) {
                $sender = isset($_SESSION['user']) ? $_SESSION['user']['username'] : 'Vendég';
                $stmt = $this->db->prepare("INSERT INTO messages (name, email, message, sender) VALUES (?, ?, ?, ?)");
                $stmt->execute([$name, $email, $message, $sender]);
                $this->loadView('confirmation', ['name' => $name, 'email' => $email, 'message' => $message, 'sender' => $sender]);
                return;
            } else {
                $error = 'Kérjük, töltse ki az összes mezőt helyesen!';
            }
        }
        $this->loadView('contact', ['error' => $error]);
    }

    private function handleMessages() {
        $stmt = $this->db->query("SELECT * FROM messages ORDER BY created_at DESC");
        $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->loadView('messages', ['messages' => $messages]);
    }
}
?>