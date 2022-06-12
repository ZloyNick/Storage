<?php

declare(strict_types=1);

namespace ZloyNick\Storage\file;

use Stringable;

use ZloyNick\Storage\drive\DriveInterface;

/**
 * The file interface.
 *
 * This interface implements the logic of working with the file.
 */
interface FileInterface extends Stringable
{

    /**
     * Returns filename of current file.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Returns drive that owned current file.
     *
     * @return DriveInterface Owner.
     */
    public function getDrive(): DriveInterface;

    /**
     * Returns filesize.
     *
     * @return int
     */
    public function getSize(): int;

    /**
     * Returns file content.
     *
     * @return string
     */
    public function getContent(): string;

    /**
     * This method should return content size.
     *
     * @return int Bytes.
     */
    public function getContentSize(): int;

    /**
     * The
     *
     * @param string $content New content.
     * @param bool $replace Replace previous file content?
     *
     * @return static
     */
    public function write(string $content, bool $replace = false): static;

    /**
     * Removes current file.
     *
     * @param bool $virtual If true should create virtual file.
     *
     * @return FileInterface Returns virtual file.
     */
    public function remove(bool $virtual = false): FileInterface;

    /**
     * Moves file to other drive.
     *
     * @param DriveInterface $to
     *
     * @return static
     */
    public function move(DriveInterface $to): static;

    /**
     * Returns permission mode of current file.
     *
     * @return int
     */
    public function getMode(): int;

    /**
     * The method should determine whether it is possible to
     * write data to a file or not.
     *
     * @return bool
     */
    public function writeable(): bool;

    /**
     * This method should rename the file.
     *
     * @param string $renameTo The new file name.
     *
     * @return static
     */
    public function rename(string $renameTo): static;

    /**
     * This method should return the file extension.
     *
     * @return string
     */
    public function getExtension(): string;

    /**
     * This method should return the full path to the file.
     *
     * @return string
     */
    public function __toString(): string;

}