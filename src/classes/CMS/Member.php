<?php
namespace Lexiconiac\CMS;

class Member
{
    protected $db;                                       // Holds ref to Database object

    public function __construct(Database $db)
    {
        $this->db = $db;                                 // Add ref to Database object
    }

    // Get individual member by id
    public function get(int $id)
    {
        $sql = "SELECT id, username, email, joined, role
                FROM member
                WHERE id = :id;";                         // SQL to get member
        return $this->db->runSQL($sql, [$id])->fetch();  // Return member
    }

    // Get details of all members
    public function getAll(): array
    {
        $sql = "SELECT id, username, email, joined, role
                FROM member;";                           // SQL to get all members
        return $this->db->runSQL($sql)->fetchAll();      // Return all members
    }

     // Get individual member data using their email
     public function getIdByEmail(string $email)
     {
         $sql = "SELECT id
                 FROM member
                 WHERE email = :email;";     // SQL query to get member id
         return $this->db->runSQL($sql, [$email])->fetchColumn(); // Run SQL and return member id
     }

     // Login: returns member data if authenticated, false if not
    public function login(string $email, string $password)
    {
        $sql = "SELECT id, username, email, password, joined, role 
                FROM member 
                WHERE email = :email;";                         // SQL to get member data
        $member = $this->db->runSQL($sql, [$email])->fetch();    // Run SQL
        if (!$member) {                                          // If no member found
            return false;                                        // Return false
        }                                                        // Otherwise
        $authenticated = password_verify($password, $member['password']); // Passwords match?
        return ($authenticated ? $member : false);               // Return member or false
    }

    // Get total number of members
    public function count(): int
    {
        $sql = "SELECT COUNT(id) FROM member;";                  // SQL to count number of members
        return $this->db->runSQL($sql)->fetchColumn();      // Run SQL and return count
    }

    // Create a new member
    public function create(array $member): bool
    {
        $member['password'] = password_hash($member['password'], PASSWORD_DEFAULT);  // Hash password
        try {                                                          // Try to add member
            $sql = "INSERT INTO member (username, email, password) 
                    VALUES (:username, :email, :password);";           // SQL to add member
            $this->db->runSQL($sql, $member);          // Run SQL
            return true;                                               // Return true
        } catch (\PDOException $e) {                                   // If PDOException thrown
            error_log("Database error: " . $e->getMessage()); // Log full error
            if ($e->errorInfo[1] === 1062) {                           // If error indicates duplicate entry
                return false;                                          // Return false to indicate duplicate name
            }   
            return false;                                                       // Otherwise
            throw $e;                                                  // Re-throw exception
        }
    }

    // Update an existing member
    public function update(array $member): bool
    {
        unset($member['joined']);                                     // Remove joined from array
        try {                                                         // Try to update member
            $sql = "UPDATE member 
                    SET username = :username, email = :email, role = :role 
                    WHERE id = :id;";                                // SQL to update member
            $this->db->runSQL($sql, $member);                         // Run SQL
            return true;                                              // Return true
        } catch (\PDOException $e) {                                  // If PDOException thrown
            if ($e->errorInfo[1] == 1062) {                           // If a duplicate (email in use)
                return false;                                         // Return false
            }                                                         // Any other error
            throw $e;                                                 // Re-throw exception
        }
    }

}