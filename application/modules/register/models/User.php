<?php

namespace register\models;

/**
 * @Entity
 * @Table(name="user")
 */
class User {

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;
    /**
     * @Column(type="string", length=255, nullable=false)
     */
    private $name;
    /**
     * @Column(type="string", length=255)
     */
    private $address;
        /**
     * @Column(type="string", length=255)
     */
    private $username;
        /**
     * @Column(type="string", length=255)
     */
    private $password;
    
    public function id() {
        return $this->id;
    }
    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

        public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

}

