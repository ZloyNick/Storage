<?php

declare(strict_types=1);

namespace ZloyNick\Storage\virtual;

use ZloyNick\Storage\StorageException;

/**
 *
 */
interface VirtualObjectInterface
{

    /**
     * The method must save the virtual object.
     *
     * @throws StorageException Should be thrown out when an error occurs.
     */
    public function save(): void;

}