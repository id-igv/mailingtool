<?php
// src/Entity/Subscriber.php

/**
 * Subscriber
 *
 * @Entity @Table(name="subscribers")
 */
class Subscriber
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
     * @var int
     *
     * @Column(name="email", type="string", unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @Column(name="category_list", type="string", length=255)
     */
    private $categoryList;
	
	/**
     * @var string
     *
     * @Column(name="undo_key", type="string", length=255)
     */
    private $undoKey;


    public function __construct()
	{
		$this->undoKey = md5(uniqid());
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
     * Set email
     *
     * @param string $email
     * @return Subscriber
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
     * Set categoryList
     *
     * @param string $categoryList
     * @return Subscriber
     */
    public function setCategoryList($categoryList)
    {
        $this->categoryList = $categoryList;

        return $this;
    }

    /**
     * Get categoryList
     *
     * @return string 
     */
    public function getCategoryList()
    {
        return $this->categoryList;
    }

    /**
     * Set undoKey
     *
     * @param string $undoKey
     * @return Subscriber
     */
    public function setUndoKey($undoKey)
    {
        $this->undoKey = $undoKey;

        return $this;
    }

    /**
     * Get undoKey
     *
     * @return string 
     */
    public function getUndoKey()
    {
        return $this->undoKey;
    }
}
