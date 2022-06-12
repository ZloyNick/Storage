<?php

declare(strict_types=1);

namespace ZloyNick\Storage\virtual;

use ZloyNick\Storage\drive\DriveInterface;
use ZloyNick\Storage\file\FileInterface;

/**
 * The virtual file interface.
 *
 * This interface should be implemented on the basis of a ZloyNick\Storage\file\FileInterface interface and assume
 * the management of a file whose data is in RAM.
 */
interface VirtualFileInterface extends FileInterface, VirtualObjectInterface
{
    /**
     * @return DriveInterface|VirtualDriveInterface Owner.
     */
    public function getDrive(): DriveInterface|VirtualDriveInterface;

    /**
     * Returns virtual file content size.
     *
     * @return int
     */
    public function getSize(): int;

    /**
     * Returns virtual file content.
     *
     * @return string
     */
    public function getContent(): string;
}