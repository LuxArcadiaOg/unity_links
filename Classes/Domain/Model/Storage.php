<?php

namespace Arcadia\UnityLinks\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Storage extends AbstractEntity
{
    /**
     * @var string
     */
    protected string $name = '';

    /**
     * @var string
     */
    protected string $slug = '';

    /**
     * @var ObjectStorage<Link>
     */
    protected ObjectStorage $links;

    /**
     * @var string
     */
    protected string $description = '';

    /**
     * @var LazyLoadingProxy|FileReference|null
     * @Lazy
     */
    protected LazyLoadingProxy|FileReference|null $profileImage;

    /**
     * @var int|null
     */
    protected ?int $user = null;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return void
     */
    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return ObjectStorage
     */
    public function getLinks(): ObjectStorage
    {
        return $this->links;
    }

    /**
     * @param ObjectStorage<Link> $links
     * @return void
     */
    public function setLinks(ObjectStorage $links): void
    {
        $this->links = $links;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return FileReference|null
     */
    public function getProfileImage(): ?FileReference
    {
        if ($this->profileImage instanceof LazyLoadingProxy) {
            /** @var FileReference $profileImage */
            $profileImage = $this->profileImage->_loadRealInstance();
            $this->profileImage = $profileImage;
        }

        return $this->profileImage;
    }

    /**
     * @param FileReference $profileImage
     * @return void
     */
    public function setProfileImage(FileReference $profileImage): void
    {
        $this->profileImage = $profileImage;
    }

    /**
     * @return int|null
     */
    public function getUser(): ?int
    {
        return $this->user;
    }

    /**
     * @param int|null $user
     */
    public function setUser(?int $user): void
    {
        $this->user = $user;
    }
}
