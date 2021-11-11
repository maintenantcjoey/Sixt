<?php

namespace App\Service;

use Exception;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileManager
{
    /**
     * @var ParameterBagInterface
     */
    private $bag;

    public function __construct(ParameterBagInterface $bag)
    {
        $this->bag = $bag;
    }

    public function upload(FormInterface $picture, $update = false)
    {
        /** @var \App\Entity\Picture $model */
        $model = $picture->getData();
        $file = $picture->get('path')->getData();
        if (!$file instanceof UploadedFile) {
            throw new FileException();
        }
        $fileName = Slug::slug($file->getClientOriginalName()) . '_' . uniqid() . '_.' .  $file->guessClientExtension();
        $rootPath = $this->bag->get('kernel.project_dir');

        if ($update && $model->getPath()) {
            if (file_exists($fileToRemove = sprintf('%s/public/images/%s', $rootPath, $model->getPath()))) {
                unlink($fileToRemove);
            }
        }
        try {
            $file->move(sprintf('%s/public/images', $rootPath), $fileName);
            $model->setPath($fileName);
        } catch (Exception $e) {}
    }

}