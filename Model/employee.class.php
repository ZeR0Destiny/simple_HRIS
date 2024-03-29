<?php
// Employee class that contains properties of an employee
// When adding new properties matching the database, add getters and setters to access the properties
class employee
{
    // Employee properties
    private $id;
    private $firstname;
    private $middlename;
    private $lastname;
    private $preferredname;
    private $gender;
    private $birth_date;
    private $country;
    private $province;
    private $city;
    private $address;
    private $unit;
    private $postal_code;
    private $email;
    private $mobile;
    private $homephone;
    private $sin;
    private $sin_expiration;
    private $uid;
    private $position;
    private $pay_class;
    private $status;
    private $region;
    private $home_store;
    private $language;
    private $start_date;

    public function __construct($array)
    {
        foreach ($array as $employee => $value) {
            $this->$employee = $value;
        }
    }

    // Methods 
    // ==================== Getters ====================
    public function getId()
    {
        return $this->id;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getMiddlename()
    {
        return $this->middlename;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function getPreferredname()
    {
        return $this->preferredname;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getBirthdate()
    {
        return $this->birth_date;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getProvince()
    {
        return $this->province;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getUnit()
    {
        return $this->unit;
    }

    public function getPostalcode()
    {
        return $this->postal_code;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getMobile()
    {
        return $this->mobile;
    }

    public function getHomephone()
    {
        return $this->homephone;
    }

    public function getSin()
    {
        return $this->sin;
    }

    public function getSin_expiration()
    {
        return $this->sin_expiration;
    }

    public function getUid()
    {
        return $this->uid;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function getPayclass()
    {
        return $this->pay_class;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getRegion()
    {
        return $this->region;
    }

    public function getHome_store()
    {
        return $this->home_store;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function getStart_date()
    {
        return $this->start_date;
    }

    // ==================== Setters ====================
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }
    
    public function setMiddlename($middlename)
    {
        $this->middlename = $middlename;

        return $this;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function setPreferredname($preferredname)
    {
        $this->preferredname = $preferredname;

        return $this;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    public function setBirthdate($birth_date)
    {
        $this->birth_date = $birth_date;

        return $this;
    }

    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    public function setProvince($province)
    {
        $this->province = $province;

        return $this;
    }

    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    public function setUnit($unit)
    {
        $this->unit = $unit;

        return $this;
    }

    public function setPostalcode($postal_code)
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    public function setHomephone($homephone)
    {
        $this->homephone = $homephone;

        return $this;
    }

    public function setSin($sin)
    {
        $this->sin = $sin;

        return $this;
    }

    public function setSin_expiraton($sin_expiration)
    {
        $this->sin_expiration = $sin_expiration;

        return $this;
    }

    public function setUid($uid)
    {
        $this->uid = $uid;

        return $this;
    }

    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    public function setPayclass($pay_class)
    {
        $this->pay_class = $pay_class;

        return $this;
    }

    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    public function setHome_store($home_store)
    {
        $this->home_store = $home_store;

        return $this;
    }

    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    public function setStart_date($start_date)
    {
        $this->start_date = $start_date;
        return $this;
    }
}
