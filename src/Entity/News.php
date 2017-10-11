<?php
// src/Entity/News.php

/**
 * News
 *
 * @Entity @Table(name="news")
 */
class News
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
     * @Column(name="category_id", type="integer")
     */
    private $categoryId;

    /**
     * @var string
     *
     * @Column(name="title", type="string", length=127)
     */
    private $title;

    /**
     * @var string
     *
     * @Column(name="title_image", type="string", length=127, nullable=true)
     */
    private $titleImage;

    /**
     * @var string
     *
     * @Column(name="content", type="text")
     */
    private $content;

    /**
     * @var int
     *
     * @Column(name="total_views", type="integer")
     */
    private $totalViews;

    /**
     * @var int
     *
     * @Column(name="created", type="integer")
     */
    private $created;

    /**
     * @var int
     *
     * @Column(name="author_id", type="integer")
     */
    private $authorId;

    /**
     * @var string
     *
     * @Column(name="tag_set", type="string", length=255)
     */
    private $tagSet;
	
	/**
     * @var int
     *
     * @Column(name="tree_id", type="integer")
     */
    private $treeId;
	
	/**
     * @var boolean
     *
     * @Column(name="is_removed", type="boolean")
     */
    private $isRemoved;
	
	public function __construct()
	{
		$this->totalViews = 0;
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
     * Set categoryId
     *
     * @param integer $categoryId
     * @return News
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * Get categoryId
     *
     * @return integer 
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return News
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set titleImage
     *
     * @param string $titleImage
     * @return News
     */
    public function setTitleImage($titleImage)
    {
        $this->titleImage = $titleImage;

        return $this;
    }

    /**
     * Get titleImage
     *
     * @return string 
     */
    public function getTitleImage()
    {
        return $this->titleImage;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return News
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set totalViews
     *
     * @param integer $totalViews
     * @return News
     */
    public function setTotalViews($totalViews)
    {
        $this->totalViews = $totalViews;

        return $this;
    }

    /**
     * Get totalViews
     *
     * @return integer 
     */
    public function getTotalViews()
    {
        return $this->totalViews;
    }

    /**
     * Set created
     *
     * @param integer $created
     * @return News
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return integer 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set authorId
     *
     * @param integer $authorId
     * @return News
     */
    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;

        return $this;
    }

    /**
     * Get authorId
     *
     * @return integer 
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }

    /**
     * Set tagSet
     *
     * @param string $tagSet
     * @return News
     */
    public function setTagSet($tagSet)
    {
        $this->tagSet = $tagSet;

        return $this;
    }

    /**
     * Get tagSet
     *
     * @return string 
     */
    public function getTagSet()
    {
        return $this->tagSet;
    }

    /**
     * Set treeId
     *
     * @param integer $treeId
     * @return News
     */
    public function setTreeId($treeId)
    {
        $this->treeId = $treeId;

        return $this;
    }

    /**
     * Get treeId
     *
     * @return integer 
     */
    public function getTreeId()
    {
        return $this->treeId;
    }

    /**
     * Set isRemoved
     *
     * @param boolean $isRemoved
     * @return News
     */
    public function setIsRemoved($isRemoved)
    {
        $this->isRemoved = $isRemoved;

        return $this;
    }

    /**
     * Get isRemoved
     *
     * @return boolean 
     */
    public function getIsRemoved()
    {
        return $this->isRemoved;
    }
}
