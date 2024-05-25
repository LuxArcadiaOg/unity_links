<?php

namespace Arcadia\UnityLinks\Controller;

use Arcadia\UnityLinks\Domain\Model\Storage;
use Arcadia\UnityLinks\Domain\Repository\StorageRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Context\Exception\AspectNotFoundException;
use TYPO3\CMS\Core\Resource\DuplicationBehavior;
use TYPO3\CMS\Core\Resource\Exception\ExistingTargetFileNameException;
use TYPO3\CMS\Core\Resource\Exception\InsufficientFolderAccessPermissionsException;
use TYPO3\CMS\Core\Resource\ResourceFactory;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Http\ForwardResponse;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\Exception\IllegalObjectTypeException;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;

class StorageController extends ActionController
{
    /**
     * @param ResourceFactory $resourceFactory
     * @param StorageRepository $storageRepository
     * @param PersistenceManager $persistenceManager
     * @param Context $context
     */
    public function __construct(
        private readonly ResourceFactory    $resourceFactory,
        private readonly StorageRepository  $storageRepository,
        private readonly PersistenceManager $persistenceManager,
        private readonly Context            $context
    ) {}

    /**
     * @return ResponseInterface
     */
    public function listAction(): ResponseInterface
    {
        $this->view->assign('storages', $this->storageRepository->findAll());
        return $this->htmlResponse();
    }

    /**
     * @param Storage $storage
     * @return ResponseInterface
     */
    public function showAction(Storage $storage): ResponseInterface
    {
        $this->view->assign('storage', $storage);
        return $this->htmlResponse();
    }

    /**
     * @return ResponseInterface
     * @throws AspectNotFoundException
     */
    public function addFormAction(): ResponseInterface
    {
        $userUid = $this->context->getPropertyFromAspect('frontend.user', 'id');
        $setting = $this->storageRepository->findOneByUser($userUid);

        $this->view->assign('userUid', $userUid);
        $this->view->assign('setting', $setting);

        return $this->htmlResponse();
    }

    /**
     * @param Storage $setting
     * @return ResponseInterface
     * @throws ExistingTargetFileNameException
     * @throws IllegalObjectTypeException
     * @throws InsufficientFolderAccessPermissionsException
     */
    public function addAction(Storage $setting): ResponseInterface
    {
        $originalFilePath = $_FILES['file']['tmp_name'];
        $newFileName = $_FILES['file']['name'];

        $storage = $this->resourceFactory->getDefaultStorage();
        $targetFolder = $storage->getFolder('user_upload/');

        $file = $storage->addFile($originalFilePath, $targetFolder, $newFileName, DuplicationBehavior::REPLACE);
        $fileReference = $this->resourceFactory->createFileReferenceObject(
            [
                'uid_local' => $file->getUid(),
                'uid_foreign' => uniqid('NEW_'),
                'uid' => uniqid('NEW_'),
                'crop' => null,
            ]
        );
        /** @var FileReference $modelFileReference */
        $modelFileReference = GeneralUtility::makeInstance(FileReference::class);
        $modelFileReference->setOriginalResource($fileReference);
        $setting->setProfileImage($modelFileReference);

        $arguments = $this->request->getArguments();

        $setting->setLinks([
            'title' => $arguments['title'],
            'url' => $arguments['url']
        ]);

        $this->settingRepository->add($setting);
        $this->persistenceManager->persistAll();

        return (new ForwardResponse('show'))
            ->withArguments(['setting' => $setting]);
    }
}
