<?php

declare(strict_types=1);

namespace ZloyNick\JooleStorage\file;

use ZloyNick\JooleStorage\drive\DriveInterface;

/**
 * The FileInterface interface.
 *
 */
interface FileInterface
{

    public function __construct(DriveInterface &$drive, string $path);

    public function getName(): string;

    public function getDrive(): DriveInterface;

    public function getSize():int;

    public function getContent():string;

    public function remove(bool $virtual = false):FileInterface;

    public function move(DriveInterface $to):static;

    public function getMode():int;

    public function writeable():bool;

    public function rename(string $newName):static;

}