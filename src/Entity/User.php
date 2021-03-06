<?php
// src/Entity/User.php

/**
 * User
 *
 * @Entity @Table(name="users")
 */
class User
{
    /**
     * @var int
     *
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @Column(name="username", type="string", length=25, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @Column(name="email", type="string", length=64, unique=true)
     */
    private $email;

    /**
     * @var string
     * password
     *
     * @Column(name="pwd", type="string", length=64)
     */
    private $password;
	
    /**
     * @var string
     *
     * @Column(name="roles", type="string")
     */
    private $roles;
    
    /**
     * @var string
     *
     * @Column(name="realname", type="string", length=64)
     */
    private $realName;
    
    /**
     * @var boolean
     * 
     * @Column(name="is_active", type="boolean")
     */
    private $isActive;
    
	/**
     * @var boolean
     * 
     * @Column(name="is_sub", type="boolean")
     */
    private $isSub;
	
    /**
     * Last viewed news
     * 
     * @var string
     * 
     * @Column(name="viewed", type="string", nullable=true)
     */
    private $viewed;
    
    /**
     * Deferred or remembered news
     * 
     * @var string
     * 
     * @Column(name="deferred", type="string", nullable=true)
     */
    private $deferred;
    
	/**
     * Path to profile avatar
     * 
     * @var string
     * 
     * @Column(name="avatar", type="string", nullable=true)
     */
    private $avatar;
	
	/**
     * Registration date as UNIX timestamp
     * 
     * @var string
     * 
     * @Column(name="reg_date", type="integer")
     */
    private $regDate;
    
    public function __construct()
	{
        $this->isActive = true;
		$this->isSub = false;
		$this->roles = "ROLE_USER";
		$this->avatar = "img/profiles/standart/standart";
		$this->regDate = time();
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }
    
    /**
     * Set plainPassword
     *
     * @param string $password
     * @return User
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    /**
     * Get plainPassword
     *
     * @return string 
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function getRoles()
	{
		return explode(',', $this->roles);
    }
	
	public function getRolesAsString()
	{
		return $this->roles;
	}
	
	public function getReadableRoles()
	{
		return str_replace('ROLE_', '', $this->roles);
	}

    /**
     * Set realName
     *
     * @param string $realName
     * @return User
     */
    public function setRealName($realName)
    {
        $this->realName = $realName;

        return $this;
    }

    /**
     * Get realName
     *
     * @return string 
     */
    public function getRealName()
    {
        return $this->realName;
    }
    
    public function getSalt() {
        return null;
    }
    
    public function eraseCredentials()
    {
    }
    
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password
        ));
    }
    
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password
        ) = unserialize($serialized);
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set viewed
     *
     * @param array $viewed
     * @return User
     */
    public function setViewed(array $viewed)
    {
        $this->viewed = implode(';', $viewed);

        return $this;
    }

    /**
     * Get viewed as array which we got after exploding by delimiter
     *
     * @return array 
     */
    public function getViewed()
    {
        return $this->viewed == '' ? [] : explode(';', $this->viewed);
    }

    /**
     * Set deferred
     *
     * @param array $deferred
     * @return User
     */
    public function setDeferred(array $deferred)
    {
        $this->deferred = implode(';', $deferred);

        return $this;
    }

    /**
     * Get deferred as array which we got after exploding by delimiter
     *
     * @return array 
     */
    public function getDeferred()
    {
        return $this->deferred == '' ? [] : explode(';', $this->deferred);
    }

    /**
     * Set roles
     *
     * @param string $roles
     * @return User
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string 
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set regDate
     *
     * @param integer $regDate
     * @return User
     */
    public function setRegDate($regDate)
    {
        $this->regDate = $regDate;

        return $this;
    }

    /**
     * Get regDate
     *
     * @return integer 
     */
    public function getRegDate()
    {
        return $this->regDate;
    }

    /**
     * Set isSub
     *
     * @param boolean $isSub
     * @return User
     */
    public function setIsSub($isSub)
    {
        $this->isSub = $isSub;

        return $this;
    }

    /**
     * Get isSub
     *
     * @return boolean 
     */
    public function getIsSub()
    {
        return $this->isSub;
    }
}
