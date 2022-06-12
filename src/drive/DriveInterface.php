<?php

declare(strict_types=1);

namespace ZloyNick\Storage\drive;

use Closure;
use Countable;

use Stringable;
use ZloyNick\Storage\file\FileInterface;
use ZloyNick\Storage\StorageException;
use ZloyNick\Storage\StorageInterface;
use ZloyNick\Storage\virtual\VirtualDriveInterface;

/**
 * The drive interface.
 *
 * Interface for implementing an object to manage a specific drive.
 */
interface DriveInterface extends Countable, Stringable
{

    /**
     * This method should return the path to the disk.
     *
     * @return string Path to the drive.
     */
    public function getRootPath(): string;

    /**
     * The method must be implemented in such a way that a file or drive is returned
     * by the specified path. The method should throw an exception if the file or
     * drive was not found.
     *
     * <b>NOTE:</b> If both a file and a disk exist on the specified path, then the
     * method should always return a disk.
     *
     * @param string $filename Full path to item.
     *
     * @throws StorageException Must be thrown when file or drive not found.
     *
     * @return FileInterface|DriveInterface
     */
    public function get(string $filename): FileInterface|DriveInterface;

    /**
     * This method should implement via using 'drive' method of the Storage.
     *
     * @see StorageInterface::drive()
     *
     * @param string $driveName
     *
     * @throws StorageException
     *
     * @return DriveInterface
     */
    public function subDrive(string $driveName): DriveInterface;

    /**
     * This method should implement via using 'virtualDrive' method of the Storage.
     *
     * @see StorageInterface::virtualDrive()
     *
     * @param string $driveName
     *
     * @throws StorageException
     *
     * @return DriveInterface
     */
    public function virtualSubDrive(string $driveName): DriveInterface;

    /**
     * This method should return method 'file' of the Storage.
     *
     * @param string $filename
     *
     * @throws StorageException
     *
     * @return FileInterface
     */
    public function file(string $filename): FileInterface;

    /**
     * This method should return all drives of current drive.
     *
     * @return DriveInterface[] Drives of current drive.
     */
    public function drives(): array;

    /**
     * This method should return all files of current drive.
     *
     * @return FileInterface[] Files of current drive.
     */
    public function files(): array;

    /**
     * This method should delete the file from the current drive.
     *
     * If the file does not exist, then the method should throw an error.
     *
     * @param string $filename Name of file (not full path).
     *
     * @return static Current drive.
     */
    public function removeFile(string $filename): static;

    /**
     * This method should create files in the drive. If a file with the
     * specified name exists, then the method should throw an exception.
     *
     * @param string $filename The file name with extension.
     * @param int $mode Creation mode.
     *
     * @throws StorageException
     *
     * @return FileInterface The new file.
     */
    public function createFile(string $filename, int $mode = 0775): FileInterface;

    /**
     * This method should create drive in the drive. If a drive with the
     * specified name exists, then the method should throw an exception.
     *
     * @param string $driveName The drive name.
     * @param int $mode Creation mode.
     *
     * @throws StorageException
     *
     * @return DriveInterface The new drive.
     */
    public function createDrive(string $driveName, int $mode = 0775): DriveInterface;

    /**
     * This method should delete the drive from the current drive.
     *
     * If the drive does not exist, then the method should throw an error.
     *
     * @param string $driveName Name of drive (not full path).
     * @param bool $virtual Create virtual drive?
     *
     * @return VirtualDriveInterface Virtual drive.
     */
    public function removeDrive(string $driveName, bool $virtual = false): DriveInterface;

    /**
     * Returns name of drive.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Returns full path of drive.
     *
     * @return string
     */
    public function getFullPath(): string;

    /**
     * This method should implement moving of drive/file.
     *
     * @param DriveInterface|FileInterface|string $target Target, that will be moved.
     * @param string|DriveInterface $to New path.
     *
     * @throws StorageException Should be thrown out if the file/folder on the specified
     * path already exists.
     *
     * @return DriveInterface|FileInterface Moved object.
     */
    public function move(DriveInterface|FileInterface|string $target, string|DriveInterface $to): DriveInterface|FileInterface;

    /**
     * This method should return the full path to the drive.
     *
     * @return string
     */
    public function __toString(): string;

    /**
     * The method should return the number of objects in the folder without
     * taking into account the elements '.' and '..'.
     *
     * @return int Count of objects in current drive.
     */
    public function count(): int;

    /**
     * This method should to allow to make an instruction with each drive object.
     *
     * @param Closure $function Instruction for every object.
     *
     * @return DriveInterface[]|FileInterface[]
     */
    public function each(Closure $function): array;

    /**
     * This method should to allow to filter every drive object.
     *
     * @param Closure $function Condition for every object.
     *
     * @return DriveInterface[]|FileInterface[]
     */
    public function filter(Closure $function): array;

}