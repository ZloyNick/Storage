<?php

declare(strict_types=1);

namespace ZloyNick\Storage;

use Stringable;
use ZloyNick\Storage\drive\DriveInterface;
use ZloyNick\Storage\file\FileInterface;
use ZloyNick\Storage\virtual\VirtualDriveInterface;

/**
 * The Storage interface.
 *
 * Interface for implementing a single manager for local storage.
 *
 * This class must have an assigned directory, with the objects of which it must interact.
 */
interface StorageInterface extends Stringable
{

    /**
     * This method should return the full path to directory of current storage.
     *
     * @return string Full path to directory of this storage.
     */
    public function getFullPath(): string;

    /**
     * The method moves the disk or file to the specified folder.
     *
     * @param FileInterface|DriveInterface|string $object Folder name or drive/file.
     * @param DriveInterface|string $to Where should I move the drive or file.
     *
     * @return DriveInterface Updated drive with new path.
     *
     * @throws StorageException Should be thrown out if a disk with the same name already exists in the $to disk
     * or given object doesn't exist.
     */
    public function move(FileInterface|DriveInterface|string $object, DriveInterface|string $to): DriveInterface;

    /**
     * If the disk exists, the method should return the disk object. Otherwise,
     * if the argument $create = true, then the method should create it.
     * If the disk does not exist and the argument $create = false, then the
     * method should throw an exception.
     *
     * @param string $path Name of drive path.
     * @param bool $create Create drive if not exists?
     *
     * @return DriveInterface
     *
     * @throws StorageException If drive not exists and $create = false.
     */
    public function drive(string $path, bool $create = false): DriveInterface;

    /**
     * This method should return a virtual drive.
     *
     * @param string $name Name of drive path.
     *
     * @throws StorageException Should be discarded if a disk on such a path already exists.
     *
     * @return VirtualDriveInterface Virtual drive.
     */
    public function virtualDrive(string $name): VirtualDriveInterface;

    /**
     * The implementation of this method should delete the drive by the selected path.
     * If the drive is already full of files, and the argument $recursive = false,
     * then the method should throw an exception. Otherwise, the method should delete
     * the entire contents of the drive recursively.
     *
     * @param string|DriveInterface|FileInterface $object The object to be deleted.
     * @param bool $recursive Remove recursively (Only for drives)?
     *
     * @throws StorageException Should be thrown out if the disk/file does not exist.
     */
    public function remove(string|DriveInterface|FileInterface $object, bool $recursive = false): void;

}