<?php

declare(strict_types=1);

namespace ZloyNick\JooleStorage;

use ZloyNick\JooleStorage\drive\DriveInterface;

/**
 * The Storage interface.
 *
 * Interface for implementing a single manager for local storage.
 */
interface StorageInterface
{

    /**
     * The method moves the disk to the specified folder.
     *
     * @param string $drivePath Full path to the folder.
     * @param string $to Where should I move the drive.
     *
     * @throws StorageException
     *
     * @return DriveInterface Updated drive with new path.
     */
    public function move(string $drivePath, string $to):DriveInterface;

    /**
     * If the disk exists, the method should return the disk object. Otherwise,
     * if the argument $create = true, then the method should create it.
     * If the disk does not exist and the argument $create = false, then the
     * method should throw an exception.
     *
     * @param string $path Full path to the drive.
     * @param bool $create Create drive if not exists?
     * @param bool $virtual Create virtual?
     *
     * @throws StorageException
     *
     * @return DriveInterface
     */
    public static function drive(string $path, bool $create = false, bool $virtual = false):DriveInterface;

    /**
     * The implementation of this method should delete the drive by the selected path.
     * If the drive is already full of files, and the argument $recursive = false,
     * then the method should throw an exception. Otherwise, the method should delete
     * the entire contents of the drive recursively.
     *
     * @param bool $recursive Remove recursively?
     *
     * @throws StorageException
     *
     * @return void
     */
    public static function remove(bool $recursive = false):void;

}