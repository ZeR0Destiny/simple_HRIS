<?php
class employee
{
    // Employee properties
    private $id;
    private $first_name;
    private $last_name;
    private $gender;
    private $birth_date;
    private $address;
    private $city;
    private $province;
    private $country;
    private $postal_code;
    private $email;
    private $mobile;
    private $homephone;
    private $sin;
    private $uid;
    private $position;
    private $pay_class;
    private $supervisor;
    private $status;
    private $access;
    private $region;

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
        return $this->first_name;
    }

    public function getLastname()
    {
        return $this->last_name;
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

    public function getSupervisor()
    {
        return $this->supervisor;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getAccess()
    {
        return $this->access;
    }

    public function getRegion()
    {
        return $this->region;
    }

    // ==================== Setters ====================
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setFirstname($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function setLastname($last_name)
    {
        $this->last_name = $last_name;

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

    public function setSupervisor($supervisor)
    {
        $this->supervisor = $supervisor;

        return $this;
    }

    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public function setAccess($access)
    {
        $this->access = $access;

        return $this;
    }

    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }
}
