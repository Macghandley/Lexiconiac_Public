<?php
namespace Lexiconiac\CMS;
class CMS
{
    protected $db     = null;                   // Stores reference to Database object
    protected $config = null;                   // Stores reference to Config object
    protected $word   = null;                   // Stores reference to Word object
    protected $source = null;                   // Stores reference to Source object
    protected $member = null;                   // Stores reference to Member object
    protected $session   = null;                // Stores reference to Session object
    protected $token     = null;                // Stores reference to Token object

    public function __construct($dsn, $username, $password, $config)
    {
        $this->db = new Database($dsn, $username, $password); // Create Database object
        $this->config = $config;
    }

    public function getWord()
    {
        if ($this->word === null) {                     // If $word property null
            $this->word = new Word($this->db, $this->config);          // Create Word object
        }
        return $this->word;                             // Return Word object
    }

    public function getSource()
    {
        if ($this->source === null) {                   // If $source property null
            $this->source = new Source($this->db);      // Create Source object
        }
        return $this->source;                           // Return Source object
    }

    public function getMember()
    {
        if ($this->member === null) {                   // If $member property null
            $this->member = new Member($this->db);      // Create Member object
        }
        return $this->member;                           // Return Member object
    }

    public function getSession()
    {
        if ($this->session === null) {                   // If $session property null
            $this->session = new Session();              // Create Session object
        }
        return $this->session;                           // Return Session object
    }

    public function getToken()
    {
        if ($this->token === null) {                     // If $token property null
            $this->token = new Token($this->db);         // Create Token object
        }
        return $this->token;                             // Return Token object
    }
}