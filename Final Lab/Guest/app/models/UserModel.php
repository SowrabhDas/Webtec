<?php
require_once __DIR__ . '/../../database.php';

class UserModel {
    public function findByEmail($email) {
        $db = getDB();
        $stmt = $db->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Create a new user.
     * Returns true on success, false on failure (including duplicate email).
     *
     * Note: role parameter is ignored/enforced to 'user' to prevent
     * privilege escalation via registration form.
     */
    public function create($name, $email, $password, $dob, $phone, $address, $role = 'user') {
        $db = getDB();

        // Enforce role to 'user' regardless of input
        $role = 'user';

        // Check if email already exists
        $stmt = $db->prepare('SELECT id FROM users WHERE email = :email LIMIT 1');
        $stmt->execute(['email' => $email]);
        if ($stmt->fetchColumn()) {
            return false; // caller will treat this as "email already exists"
        }

        // Hash the password
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Insert user
        $stmt = $db->prepare('INSERT INTO users (name, email, password, dob, phone, address, role) VALUES (:name, :email, :password, :dob, :phone, :address, :role)');
        try {
            return (bool)$stmt->execute([
                'name' => $name,
                'email' => $email,
                'password' => $passwordHash,
                'dob' => $dob,
                'phone' => $phone,
                'address' => $address,
                'role' => $role
            ]);
        } catch (PDOException $e) {
            // swallow and return false for controller to handle (log in production)
            return false;
        }
    }
}