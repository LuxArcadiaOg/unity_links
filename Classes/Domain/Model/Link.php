<?php

namespace Arcadia\UnityLinks\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Link extends AbstractEntity
{
    /**
     * @var string
     */
    protected string $title = '';

    /**
     * @var string
     */
    protected string $href = '';

    /**
     * @var Storage|null
     */
    protected ?Storage $storage;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getHref(): string
    {
        return $this->href;
    }

    /**
     * @param string $href
     * @return void
     */
    public function setHref(string $href): void
    {
        $this->href = $href;
    }

    /**
     * @return Storage|null
     */
    public function getStorage(): ?Storage
    {
        return $this->storage;
    }

    /**
     * @param Storage|null $storage
     * @return void
     */
    public function setStorage(?Storage $storage): void
    {
        $this->storage = $storage;
    }
}
